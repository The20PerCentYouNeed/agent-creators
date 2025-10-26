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
                'title' => ['en' => 'AI-Powered Website Builder', 'el' => 'AI-Powered Website Builder'],
                'category' => 'Web Development',
                'logo_url' => null,
                'image_url' => null,
                'description' => ['en' => 'We built this entire marketplace platform using AI agents, showcasing the power of automated development.', 'el' => 'We built this entire marketplace platform using AI agents, showcasing the power of automated development.'],
                'full_description' => ['en' => 'This platform was completely built using AI agents for code generation, testing, and deployment. We demonstrate the practical application of AI in modern web development, creating a fully functional marketplace with advanced features.', 'el' => 'This platform was completely built using AI agents for code generation, testing, and deployment. We demonstrate the practical application of AI in modern web development, creating a fully functional marketplace with advanced features.'],
                'solution' => null,
                'order' => 1,
            ],
            [
                'title' => ['en' => 'Multi-Channel AI Assistant Implementation', 'el' => 'Εφαρμογή AI Βοηθού Πολλαπλών Καναλιών'],
                'category' => 'AI Integration',
                'logo_url' => null,
                'image_url' => null,
                'description' => [
                    'en' => 'A comprehensive AI assistant solution proposal that demonstrates our approach to integrating multiple communication channels including website, email, and messaging platforms.',
                    'el' => 'Μια ολοκληρωμένη πρόταση λύσης AI βοηθού που δείχνει την προσέγγισή μας στην ενοποίηση πολλαπλών καναλιών επικοινωνίας συμπεριλαμβανομένων ιστοσελίδας, email και πλατφορμών messaging.',
                ],
                'full_description' => [
                    'en' => 'This case study showcases the solution we proposed for a client seeking a unified AI assistant across multiple channels. Our approach integrates a website chatbot, email automation system, and messaging bot, all coordinated through a central AI agent powered by ChatGPT. This demonstrates how we would deliver automation capabilities, personalized interactions, and seamless multi-channel communication with an estimated implementation timeline of 2 weeks.',
                    'el' => 'Αυτή η μελέτη περίπτωσης παρουσιάζει τη λύση που προτείναμε σε έναν πελάτη που αναζητούσε έναν ενοποιημένο AI βοηθό σε πολλαπλά κανάλια. Η προσέγγισή μας ενσωματώνει ένα chatbot ιστοσελίδας, σύστημα αυτοματισμού email και bot messaging, όλα συντονισμένα μέσω ενός κεντρικού AI agent που τροφοδοτείται από το ChatGPT. Αυτό δείχνει πώς θα παρέχουμε δυνατότητες αυτοματισμού, εξατομικευμένες αλληλεπιδράσεις και απρόσκοπτη επικοινωνία πολλαπλών καναλιών με εκτιμώμενη χρονοδιάγραμμα υλοποίησης 2 εβδομάδων.',
                ],
                'solution' => [
                    'en' => <<<'EN_SOLUTION'
**How We Would Implement This Solution:**

**1. Chatbot on Website (PrestaShop Integration)**

Our approach would involve integrating a fully customized chatbot into the existing e-shop platform, tailored to the specific business needs. The chatbot would provide:

• **Product Information / Availability** - Instant information about products and availability checks
• **Order Updates** - Real-time updates on customer orders
• **Customer Support** - Handle customer inquiries, order changes, and general questions
• **Email Delivery** - Send offers or prices via email when requested by customers through the chat interface

**2. AI Email Assistance (BREVO Integration)**

We would integrate automation functionalities into the existing BREVO email marketing environment:

• **Environment Integration** - Seamless integration of automation features into the BREVO platform
• **Automated Campaigns** - Automated sending of newsletters or coupons (e.g., birthday promotions)
• **AI Agent Management** - Central AI Agent manages promotional activities via email for intelligent campaign execution

**3. AI Bot on Viber**

We would create and train a bot with the capability for automatic communication with customers via Viber:

• **Bot Creation & Training** - Development of a specialized bot for customer interactions
• **Multi-Channel Integration** - Integration with other communication channels for unified service
• **Central Coordination** - Connection to the unified AI Agent system

**4. Central AI Agent Integration (via ChatGPT)**

All functionalities would be coordinated and managed through a unified AI Agent that functions as the "brain" and connects all channels:

• **Centralized Intelligence** - Single AI Agent coordinates all communication channels
• **Unified Management** - Seamless coordination between website, email, and messaging platforms
• **Continuous Learning** - System continuously improves through testing and customer interactions

**Estimated Project Timeline:**

• **Start:** Upon confirmation of cooperation and provision of necessary data
• **Duration:** Up to 2 weeks
• **Deliverables:** Website chatbot, email automations, Viber bot, and connection to common AI Agent with comprehensive testing and corrections
• **Coordination:** Throughout implementation, immediate response for clarifications, real-world testing, and iterative checks for optimization
EN_SOLUTION,
                    'el' => <<<'EL_SOLUTION'
**Πώς Θα Υλοποιήσουμε Αυτή τη Λύση:**

**1. Chatbot σε Ιστοσελίδα (Ενοποίηση PrestaShop)**

Η προσέγγισή μας θα περιλαμβάνει την ενσωμάτωση ενός πλήρως προσαρμοσμένου chatbot στην υπάρχουσα πλατφόρμα e-shop, προσαρμοσμένο στις συγκεκριμένες επιχειρηματικές ανάγκες. Το chatbot θα παρέχει:

• **Πληροφορίες / Διαθεσιμότητα Προϊόντων** - Άμεσες πληροφορίες για προϊόντα και έλεγχος διαθεσιμότητας
• **Ενημερώσεις Παραγγελιών** - Ενημερώσεις σε πραγματικό χρόνο για παραγγελίες πελατών
• **Υποστήριξη Πελατών** - Διαχείριση ερωτημάτων πελατών, αλλαγές παραγγελιών και γενικές ερωτήσεις
• **Παράδοση Email** - Αποστολή προσφορών ή τιμών μέσω email όταν ζητηθεί από πελάτες μέσω της διεπαφής chat

**2. AI Υποβοήθηση Email (Ενοποίηση BREVO)**

Θα ενσωματώσουμε λειτουργίες αυτοματισμού στο υπάρχον περιβάλλον email marketing του BREVO:

• **Ενσωμάτωση Περιβάλλοντος** - Απρόσκοπτη ενσωμάτωση λειτουργιών αυτοματισμού στην πλατφόρμα BREVO
• **Αυτοματοποιημένες Καμπάνιες** - Αυτοματοποιημένη αποστολή newsletter ή κουπονιών (π.χ. promotions γενεθλίων)
• **Διαχείριση AI Agent** - Κεντρικός AI Agent διαχειρίζεται προωθητικές δραστηριότητες μέσω email για έξυπνη εκτέλεση καμπανιών

**3. AI Bot σε Viber**

Θα δημιουργήσουμε και εκπαιδεύσουμε ένα bot με δυνατότητα αυτόματης επικοινωνίας με πελάτες μέσω Viber:

• **Δημιουργία & Εκπαίδευση Bot** - Ανάπτυξη εξειδικευμένου bot για αλληλεπιδράσεις πελατών
• **Ενοποίηση Πολλαπλών Καναλιών** - Ενοποίηση με άλλα κανάλια επικοινωνίας για ενιαία εξυπηρέτηση
• **Κεντρικός Συντονισμός** - Σύνδεση με το ενοποιημένο σύστημα AI Agent

**4. Ενοποίηση Κεντρικού AI Agent (μέσω ChatGPT)**

Όλες οι λειτουργίες θα συντονίζονται και διαχειρίζονται μέσω ενός ενοποιημένου AI Agent που λειτουργεί ως ο "εγκέφαλος" και συνδέει όλα τα κανάλια:

• **Κεντρική Νοημοσύνη** - Ένας AI Agent συντονίζει όλα τα κανάλια επικοινωνίας
• **Ενοποιημένη Διαχείριση** - Απρόσκοπτος συντονισμός μεταξύ ιστοσελίδας, email και πλατφορμών messaging
• **Συνεχής Μάθηση** - Το σύστημα βελτιώνεται συνεχώς μέσω δοκιμών και αλληλεπιδράσεων με πελάτες

**Εκτιμώμενο Χρονοδιάγραμμα Έργου:**

• **Έναρξη:** Μετά την επιβεβαίωση συνεργασίας και παροχή των απαραίτητων δεδομένων
• **Διάρκεια:** Έως 2 εβδομάδες
• **Παραδοτέα:** Chatbot ιστοσελίδας, αυτοματισμοί email, bot Viber και σύνδεση σε κοινό AI Agent με ολοκληρωμένες δοκιμές και διορθώσεις
• **Συντονισμός:** Καθ' όλη την υλοποίηση, άμεση απόκριση για διευκρινίσεις, δοκιμές σε πραγματικές συνθήκες και επαναλαμβανόμενοι έλεγχοι για βελτιστοποίηση
EL_SOLUTION,
                ],
                'order' => 2,
            ],
            [
                'title' => ['en' => 'Business Idea Brainstorming GPT', 'el' => 'Business Idea Brainstorming GPT'],
                'category' => 'AI Tools',
                'logo_url' => null,
                'image_url' => null,
                'description' => ['en' => 'A specialized GPT designed to help entrepreneurs generate and refine innovative business ideas.', 'el' => 'A specialized GPT designed to help entrepreneurs generate and refine innovative business ideas.'],
                'full_description' => ['en' => 'This custom GPT leverages advanced AI to help entrepreneurs brainstorm, validate, and refine business ideas. It provides structured frameworks, market insights, and creative suggestions to transform concepts into viable business plans.', 'el' => 'This custom GPT leverages advanced AI to help entrepreneurs brainstorm, validate, and refine business ideas. It provides structured frameworks, market insights, and creative suggestions to transform concepts into viable business plans.'],
                'solution' => null,
                'order' => 3,
            ],
        ];

        foreach ($caseStudies as $caseStudy) {
            CaseStudy::create($caseStudy);
        }
    }
}
