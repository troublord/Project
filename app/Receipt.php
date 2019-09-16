<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee as EmployeeEloquent;
use App\Company as CompanyEloquent;
use App\Workpiece as WorkpieceEloquent;


class Receipt extends Model
{
    protected $fillable = [
        'receipt_at', 'employee_id', 'company_id','workpiece_id','receipt_price', 'receipt_amount', 'receipt_total'
    ];
    
    protected $primaryKey ='receipt_id';

    public function employee(){
        return $this->belongsTo(WorkpieceEloquent::class);
    }
    public function company(){
        return $this->belongsTo(CompanyEloquent::class,'company_id');
    }
    public function workpiece(){
        return $this->belongsTo(WorkpieceEloquent::class);
    }
}
