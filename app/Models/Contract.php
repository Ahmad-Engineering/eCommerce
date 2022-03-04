<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public function contractType () {
        return $this->belongsTo(ContractType::class, 'contract_type_id', 'id');
    }

    public function client () {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function admin () {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
