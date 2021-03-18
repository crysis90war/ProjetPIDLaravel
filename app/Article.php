<?php

namespace App;


use App\Typearticle;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];

    public function ref_typeArticle()
    {
    	return $this->belongsTo(Typearticle::class);
    }
}
