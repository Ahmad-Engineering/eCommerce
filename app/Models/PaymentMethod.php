<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    public function contracts () {
        return $this->belongsToMany(Contract::class);
    }

    public function admins () {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
