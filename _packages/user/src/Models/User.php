<?php

namespace Moox\User\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';

    protected $fillable = [
        'name',
        'started_at',
        'finished_at',
        'failed',
    ];

    protected $casts = [
        'failed' => 'bool',
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];
}
