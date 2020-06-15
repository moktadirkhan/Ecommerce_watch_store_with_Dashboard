<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingInfo extends Model
{
  protected $fillable=[
    'firstname','lastname','phone','email','address','city','user_id','payment_type','message'
  ];
}
