<?php namespace App;
    use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	protected $table = 'product';
	protected $fillable = array('name','nprice','oprice','details','majorcat','category','subcategory',
    'type1','type2','type3','type4');
    
} 
