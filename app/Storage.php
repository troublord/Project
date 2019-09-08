<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee as EmployeeEloquent;
use App\Workpiece as WorkpieceEloquent;

class Storage extends Model
{
    protected $fillable = [
        'storage_at', 'employee_id','workpiece_id','storage_amount', 'storage_total'
    ];
    
    protected $primaryKey ='storage_id';

    public function employee(){
        return $this->hasOne(WorkpieceEloquent::class);
    }

    public function workpiece(){
        return $this->hasOne(WorkpieceEloquent::class);
    }
}
