<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function admin () {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function client () {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    
    public function contract() {
        return $this->hasOne(Contract::class, 'contract_id', 'id');
    }
}
