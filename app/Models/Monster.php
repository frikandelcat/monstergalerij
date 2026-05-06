<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    protected $fillable = [
        'image',
        'name',
        'description',
        'user_id',
    ];

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function moves()
    {
        return $this->belongsToMany(Move::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
