<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Azienda;
use App\Models\Coupon;
use App\Models\Offerta;
use App\Models\Faq;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Requests\NewAziendaRequest;
use App\Http\Requests\NewStaffRequest;
use App\Http\Requests\NewFaqRequest;
use Illuminate\Support\Facades\Hash;
use App\Rules\Password;
use Illuminate\Support\Facades\Form;
use Illuminate\Validation\Rules;






class AdminController extends Controller
{

    public function homeadmin()
    {
        $az = new Azienda();
        $aziende = $az->getAllAziende();
        $ncoupon = new Coupon;
        $num = $ncoupon->ncoupons();
        return view('AdminViews.homeadmin')->with('aziende', $aziende)->with('num', $num);
    }

    /* GESTIONE AZIENDE --------------------------------------------------------------------------------------------------*/
    public function insertazienda()
    {
        return view('AdminViews.insertazienda');
    }

    public function storeazienda(NewAziendaRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }


        $azienda = new Azienda;
        //bisogna controllare tramite form che tutti i campi siano inseriti

        $azienda->NomeAzienda = $request->input('NomeAzienda');
        $azienda->Sede = $request->input('Sede');
        $azienda->Tipologia = $request->input('Tipologia');
        $azienda->RagioneSociale = $request->input('RagioneSociale');
        $azienda->Descrizione = $request->input('Descrizione');
        $azienda->image=$imageName;
        $azienda->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/img/products';
            $image->move($destinationPath, $imageName);
        };

        return redirect('amministratore');

    }

    public function deleteazienda()
    {
        $aziende = Azienda::all();
        return view('AdminViews.deleteazienda')->with('aziende', $aziende);
    }

    public function destroyazienda($idAzienda)
    {
        
        $azienda = new Azienda;
        $azienda = $azienda->getAzienda($idAzienda);
        

            $azienda->delete();
        
        
        return redirect('amministratore');
    }

    public function modificaazienda()
{
    $aziende = Azienda::paginate(10);
    return view('AdminViews.modificaazienda')->with('aziende', $aziende);
}


    public function updateazienda($idAzienda)
    {
        $azienda = Azienda::all()->where('idAzienda', $idAzienda)->first();
        return view('AdminViews.modifyazienda')->with('azienda', $azienda);
    }

    public function modifyazienda(NewAziendaRequest $request, $idAzienda)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }


        $azienda = Azienda::find($idAzienda);
        $azienda->NomeAzienda = $request->input('NomeAzienda');
        $azienda->Sede = $request->input('Sede');
        $azienda->Tipologia = $request->input('Tipologia');
        $azienda->RagioneSociale = $request->input('RagioneSociale');
        $azienda->Descrizione = $request->input('Descrizione');
        $azienda->image = $imageName;
        $azienda->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/img/products';
            $image->move($destinationPath, $imageName);
        };


        return redirect('amministratore');
    }
    /* ------------------------------------------------------------------------------------------------------*/

    /* GESTIONE FAQ-------------------------------------------------------------------------------------------------*/
    public function insertfaq()
    {

        return view('AdminViews.insertfaq');

    }

    public function storefaq(NewFaqRequest $request)
    {

        $faq = new Faq;
        if (isset($request->Domanda) && isset($request->Risposta)) {
            $faq->Domanda = $request->input('Domanda');
            $faq->Risposta = $request->input('Risposta');
            $faq->save();
            return redirect('faq');
        } else {
            return redirect('faq');
        }
    }

    public function deletefaq()
    {
        $faqs = Faq::getFaqs();
        return view('AdminViews.deletefaq')->with('faqs', $faqs);
    }

    public function destroyfaq($id)
    {
        Faq::destroy($id);
        return redirect('gestionefaq');
    }

    public function gestionefaq()
    {
        $faqs = Faq::paginate(10); 
        return view('AdminViews.gestionefaq')->with('faqs', $faqs);
    }
    

    public function updatefaq($id)
    {
        $faqs = new Faq;
        $faq = $faqs->getFaqById($id)->first();
        return view('AdminViews.modifyfaq')->with('faq', $faq);
    }

    public function modifyfaq(NewFaqRequest $request, $id)
    {
        $faq = $faq = Faq::all()->where('id', $id)->first();
        $faq->Domanda = $request->input('Domanda');
        $faq->Risposta = $request->input('Risposta');
        $faq->save();
        return redirect('faq');
    }

    /* GESTIONE MEMBRI STAFF--------------------------------------------------------------------------------------------------- */
    public function insertStaff()
    {
        return view('AdminViews.insertStaff');
    }

    public function storeStaff(NewStaffRequest $request)
    {

        $staff = new Staff();
        $staff->nome = $request->input('nome');
        $staff->cognome = $request->input('cognome');
        $staff->email = $request->input('email');
        $staff->eta = $request->input('eta');
        $staff->telefono = $request->input('telefono');
        $staff->residenza = $request->input('residenza');
        $staff->username = $request->input('username');
        $staff->password = Hash::make($request->input('password'));
        $staff->genere = ($request->input('genere') == 0) ? 'Uomo' : 'Donna';

        // Imposta il ruolo come "staff"
        $staff->role = 'staff';

        // Salva il nuovo utente staff nel database
        $staff->save();

        return redirect()->route('amministratore');
    }

    public function showStaff()
    {
        $staff = new Staff();
        $staffMembers = $staff->getStaff();

        return view('AdminViews.showStaff')->with('staff', $staffMembers);
    }

    public function updateStaff($id){
        $staff=Staff::all()->where('id',$id)->first();
        return view('AdminViews.modifyStaff')->with('staff',$staff);
    }
    public function modifyStaff(Request $request, $id) {
            $staff = Staff::find($id);

            if (!$staff) {
                // Il membro dello staff non esiste, puoi gestire l'errore come preferisci
                return redirect()->back()->with('error', 'Membro dello staff non trovato');
            }

            // Aggiorna i dati del profilo dello staff
            $staff->nome = $request->input('nome');
            $staff->cognome = $request->input('cognome');
            $staff->email = $request->input('email');
            $staff->eta = $request->input('eta');
            $staff->telefono = $request->input('telefono');
            $staff->residenza = $request->input('residenza');
            $staff->username = $request->input('username');
            $staff->genere = $request->input('genere');


            // Salva le modifiche
            $staff->save();

            return redirect()->route('amministratore');
        }
    public function modificaPassStaff($id){
        $staffs = new Staff();
        $staff= $staffs ->getProfileStaff($id);
        return view('AdminViews.modificaPassStaff')->with('staff',$staff);
    }

    public function putPassStaff(Request $request, $id){

        $staff = Staff::find($id);

        // Validazione dei dati
        $validatedData = $request->validate([
            'password' => ['required',  Rules\Password::defaults()],
        ]);

        // Aggiorna la password dell'utente con i nuovi valori
        $staff->password = Hash::make($validatedData['password']);

        // Salva le modifiche
        $staff->update();

        return redirect()->route('amministratore');

    }
    public function deleteStaff()
    {
        $staff = new Staff();
        $staffMembers = $staff->getStaff();

        return view('AdminViews.deleteStaff')->with('staff', $staffMembers);
    }

    public function destroyStaff($id) {
        Staff::destroy($id);
        return redirect()->route('amministratore');
    }

/* ELIMINAZIONE UTENTI --------------------------------------------------------------------------------  */
    public function showUtenti()
    {
        $user = new User();
        $users = $user->getusers();

        return view('AdminViews.showUtenti')->with('user', $users);
    }

    public function destroyUtenti($id) {
        $user = new User();
        $coupon = new Coupon;
        $coupons = $coupon->getcoupons($id);
        foreach($coupons as $c){
            $c->attivo='no';
        }
        User::destroy($id);
        return redirect()->route('showUtenti');
    }

/* --------------------------------------------------------------------------------  */

//---------------------------------------------------------------------------------------------------------------------------//

/* STATISTICHE ---------------------------------------------------------------------------------------*/
public function showStatistiche() {
    $coupon = new Coupon;
    $num = $coupon->ncoupons();
    $user = new User;
    $users=$user->getusers();
    $offerta = new Offerta;
    $offerte=$offerta->getOfferte();
    return view('AdminViews.showStatistiche')
        ->with('num', $num)
        ->with('users',$users)
        ->with('offerte',$offerte);
}

public function statsutente($id){

    $coupon = new Coupon;
    $num = $coupon->ncoupons();
    $user = new User;
    $users=$user->getusers();
    $offerta = new Offerta;
    $offerte=$offerta->getOfferte();
    
    $numutente = $coupon->couponutente($id);
    return view('AdminViews.showStatistiche')
        ->with('num', $num)
        ->with('users',$users)
        ->with('numutente',$numutente)
        ->with('offerte',$offerte)
        ->with('id',$id);
}

public function statsofferta($idOfferta)
{
    
    $coupon = new Coupon;
    $num = $coupon->ncoupons();
    $user = new User;
    $users=$user->getusers();
    $offerta = new Offerta;
    $offerte=$offerta->getOfferte();
    $numofferte = $coupon->couponofferta($idOfferta);
    
    return view('AdminViews.showStatistiche')
        ->with('num', $num)->with('users',$users)
        ->with('numofferte',$numofferte)
        ->with('offerte',$offerte)
        ->with('idOfferta',$idOfferta);
}
//---------------------------------------------------------------------------------------------------------------------------//







}
