<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee as EmployeeEloquent;
use App\Workpiece as WorkpieceEloquent;

class Storage extends Model
{
    protected $fillable = [
        'storage_at', 'employee_id','workpiece_id','storage_amount','finished'
    ];
    
    protected $primaryKey ='storage_id';

    public function employee(){
        return $this->belongsTo(WorkpieceEloquent::class);
    }

    public function workpiece(){
        return $this->belongsTo(WorkpieceEloquent::class);
    }
    
}
