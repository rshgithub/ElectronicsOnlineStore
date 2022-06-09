<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['id','image'];
    protected $hidden = ['created_at','updated_at','deleted_at','image'];
    protected $appends = ['ad_image'];

    public function getAdImageAttribute(){
        return $this->image ? url('/storage/'.$this->image) : 'no image';
    }
}
