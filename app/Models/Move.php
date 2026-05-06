<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    protected $fillable = [
        'name',
        'description',
        'power',
        'accuracy',
        'move_class',
        'pp',
        'type_id',
        'is_custom',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function monsters()
    {
        return $this->belongsToMany(Monster::class);
    }
}
