<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequests extends Model
{
    use HasFactory;

    protected $table = 'service_requests_tbl';

    protected $fillable = [
        'member_id_sr',
        'category_sr',
        'sub_category_sr',
        'title_sr',
        'body_sr',
        'amount_sr',
        'bofore_date_sr'
      ];


    public function requestingMember(){
        return $this->belongsTo(Member::class);
    }
    public function type(){
        return $this->belongsTo(ServiceRequestTypes::class);
    }
    public function subType(){
        return $this->belongsTo(ServiceRequestSubTypes::class);
    }
}
