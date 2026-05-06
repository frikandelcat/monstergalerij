<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name', 'color', 'is_custom', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function monsters()
    {
        return $this->belongsToMany(Monster::class);
    }

    public function moves()
    {
        return $this->hasMany(Move::class);
    }
}
