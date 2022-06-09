<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Filesystem\Cache;

class Category extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable = ['id','title'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function getProductsCountAttribute()
    {
        return $this->products()->count();
    }
    public function getCategoryProductsAttribute(){
        return $this->products ? $this->products : 'products not found';
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($category) {
            Cache::forget('category_cache');
            $category->products()->delete();

        });
        static::updating(function($category) {
            Cache::forget('category_cache');
        });
    }

}
