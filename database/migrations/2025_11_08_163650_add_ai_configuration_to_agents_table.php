<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->string('model')->default('gpt-4o-mini')->after('platform');
            $table->decimal('temperature', 3, 2)->default(0.7)->after('model');
            $table->integer('max_tokens')->default(2000)->after('temperature');
            $table->text('system_instructions')->nullable()->after('description');
            $table->json('knowledge_base_files')->nullable()->after('configuration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->dropColumn(['model', 'temperature', 'max_tokens', 'system_instructions', 'knowledge_base_files']);
        });
    }
};
