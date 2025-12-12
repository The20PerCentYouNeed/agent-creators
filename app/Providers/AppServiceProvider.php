<?php

namespace App\Providers;

use App\View\Components\Chatbot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Request::macro('setPath', function ($path) {
            $this->pathInfo = '/' . trim($path, '/');

            $this->server->set('REQUEST_URI', $this->pathInfo . '?' . $this->getQueryString());
        });

        Blade::component(Chatbot::class, 'chatbot');

        // Configure SEO for static pages.
        $this->configureSeoForPages();
    }

    /**
     * Configure SEO data for static pages.
     */
    private function configureSeoForPages(): void
    {
        View::composer('home', function ($view) {
            $baseUrl = config('app.url');

            $view->with('seoData', new SEOData(
                title: 'Custom AI Agents for Your Business',
                description: 'Transform your business with custom AI agents. Automate workflows, enhance customer service, and scale operations with intelligent automation tailored to your needs.',
                image: 'images/logo.webp',
                schema: SchemaCollection::make()
                    ->add(fn () => [
                        '@context' => 'https://schema.org',
                        '@type' => 'Organization',
                        'name' => 'Noctua Core.AI',
                        'url' => $baseUrl,
                        'logo' => $baseUrl . '/images/logo.webp',
                        'description' => 'Custom AI agent development company specializing in intelligent automation solutions for businesses.',
                        'sameAs' => [
                            // Add social media profiles here when available
                        ],
                    ])
                    ->add(fn () => [
                        '@context' => 'https://schema.org',
                        '@type' => 'WebSite',
                        'name' => 'Noctua Core.AI',
                        'url' => $baseUrl,
                        'potentialAction' => [
                            '@type' => 'SearchAction',
                            'target' => [
                                '@type' => 'EntryPoint',
                                'urlTemplate' => $baseUrl . '/search?q={search_term_string}',
                            ],
                            'query-input' => 'required name=search_term_string',
                        ],
                    ]),
            ));
        });

        View::composer('static-pages.about', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'About Us | Custom AI Agent Development Company',
                description: 'Learn about Noctua Core.AI - experts in developing custom AI agents for businesses. We help companies automate workflows and enhance customer service with intelligent AI solutions.',
            ));
        });

        View::composer('contact-form', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'Contact Us | Get Started with Custom AI Agents',
                description: 'Contact Noctua Core.AI to discuss your custom AI agent needs. Get a free consultation and discover how AI can transform your business operations.',
            ));
        });

        View::composer('static-pages.pricing', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'Pricing | Custom AI Agent Development Services',
                description: 'Transparent pricing for custom AI agent development. Choose the plan that fits your business needs and start automating with intelligent AI solutions.',
            ));
        });

        View::composer('case-studies.e-commerce-assistant', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'Case Study: AI E-Commerce Assistant | 70% Faster Response Time',
                description: 'Discover how we built a custom AI assistant for an e-commerce business, integrating website, email, and messaging apps to reduce response time by 70%.',
                image: 'images/e-commerce.webp',
                type: 'article',
            ));
        });

        View::composer('case-studies.procurement-optimization-agent', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'Case Study: Procurement Optimization AI Agent',
                description: 'Learn how our custom AI agent streamlined procurement processes, automated supplier policy analysis, and optimized purchasing decisions for better efficiency.',
                image: 'images/procurement-optimization.webp',
                type: 'article',
            ));
        });

        View::composer('case-studies.dental-clinic-assistant', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'Case Study: Dental Clinic AI Assistant',
                description: 'See how we developed an AI assistant for a dental clinic to improve patient communication, automate appointment scheduling, and provide oral health guidance.',
                image: 'images/dental-clinic-assistant.webp',
                type: 'article',
            ));
        });

        View::composer('static-pages.documentation', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'Documentation | AI Agent Development Resources',
                description: 'Comprehensive documentation and resources for custom AI agent development. Learn about our services, integration capabilities, and best practices.',
            ));
        });

        View::composer('static-pages.careers', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'Careers | Join Our AI Development Team',
                description: 'Join Noctua Core.AI and help build the future of AI agents. We\'re looking for talented developers and AI specialists to join our growing team.',
            ));
        });

        View::composer('static-pages.security', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'Security | Enterprise-Grade AI Agent Security',
                description: 'Learn about our security measures and compliance standards. We ensure enterprise-level security for all custom AI agent deployments.',
            ));
        });

        View::composer('static-pages.compliance', function ($view) {
            $view->with('seoData', new SEOData(
                title: 'Compliance | AI Agent Regulatory Compliance',
                description: 'Our AI agents comply with industry regulations and data protection standards. Learn about our compliance measures and certifications.',
            ));
        });
    }
}
