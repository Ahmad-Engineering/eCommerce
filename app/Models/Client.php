<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function clientSocial () {
        return $this->hasOne(ClientSocial::class, 'client_id', 'id');
    }

    public function admins () {
        return $this->belongsToMany(Admin::class);
    }

    public function contracts () {
        return $this->hasMany(Contract::class, 'client_id', 'id');
    }
}
