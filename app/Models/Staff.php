<?php

namespace App\Models;

use App\Models\Resources\Category;
use App\Models\Resources\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class Staff extends Model {

    protected $table = 'users';

    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'username',
        'password',
        'possibilità_abbinamento',
        'eta',
        'genere',
        'residenza',
        'telefono',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'username',
        'password',
    ];


   public static function getStaff() {
        $staff = User::where('role','staff')->paginate(1);
        return $staff;
    }

    public static function getProfileStaff($id)
    {
        $staff = Staff::where('id', $id)->first();
        return $staff;
    }

    public static function getStaffById($id){

        return Staff::where('id',$id)->first();
        
    }


}