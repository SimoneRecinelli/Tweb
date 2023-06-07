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
            return view('StaffViews.modifyofferta')->with('offerte',$offerte)->with('aziende',$aziende);
        }
        else return view('error');
    }


    public function modifyofferta(NewOffertaRequest $request, $idOfferta)
    {
        $offerta = Offerta::find($idOfferta);
        
        $imageName = $offerta->image; // Mantieni l'immagine esistente come valore predefinito
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
    
            // Rimuovi l'immagine esistente solo se ne carichi una nuova
            $existingImagePath = public_path('/img/products/' . $offerta->image);
            if (file_exists($existingImagePath)) {
                unlink($existingImagePath);
            }
    
            $destinationPath = public_path('/img/products');
            $image->move($destinationPath, $imageName);
        }
    
        $azienda = new Azienda;
        $aziende = $azienda->getNome($request->input('NomeAzienda'));
    
        Offerta::where('idOfferta', $idOfferta)->update([
            'DescrizioneOfferta' => $request->input('DescrizioneOfferta'),
            'Categoria' => $request->input('Categoria'),
            'Scadenza' => $request->input('Scadenza'),
            'Oggetto' => $request->input('Oggetto'),
            'NomeAzienda' => $aziende,
            'Prezzo' => $request->input('Prezzo'),
            'PercentualeSconto' => $request->input('PercentualeSconto'),
            'Luogo' => $request->input('Luogo'),
            'Modalità' => $request->input('Modalità'),
            'Evidenza' => $request->input('Evidenza'),
            'image' => $imageName,
        ]);
    
        return response()->json(['redirect' => route('modificaofferta')]);
    }
    

}