<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class OutgoingCallLog extends Model
{
    protected $fillable=['call_to','call_by','applicant_id','enquiry_id','phone','date','time','length','purpose','remarks'];

    public function Applicant_Outgoing()
    {
        return $this->belongsTo('App\Admin\Applicant', 'applicant_id');
    }

    public function Enquiry_Outgoing()
    {
        return $this->belongsTo('App\Admin\enquiry', 'enquiry_id');
    }
}
