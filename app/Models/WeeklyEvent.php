<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'title',
        'time',
        'status'
    ];

    public static function getWeeklyEvent(){
        return self::all();
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
