<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

    public function employees() {
        return $this->hasMany(Employee::class, 'employee_schedule', 'id');
    }

}
