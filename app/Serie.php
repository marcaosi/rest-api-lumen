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
        'name', 'resume', 'genre_id', 'user_id'
    ];
    protected $appends = [
        "links"
    ];
    
    public $timestamp = false;

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function getLinksAttribute() : Array{
        return [
            "episodes" => "/serie/{$this->id}/episodes",
            "self" => "/serie/{$this->id}"
        ];
    }
}
