<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];

    protected static function boot() {
	    parent::boot();

	    static::deleting(function($category) {
	        $category->products()->delete();
	    });
	}

	public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
