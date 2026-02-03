<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('short_urls', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('original_url');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->index('company_id');
            $table->index('created_by');
            $table->index(['company_id', 'created_by']);

            $table->foreign('company_id', 'fk_short_urls_company')
                ->references('id')
                ->on('companies')
                ->cascadeOnDelete();

            $table->foreign('created_by', 'fk_short_urls_creator')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('short_urls');
    }
};
