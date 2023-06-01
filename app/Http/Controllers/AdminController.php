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
use Illuminate\Validation\Rule;







class AdminController extends Controller
{

    public function homeadmin()
    {
        $aziende = Azienda::getAllAziende();
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

    public function destroyazienda($idAzienda)
    {
        $azienda = Azienda::getAziendaById($idAzienda);
        $azienda->delete();
        return redirect('modificaazienda');
    }

    public function modificaazienda()
    {
    $aziende = Azienda::paginate(10);
    return view('AdminViews.modificaazienda')->with('aziende', $aziende);
    }


    public function updateazienda($idAzienda)
    {
        $azienda = Azienda::getAziendaById($idAzienda);
        if ($azienda != null) {
            return view('AdminViews.modifyazienda')->with('azienda', $azienda);
        }
        else return view('error');
    
    }

    public function modifyazienda(Request $request, $idAzienda)
    {
        $azienda = Azienda::find($idAzienda);

        $request->validate([
            'NomeAzienda' => ['required','string','min:3','regex:/^[\p{L}\s]+$/u', Rule::unique('Aziende', 'idAzienda')->ignore($azienda->idAzienda, 'idAzienda')],
            'Sede' => 'required|min:3|regex:/^[\p{L}0-9\s.,\-]+$/u',
            'Tipologia' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'RagioneSociale' => 'required|min:3|regex:/^[\p{L}0-9\s.,\-]+$/u',
            'image' => 'image|max:1024|mimes:jpeg,png,jpg',
            'Descrizione' => 'required|min:10',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

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


        return redirect('modificaazienda');
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


    public function destroyfaq($id)
    {
        Faq::destroy($id);
        return redirect('gestionefaq');
    }

    public function gestionefaq()
    {
        $faqs = Faq::getFaqsPaginate(); 
        return view('AdminViews.gestionefaq')->with('faqs', $faqs);
    }
    
    public function updatefaq($id)
    {
        $faq = Faq::getFaqById($id);

        if ($faq!=null){
            return view('AdminViews.modifyfaq')->with('faq', $faq);
        }
        else return view('error');

    }

    public function modifyfaq(NewFaqRequest $request, $id)
    {
        $faq = Faq::getFaqById($id);

        $faq->Domanda = $request->input('Domanda');
        $faq->Risposta = $request->input('Risposta');
        $faq->save();
        return redirect('gestionefaq');
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
        $staff->genere = $request->input('genere');

        // Imposta il ruolo come "staff"
        $staff->role = 'staff';

        // Salva il nuovo utente staff nel database
        $staff->save();

        return redirect()->route('amministratore');
    }

    public function showStaff()
    {
        $staffMembers = Staff::getStaff();
        return view('AdminViews.showStaff')->with('staff', $staffMembers);
    }

    public function updateStaff($id){
        $staff=Staff::getStaffById($id);

        if ($staff!=null){
            return view('AdminViews.modifyStaff')->with('staff',$staff);
        }
        else return view('error');
    }
    
    public function modifyStaff(Request $request, $id) {
            $staff = Staff::find($id);

            if (!$staff) {
                // Il membro dello staff non esiste, puoi gestire l'errore come preferisci
                return redirect()->back()->with('error', 'Membro dello staff non trovato');
            }

            $request->validate([
                'nome' => 'required|string|min:3|regex:/^[\p{L}\s]+$/u',
                'cognome' => 'required|string|min:3|regex:/^[\p{L}\s]+$/u',
                'email' => 'required|email|max:255',
                'eta' => 'required|integer|min:1|max:100',
                'telefono' => 'required|string|min:10|regex:/^[0-9]+$/',
                'residenza' => 'required|min:3|regex:/^[\p{L}0-9\s.,\-]+$/u',
                'username' => ['required', 'string', 'min:8',Rule::unique('users')->ignore($staff->id)],
                'genere' => 'required|string',

            ]);

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

            return redirect()->route('showStaff');
        }


    public function modificaPassStaff($id){

        $staff=Staff::getStaffById($id);
        if($staff != null){
            return view('AdminViews.modificaPassStaff')->with('staff',$staff);
        }
        else return view('error');
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

        return redirect()->route('showStaff');

    }


    public function destroyStaff($id) {
        Staff::destroy($id);
        return redirect()->route('showStaff');
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
    $offerte=Offerta::getOfferte();
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
    $offerte=Offerta::getOfferte();
    
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
    $offerte=Offerta::getOfferte();
    $numofferte = $coupon->couponofferta($idOfferta);
    
    return view('AdminViews.showStatistiche')
        ->with('num', $num)->with('users',$users)
        ->with('numofferte',$numofferte)
        ->with('offerte',$offerte)
        ->with('idOfferta',$idOfferta);
}
//---------------------------------------------------------------------------------------------------------------------------//

}
