<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shipment as ShipmentEloquent;
use App\Purchase as PurchaseEloquent;
use App\PaymentRequest as PaymentRequestEloquent;

class Company extends Model
{
  protected $table = 'companies';
    protected $fillable = [
		'company_name', 'company_contact', 'company_phone', 'company_address', 'content	'
    ];
    protected $primaryKey ='company_id';
    


}
