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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();

            $table->string('email')->index();

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('invited_by');

            $table->timestamps();

            $table->foreign('company_id', 'fk_invitations_company')
                ->references('id')->on('companies')
                ->cascadeOnDelete();

            $table->foreign('role_id', 'fk_invitations_role')
                ->references('id')->on('roles')
                ->cascadeOnDelete();

            $table->foreign('invited_by', 'fk_invitations_invited_by')
                ->references('id')->on('users')
                ->cascadeOnDelete();

            $table->unique(['email', 'company_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
