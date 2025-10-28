<footer class="bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto ">
        <div class="flex flex-col md:flex-row items-start justify-center lg:justify-between lg:gap-30">
            <!-- Brand Section -->
            <div class="w-full lg:w-[35%]">
                <div class="flex items-center mb-4 space-x-2">
                    <div class="flex items-center justify-center w-8 h-8 bg-gradient-to-br from-blue-600 to-violet-600 rounded-lg">
                        <x-heroicon-o-bolt class="w-5 h-5 text-white" />
                    </div>
                    <a href="{{ localized_route('home') }}" class="text-xl font-bold bg-gradient-to-r from-blue-600 to-violet-600 bg-clip-text text-transparent">
                        {{ __('AI Agents') }}
                    </a>
                </div>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Building intelligent AI agents that transform how businesses operate.') }}
                </p>
            </div>
            <div class="w-full flex flex-wrap lg:grid gap-10 lg:gap-8 mb-8 lg:grid-cols-3 mt-10 lg:mt-0">

                <!-- Product Links -->
                <div>
                    <h4 class="mb-4 font-bold text-gray-900 dark:text-white">
                        {{ __('Information') }}
                    </h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="{{ localized_route('home') . '#features' }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Features') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ localized_route('home') . '#solutions' }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Solutions') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ localized_route('pricing') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Pricing') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ localized_route('documentation') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Documentation') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Company Links -->
                <div>
                    <h4 class="mb-4 font-bold text-gray-900 dark:text-white">
                        {{ __('Company') }}
                    </h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="{{ localized_route('about') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('About') }}
                            </a>
                        </li>
                        <li>
                            <a href="#"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Blog') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ localized_route('careers') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Careers') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ localized_route('contact') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Contact') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div>
                    <h4 class="mb-4 font-bold text-gray-900 dark:text-white">
                        {{ __('Legal') }}
                    </h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="{{ localized_route('privacy-policy') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Privacy') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ localized_route('terms') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Terms') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ localized_route('security') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Security') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ localized_route('compliance') }}"
                            class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                                {{ __('Compliance') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center justify-between pt-8 border-t border-gray-200 dark:border-gray-800 md:flex-row">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ __('© 2025 AI Agents. All rights reserved.') }}
            </p>
            <div class="flex mt-4 space-x-6 md:mt-0">
                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
