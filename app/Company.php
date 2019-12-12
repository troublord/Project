<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Receipt as ReceiptEloquent;
use App\Shipment as ShipmentEloquent;
use App\Storage as StorageEloquent;
use App\PaymentRequest as PaymentRequestEloquent;
use App\Purchase as PurchaseEloquent;


class Company extends Model
{
  protected $table = 'companies';
    protected $fillable = [
		'company_name', 'company_contact', 'company_phone', 'company_address', 'company_content	'
    ];
    protected $primaryKey ='company_id';

    public function paymentrequests(){
      return $this->hasMany(PaymentRequestEloquent::class, 'company_id');
    }
    public function receipts(){
      return $this->hasMany(ReceiptEloquent::class, 'company_id');
    }
    public function shipments(){
      return $this->hasMany(ShipmentEloquent::class, 'company_id');
    }
    public function storages(){
      return $this->hasMany(StorageEloquent::class, 'company_id');
    }
    public function purchases(){
      return $this->hasMany(PurchaseEloquent::class, 'company_id');
    }
    


}
