<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
use SoftDeletes;

  protected $fillable=[
    'title','description','content','image','published_at','category_id','price','status','hot_news','view_count','created_by'
  ];

  public function deleteImage()
  {
    /**
      *delete post image from image
      *@return void
        */
    Storage::delete($this->image);
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
