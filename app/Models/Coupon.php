<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Coupon extends Model
{
    protected $table= 'Coupons';

   /** 
    * Metodo utilizzato per le statistiche
    * 
    * Restituisce il numero totale di coupon generati (in generale)
    */
    public function ncoupons()
    {
        $num = $this->count(); //count() conta il numero di coupon
        return $num;
    }


   /**
    * Metodo che prende in ingresso "$id", utilizzato per le statistiche
    *
    * Restituisce il numero totale di coupon generati dall'utente dell'id corrispondente
    */
    public function couponutente($id){
        $num= $this->where('id',$id)->count();
        return $num;
    }


   /**
    * Metodo che prende in ingresso "$idOfferta", utilizzato per le statistiche
    *
    * Restituisce il numero totale di coupon generati per l'Offerta dell'idOfferta corrispondente
    */    
    public function couponofferta($idOfferta){
        $num= $this->where('idOfferta',$idOfferta)->count();
        return $num;
    }


    /**
     * Metodo che permette di estrarre il codice di un coupon e l'oggetto dell'offerta corrispondente, relativi ad un determinato utente
     * 
     * Restituisce la variabile $userCoupons contenente i risultati della query
     */
    public static function getUserCoupons()
    {
        $userCoupons = self::join('Offerte', 'Coupons.idOfferta', '=', 'Offerte.idOfferta') 
        /**
         * join() effettua una query di join tra le tabelle Coupons e Offerte 
         * ( combina le righe delle due tabelle in base alla condizione specificata ('Coupons.idOfferta', '=', 'Offerte.idOfferta') )
         * self:: si riferisce alla classe corrente stessa, quindi si sta eseguendo una query sulla tabella rappresentata dalla classe corrente
         */
            ->where('Coupons.id', Auth::user()->id) 
            ->select('Coupons.codice', 'Offerte.Oggetto') // Con select() si selezionano le colonne "codice" da "Coupons" e "Oggetto" da "Offerte".
            ->get();

        return $userCoupons;
    }


    /**
     * Metodo che prende in ingresso un parametro $id del Coupon
     * 
     * Restituisce i coupons di un utente
     */
    public function getcoupons($id){
        return $this->where('id',$id);
    }

    /**
     * Metodo che prende in ingresso i parametri $user e $idOfferta
     * 
     * Restituisce il numero di coupons emessi per un utente rispetto ad una determinata offerta
     */
    public function checknum($user,$idOfferta){
        $num=Coupon::where('id',$user->id)->where('idOfferta',$idOfferta)->count();
        return $num;
    }

}
