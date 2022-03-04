<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function contractTypes()
    {
        return $this->hasMany(ContractType::class, 'admin_id', 'id');
    }

    public function contracts () {
        return $this->hasMany(Contract::class, 'admin_id', 'id');
    }

    public function paymentMethods () {
        return $this->hasMany(PaymentMethod::class, 'admin_id', 'id');
    }
}
