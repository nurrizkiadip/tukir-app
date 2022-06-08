<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $table = 'menus';

    public $fillable = [
        'name',
        'price',
        'description',
        'is_special',
        'category_id',
        'photo_path',
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}
