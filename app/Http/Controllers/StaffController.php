<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewStaffRequest;
use App\Http\Requests\NewOffertaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Staff;
use App\Models\Offerta;

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
    
    public function updateofferta($id){
        $offerta=Offerta::all()->where('id',$id)->first();
        return view('modifyofferta')->with('offerta',$offerta);
    }
    
    public function modifyofferta(NewOffertaRequest $request,$id)
    {
    
        $offerta = Offerta::find($id);
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
}