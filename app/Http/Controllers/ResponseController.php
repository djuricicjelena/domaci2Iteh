<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class ResponseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($podaci, $poruka)
    {
        $response = [
            'uspesno' => true,
            'podaci'    => $podaci,
            'poruka' => $poruka,
        ];

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($greska, $nizGresaka = [], $code = 404)
    {
        $response = [
            'uspesno' => false,
            'poruka' => $greska,
        ];

        if(!empty($nizGresaka)){
            $response['podaci'] = $nizGresaka;
        }

        return response()->json($response, $code);
    }
}
