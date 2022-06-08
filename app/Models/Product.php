<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['id', 'category_id','price', 'name', 'image', 'status', 'description'];

    protected $hidden = ['created_at', 'updated_at' ,'deleted_at', 'category' ];

    protected $appends = ['category_title'];



    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault(['name' => 'no related category']);
    }

    public function getDishCategoryNameAttribute()
    {
        return $this->category ? $this->category->title : 'category not found';
    }

    public function getCategoryTitleAttribute()
    {
        return $this->category ? $this->category->title : 'category not found';
    }

    public function getProductStatusAttribute(){
        if($this->status == 0) { return 'Old'; } else { return 'New'; }
    }


}
