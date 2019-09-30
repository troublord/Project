<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Workpiece as WorkpieceEloquent;
use App\Employee as EmployeeEloquent;

class Produce extends Model
{
    protected $fillable = [
        'employee_id', 'workpiece_id', 'produce_date','com_index','pro_index', 'pro_second', 'pro_period', 'content'
    ];
    
    protected $primaryKey ='produce_id';

    public function employee(){
        return $this->belongsTo(EmployeeEloquent::class);
    }
    public function workpiece(){
        return $this->belongsTo(WorkpieceEloquent::class);
    }

}
