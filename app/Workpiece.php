<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PaymentRequest as PaymentRequestEloquent;
use App\Produce as ProduceEloquent;
use App\Receipt as ReceiptEloquent;
use App\Shipment as ShipmentEloquent;
use App\Storage as StorageEloquent;

class Workpiece extends Model
{
    protected $fillable = [
		'workpiece_name', 'workpiece_price', 'workpiece_formation', 'content	','finished','unfinished','safety'
    ];
    protected $primaryKey ='workpiece_id';


    public function paymentrequests(){
      return $this->hasMany(PaymentRequestEloquent::class, 'workpiece_id');
    }
    public function produces(){
      return $this->hasMany(ProduceEloquent::class, 'workpiece_id');
    }
    public function receipts(){
      return $this->hasMany(ReceiptEloquent::class, 'workpiece_id');
    }
    public function shipments(){
      return $this->hasMany(ShipmentEloquentEloquent::class, 'workpiece_id');
    }
    public function storages(){
      return $this->hasMany(StorageEloquent::class, 'workpiece_id');
    }
}
