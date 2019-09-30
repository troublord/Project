<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEloquent;
use App\PostType as PostTypeEloquent;


class Post extends Model
{
    protected $fillable = [
		'title', 'type', 'content', 'user_id'
    ];
    public function user(){
		return $this->belongsTo(UserEloquent::class);
    }
    public function postType(){
		return $this->belongsTo(PostTypeEloquent::class, 'type');
	}
    
}
