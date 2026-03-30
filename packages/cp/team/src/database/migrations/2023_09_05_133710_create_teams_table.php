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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('mobile1');
            $table->string('mobile2')->nullable();
            $table->string('email');
            $table->string('gender');
            $table->string('profession');
            $table->string('profile_pic');
            $table->string('cover_pic')->nullable();
            $table->text('short_bio')->nullable();
            $table->text('details')->nullable();
            $table->text('joining_date');
            $table->text('leave_date')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('contact_hide')->default(1);
            $table->integer('drag_id')->default(0);
            $table->unsignedBigInteger('addedby_id')->nullable();
            $table->unsignedBigInteger('editedby_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
