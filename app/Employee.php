<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Produce as ProduceEloquent;
use App\Receipt as ReceiptEloquent;
use App\Storage as StorageEloquent;
use App\Purchase as PurchaseEloquent;

class Employee extends Model
{
    protected $fillable = [
		'employee_name', 'employee_phone', 'employee_address', 'employee_email', 'employee_birth'
    ];
    
    protected $primaryKey ='employee_id';


    public function produces(){
      return $this->hasMany(ProduceEloquent::class, 'workpiece_id');
    }
    public function receipts(){
      return $this->hasMany(ReceiptEloquent::class, 'workpiece_id');
    }

    public function storages(){
      return $this->hasMany(StorageEloquent::class, 'workpiece_id');
    }
    public function purchases(){
      return $this->hasMany(PurchaseEloquent::class, 'workpiece_id');
    }
    

    
}
