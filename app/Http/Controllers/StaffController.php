<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Staff;

class StaffController extends Controller {

    public function showHomeStaff() {
        return view('homestaff');
    }

    public function insertofferta(){
        return view('insertofferta');
    }

    public function storeofferta(NewOffertaRequest $request){
        $offerta = new Offerta;
        //bisogna controllare tramite form che tutti i campi siano inseriti
    
        $offerta->DescrizioneOfferta=$request->input('DescrizioneOfferta');
        $offerta->Categoria=$request->input('Categoria');
        $offerta->Scadenza=$request->input('Scadenza');
        $offerta->Oggetto=$request->input('Oggetto');
        $offerta->Azienda=$request->input('Azienda');
        $offerta->Prezzo=$request->input('Prezzo');
        $offerta->PercentualeSconto=$request->input('PercentualeSconto');
        $offerta->Luogo=$request->input('Luogo');
        $offerta->Modalità=$request->input('Modalità');
        $offerta->Evidenza=$request->input('Evidenza');
        $offerta->save();
    
        return redirect('homestaff');
    
    }
    
    public function deleteofferta(){
        $offerte=Offerta::all();
        return view('deleteofferta')->with('offerte',$offerte);
    }
    
    public function destroyofferta($id){
        Offerta::destroy($id);
        return redirect('homestaff');
    }
    
    public function modificaofferta(){
        $offerte=Offerta::all();
        return view('modificaofferta')->with('offerte',$offerte);
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
}