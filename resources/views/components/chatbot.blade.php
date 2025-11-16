<!-- Chatbot Widget -->
<div
    x-data="chatbot"
    data-messages="{{ json_encode($messages) }}"
    data-url="{{ localized_route('chat.store') }}"
    class="fixed bottom-6 md:bottom-8 right-6 md:right-8 z-50"
>
    <!-- Chat Window -->
    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 transform translate-y-4 scale-95"
        class="absolute bottom-18 right-0 w-108 h-[690px] max-md:fixed max-md:inset-0
        max-md:w-full max-md:h-full max-md:z-[60] bg-gray-900 rounded-2xl max-md:rounded-none shadow-2xl flex flex-col overflow-hidden"
        style="display: none;"
    >
        <!-- Chat Header -->
        <div class="bg-gradient-to-r from-blue-600 via-violet-600 to-purple-600 text-white
        px-6 py-2 flex items-center justify-between rounded-t-2xl max-md:rounded-none">
            <div class="flex items-center gap-3">
                <!-- Bot Avatar -->
                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-lg">AI Assistant</h3>
                    <div class="flex items-center gap-1">
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
                class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/20 transition-colors cursor-pointer"
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
            class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-800"
        >
            <!-- Message Loop -->
            <template x-for="message in messages" :key="message.id">
                <div
                    class="flex gap-3"
                    :class="message.role === 'user' ? 'flex-row-reverse' : 'flex-row'"
                >
                    <!-- Message Bubble -->
                    <div
                        class="flex flex-col max-w-[80%]"
                        :class="message.role === 'user' ? 'items-end' : 'items-start'"
                    >
                        <div
                            class="px-4 py-2.5 rounded-2xl shadow-sm"
                            :class="message.role === 'assistant'
                                ? 'bg-gray-700 text-gray-100'
                                : 'bg-gradient-to-r from-blue-600 to-violet-600 text-white'"
                        >
                            <p class="text-sm leading-relaxed whitespace-pre-wrap" x-text="message.text"></p>
                        </div>
                        <!-- Timestamp -->
                        <div class="flex items-center gap-1 mt-1 px-1">
                            <span
                                class="text-xs text-gray-400"
                                x-text="message.created_at"
                            ></span>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Suggested Questions (appear under the initial bot message) -->
            @if (count($messages) <= 1)
            <div
                x-show="messages.length <= 1"
                class="bg-gray-700 border border-gray-600 rounded-2xl p-4 shadow-sm"
            >
                <h4 class="text-sm font-semibold text-gray-100">{{ __("Try asking:") }}</h4>
                <div class="mt-3 grid grid-cols-1 gap-2">
                    @foreach(config('chatbot.question_suggestions') as $suggestion)
                        <button
                            type="button"
                            @click='askSuggestion(@json(__($suggestion)))'
                            class="group w-full text-left px-4 py-2.5 rounded-xl border border-gray-600
                            bg-gradient-to-r from-gray-700/60 to-gray-700/20 text-gray-100 cursor-pointer
                            transition-all duration-200 hover:shadow-lg
                            hover:from-gray-600 hover:to-gray-600/60 hover:-translate-y-0.5 focus:outline-none
                            focus:ring-2 focus:ring-violet-500/40"
                        >
                            <span class="inline-flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 transition-colors group-hover:bg-violet-500"></span>
                                <span class="text-sm">{{ __($suggestion) }}</span>
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Typing Indicator -->
            <div x-show="isTyping" class="flex gap-3">
                <div class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-full flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="bg-gray-700 px-4 py-3 rounded-2xl shadow-sm">
                    <div class="flex gap-1">
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0ms;"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 150ms;"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 300ms;"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Message Input -->
        <div class="p-4 bg-gray-900 border-t border-gray-700">
            <form @submit.prevent="sendMessage" @keydown.prevent.enter="sendMessage" class="flex gap-2 items-center">
                <input
                    x-ref="messageInput"
                    x-model="messageInput"
                    type="text"
                    placeholder="Type your message here..."
                    class="flex-1 px-4 py-2.5 bg-gray-800 text-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-violet-500 placeholder-gray-400"
                />
                <button
                    type="submit"
                    :disabled="!messageInput.trim()"
                    class="w-10 h-10 bg-gradient-to-r from-blue-600 to-violet-600
                    text-white rounded-full flex items-center justify-center cursor-pointer
                    hover:shadow-lg transition-all disabled:opacity-50 disabled:cursor-not-allowed"
                    aria-label="Send message"
                >
                    <svg class="w-5 h-5 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Floating Chat Button -->
    <button
        @click="toggleChat"
        class="w-14 h-14 bg-gradient-to-br from-blue-600 via-violet-600 to-purple-600 text-white
        rounded-full shadow-2xl flex items-center justify-center cursor-pointer
        hover:scale-110 transition-transform duration-200 relative"
        :class="{ 'max-md:hidden': isOpen }"
        aria-label="Open chat"
    >
        <!-- Chat Icon (when closed) -->
        <svg
            x-show="!isOpen"
            class="w-8 h-8 absolute inset-0 m-auto"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>

        <!-- Chevron Down Icon (when open) -->
        <svg
            x-show="isOpen"
            class="w-8 h-8 absolute inset-0 m-auto"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            style="display: none;"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>


        <!-- Notification Badge (optional - can be used later) -->
        <!-- <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span> -->
    </button>
</div>

