<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company as CompanyEloquent;
use App\Workpiece as WorkpieceEloquent;
use App\Storage as StorageEloquent;

class Shipment extends Model
{
    protected $fillable = [
        'shipment_at','storage_id', 'company_id','workpiece_id', 'shipment_amount'
    ];
    
    protected $primaryKey ='shipment_id';

    public function company(){
        return $this->belongsTo(CompanyEloquent::class,'company_id');
    }
    public function workpiece(){
        return $this->belongsTo(WorkpieceEloquent::class);
    }
    public function storages(){
        return $this->hasOne(StorageEloquent::class);
      }
}
