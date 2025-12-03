<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uuser extends Model
{
    protected $fillable=[
        'name',
        'password',
        'email',
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
