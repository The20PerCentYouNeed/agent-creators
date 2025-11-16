import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.magic("root", (el) => {
    let closestRootEl = (node) => {
        if (node.hasAttribute("x-data")) return node;

        return closestRootEl(node.parentNode);
    };

    return closestRootEl(el);
});

Alpine.data("carousel", (options = {}) => ({
    gap: options.gap ?? 16,
    stepPx: 0,

    init() {
        queueMicrotask(() => {
            this.calculateStep();
            window.addEventListener("resize", () => this.calculateStep());
        });
    },

    calculateStep() {
        const track = this.$refs.track;
        if (!track) return;
        const firstCard = track.querySelector("article");
        if (!firstCard) return;
        const computedGap = this.gap;
        this.stepPx = firstCard.getBoundingClientRect().width + computedGap;
    },

    next() {
        const track = this.$refs.track;
        if (!track || this.stepPx === 0) return;
        track.scrollBy({ left: this.stepPx, behavior: "smooth" });
    },

    prev() {
        const track = this.$refs.track;
        if (!track || this.stepPx === 0) return;
        track.scrollBy({ left: -this.stepPx, behavior: "smooth" });
    },
}));

Alpine.data("leadForm", () => ({
    form: {
        full_name: "",
        email: "",
        company: "",
        phone: "",
        business_size: "",
        industry: "",
        project_description: "",
    },
    errors: {},
    loading: false,
    success: false,
    error: false,
    errorMessage: "",

    init() {
        // Reset form state when component initializes
        this.resetForm();
    },

    validateForm() {
        this.errors = {};
        let isValid = true;

        // Required fields validation
        if (!this.form.full_name.trim()) {
            this.errors.full_name = "Full name is required";
            isValid = false;
        }

        if (!this.form.email.trim()) {
            this.errors.email = "Email address is required";
            isValid = false;
        } else if (!this.isValidEmail(this.form.email)) {
            this.errors.email = "Please enter a valid email address";
            isValid = false;
        }

        if (!this.form.company.trim()) {
            this.errors.company = "Company name is required";
            isValid = false;
        }

        // Phone validation (optional but if provided, should be valid)
        if (this.form.phone && !this.isValidPhone(this.form.phone)) {
            this.errors.phone = "Please enter a valid phone number";
            isValid = false;
        }

        return isValid;
    },

    isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    },

    isValidPhone(phone) {
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        return phoneRegex.test(phone.replace(/[\s\-\(\)]/g, ""));
    },

    async submitForm() {
        if (!this.validateForm()) {
            this.error = true;
            this.errorMessage = "Please fill in all required fields";
            return;
        }

        this.loading = true;
        this.error = false;
        this.success = false;

        try {
            // Simulate API call - replace with actual endpoint
            const response = await fetch("/api/leads", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN":
                        document
                            .querySelector('meta[name="csrf-token"]')
                            ?.getAttribute("content") || "",
                },
                body: JSON.stringify(this.form),
            });

            if (response.ok) {
                this.success = true;
                this.resetForm();
                // Scroll to success message
                this.$nextTick(() => {
                    this.$el.scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                });
            } else {
                throw new Error("Failed to submit form");
            }
        } catch (err) {
            this.error = true;
            this.errorMessage = "Something went wrong. Please try again later.";
            console.error("Form submission error:", err);
        } finally {
            this.loading = false;
        }
    },

    resetForm() {
        this.form = {
            full_name: "",
            email: "",
            company: "",
            phone: "",
            business_size: "",
            industry: "",
            project_description: "",
        };
        this.errors = {};
        this.success = false;
        this.error = false;
        this.errorMessage = "";
    },
}));

Alpine.data("chatbot", () => ({
    isOpen: false,
    isOnline: true,
    messages: [],
    messageInput: "",
    isTyping: false,
    activeTab: null,
    quickSuggestions: [],

    init() {
        setTimeout(() => {
            if (!this.isOpen && window.location.pathname !== "/contact") {
                this.isOpen = true;
                this.scrollToBottom();
            }
        }, 3000);

        const messages = JSON.parse(this.$root.dataset.messages);
        this.messages = messages;

        this.scrollToBottom();
    },

    toggleChat() {
        this.isOpen = !this.isOpen;
        if (this.isOpen) {
            this.$nextTick(() => {
                this.scrollToBottom();
                this.$refs.messageInput?.focus();
            });
        }
    },

    closeChat() {
        this.isOpen = false;
    },

    scrollToBottom() {
        this.$nextTick(() => {
            const messagesContainer = this.$refs.messagesContainer;
            if (messagesContainer) {
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        });
    },

    async sendMessage() {
        if (!this.messageInput.trim()) {
            return;
        }

        const userMessage = {
            id: Date.now(),
            role: "user",
            text: this.messageInput.trim(),
            created_at: new Date().toLocaleTimeString("en-US", {
                hour: "2-digit",
                minute: "2-digit",
            }),
        };

        this.messages.push(userMessage);
        const messageText = this.messageInput;
        this.messageInput = "";
        this.scrollToBottom();

        // Show typing indicator
        this.isTyping = true;

        try {
            const response = await fetch(this.$root.dataset.url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN":
                        document
                            .querySelector('meta[name="csrf-token"]')
                            ?.getAttribute("content") || "",
                },
                body: JSON.stringify({
                    message: messageText,
                }),
            });

            this.isTyping = false;

            if (!response.ok) {
                throw new Error("Failed to get response");
            }

            const data = await response.json();

            const botMessage = {
                id: data.id,
                role: data.role,
                text: data.text,
                created_at: data.created_at,
            };

            this.messages.push(botMessage);
            this.scrollToBottom();
        } catch (error) {
            this.isTyping = false;
            console.error("Error sending message:", error);

            // Add error message
            const errorMessage = {
                id: Date.now() + 1,
                role: "assistant",
                text: "Sorry, I'm having trouble connecting right now. Please try again later.",
                created_at: new Date().toLocaleTimeString("en-US", {
                    hour: "2-digit",
                    minute: "2-digit",
                }),
            };

            this.messages.push(errorMessage);
            this.scrollToBottom();
        }
    },

    askSuggestion(question) {
        this.messageInput = question;
        // Immediately send on click (no need to press Enter)
        this.sendMessage();
    },
}));

Alpine.start();
