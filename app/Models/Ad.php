<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['id','image'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function getAdImagesAttribute(){
        $media = [] ;
        if( $this->count()){
            foreach($this->image as $Media){ array_push($media,url('/storage/'. $Media->name)); }
        }else{
            array_push( $media,url('control_panel_styles\images\logo.svg')); }
        return $media;
    }
}
