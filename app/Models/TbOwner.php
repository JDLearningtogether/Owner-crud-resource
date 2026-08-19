<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbOwner extends Model
{
    //
    protected $table = 'tb_owners';

    protected $fillable = [
        'owner_code',
        'owner_name',
        'phone',
        'email',
        'address',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
