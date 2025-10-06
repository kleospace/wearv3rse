<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('articles', function (Blueprint $t) {
            $t->id();
            $t->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $t->boolean('is_public')->default(true);
            $t->string('title');
            $t->text('content')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('articles'); }
};
