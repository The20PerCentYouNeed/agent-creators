@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-32 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-br from-blue-50 via-violet-50 to-pink-50 dark:from-gray-900 dark:via-blue-950 dark:to-violet-950">
        <div class="absolute inset-0 opacity-50">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/20 dark:bg-blue-600/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-violet-400/20 dark:bg-violet-600/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto">
            <div class="mb-6">
                <a href="{{ localized_route('home') . '#case-studies' }}" class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors">
                    <x-heroicon-o-arrow-left class="w-5 h-5 mr-2" />
                    {{ __('Back to Case Studies') }}
                </a>
            </div>

            <div class="flex items-center gap-3 mb-6">
                <span class="inline-block px-4 py-2 text-sm font-semibold rounded-full bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                    {{ __('Supply Chain') }}
                </span>
            </div>

            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                <span class="text-white">
                    {{ __('Case Study: Intelligent Procurement Optimization Agent') }}
                </span>
            </h1>

            <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 max-w-4xl mb-8">
                {{ __('Developing an AI Agent that analyzes automated ordering systems, applies supplier policies, and recommends optimized procurement strategies — saving costs and improving efficiency.') }}
            </p>

            <div class="flex flex-wrap gap-3">
                <span class="px-4 py-2 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
                    #{{ __('SupplyChain') }}
                </span>
                <span class="px-4 py-2 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
                    #{{ __('CostOptimization') }}
                </span>
                <span class="px-4 py-2 bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-full text-sm font-medium text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-700">
                    #{{ __('ERPIntegration') }}
                </span>
            </div>
        </div>
    </section>

    {{-- Project Overview --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('PROJECT OVERVIEW') }}
                </h2>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                    {{ __('A distribution company with an automated ERP ordering system needed to optimize procurement decisions. While the system automatically generated orders based on inventory levels, it didn\'t account for supplier commercial policies, volume discounts, and promotional offers — resulting in missed savings opportunities.') }}
                </p>

                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div class="p-6 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-950/30 dark:to-blue-900/20 border border-blue-200 dark:border-blue-800">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">{{ __('Key Facts') }}</h3>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ __('Industry') }}:</span>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">{{ __('Distribution & Wholesale') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ __('Implementation Duration') }}:</span>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">{{ __('5 weeks') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ __('Goal') }}:</span>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">{{ __('Optimize procurement costs through intelligent policy application') }}</span>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <x-heroicon-o-check-circle class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                                <div>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ __('Technology') }}:</span>
                                    <span class="text-gray-600 dark:text-gray-300 ml-2">{{ __('Custom AI Agent with ERP integration') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- The Challenge --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('THE CHALLENGE') }}
                </h2>
            </div>

            <div class="bg-gradient-to-br from-gray-50 to-gray-100/50 dark:from-gray-800 dark:to-gray-900/20 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('The automated ordering system operated efficiently but lacked intelligence. It generated orders based solely on inventory levels and reorder points, without considering:') }}
                </p>

                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">{{ __('Critical gaps identified') }}:</h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-600 dark:text-gray-300">{{ __('Volume discount thresholds (e.g., -3% for 12+ boxes, -5% for 24+).') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-600 dark:text-gray-300">{{ __('Promotional offers (1+1, free shipping, pallet discounts).') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-600 dark:text-gray-300">{{ __('Supplier-specific policies stored in PDF documents.') }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <x-heroicon-o-x-circle class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" />
                        <span class="text-gray-600 dark:text-gray-300">{{ __('Layer/pallet optimization opportunities.') }}</span>
                    </li>
                </ul>

                <p class="text-lg text-gray-600 dark:text-gray-300 mt-6 leading-relaxed">
                    {{ __('The company needed a solution that would analyze each automated order, apply relevant commercial policies, and suggest optimized alternatives — without disrupting the existing ERP workflow.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- The Solution --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('THE SOLUTION') }}
                </h2>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 mb-8">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                    {{ __('We proposed an intelligent AI Assistant that would act as a "smart colleague" — analyzing automated orders in real-time, comparing them against supplier policies, and proposing more cost-effective alternatives through an interactive chatbot interface.') }}
                </p>

                <div class="flex items-center gap-3 mb-6">
                    <x-heroicon-o-map class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ __('Proposed Implementation Plan') }}</h3>
                </div>

                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">1</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Environment Setup & Agent Definition (Week 1)') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('Establish the AI workspace, define business rules for discount thresholds, 1+1 offers, pallet optimization, and supplier priorities. Create the foundational logic that would guide the Agent\'s decision-making process.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">2</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Commercial Policy Processing (Week 1, parallel)') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('Test PDF parsing with 2-3 supplier policies. Develop standardized "clean PDF" templates to ensure accurate rule extraction. Convert policy documents into structured rules the Agent can apply.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">3</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('ERP Integration (Weeks 2-3)') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('Collaborate with vendor to establish read-only API or database access. Connect Agent to auto-orders table and supplier policy PDFs. Test real-time data flow and connectivity.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">4</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Chatbot Interface & Reporting (Weeks 3-4, parallel)') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('Build web-based chatbot widget that would display Agent recommendations with full justification. Implement accept/reject feedback mechanism. Create reporting dashboard for tracking savings and performance.') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                            <span class="text-blue-600 dark:text-blue-400 font-bold">5</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Testing & Final Delivery (Week 5)') }}</h4>
                            <p class="text-gray-600 dark:text-gray-300">{{ __('Conduct testing with actual auto-orders. Refine integration and business rules based on results. Deliver fully operational system with comprehensive documentation and training.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- How It Works --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('HOW IT WORKS') }}
                </h2>
            </div>

            <div class="bg-gray-50 dark:bg-gray-900 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">{{ __('The Agent\'s Process') }}:</h3>

                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                            <x-heroicon-o-document-text class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        </div>
                        <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Read') }}</h4>
                        <p class="text-gray-600 dark:text-gray-300">{{ __('Monitors automated ordering system for new orders. Reads product codes, quantities, unit prices, and supplier data.') }}</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                            <x-heroicon-o-calculator class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        </div>
                        <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Analyze') }}</h4>
                        <p class="text-gray-600 dark:text-gray-300">{{ __('Applies relevant supplier commercial policies. Calculates volume discounts, promotional offers, and pallet optimizations.') }}</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-4">
                            <x-heroicon-o-light-bulb class="w-6 h-6 text-blue-600 dark:text-blue-400" />
                        </div>
                        <h4 class="font-bold text-gray-900 dark:text-white mb-2">{{ __('Recommend') }}</h4>
                        <p class="text-gray-600 dark:text-gray-300">{{ __('Presents optimized alternative via chatbot. Shows cost savings and justification. User decides to accept or reject.') }}</p>
                    </div>
                </div>

                <div class="mt-8 p-6 bg-blue-50 dark:bg-blue-950/30 rounded-xl border border-blue-200 dark:border-blue-800">
                    <h4 class="font-bold text-gray-900 dark:text-white mb-3">{{ __('Example Scenario') }}:</h4>
                    <div class="space-y-2 text-gray-700 dark:text-gray-300">
                        <p><span class="font-semibold">{{ __('Automated Order') }}:</span> {{ __('10 boxes of Product X') }}</p>
                        <p><span class="font-semibold">{{ __('Agent Recommendation') }}:</span> {{ __('Order 13 boxes instead') }}</p>
                        <p><span class="font-semibold">{{ __('Justification') }}:</span> {{ __('Supplier offers -3% discount for 12+ boxes. By ordering 13, you save €45 and qualify for free shipping.') }}</p>
                        <p class="text-blue-600 dark:text-blue-400 font-semibold">{{ __('Result: €45 saved + free shipping') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Technical Infrastructure --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('TECHNICAL INFRASTRUCTURE') }}
                </h2>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700">
                <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                    {{ __('ERP System (Auto Orders) → AI Agent → Policy Analysis → Chatbot Interface → User Decision') }}
                </p>

                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">{{ __('Key Components') }}:</h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-900 dark:text-white">{{ __('Integration Layer') }}</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-900 rounded-lg">
                                <x-heroicon-o-server class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                                <span class="text-gray-700 dark:text-gray-300">{{ __('Read-only ERP API/Database Access') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-900 rounded-lg">
                                <x-heroicon-o-document class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                                <span class="text-gray-700 dark:text-gray-300">{{ __('PDF Policy Parser') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-900 rounded-lg">
                                <x-heroicon-o-arrow-path class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                                <span class="text-gray-700 dark:text-gray-300">{{ __('Real-time Data Sync') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-900 dark:text-white">{{ __('User Interface') }}</h4>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-900 rounded-lg">
                                <x-heroicon-o-chat-bubble-left-right class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                                <span class="text-gray-700 dark:text-gray-300">{{ __('Web-based Chatbot Widget') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-900 rounded-lg">
                                <x-heroicon-o-chart-bar class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                                <span class="text-gray-700 dark:text-gray-300">{{ __('Reporting Dashboard') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-900 rounded-lg">
                                <x-heroicon-o-bell class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                                <span class="text-gray-700 dark:text-gray-300">{{ __('Automated Notifications') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-6 bg-blue-50 dark:bg-blue-950/30 rounded-xl border border-blue-200 dark:border-blue-800">
                    <h4 class="font-bold text-gray-900 dark:text-white mb-3">{{ __('Security & Permissions') }}:</h4>
                    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                        <li class="flex items-start gap-2">
                            <x-heroicon-o-shield-check class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                            <span>{{ __('Read-only access — Agent cannot modify ERP data') }}</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-heroicon-o-shield-check class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                            <span>{{ __('Encrypted connections and secure authentication') }}</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <x-heroicon-o-shield-check class="w-5 h-5 text-blue-600 dark:text-blue-400 flex-shrink-0 mt-0.5" />
                            <span>{{ __('All decisions require human approval') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Results & Impact --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                    {{ __('EXPECTED IMPACT') }}
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-950/30 dark:to-blue-900/20 rounded-2xl p-8 border border-blue-200 dark:border-blue-800">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">15-25%</div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ __('Cost Reduction') }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ __('Through optimized volume purchases and policy application') }}</p>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-950/30 dark:to-blue-900/20 rounded-2xl p-8 border border-blue-200 dark:border-blue-800">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">100%</div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ __('Policy Coverage') }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ __('Every order analyzed against all applicable supplier policies') }}</p>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-950/30 dark:to-blue-900/20 rounded-2xl p-8 border border-blue-200 dark:border-blue-800">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 mb-2">{{ __('Real-time') }}</div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ __('Decision Support') }}</h3>
                    <p class="text-gray-600 dark:text-gray-300">{{ __('Instant recommendations as orders are generated') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-2xl md:text-4xl font-bold text-white mb-6">
                {{ __('Ready to Optimize Your Procurement?') }}
            </h2>
            <p class="text-base md:text-xl text-white/90 mb-8">
                {{ __('Let\'s discuss how AI can help your business make smarter purchasing decisions') }}
            </p>
            <a href="{{ localized_route('contact') }}" class="inline-block px-8 py-4 text-lg font-semibold text-blue-600 bg-white rounded-lg hover:bg-gray-100 transition-all shadow-xl hover:shadow-2xl hover:-translate-y-0.5">
                {{ __('Contact Us Today') }}
            </a>
        </div>
    </section>
@endsection

