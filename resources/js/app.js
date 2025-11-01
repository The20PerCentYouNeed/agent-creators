import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

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
    messages: [
        {
            id: 1,
            type: "bot",
            text: "Hello! How can I help you today? Feel free to ask me anything about AI agent creators and our platform.",
            timestamp: new Date().toLocaleTimeString("en-US", {
                hour: "2-digit",
                minute: "2-digit",
            }),
            read: true,
        },
    ],
    messageInput: "",
    isTyping: false,
    activeTab: null,

    init() {
        // Any initialization logic
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
            type: "user",
            text: this.messageInput.trim(),
            timestamp: new Date().toLocaleTimeString("en-US", {
                hour: "2-digit",
                minute: "2-digit",
            }),
            read: false,
        };

        this.messages.push(userMessage);
        const messageText = this.messageInput;
        this.messageInput = "";
        this.scrollToBottom();

        // Show typing indicator
        this.isTyping = true;

        try {
            // TODO: Replace with actual API endpoint when backend is ready
            const response = await fetch("/api/chatbot/message", {
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
                    conversation_id: this.getConversationId(),
                }),
            });

            // Simulate network delay for now
            await new Promise((resolve) => setTimeout(resolve, 1500));

            this.isTyping = false;

            // TODO: Replace with actual response from API
            // For now, simulating a bot response
            const botMessage = {
                id: Date.now() + 1,
                type: "bot",
                text: "Thank you for your message! This is a placeholder response. The actual AI assistant integration is coming soon.",
                timestamp: new Date().toLocaleTimeString("en-US", {
                    hour: "2-digit",
                    minute: "2-digit",
                }),
                read: true,
            };

            this.messages.push(botMessage);
            this.scrollToBottom();
        } catch (error) {
            this.isTyping = false;
            console.error("Error sending message:", error);

            // Add error message
            const errorMessage = {
                id: Date.now() + 1,
                type: "bot",
                text: "Sorry, I'm having trouble connecting right now. Please try again later.",
                timestamp: new Date().toLocaleTimeString("en-US", {
                    hour: "2-digit",
                    minute: "2-digit",
                }),
                read: true,
            };

            this.messages.push(errorMessage);
            this.scrollToBottom();
        }
    },

    handleKeyPress(event) {
        if (event.key === "Enter" && !event.shiftKey) {
            event.preventDefault();
            this.sendMessage();
        }
    },

    getConversationId() {
        // Get or create conversation ID from localStorage
        let conversationId = localStorage.getItem("chatbot_conversation_id");
        if (!conversationId) {
            conversationId =
                "conv_" +
                Date.now() +
                "_" +
                Math.random().toString(36).substring(7);
            localStorage.setItem("chatbot_conversation_id", conversationId);
        }
        return conversationId;
    },

    selectQuickAction(action) {
        this.messageInput = action;
        this.$refs.messageInput?.focus();
    },
}));

Alpine.start();
