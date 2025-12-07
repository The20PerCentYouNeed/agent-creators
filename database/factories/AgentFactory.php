<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{
    public function definition(): array
    {
        $agentProfiles = [
            ['name' => 'Customer Support Specialist', 'type' => 'customer_support', 'description' => 'Handle customer inquiries 24/7, resolve issues instantly, and maintain 98% satisfaction ratings across all channels.'],
            ['name' => 'Live Chat Assistant', 'type' => 'customer_support', 'description' => 'Engage website visitors in real-time, answer product questions, and convert browsers into buyers with intelligent conversations.'],
            ['name' => 'Technical Support Expert', 'type' => 'customer_support', 'description' => 'Troubleshoot technical issues, guide users through complex processes, and escalate critical problems to human engineers.'],
            ['name' => 'Lead Qualification Agent', 'type' => 'sales', 'description' => 'Score and qualify inbound leads automatically, schedule demos with hot prospects, and increase sales team efficiency by 40%.'],
            ['name' => 'Sales Outreach Assistant', 'type' => 'sales', 'description' => 'Craft personalized sales emails, follow up with prospects automatically, and book 3x more meetings than manual outreach.'],
            ['name' => 'Product Recommender', 'type' => 'sales', 'description' => 'Analyze customer needs and recommend perfect products, increasing average order value by 35% through intelligent upselling.'],
            ['name' => 'Business Intelligence Agent', 'type' => 'data_analysis', 'description' => 'Transform raw data into actionable insights, generate executive reports automatically, and predict trends with 85% accuracy.'],
            ['name' => 'Financial Analysis Bot', 'type' => 'data_analysis', 'description' => 'Monitor cash flow, detect anomalies in real-time, and provide CFOs with instant financial health snapshots.'],
            ['name' => 'Customer Analytics AI', 'type' => 'data_analysis', 'description' => 'Segment customers by behavior, predict churn risk, and identify expansion opportunities worth millions in revenue.'],
            ['name' => 'Workflow Automation Engine', 'type' => 'automation', 'description' => 'Automate repetitive tasks across 50+ tools, eliminate manual data entry, and save 20+ hours per employee weekly.'],
            ['name' => 'Document Processing Agent', 'type' => 'automation', 'description' => 'Extract data from invoices, contracts, and forms with 99% accuracy, processing 1000+ documents per hour.'],
            ['name' => 'Email Management Assistant', 'type' => 'automation', 'description' => 'Prioritize inbox automatically, draft intelligent replies, and reduce email time by 60% for busy executives.'],
            ['name' => 'Market Research Agent', 'type' => 'research', 'description' => 'Monitor competitors, track industry trends, and deliver weekly intelligence reports that drive strategic decisions.'],
            ['name' => 'Content Research Assistant', 'type' => 'research', 'description' => 'Research topics deeply, fact-check information instantly, and compile comprehensive briefs for content creators.'],
            ['name' => 'Legal Research Bot', 'type' => 'research', 'description' => 'Search through millions of legal documents, find relevant precedents, and reduce legal research time by 80%.'],
        ];

        static $usedIndices = [];
        $availableIndices = array_diff(array_keys($agentProfiles), $usedIndices);

        if (empty($availableIndices)) {
            $usedIndices = [];
            $availableIndices = array_keys($agentProfiles);
        }

        $index = fake()->randomElement($availableIndices);
        $usedIndices[] = $index;
        $profile = $agentProfiles[$index];

        $platforms = ['openai_gpt', 'claude', 'custom_code', 'flowise', 'langchain', 'zapier'];
        $statuses = ['active', 'paused', 'archived'];

        $systemInstructions = [
            'customer_support' => 'You are an expert customer support agent. Solve problems quickly, show empathy, and maintain a friendly professional tone.',
            'research' => 'You are a research specialist. Provide thorough, well-sourced information and deliver insights that drive decisions.',
            'automation' => 'You are an automation expert. Help users eliminate repetitive work and focus on high-value activities.',
            'sales' => 'You are a sales professional. Qualify leads effectively, understand customer needs, and close deals with value-focused conversations.',
            'data_analysis' => 'You are a data analyst. Turn complex datasets into clear insights and actionable recommendations for business growth.',
        ];

        return [
            'name' => $profile['name'],
            'description' => $profile['description'],
            'type' => $profile['type'],
            'platform' => fake()->randomElement($platforms),
            'status' => fake()->randomElement($statuses),
            'model' => fake()->randomElement(['gpt-4o', 'gpt-4o-mini', 'gpt-4-turbo', 'gpt-3.5-turbo']),
            'temperature' => fake()->randomFloat(2, 0.5, 1.0),
            'max_tokens' => fake()->numberBetween(1000, 4000),
            'system_instructions' => $systemInstructions[$profile['type']],
            'knowledge_base_files' => null,
            'api_key' => 'ak_' . fake()->uuid(),
            'configuration' => [],
        ];
    }

    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    public function paused(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'paused',
        ]);
    }
}
