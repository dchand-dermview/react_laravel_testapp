<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
//    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;

    // makes the default created_at & updated_at columns not be expected
    public $timestamps = false;

    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
    ];
}
