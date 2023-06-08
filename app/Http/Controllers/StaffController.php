<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewOffertaRequest;
use App\Models\Offerta;
use App\Models\Azienda;
use Illuminate\Pagination\Paginator;


class StaffController extends Controller {

    public function showHomeStaff() {
        return view('StaffViews.homestaff');
    }


    public function insertofferta(){
        $azienda = new Azienda;
        $aziende = $azienda->getAziende();
        return view('StaffViews.insertofferta')->with('aziende',$aziende);
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

    }

    public function destroyofferta($idOfferta){
        Offerta::destroy($idOfferta);
        $offerte = Offerta::getOffertePaginate();
        return view('StaffViews.modificaofferta')->with('offerte', $offerte);
    }
    
    public function modificaofferta() {
        $offerte = Offerta::getOffertePaginate();
        return view('StaffViews.modificaofferta')->with('offerte', $offerte);
    }
    
    
    public function updateofferta($idOfferta){
        $offerta = new Offerta;
        $offerte = $offerta->getOffertabyId($idOfferta);
        if ($offerte != null) {
            $azienda = new Azienda;
            $aziende = $azienda->getAziende();
            $items=$azienda->selectAziende($offerte)['items'];
            $selected=$azienda->selectAziende($offerte)['selected'];
            
            return view('StaffViews.modifyofferta')->with('offerte',$offerte)->with('items',$items)->with('selected',$selected);
        }
        else return view('error');
    }


    public function modifyofferta(NewOffertaRequest $request,$idOfferta)
    {
        $offerta = Offerta::getOffertaById($idOfferta);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/img/products';
            $image->move($destinationPath, $imageName);
        };


        $azienda = new Azienda;
        $aziende = $azienda->getNome(($request->input('NomeAzienda')));

        $selected = Azienda::find($request->input('NomeAzienda'));
        
        $offerta->DescrizioneOfferta = $request->input('DescrizioneOfferta');
        $offerta->Categoria = $request->input('Categoria');
        $offerta->Scadenza = $request->input('Scadenza');
        $offerta->Oggetto = $request->input('Oggetto');
        $offerta->NomeAzienda = $selected->NomeAzienda;
        $offerta->Prezzo = $request->input('Prezzo');
        $offerta->PercentualeSconto = $request->input('PercentualeSconto');
        $offerta->Luogo = $request->input('Luogo');
        $offerta->Modalità = $request->input('Modalità');
        $offerta->Evidenza = $request->input('Evidenza');

        if (!is_null($imageName)) {
            // Dopo aver caricato la nuova immagine, aggiorna il nome dell'immagine nell'oggetto $azienda
            $offerta->image = $imageName;
        } else {
            // Se nessuna nuova immagine è stata caricata, mantieni il nome dell'immagine corrente
            $offerta->image = $offerta->image;
        }

        $offerta->save();
        
        return response()->json(['redirect'=>route('modificaofferta')]);
    }
    

}