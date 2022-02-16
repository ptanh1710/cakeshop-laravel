<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    public $timestamps = false;
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';

    protected $fillable = [
        'admin_name', 'admin_gmail', 'admin_password', 'admin_phone', 'role_id',
    ];

    public function getAuthPassword()
    {
        return $this->admin_password;
    }
}
