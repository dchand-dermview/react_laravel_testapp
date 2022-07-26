<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
//    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;

    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'created_at',
        'updated_at',
    ];
}
