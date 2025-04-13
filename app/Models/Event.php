<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates=['date'];

    protected $casts =['items' => 'array'];

    protected $guarded =[];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    protected $fillable = [
        'nome', 'data', 'hora', 
    ];
    
}
