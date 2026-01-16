<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\File;

class Settings extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'site_icon',
        'site_logo',
        'site_title',
        'meta_description',
        'meta_keywords',
        'about_us',
        'site_email',
        'site_address',
        'site_phone_number',
        'site_alternative_phone_number',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'youtube_link',
    ];
}
