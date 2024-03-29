<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['id', 'category_id','price', 'name', 'image', 'status', 'description'];

    protected $hidden = ['created_at', 'updated_at' ,'deleted_at', 'category' ,'status','image'];

    protected $appends = ['category_title','product_status','product_image'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withDefault(['name' => 'no related category']);
    }

    public function getCategoryTitleAttribute()
    {
        return $this->category ? $this->category->title : 'category not found';
    }

    public function getProductStatusAttribute(){
        if($this->status == 0) { return 'Old'; } else { return 'New'; }
    }

    public function getProductImageAttribute(){
        return $this->image ? url('/storage/'.$this->image) : 'no image';
    }

}
