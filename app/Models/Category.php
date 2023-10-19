<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($data) {
            $existingCategory = Category::where('name', $data->name)->first();

            if ($existingCategory) {
                return false;
            }
        });
    }
}
