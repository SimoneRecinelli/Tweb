<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewStaffRequest;
use App\Http\Requests\NewOffertaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Staff;
use App\Models\Offerta;
use App\Models\Azienda;

class StaffController extends Controller {

    public function showHomeStaff() {
        return view('homestaff');
    }

    


    public function gestioneOfferte() {
        return view('gestioneOfferte');
    }

    public function insertofferta(){
        $model = new Azienda;
        $aziende = $model->getAziende();

        return view('insertofferta')->with('aziende',$aziende);
    }

    

    public function storeofferta(NewOffertaRequest $request){

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }


        $offerta = new Offerta;
        $model = new Azienda;
        $aziende = $model->getNome(($request->input('NomeAzienda')));
       
        //bisogna controllare tramite form che tutti i campi siano inseriti
    
        $offerta->DescrizioneOfferta=$request->input('DescrizioneOfferta');
        $offerta->Categoria=$request->input('Categoria');
        $offerta->Scadenza=$request->input('Scadenza');
        $offerta->Oggetto=$request->input('Oggetto');
        $offerta->NomeAzienda=$aziende;
        $offerta->Prezzo=$request->input('Prezzo');
        $offerta->PercentualeSconto=$request->input('PercentualeSconto');
        $offerta->Luogo=$request->input('Luogo');
        $offerta->Modalità=$request->input('Modalità');
        $offerta->Evidenza=$request->input('Evidenza');
        $offerta->image=$imageName;

        $offerta->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/img/products';
            $image->move($destinationPath, $imageName);
        }
        return response()->json(['redirect' => route('homestaff')]);
        //return redirect('homestaff');
    
    }
    
    public function deleteofferta(){
        $offerte=Offerta::getOfferte();
        return view('deleteofferta')->with('offerte',$offerte);
    }
    
    public function destroyofferta($idOfferta){
        Offerta::destroy($idOfferta);
        return redirect('homestaff');
    }
    
    public function modificaofferta(){
        $offerte=Offerta::getOfferte();
        return view('modificaofferta')->with('offerte',$offerte);
    }
    
    public function updateofferta($idOfferta){
        $offerta=Offerta::getOfferte()->where('idOfferta',$idOfferta)->first();
        $model = new Azienda;
        $aziende = $model->getAziende();
        return view('modifyofferta')->with('offerta',$offerta)->with('aziende',$aziende);
    }
    
    public function modifyofferta(NewOffertaRequest $request,$idOfferta)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $model = new Azienda;
        $aziende = $model->getNome(($request->input('NomeAzienda')));
    
       Offerta::where('idOfferta',$idOfferta)->update([
      
        'DescrizioneOfferta' =>$request->input('DescrizioneOfferta'),
        'Categoria'=>$request->input('Categoria'),
        'Scadenza'=>$request->input('Scadenza'),
        'Oggetto'=>$request->input('Oggetto'),
        'NomeAzienda'=>$aziende,
        'Prezzo'=>$request->input('Prezzo'),
        'PercentualeSconto'=>$request->input('PercentualeSconto'),
        'Luogo'=>$request->input('Luogo'),
        'Modalità'=>$request->input('Modalità'),
        'Evidenza'=>$request->input('Evidenza'),
        'image'=>$imageName,
       ]);


       if (!is_null($imageName)) {
        $destinationPath = public_path() . '/img/products';
        $image->move($destinationPath, $imageName);
        };

        return redirect('homestaff');
    }

}