<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequestTypes extends Model
{
    use HasFactory;

    protected $table = 'service_request_types_tbl';

    public function requests(){
        return $this->hasMany(ServiceRequests::class);
    }
}

