<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image_path',
        'content',
        'user_id',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' é a chave estrangeira na tabela 'produtos'
    }
}
