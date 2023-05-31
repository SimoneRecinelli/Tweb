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
        $userCoupons = self::join('Offerte', 'Coupons.idOfferta', '=', 'Offerte.idOfferta')
            ->where('Coupons.id', Auth::user()->id)
            ->select('Coupons.codice', 'Offerte.Oggetto')
            ->get();
        return $userCoupons;
    }

    public function getcoupons($id){
        return $this->where('id',$id);
    }

}
