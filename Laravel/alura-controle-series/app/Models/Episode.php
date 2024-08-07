<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ['number'];

    public $timestamps = false;

    protected $casts = [
        'watched' => 'boolean',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    // public function scopeWatched(Builder $query)
    // {
    //     $query->where('watched', true);
    // }

    // public function watched(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($watched) => (bool) $watched,
    //     );
    // }
}
