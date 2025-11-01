<!-- Chatbot Widget -->
<div x-data="chatbot" class="fixed bottom-6 md:bottom-8 right-6 md:right-8 z-50">
    <!-- Chat Window -->
    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 transform translate-y-4 scale-95"
        class="absolute bottom-20 right-0 w-96 h-[650px] max-md:fixed max-md:inset-0 max-md:w-full max-md:h-full max-md:z-[60] bg-white dark:bg-gray-900 rounded-2xl max-md:rounded-none shadow-2xl flex flex-col overflow-hidden"
        style="display: none;"
    >
        <!-- Chat Header -->
        <div class="bg-gradient-to-r from-blue-600 via-violet-600 to-purple-600 text-white px-6 py-4 flex items-center justify-between rounded-t-2xl max-md:rounded-none">
            <div class="flex items-center gap-3">
                <!-- Bot Avatar -->
                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-lg">AI Assistant</h3>
                    <div class="flex items-center gap-1.5">
                        <span
                            class="w-2 h-2 rounded-full"
                            :class="isOnline ? 'bg-green-400 animate-pulse' : 'bg-gray-400'"
                        ></span>
                        <span class="text-xs text-white/90" x-text="isOnline ? 'Online' : 'Offline'"></span>
                    </div>
                </div>
            </div>
            <!-- Close Button -->
            <button
                @click="closeChat"
                class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/20 transition-colors"
                aria-label="Close chat"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Messages Container -->
        <div
            x-ref="messagesContainer"
            class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50 dark:bg-gray-800"
        >
            <!-- Message Loop -->
            <template x-for="message in messages" :key="message.id">
                <div
                    class="flex gap-3"
                    :class="message.type === 'user' ? 'flex-row-reverse' : 'flex-row'"
                >
                    <!-- Avatar -->
                    <div
                        class="w-8 h-8 rounded-full flex items-center justify-center shrink-0"
                        :class="message.type === 'bot' ? 'bg-gradient-to-br from-violet-500 to-purple-600' : 'bg-gradient-to-br from-blue-500 to-blue-600'"
                    >
                        <template x-if="message.type === 'bot'">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </template>
                        <template x-if="message.type === 'user'">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </template>
                    </div>

                    <!-- Message Bubble -->
                    <div
                        class="flex flex-col max-w-[70%]"
                        :class="message.type === 'user' ? 'items-end' : 'items-start'"
                    >
                        <div
                            class="px-4 py-2.5 rounded-2xl shadow-sm"
                            :class="message.type === 'bot'
                                ? 'bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100'
                                : 'bg-gradient-to-r from-blue-600 to-violet-600 text-white'"
                        >
                            <p class="text-sm leading-relaxed whitespace-pre-wrap" x-text="message.text"></p>
                        </div>
                        <!-- Timestamp -->
                        <div class="flex items-center gap-1 mt-1 px-1">
                            <span
                                class="text-xs text-gray-500 dark:text-gray-400"
                                x-text="message.timestamp"
                            ></span>
                            <template x-if="message.type === 'user' && message.read">
                                <svg class="w-3 h-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </template>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Typing Indicator -->
            <div x-show="isTyping" class="flex gap-3">
                <div class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="bg-white dark:bg-gray-700 px-4 py-3 rounded-2xl shadow-sm">
                    <div class="flex gap-1">
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0ms;"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 150ms;"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 300ms;"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="px-4 py-3 bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
            <div class="flex gap-2 overflow-x-auto pb-2">
                <button
                    @click="selectQuickAction('What is an AI agent?')"
                    class="text-xs px-3 py-1.5 bg-gray-100 dark:bg-gray-800
                    hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700
                    dark:text-gray-300 rounded-full whitespace-nowrap transition-colors cursor-pointer"
                >
                    💡 What is an AI agent?
                </button>
                <button
                    @click="selectQuickAction('Tell me about pricing')"
                    class="text-xs px-3 py-1.5 bg-gray-100 dark:bg-gray-800
                    hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700
                    dark:text-gray-300 rounded-full whitespace-nowrap transition-colors cursor-pointer"
                >
                    💰 Pricing
                </button>
                <button
                    @click="selectQuickAction('How do I get started?')"
                    class="text-xs px-3 py-1.5 bg-gray-100 dark:bg-gray-800
                    hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700
                    dark:text-gray-300 rounded-full whitespace-nowrap transition-colors cursor-pointer"
                >
                    📚 FAQs
                </button>
            </div>
        </div>

        <!-- Message Input -->
        <div class="p-4 bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
            <form @submit.prevent="sendMessage" class="flex gap-2">
                <input
                    x-ref="messageInput"
                    x-model="messageInput"
                    @keydown="handleKeyPress"
                    type="text"
                    placeholder="Type your message here..."
                    class="flex-1 px-4 py-2.5 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-violet-500 placeholder-gray-500 dark:placeholder-gray-400"
                />
                <button
                    type="submit"
                    :disabled="!messageInput.trim()"
                    class="w-10 h-10 bg-gradient-to-r from-blue-600 to-violet-600 text-white rounded-full flex items-center justify-center hover:shadow-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed"
                    aria-label="Send message"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Floating Chat Button -->
    <button
        @click="toggleChat"
        class="w-16 h-16 bg-gradient-to-br from-blue-600 via-violet-600 to-purple-600 text-white
        rounded-full shadow-2xl flex items-center justify-center cursor-pointer
        hover:scale-110 transition-transform duration-200 relative"
        :class="{ 'max-md:hidden': isOpen }"
        aria-label="Open chat"
    >
        <!-- Chat Icon (when closed) -->
        <svg
            x-show="!isOpen"
            class="w-8 h-8"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>

        <!-- X Icon (when open) -->
        <svg
            x-show="isOpen"
            class="w-8 h-8"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            style="display: none;"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>

        <!-- Notification Badge (optional - can be used later) -->
        <!-- <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span> -->
    </button>
</div>

