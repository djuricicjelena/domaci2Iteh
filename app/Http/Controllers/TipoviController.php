<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Tip as TipResurs;

class TipoviController extends ResponseController
{
    public function index()
    {
        $tipovi = Tip::all();
        return $this->sendResponse(TipResurs::collection($tipovi), 'Vraceni svi tipovi treninga..');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'tip' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $tip = Tip::create($input);

        return $this->sendResponse(new TipResurs($tip), 'Tip je kreiran.');
    }


    public function show($id)
    {
        $tip = Tip::find($id);
        if (is_null($tip)) {
            return $this->sendError('Tip sa zadatim id-em ne postoji.');
        }
        return $this->sendResponse(new TipResurs($tip), 'Tip sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $tip = Tip::find($id);
        if (is_null($tip)) {
            return $this->sendError('Tip sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'tip' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $tip->tip = $input['tip'];
        $tip->save();

        return $this->sendResponse(new TipResurs($tip), 'Tip treninga je azuriran.');
    }

    public function destroy($id)
    {
        $tip = Tip::find($id);
        if (is_null($tip)) {
            return $this->sendError('Tip sa zadatim id-em ne postoji.');
        }
        $tip->delete();
        return $this->sendResponse([], 'Tip treninga je obrisan.');
    }
}
