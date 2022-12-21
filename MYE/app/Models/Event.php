<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function ingresso(){
        $this->hasOne('App\Models\Ingresso');
    }
    public function localidade(){
        $this->belongsTo('App\Models\Localidade');
    }
}
