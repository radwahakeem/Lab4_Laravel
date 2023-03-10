<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title','description','user_id'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function sluggable():array
    {
        return [
            'slug' => [
                 'source'             => 'title',
                 'unique'             => true,
                 'onUpdate'           => true,
                 'includeTrashed'     => false,
            ]
        ];
    }
    
}