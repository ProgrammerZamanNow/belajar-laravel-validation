<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{
    public function login(Request $request): Response
    {
        try {
            $rules = [
                "username" => "required",
                "password" => "required"
            ];

            $data = $request->validate($rules);
            // data
            return response("OK", Response::HTTP_OK);
        }catch (ValidationException $validationException){
            return response($validationException->errors(), Response::HTTP_BAD_REQUEST);
        }
    }
}
