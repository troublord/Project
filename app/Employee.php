<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
		'employee_name', 'employee_phone', 'employee_address', 'employee_email', 'employee_birth'
    ];
    
    protected $primaryKey ='employee_id';

    
}
