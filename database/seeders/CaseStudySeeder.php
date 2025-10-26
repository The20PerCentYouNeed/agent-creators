<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use Illuminate\Database\Seeder;

class CaseStudySeeder extends Seeder
{
    public function run(): void
    {
        $caseStudies = [
            [
                'title' => 'AI-Powered Website Builder',
                'category' => 'Web Development',
                'logo_url' => null,
                'image_url' => null,
                'description' => 'We built this entire marketplace platform using AI agents, showcasing the power of automated development.',
                'full_description' => 'This platform was completely built using AI agents for code generation, testing, and deployment. We demonstrate the practical application of AI in modern web development, creating a fully functional marketplace with advanced features.',
                'order' => 1,
            ],
            [
                'title' => 'Intelligent Chatbot Assistant',
                'category' => 'AI Assistant',
                'logo_url' => null,
                'image_url' => null,
                'description' => 'An AI chatbot designed to assist users with intelligent conversations and personalized support.',
                'full_description' => 'Our intelligent chatbot uses advanced natural language processing to understand context, provide personalized responses, and assist users 24/7. It\'s designed to handle complex queries and escalate to human agents when needed.',
                'order' => 2,
            ],
            [
                'title' => 'Business Idea Brainstorming GPT',
                'category' => 'AI Tools',
                'logo_url' => null,
                'image_url' => null,
                'description' => 'A specialized GPT designed to help entrepreneurs generate and refine innovative business ideas.',
                'full_description' => 'This custom GPT leverages advanced AI to help entrepreneurs brainstorm, validate, and refine business ideas. It provides structured frameworks, market insights, and creative suggestions to transform concepts into viable business plans.',
                'order' => 3,
            ],
        ];

        foreach ($caseStudies as $caseStudy) {
            CaseStudy::create($caseStudy);
        }
    }
}
