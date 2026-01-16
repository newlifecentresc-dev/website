<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'content',
        'controller',
        'type'
    ];

    public static function getPages()
    {
        return self::get();
    }

    public static function toggleStatus($id, $mode)
    {
        if ($mode == 'true') {
            self::where('id', $id)->update(['status' => 'active']);
            Menu::where('id', $id)->update(['status' => 'active']);
        } else {
            self::where('id', $id)->update(['status' => 'inactive']);
            Menu::where('id', $id)->update(['status' => 'inactive']);
        }
    }

    public static function viewPage($page_slug)
    {
        return self::where('slug', $page_slug)->first();
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function config()
    {
        return $this->hasMany(PageConfigs::class);
    }
}
