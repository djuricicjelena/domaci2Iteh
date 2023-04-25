<?php

namespace App\Http\Controllers;

use App\Models\Trener;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Trener as TrenerResurs;

class TrenerController extends ResponseController
{
    public function index()
    {
        $treneri = Trener::all();
        return $this->sendResponse(TrenerResurs::collection($treneri), 'Vraceni svi treneri..');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'email' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $tip = Trener::create($input);

        return $this->sendResponse(new TrenerResurs($tip), 'Trener je kreiran.');
    }


    public function show($id)
    {
        $trener = Trener::find($id);
        if (is_null($trener)) {
            return $this->sendError('Trener sa zadatim id-em ne postoji.');
        }
        return $this->sendResponse(new TrenerResurs($trener), 'Trener sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $trener = Trener::find($id);
        if (is_null($trener)) {
            return $this->sendError('Trener sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $trener->ime = $input['ime'];
        $trener->prezime = $input['prezime'];
        $trener->email = $input['email'];
        $trener->save();

        return $this->sendResponse(new TrenerResurs($trener), 'Trener je azuriran.');
    }

    public function destroy($id)
    {
        $trener = Trener::find($id);
        if (is_null($trener)) {
            return $this->sendError('Trener sa zadatim id-em ne postoji.');
        }
        $trener->delete();
        return $this->sendResponse([], 'Trener je obrisan iz sistema.');
    }
}
