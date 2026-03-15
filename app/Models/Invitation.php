<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invitation extends Model
{
    protected $fillable = [
        'user_id',
        'slug',
        'template_id',
        'bride_name',
        'groom_name',
        'event_date',
        'event_time',
        'venue',
        'city',
        'theme_color',
        'font',
        'gallery',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'gallery'      => 'array',
        'event_date'   => 'date',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate slug dari nama pasangan, pastikan unik.
     * Contoh: "Adi & Violin" → "adi-violin", "adi-violin-2" jika sudah ada
     */
    public static function generateSlug(string $bride, string $groom, ?int $excludeId = null): string
    {
        $base = Str::slug($bride . '-' . $groom);
        $slug = $base;
        $i    = 2;

        while (
            static::where('slug', $slug)
                ->when($excludeId, fn($q) => $q->where('id', '!=', $excludeId))
                ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }
}
