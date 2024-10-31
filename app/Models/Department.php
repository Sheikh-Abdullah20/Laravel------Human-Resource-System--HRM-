<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];        

    public function employee(){
        return $this->hasMany(Employee::class,'department_id','id');
    }
}
