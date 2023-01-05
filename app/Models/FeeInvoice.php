<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoice extends Model
{
    use HasFactory;


    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }

    public function fee()
    {
        return $this->belongsTo('App\Models\Fee', 'fee_id');
    }
}
