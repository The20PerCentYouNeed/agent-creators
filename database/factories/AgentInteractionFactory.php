<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AgentInteraction>
 */
class AgentInteractionFactory extends Factory
{
    /**
     * Realistic Q&A pairs grouped by intent.
     *
     * @var array<string, array<int, array{question: string, response: string}>>
     */
    private array $qaByIntent = [
        'product_inquiry' => [
            [
                'question' => 'What are your pricing plans?',
                'response' => 'We offer three pricing tiers: Starter at $49/month for up to 1,000 conversations, Professional at $149/month for up to 10,000 conversations, and Enterprise with custom pricing for unlimited usage. All plans include 24/7 support and API access.',
            ],
            [
                'question' => 'Do you offer a free trial?',
                'response' => 'Yes! We offer a 14-day free trial with full access to all features. No credit card required to start. You can upgrade to a paid plan anytime during or after your trial.',
            ],
            [
                'question' => 'What features are included in the Professional plan?',
                'response' => 'The Professional plan includes: unlimited AI agents, advanced analytics dashboard, custom branding, priority support, API access, webhook integrations, and up to 10,000 conversations per month.',
            ],
            [
                'question' => 'Can I upgrade my plan later?',
                'response' => 'Absolutely! You can upgrade or downgrade your plan at any time from your account settings. Changes take effect immediately, and we\'ll prorate the difference.',
            ],
            [
                'question' => 'What payment methods do you accept?',
                'response' => 'We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers for annual plans. Enterprise customers can also pay via invoice.',
            ],
        ],
        'technical_support' => [
            [
                'question' => 'How do I reset my password?',
                'response' => 'To reset your password: 1) Click "Forgot Password" on the login page, 2) Enter your email address, 3) Check your inbox for the reset link, 4) Click the link and create a new password. The link expires in 24 hours.',
            ],
            [
                'question' => 'I\'m experiencing a technical issue with the dashboard.',
                'response' => 'I\'m sorry to hear that. Let\'s troubleshoot: First, try clearing your browser cache and cookies. If the issue persists, try using an incognito window or different browser. Can you describe what specific error or behavior you\'re seeing?',
            ],
            [
                'question' => 'How do I integrate the API with my website?',
                'response' => 'To integrate our API: 1) Get your API key from Settings > API Keys, 2) Install our SDK via npm or include our script tag, 3) Initialize with your API key, 4) Call the chat endpoint with user messages. Check our docs at docs.example.com for code examples.',
            ],
            [
                'question' => 'Why is my agent not responding?',
                'response' => 'Let me check a few things: 1) Verify your API key is active in Settings, 2) Check if you\'ve reached your monthly conversation limit, 3) Ensure the agent is set to "Active" status. If everything looks correct, there might be a temporary service issue - please try again in a few minutes.',
            ],
            [
                'question' => 'Can you help me understand this feature?',
                'response' => 'Of course! I\'d be happy to explain. Which specific feature would you like to know more about? I can walk you through how it works, best practices for using it, and show you some examples.',
            ],
        ],
        'billing_question' => [
            [
                'question' => 'How do I cancel my subscription?',
                'response' => 'To cancel your subscription: Go to Settings > Billing > Subscription, then click "Cancel Subscription". You\'ll retain access until the end of your current billing period. We\'d love to know why you\'re leaving - your feedback helps us improve.',
            ],
            [
                'question' => 'Can I get a refund?',
                'response' => 'We offer a 30-day money-back guarantee for new subscriptions. If you\'re within this period, please contact our billing team at billing@example.com with your account details, and we\'ll process your refund within 5-7 business days.',
            ],
            [
                'question' => 'Why was I charged twice?',
                'response' => 'I apologize for the confusion. This sometimes happens if a payment initially fails and then succeeds on retry. Let me look into your account. Could you provide the last 4 digits of the card that was charged? I\'ll investigate and arrange a refund if there was a duplicate charge.',
            ],
            [
                'question' => 'How do I update my payment method?',
                'response' => 'To update your payment method: Go to Settings > Billing > Payment Methods, click "Add Payment Method", enter your new card details, then set it as default. You can remove the old payment method once the new one is verified.',
            ],
            [
                'question' => 'When is my next billing date?',
                'response' => 'You can find your next billing date in Settings > Billing > Subscription. It shows your current plan, billing cycle, and the exact date of your next charge. Would you like me to help you find this information?',
            ],
        ],
        'general_info' => [
            [
                'question' => 'What does your company do?',
                'response' => 'We build custom AI agents for businesses. Our agents can handle customer support, sales inquiries, appointment booking, and more - available 24/7. We help companies automate conversations while maintaining a personal touch.',
            ],
            [
                'question' => 'How does the AI agent work?',
                'response' => 'Our AI agents use advanced natural language processing to understand and respond to customer queries. They\'re trained on your business data and can be customized to match your brand voice. They handle common questions instantly and escalate complex issues to humans when needed.',
            ],
            [
                'question' => 'Is my data secure?',
                'response' => 'Absolutely. We take security seriously. All data is encrypted at rest and in transit using AES-256 encryption. We\'re SOC 2 Type II certified, GDPR compliant, and never use your data to train our models. You maintain full ownership of your data.',
            ],
            [
                'question' => 'Do you support multiple languages?',
                'response' => 'Yes! Our AI agents support over 50 languages including English, Spanish, French, German, Portuguese, Chinese, Japanese, and Arabic. Agents can automatically detect the user\'s language and respond accordingly.',
            ],
            [
                'question' => 'How long does setup take?',
                'response' => 'Most customers are up and running within 24-48 hours. Basic setup takes about 30 minutes. For more complex integrations with custom training data, allow 1-2 weeks. Our team provides full onboarding support at no extra cost.',
            ],
        ],
        'complaint' => [
            [
                'question' => 'I\'m not happy with the service.',
                'response' => 'I\'m truly sorry to hear that. Your satisfaction is important to us. Could you tell me more about what\'s not meeting your expectations? I want to understand the issue fully so we can make it right.',
            ],
            [
                'question' => 'The agent gave me wrong information.',
                'response' => 'I sincerely apologize for the incorrect information. This shouldn\'t happen. Could you share what question you asked and what response you received? I\'ll flag this for our training team to correct and ensure it doesn\'t happen again.',
            ],
            [
                'question' => 'Your service has been unreliable lately.',
                'response' => 'I apologize for the reliability issues you\'ve experienced. We had some infrastructure challenges last week that have since been resolved. We\'ve added additional monitoring and redundancy to prevent future occurrences. Can I offer you a credit for the inconvenience?',
            ],
            [
                'question' => 'I\'ve been waiting too long for support.',
                'response' => 'I\'m sorry for the delay - that\'s not the experience we want you to have. Let me help you right now. What issue can I assist you with? I\'ll also flag your case for priority handling going forward.',
            ],
        ],
        'feature_request' => [
            [
                'question' => 'Can you add integration with Slack?',
                'response' => 'Great suggestion! Slack integration is actually on our roadmap for Q2. I\'ve added your vote to this feature request. Would you like me to notify you when it\'s available? In the meantime, you can use our webhook to push notifications to Slack.',
            ],
            [
                'question' => 'I need the ability to export chat logs.',
                'response' => 'Good news - chat log export is available! Go to Analytics > Conversations, select your date range, and click "Export". You can download as CSV or JSON. For automated exports, check out our API endpoint for conversation retrieval.',
            ],
            [
                'question' => 'Will you support voice calls in the future?',
                'response' => 'Voice support is something we\'re actively exploring! It\'s a highly requested feature. We\'re currently in beta testing with select customers. Would you like to join the waitlist for early access when it launches?',
            ],
            [
                'question' => 'Can I customize the chat widget colors?',
                'response' => 'Yes! You can fully customize the chat widget. Go to Settings > Widget > Appearance. You can change colors, fonts, position, welcome messages, and even add your logo. Changes preview in real-time before you publish.',
            ],
        ],
    ];

    public function definition(): array
    {
        $intent = fake()->randomElement(array_keys($this->qaByIntent));
        $qa = fake()->randomElement($this->qaByIntent[$intent]);

        $sentiments = ['positive', 'neutral', 'negative'];
        $sentimentWeights = [
            'product_inquiry' => ['positive' => 50, 'neutral' => 45, 'negative' => 5],
            'technical_support' => ['positive' => 30, 'neutral' => 50, 'negative' => 20],
            'billing_question' => ['positive' => 25, 'neutral' => 50, 'negative' => 25],
            'general_info' => ['positive' => 60, 'neutral' => 38, 'negative' => 2],
            'complaint' => ['positive' => 5, 'neutral' => 25, 'negative' => 70],
            'feature_request' => ['positive' => 55, 'neutral' => 40, 'negative' => 5],
        ];

        $weights = $sentimentWeights[$intent];
        $sentiment = $this->weightedRandom($sentiments, array_values($weights));

        $tokensInput = fake()->numberBetween(50, 200);
        $tokensOutput = fake()->numberBetween(150, 500);
        $tokensTotal = $tokensInput + $tokensOutput;

        return [
            'agent_id' => \App\Models\Agent::factory(),
            'session_id' => fake()->uuid(),
            'user_identifier' => fake()->optional(0.7)->email() ?? 'anonymous_'.fake()->uuid(),
            'user_input' => $qa['question'],
            'agent_response' => $qa['response'],
            'intent' => $intent,
            'sentiment' => $sentiment,
            'tokens_input' => $tokensInput,
            'tokens_output' => $tokensOutput,
            'tokens_total' => $tokensTotal,
            'response_time_ms' => fake()->numberBetween(300, 2500),
            'cost' => round(($tokensTotal / 1000) * 0.002, 6),
            'status' => 'success',
            'error_message' => null,
            'confidence_score' => fake()->randomFloat(2, 85, 99),
            'user_satisfaction' => fake()->optional(0.4)->numberBetween(3, 5),
            'escalated_to_human' => fake()->boolean(5),
            'metadata' => [
                'ip_address' => fake()->ipv4(),
                'user_agent' => fake()->userAgent(),
            ],
        ];
    }

    public function successful(): static
    {
        return $this->state(function (array $attributes) {
            $intent = $attributes['intent'] ?? fake()->randomElement(array_keys($this->qaByIntent));
            $qa = fake()->randomElement($this->qaByIntent[$intent] ?? $this->qaByIntent['general_info']);

            return [
                'status' => 'success',
                'user_input' => $qa['question'],
                'agent_response' => $qa['response'],
                'error_message' => null,
                'confidence_score' => fake()->randomFloat(2, 85, 99),
            ];
        });
    }

    public function failed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'error',
            'agent_response' => null,
            'error_message' => fake()->randomElement([
                'Rate limit exceeded for OpenAI API',
                'Connection timeout while processing request',
                'Maximum context length exceeded',
                'Model server unavailable',
                'Failed to parse response',
                'Internal server error',
            ]),
            'tokens_output' => 0,
            'confidence_score' => null,
        ]);
    }

    public function withIntent(string $intent): static
    {
        return $this->state(function (array $attributes) use ($intent) {
            $qa = fake()->randomElement($this->qaByIntent[$intent] ?? $this->qaByIntent['general_info']);

            return [
                'intent' => $intent,
                'user_input' => $qa['question'],
                'agent_response' => $qa['response'],
            ];
        });
    }

    private function weightedRandom(array $items, array $weights): string
    {
        $totalWeight = array_sum($weights);
        $random = fake()->numberBetween(1, $totalWeight);

        $currentWeight = 0;
        foreach ($items as $index => $item) {
            $currentWeight += $weights[$index];
            if ($random <= $currentWeight) {
                return $item;
            }
        }

        return $items[0];
    }
}
