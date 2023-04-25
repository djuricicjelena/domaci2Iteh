<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends ResponseController
{
    public function login(Request $request)
    {
        $uspesnoLogovanje = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($uspesnoLogovanje){
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('LoginToken')->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->sendResponse($success, 'Uspesno ste se logovali. Koristite token u daljim requstima.');
        }
        else{
            return $this->sendError('Autentifikacija neuspesna.', ['error'=>'Greska pri podacima za logovanje']);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Greska', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['name'] =  $user->name;
        $success['message'] = 'Ulogujte se da biste dobili token za pristup rutama.';


        return $this->sendResponse($success, 'Uspesno napravljen korisnik.');
    }
}
