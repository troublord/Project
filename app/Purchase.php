<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee as EmployeeEloquent;
use App\Company as CompanyEloquent;

class Purchase extends Model
{
    protected $fillable = [
        'purchase_at', 'employee_id', 'company_id','purchase_name','purchase_price', 'purchase_amount', 'purchase_total'
    ];
    
    protected $primaryKey ='purchase_id';

    public function employee(){
        return $this->belongsTo(WorkpieceEloquent::class);
    }
    public function company(){
        return $this->belongsTo(CompanyEloquent::class,'company_id');
    }

}
