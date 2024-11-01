<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class OverTime extends Model
{
    protected $guarded = [];

    public function overtime_employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

}

