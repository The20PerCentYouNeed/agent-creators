<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap for the website.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $baseUrl = config('app.url');
        $locales = config('app.locales', ['en', 'el']);

        $sitemap = Sitemap::create();

        $publicRoutes = [
            'home' => 1.0,
            'about' => 0.8,
            'contact' => 0.7,
            'pricing' => 0.9,
            'case-studies.ai-ecommerce-assistant' => 0.8,
            'case-studies.procurement-optimization-agent' => 0.8,
            'case-studies.dental-clinic-assistant' => 0.8,
            'privacy-policy' => 0.3,
            'terms' => 0.3,
            'cookie-policy' => 0.3,
            'documentation' => 0.7,
            'careers' => 0.6,
            'security' => 0.6,
            'compliance' => 0.6,
        ];

        foreach ($publicRoutes as $routeName => $priority) {
            try {
                foreach ($locales as $locale) {
                    App::setLocale($locale);
                    $url = localized_route($routeName);
                    $urlTag = Url::create($url)
                        ->setPriority($priority)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setLastModificationDate(now());

                    foreach ($locales as $altLocale) {
                        if ($altLocale !== $locale) {
                            App::setLocale($altLocale);
                            $altUrl = localized_route($routeName);
                            $urlTag->addAlternate($altUrl, $altLocale);
                        }
                    }

                    $sitemap->add($urlTag);
                }
            }
            catch (\Exception $e) {
                $this->warn("Could not add route {$routeName}: {$e->getMessage()}");
            }
        }

        $sitemapPath = public_path('sitemap.xml');
        $sitemap->writeToFile($sitemapPath);

        $this->info("Sitemap generated successfully at: {$sitemapPath}");

        return Command::SUCCESS;
    }
}
