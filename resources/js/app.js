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

Alpine.data("chatbot", () => ({
    isOpen: false,
    isOnline: true,
    messages: [],
    messageInput: "",
    isTyping: false,
    activeTab: null,
    quickSuggestions: [],

    init() {
        const shouldAutoOpen = this.$root.dataset.shouldAutoOpen === "true";

        if (shouldAutoOpen) {
            setTimeout(() => {
                if (!this.isOpen && window.location.pathname !== "/contact") {
                    this.isOpen = true;
                    this.scrollToBottom();
                }
            }, 3000);
        }

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

            if (!response.ok) {
                throw new Error("Failed to get response");
            }

            const reader = response.body.getReader();
            const decoder = new TextDecoder();

            const { done, value } = await reader.read();

            const text = decoder.decode(value, { stream: true });

            const botMessage = {
                id: Date.now() + 1,
                role: "assistant",
                text: text,
                created_at: new Date().toLocaleTimeString("en-US", {
                    hour: "2-digit",
                    minute: "2-digit",
                }),
            };

            this.messages.push(botMessage);

            this.isTyping = false;

            while (true) {
                const { done, value } = await reader.read();
                if (done) break;

                const text = decoder.decode(value, { stream: true });
                this.messages[this.messages.length - 1].text += text;

                this.scrollToBottom();
            }
        } catch (error) {
            this.isTyping = false;
            console.error("Error sending message:", error);

            // Update bot message with error
            botMessage.text =
                "Sorry, I'm having trouble connecting right now. Please try again later.";
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
