<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee as EmployeeEloquent;
use App\Company as CompanyEloquent;

class Purchase extends Model
{
    protected $fillable = [
        'purcahse_at', 'employee_id', 'company_id','purcahse_name','purcahse_price', 'purcahse_amount', 'purcahse_total'
    ];
    
    protected $primaryKey ='purcahse_id';

    public function employee(){
        return $this->hasOne(WorkpieceEloquent::class);
    }
    public function company(){
        return $this->hasOne(CompanyEloquent::class,'company_id');
    }

}
