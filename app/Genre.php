<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    protected $appends = [
        "links"
    ];
    
    public $timestamp = false;

    public function series(){
        return $this->hasMany(Serie::class);
    }

    public function getLinksAttribute(){
        return [
            "self" => "/genres/{$this->id}",
            "series" => "/genres/{$this->id}/series"
        ];
    }
}
