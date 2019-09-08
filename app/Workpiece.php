<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workpiece extends Model
{
    protected $fillable = [
		'workpiece_name', 'workpiece_price', 'workpiece_formation', 'content	'
    ];
    protected $primaryKey ='workpiece_id';
}
