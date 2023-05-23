<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table= 'Coupons';

    public function ncoupons()
    {
        $num = $this->count();
        return $num;
    }
}
