<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'small_img',
        'large_img',
        'display',
        'date_start',
        'date',
        'date_end',
        'venue',
    ];

    public static function scopeStatus($query, $display)
    {
        $query->where('display', (int) $display)->get();
    }

    public static function scopeSpecial($query, $display)
    {
        $query->where('display', (int) $display)->where('special', (int) $display)->get();
    }
}