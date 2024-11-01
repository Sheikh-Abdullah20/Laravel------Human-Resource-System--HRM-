<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $guarded = [];

    public function employee(){
        return $this->hasMany(Employee::class, "employee_position","id");
    }
}
