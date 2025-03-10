<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TechnicalSkill extends Model
{
    use HasFactory;
    protected $fillable=['slug','name','status'];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($skill) {
            $skill->slug = self::generateUniqueSlug();
        });
    }

    private static function generateUniqueSlug()
    {
        do {
            $slug = Str::random(8); // Generate an 8-character random string
        } while (self::where('slug', $slug)->exists()); // Ensure uniqueness

        return $slug;
    }
}
