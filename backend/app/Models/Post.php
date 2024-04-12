<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes ;

    protected $fillable = [
        'name', 'surface' ,'nbr_piece', 'prix' , 'description',
        'departement', 'ville' ,'quartier', 
        'categorie_id' ,'type_id','user_id' ,
    ];

    public function users(){
        return $this->belongsToMany(User::class) ;
    }

    public function user(){
        return $this->belongsTo(User::class) ;
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class) ;
    }

    public function type(){
        return $this->belongsTo(Type::class) ;
    }

    public function images(){
        return $this->hasMany(Image::class) ;
    }
}
