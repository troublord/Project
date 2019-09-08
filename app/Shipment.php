<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company as CompanyEloquent;
use App\Workpiece as WorkpieceEloquent;

class Shipment extends Model
{
    protected $fillable = [
        'shipment_at', 'company_id','workpiece_id', 'shipment_amount'
    ];
    
    protected $primaryKey ='shipment_id';

    public function company(){
        return $this->hasOne(CompanyEloquent::class,'company_id');
    }
    public function workpiece(){
        return $this->hasOne(WorkpieceEloquent::class);
    }
}
