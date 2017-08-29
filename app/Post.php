<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['titulo', 'conteudo', 'categoria_id', 'featured', 'slug'];
    protected $dates = ['deleted_at'];

    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

    public function categoria(){
      return $this->belongsTo('App\Categoria');
    }

    public function tags(){
      return $this->belongsToMany('App\Tag');
    }
}
