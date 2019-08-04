<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'season', 'description', 'serie_id', 'number'
    ];

    protected $appends = [
        'links'
    ];
    
    public $timestamp = true;

    public function serie(){
        return $this->belongsTo(Serie::class);
    }

    public function getLinksAttribute() : Array{
        return [
            "serie" => '/series/' . $this->id,
            "self" => '/episodes/' . $this->id
        ];
    }
}