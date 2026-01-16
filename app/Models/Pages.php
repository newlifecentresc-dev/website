<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;


    public function pageInformation()
    {
        return $this->hasMany(PageConfigs::class, 'page_id');
    }
}
