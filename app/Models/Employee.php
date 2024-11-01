<?php

namespace App\Models;

use App\Models\Department;
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
    

}
