<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'resume',
    ];

    
    public $timestamp = false;

    public function serie(){
        return $this->belongsTo(Serie::class);
    }
}
