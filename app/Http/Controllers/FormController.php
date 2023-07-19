<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class FormController extends Controller
{

    public function form(): Response {
        return response()->view("form");
    }

    public function submitForm(LoginRequest $request): Response
    {
        $data = $request->validated();
        Log::info(json_encode($request->all(), JSON_PRETTY_PRINT));
        return response("OK", Response::HTTP_OK);
    }

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
