<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campo extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='campos';

    protected $fillable =[
        'nombre','ref_tipoDeSuelo','ref_idUsuario'
    ];
    //estamos asociando el id del usuario que crea el proyecto al
    // campo al momento de crearlo
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($table){
            if(!app()->runningInConsole()){
                $table->ref_idUsuario=auth()->id();
            }
        });
    }

    
    public function textura(){
        return $this->hasOne(TexturaDelSuelo::class,'id');
    }

    public function usuario(){
        return $this->belongsTo(User::class,'user_id');
    }



    public function scopeFilter(Builder $query, array $filters) {
        if ( ! request("page")) {
            session()->put("search", $filters['search'] ?? null);
            session()->put("trashed", $filters['trashed'] ?? null);
        }
        $query->when(session("search"), function ($query, $search) {
            $query->where('nombre', 'LIKE', '%'.$search.'%');
        })->when(session("trashed"), function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }



}
