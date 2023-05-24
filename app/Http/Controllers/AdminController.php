<?php

namespace App\Http\Controllers;

use App\Models\Admin;
/*use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;*/
use App\Models\Azienda;
use App\Models\Coupon;
use App\Models\Offerta;
use App\Models\Faq;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Requests\NewAziendaRequest;
use App\Http\Requests\NewStaffRequest;
use App\Http\Requests\NewFaqRequest;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{

    /*  protected $_adminModel;

      public function __construct() {
          $this->_adminModel = new Admin;
          $this->middleware('can:isAdmin');
      } */

    public function index()
    {
        return view('admin');
    }

    /*
    public function addProduct() {
        $prodCats = $this->_adminModel->getProdsCats()->pluck('name', 'catId');
        return view('product.insert')
                        ->with('cats', $prodCats);
    }

    public function storeProduct(NewProductRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $product = new Product;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        return redirect()->action([AdminController::class, 'index']);
        ;
    }
*/

    public function homeadmin()
    {
        $aziende = Azienda::all();
        $ncoupon = new Coupon;
        $num = $ncoupon->ncoupons();
        return view('homeadmin')->with('aziende', $aziende)->with('num', $num);
    }

    public function gestioneAdmin() {
        $azienda = new Azienda();
        $aziende = $azienda->getAllAziende();
        return view('gestioneAdmin')->with('aziende', $aziende);
    }

    /* GESTIONE AZIENDE --------------------------------------------------------------------------------------------------*/
    public function insertazienda()
    {
        return view('insertazienda');
    }

    public function storeazienda(NewAziendaRequest $request)
    {
        $azienda = new Azienda;
        //bisogna controllare tramite form che tutti i campi siano inseriti

        $azienda->NomeAzienda = $request->input('NomeAzienda');
        $azienda->Sede = $request->input('Sede');
        $azienda->Tipologia = $request->input('Tipologia');
        $azienda->RagioneSociale = $request->input('RagioneSociale');
        $azienda->save();

        return redirect('amministratore');

    }

    public function deleteazienda()
    {
        $aziende = Azienda::all();
        return view('deleteazienda')->with('aziende', $aziende);
    }

    public function destroyazienda($idAzienda)
    {
        $azienda = Azienda::find($idAzienda);
        $offerte = Offerta::all()->where('Azienda', $azienda->NomeAzienda);


        foreach ($offerte as $offerta) {


            $idAzienda = $offerta->idAzienda;
            Offerta::destroy($idAzienda);
        }

        Azienda::destroy($idAzienda);
        return redirect('amministratore');
    }

    public function modificaazienda()
    {
        $aziende = Azienda::all();
        return view('modificaazienda')->with('aziende', $aziende);
    }

    public function updateazienda($idAzienda)
    {
        $azienda = Azienda::all()->where('idAzienda', $idAzienda)->first();
        return view('modifyazienda')->with('azienda', $azienda);
    }

    public function modifyazienda(NewAziendaRequest $request, $idAzienda)
    {

        $azienda = Azienda::find($idAzienda);
        $azienda->NomeAzienda = $request->input('NomeAzienda');
        $azienda->Sede = $request->input('Sede');
        $azienda->Tipologia = $request->input('Tipologia');
        $azienda->RagioneSociale = $request->input('RagioneSociale');
        $azienda->save();
        return redirect('amministratore');
    }
    /* ------------------------------------------------------------------------------------------------------*/

    /* GESTIONE FAQ-------------------------------------------------------------------------------------------------*/
    public function insertfaq()
    {

        return view('insertfaq');

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
        $faqs = Faq::all();
        return view('deletefaq')->with('faqs', $faqs);
    }

    public function destroyfaq($id)
    {
        Faq::destroy($id);
        return redirect('faq');

    }

    public function gestionefaq()
    {
        $faqs = Faq::all();
        return view('gestionefaq')->with('faqs', $faqs);
    }

    public function updatefaq($id)
    {
        $faq = Faq::all()->where('id', $id)->first();
        return view('modifyfaq')->with('faq', $faq);
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
        return view('insertStaff');
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

        return view('showStaff')->with('staff', $staffMembers);
    }

    public function updateStaff($id){
        $staff=Staff::all()->where('id',$id)->first();
        return view('modifyStaff')->with('staff',$staff);
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
            $staff->password = $request->input('password');
            $staff->genere = $request->input('genere');


            // Salva le modifiche
            $staff->save();

            return redirect()->route('amministratore')->with('success', 'Profilo dello staff aggiornato con successo');
        }

    public function deleteStaff()
    {
        $staff = new Staff();
        $staffMembers = $staff->getStaff();

        return view('deleteStaff')->with('staff', $staffMembers);
    }


    public function destroyStaff($id) {
        Staff::destroy($id);
        return redirect()->route('amministratore');
    }

//---------------------------------------------------------------------------------------------------------------------------//

/* STATISTICHE ---------------------------------------------------------------------------------------*/
public function showStatistiche() {
    $ncoupon = new Coupon;
    $num = $ncoupon->ncoupons();
    return view('showStatistiche')->with('num', $num);
}





//---------------------------------------------------------------------------------------------------------------------------//
}
