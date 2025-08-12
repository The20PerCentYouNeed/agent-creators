<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('creator_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('display_name')->nullable();
            $table->string('headline')->nullable();
            $table->text('bio')->nullable();
            $table->decimal('hourly_rate', 10, 2)->nullable();
            $table->decimal('min_project_budget', 10, 2)->nullable();
            $table->string('location_country', 2)->nullable();
            $table->string('location_city')->nullable();
            $table->string('timezone')->nullable();
            $table->enum('availability', [
                'available',
                'limited',
                'unavailable',
            ])->default('available');
            $table->unsignedTinyInteger('experience_years')->nullable();
            $table->string('website_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->enum('verification_status', [
                'unverified',
                'pending',
                'verified',
                'rejected',
            ])->default('unverified');
            $table->decimal('rating_avg', 3, 2)->default(0.00);
            $table->unsignedInteger('rating_count')->default(0);
            $table->unsignedInteger('completed_projects')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique('user_id');
            $table->index(['rating_avg', 'is_featured']);
            $table->index('published_at');
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('creator_profile_skill', function (Blueprint $table) {
            $table->foreignId('creator_profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('skill_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('proficiency')->nullable(); // 1-5
            $table->primary(['creator_profile_id', 'skill_id']);
        });

        Schema::create('creator_profile_tool', function (Blueprint $table) {
            $table->foreignId('creator_profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tool_id')->constrained()->cascadeOnDelete();
            $table->primary(['creator_profile_id', 'tool_id']);
        });

        Schema::create('creator_profile_platform', function (Blueprint $table) {
            $table->foreignId('creator_profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('platform_id')->constrained()->cascadeOnDelete();
            $table->primary(['creator_profile_id', 'platform_id']);
        });

        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_profile_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('media_type', ['image', 'video', 'link', 'file'])->default('image');
            $table->string('media_url')->nullable();
            $table->string('thumb_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->json('tech_tags')->nullable();
            $table->boolean('is_public')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['creator_profile_id', 'is_public', 'sort_order']);
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->unsignedInteger('depth')->nullable();
            $table->timestamps();
        });

        Schema::create('creator_profile_category', function (Blueprint $table) {
            $table->foreignId('creator_profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->primary(['creator_profile_id', 'category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('creator_profile_category');
        Schema::dropIfExists('project_categories');
        Schema::dropIfExists('portfolio_items');
        Schema::dropIfExists('creator_profile_platform');
        Schema::dropIfExists('creator_profile_tool');
        Schema::dropIfExists('creator_profile_skill');
        Schema::dropIfExists('platforms');
        Schema::dropIfExists('tools');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('creator_profiles');
    }
};
