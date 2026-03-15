<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Slug unik untuk URL publik: weddstu.com/adi-violin
            $table->string('slug')->unique();

            // Template yang dipilih dari katalog
            $table->unsignedTinyInteger('template_id')->default(1);

            // Data pasangan
            $table->string('bride_name');
            $table->string('groom_name');

            // Data acara
            $table->date('event_date')->nullable();
            $table->time('event_time')->nullable();
            $table->string('venue')->nullable();
            $table->string('city')->nullable();

            // Kustomisasi tema
            $table->string('theme_color', 7)->default('#8b5cf6');
            $table->string('font')->default('Playfair Display');

            // Galeri (simpan sebagai JSON array path)
            $table->json('gallery')->nullable();

            // Status publikasi
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
