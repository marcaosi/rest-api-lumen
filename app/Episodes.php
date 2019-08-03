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
    
    public $timestamp = true;

    public function genre(){
        return $this->belongsTo(Serie::class);
    }
}