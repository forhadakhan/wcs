<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequestSubTypes extends Model
{
    use HasFactory;

    protected $table = 'service_request_sub_types_tbl';

    public function requests(){
        return $this->hasMany(ServiceRequests::class);
    }
}
