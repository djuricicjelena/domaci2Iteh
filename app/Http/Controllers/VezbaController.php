<?php

namespace App\Http\Controllers;

use App\Models\Vezba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Resources\Vezba as VezbaResurs;

class VezbaController extends ResponseController
{
    public function index()
    {
        $vezbe = Vezba::all();
        return $this->sendResponse(VezbaResurs::collection($vezbe), 'Vracene zve vezbe.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv_vezbe' => 'required',
            'opis' => 'required',
            'trener_id' => 'required',
            'tip_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $vezbe = Vezba::create($input);

        return $this->sendResponse(new VezbaResurs($vezbe), 'Nova vezba je kreirana.');
    }


    public function show($id)
    {
        $vezba = Vezba::find($id);
        if (is_null($vezba)) {
            return $this->sendError('Vezba sa zadatim id-em ne postoji.');
        }
        return $this->sendResponse(new VezbaResurs($vezba), 'Vezba sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $vezba = Vezba::find($id);
        if (is_null($vezba)) {
            return $this->sendError('Vezba sa zadatim id-em ne postoji.');
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv_vezbe' => 'required',
            'opis' => 'required',
            'trener_id' => 'required',
            'tip_id' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $vezba->naziv_vezbe = $input['naziv_vezbe'];
        $vezba->opis = $input['opis'];
        $vezba->trener_id = $input['trener_id'];
        $vezba->tip_id = $input['tip_id'];
        $vezba->save();

        return $this->sendResponse(new VezbaResurs($vezba), 'Vezba je azurirana.');
    }

    public function destroy($id)
    {
        $vezba = Vezba::find($id);
        if (is_null($vezba)) {
            return $this->sendError('Vezba sa zadatim id-em ne postoji.');
        }
        $vezba->delete();
        return $this->sendResponse([], 'Vezba je obrisana iz sistema.');
    }
}
