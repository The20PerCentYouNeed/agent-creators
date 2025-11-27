<!-- Chatbot Widget -->
<div
    x-data="chatbot"
    data-messages="{{ json_encode($messages) }}"
    data-url="{{ localized_route('chat.store') }}"
    data-should-auto-open="{{ session('should_auto_open_chatbot') ? 'true' : 'false' }}"
    class="fixed bottom-4 lg:bottom-8 right-4 lg:right-8 z-50"
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
        class="absolute bottom-18 right-0 w-108 h-[690px]
        max-md:w-[calc(100vw-3rem)] max-md:h-[calc(100vh-8rem)] max-md:bottom-16
        bg-gray-900 rounded-2xl shadow-2xl flex flex-col overflow-hidden"
        style="display: none;"
    >
        <!-- Chat Header -->
        <div class="bg-gradient-to-r from-blue-600 via-violet-600 to-purple-600 text-white
        px-6 py-2 flex items-center justify-between rounded-t-2xl">
            <div class="flex items-center gap-3">
                <!-- Bot Avatar -->
                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center overflow-hidden">
                    <picture>
                        <source
                            srcset="{{ asset('images/owl.webp') }}"
                            type="image/webp"
                        >
                        <img
                            src="{{ asset('images/owl.png') }}"
                            alt="AI Assistant"
                            class="w-6 h-6 object-contain"
                            width="32"
                            height="32"
                            loading="eager"
                        >
                    </picture>
                </div>
                <div>
                    <h3 class="font-semibold text-lg">Nyra</h3>
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
                            <p class="text-sm leading-relaxed whitespace-pre-wrap [&_a]:text-blue-400 [&_a]:underline [&_a]:font-medium [&_a:hover]:text-violet-400 [&_a]:transition-colors" x-html="message.text"></p>
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
                class="flex flex-wrap gap-2.5 w-full lg:max-w-[85%] ml-auto items-end"
            >
                @foreach(config('chatbot.question_suggestions') as $suggestion)
                    <button
                        type="button"
                        @click='askSuggestion(@json(__($suggestion)))'
                        class="w-full px-5 py-3 rounded-full border-2 border-violet-500/60
                        text-gray-100 text-sm font-medium cursor-pointer
                        transition-all duration-200 flex items-center justify-center
                        hover:bg-violet-500/10 hover:border-violet-400 hover:shadow-md
                        focus:outline-none focus:ring-2 focus:ring-violet-500/40 focus:border-violet-400"
                    >
                        {{ __($suggestion) }}
                    </button>
                @endforeach
            </div>
            @endif

            <!-- Typing Indicator -->
            <div x-show="isTyping" class="flex gap-3">
                <div class="w-8 h-8 bg-gradient-to-br from-violet-500 to-purple-600 rounded-full flex items-center justify-center shrink-0">
                    <picture>
                        <source
                            srcset="{{ asset('images/owl.webp') }}"
                            type="image/webp"
                        >
                        <img
                            src="{{ asset('images/owl.png') }}"
                            alt="AI Assistant"
                            class="w-6 h-6 object-contain"
                            width="20"
                            height="20"
                            loading="lazy"
                        >
                    </picture>
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

