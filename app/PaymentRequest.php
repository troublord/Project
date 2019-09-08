<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Workpiece as WorkpieceEloquent;
use App\Company as CompanyEloquent;

class PaymentRequest extends Model
{
    protected $table = 'payment_requests';
    
    protected $fillable = [
        'company_id', 'workpiece_id', 'request_price', 'request_amount', 'request_total'
    ];
    
    protected $primaryKey ='request_id';

    public function workpiece(){
        return $this->hasOne(WorkpieceEloquent::class,'workpiece_id');
    }
    public function company(){
        return $this->hasOne(CompanyEloquent::class,'company_id');
    }

    

}
