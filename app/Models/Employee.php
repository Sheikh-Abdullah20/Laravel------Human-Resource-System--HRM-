<?php

namespace App\Models;

use App\Models\CashAdvance;
use App\Models\Department;
use App\Models\Loan;
use App\Models\OverTime;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function department(){
        return $this->belongsTo(Department::class);
    }
   
 
 
    public function overtime(){
        return $this->hasMany(OverTime::class,'employee_id','id');
    }



    public function schedule() {
        return $this->belongsTo(Schedule::class, 'employee_schedule', 'id');
    }


    public function position(){
        return $this->belongsTo(Position::class,"employee_position", 'id');
    }
    
    public function cashAdvances()
    {
        return $this->hasMany(CashAdvance::class, 'employee_id', 'id');
    }



    public function loan(){
        return $this->hasMany(Loan::class, 'employee_id', 'id');
    }

}
