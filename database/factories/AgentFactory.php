<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['customer_support', 'research', 'automation', 'sales', 'data_analysis'];
        $platforms = ['openai_gpt', 'claude', 'custom_code', 'flowise', 'langchain', 'zapier'];
        $statuses = ['active', 'paused', 'archived'];

        $type = fake()->randomElement($types);
        $agentNames = [
            'customer_support' => ['Support Assistant', 'Help Desk Bot', 'Customer Care AI'],
            'research' => ['Research Assistant', 'Data Analyst Bot', 'Market Research AI'],
            'automation' => ['Workflow Automator', 'Task Manager Bot', 'Process Assistant'],
            'sales' => ['Sales Assistant', 'Lead Qualifier Bot', 'Revenue AI'],
            'data_analysis' => ['Analytics Bot', 'Data Insights AI', 'BI Assistant'],
        ];

        $systemInstructions = [
            'customer_support' => 'You are a friendly customer support assistant. Help users with their questions professionally and empathetically.',
            'research' => 'You are a research assistant. Provide accurate, well-researched information with citations when possible.',
            'automation' => 'You are an automation assistant. Help users streamline their workflows and automate repetitive tasks.',
            'sales' => 'You are a sales assistant. Help qualify leads and provide product information professionally.',
            'data_analysis' => 'You are a data analysis assistant. Help users understand their data and provide insights.',
        ];

        return [
            'name' => fake()->randomElement($agentNames[$type]),
            'description' => fake()->sentence(15),
            'type' => $type,
            'platform' => fake()->randomElement($platforms),
            'status' => fake()->randomElement($statuses),
            'model' => fake()->randomElement(['gpt-4o', 'gpt-4o-mini', 'gpt-4-turbo', 'gpt-3.5-turbo']),
            'temperature' => fake()->randomFloat(2, 0.5, 1.0),
            'max_tokens' => fake()->numberBetween(1000, 4000),
            'system_instructions' => $systemInstructions[$type],
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
