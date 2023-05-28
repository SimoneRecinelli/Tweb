<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table= 'Faqs';
    public $timestamps = false;

    public function getFaqs(){
        return Faq::all();
    }

    public static function getFaqById($id) {
        return Faq::where('id', $id)->first();
    }
}
