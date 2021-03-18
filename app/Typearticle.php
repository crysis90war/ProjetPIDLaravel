<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typearticle extends Model
{
    protected $guarded = [];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function addArticle($article)
    {
        $this->articles()->create($article);
    }
}
