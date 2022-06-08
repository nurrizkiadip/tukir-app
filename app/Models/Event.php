<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $table = 'events';

    protected $guarded = ['id'];

    public function event() 
    {
        return $this->belongsTo(Event::class);
    }
}
