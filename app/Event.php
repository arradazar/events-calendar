<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'from', 'to', 'day'];
    public $timestamps = false;
}
