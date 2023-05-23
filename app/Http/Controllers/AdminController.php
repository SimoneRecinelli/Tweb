<?php

namespace App\Http\Controllers;

use App\Models\Admin;
/*use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;*/
use App\Models\Azienda;
use App\Models\Offerta;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\NewAziendaRequest;
use App\Http\Requests\NewFaqRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

  /*  protected $_adminModel;

    public function __construct() {
        $this->_adminModel = new Admin;
        $this->middleware('can:isAdmin');
    } */

    public function index() {
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

public function homeadmin(){
    $aziende = Azienda::all();
    return view('homeadmin')->with('aziende',$aziende);
}

public function insertazienda(){
    return view('insertazienda');
}

public function storeazienda(NewAziendaRequest $request){
    $azienda = new Azienda;
    //bisogna controllare tramite form che tutti i campi siano inseriti

    $azienda->Nome=$request->input('Nome');
    $azienda->Sede=$request->input('Sede');
    $azienda->Tipologia=$request->input('Tipologia');
    $azienda->RagioneSociale=$request->input('RagioneSociale');
    $azienda->save();

    return redirect('amministratore');

}

public function deleteazienda(){
    $aziende=Azienda::all();
    return view('deleteazienda')->with('aziende',$aziende);
}

public function destroyazienda($id){
    $azienda=Azienda::find($id);
    $offerte=Offerta::all()->where('Azienda',$azienda->Nome);
    
    
    foreach($offerte as $offerta){
        
        
        $i=$offerta->id;
        Offerta::destroy($i);
    }
    
    Azienda::destroy($id);
    return redirect('amministratore');
}

public function modificaazienda(){
    $aziende=Azienda::all();
    return view('modificaazienda')->with('aziende',$aziende);
}

public function updateazienda($id){
    $azienda=Azienda::all()->where('id',$id)->first();
    return view('modifyazienda')->with('azienda',$azienda);
}

public function modifyazienda(NewAziendaRequest $request,$id)
{

    $azienda = Azienda::find($id);
    $azienda->Nome=$request->input('Nome');
    $azienda->Sede=$request->input('Sede');
    $azienda->Tipologia=$request->input('Tipologia');
    $azienda->RagioneSociale=$request->input('RagioneSociale');
    $azienda->save();
    return redirect('amministratore');
}

/* FAQ-------------------------------------------------------------------------------------------------*/
public function insertfaq(){

    return view('insertfaq');


}


public function storefaq(NewFaqRequest $request){

    $faq = new Faq;
    if (isset($request->Domanda)&&isset($request->Risposta)){
        $faq->Domanda = $request->input('Domanda');
    $faq->Risposta = $request->input('Risposta');
    $faq->save();
    return redirect('faq');
    }
    else{
        return redirect('faq');
    }


}

public function deletefaq(){
    $faqs = Faq::all();
    return view('deletefaq')->with('faqs',$faqs);
}

public function destroyfaq($id){
    Faq::destroy($id);
    return redirect('faq');

}

public function gestionefaq(){
    $faqs = Faq::all();
    return view('gestionefaq')->with('faqs',$faqs);
}

public function updatefaq($id){
    $faq=Faq::all()->where('id',$id)->first();
    return view('modifyfaq')->with('faq',$faq);
}
public function modifyfaq(NewFaqRequest $request, $id){
    $faq = $faq=Faq::all()->where('id',$id)->first();
    $faq->Domanda=$request->input('Domanda');
    $faq->Risposta=$request->input('Risposta');
    $faq->save();
    return redirect('faq');

}
/* FAQ-------------------------------------------------------------------------------------------------*/

}
