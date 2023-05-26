<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Coupon extends Model
{
    protected $table= 'Coupons';

    public function ncoupons()
    {
        $num = $this->count();
        return $num;
    }

    public function couponutente($id){
        $num= $this->where('id',$id)->count();
        return $num;
    }

    public function couponofferta($idOfferta){
        $num= $this->where('idOfferta',$idOfferta)->count();
        return $num;
    }

    public static function getUserCoupons()
    {
        $userCoupons = self::where('id', Auth::user()->id)->get();
        return $userCoupons;
    }

}
