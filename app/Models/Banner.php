<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Banner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'banner_status',
        'banner_condition',
    ];

    public static function getBanners()
    {
        return self::latest()->get();
    }

    public static function getActiveBanners()
    {
        return self::where('banner_status', 'active')->get();
    }

    public static function getBannerWithBanners()
    {
        return self::where(['banner_status' => 'active', 'banner_condition' => 'banner'])
            ->latest()
            ->get();
    }

    public static function getBannerWithPromo()
    {
        return self::where(['banner_status' => 'active', 'banner_condition' => 'promo'])
            ->latest()
            ->first();
    }

    public static function toggleStatus($id, $mode)
    {
        if ($mode == 'true') {
            self::where('id', $id)->update(['banner_status' => 'active']);
        } else {
            self::where('id', $id)->update(['banner_status' => 'inactive']);
        }
    }
}
