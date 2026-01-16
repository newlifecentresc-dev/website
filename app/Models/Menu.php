<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'sort_order',
        'status',
    ];

    public function parent()
    {
        return $this->hasOne(Menu::class, 'id', 'parent_id')
            ->orderBy('sort_order');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id')
            ->where('status', '=', 'active')
            ->orderBy('sort_order');
    }

    public static function tree()
    {
        // dd(static::with(implode('.', array_fill(0, 100, 'children'))));
        // return static::with(implode('.', array_fill(0, 100, 'children')))
        //     ->where('parent_id', '=', '0')
        //     ->orderBy('sort_order')->get();
        return static::with('children')
                ->where('parent_id', '=', '0')
                ->orderBy('sort_order')->get();
    }

    public static function toggleStatus($id, $mode)
    {
        if ($mode == 'true') {
            self::where('id', $id)->update(['status' => 'active']);
        } else {
            self::where('id', $id)->update(['status' => 'inactive']);
        }
    }
}
