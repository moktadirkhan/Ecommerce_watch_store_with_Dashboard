<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];

    public function product() //name of the model in lower case
    {
      return $this->hasMany(Product::class);
    }
}
