<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\SendContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
/**
 * @OA\Info(title="API Contact", version="1.0")
 *
 * @OA\Server(url="http://localhost:8000")
 */
class ContactController extends Controller
{
 /**
    * @OA\Post(
    * path="/api/contact/store",
    * summary="Guardar datos de contacto",
    * @OA\RequestBody(
    * @OA\MediaType(
    * mediaType="application/json",
    * @OA\Schema(
    * @OA\Property(
    * property="name",
    * type="string"
    * ),
    * @OA\Property(
    * property="email",
    * type="string"
    * ),
    * @OA\Property(
    * property="phone",
    * type="string"
    * ),
    * @OA\Property(
    * property="message",
    * type="string"
    * ),
    * example={"name": "Marisa Caponetto", "email": "ing.mcaponetto@gmail.com","phone": "+54 9 261 5580540", "message":"Test de envio de email"}
    * )
    * )
    * ),
    * @OA\Response(
    * response=200,
    * description="OK"
    * )
    * )
    */

    public function store(Request $request)
    {
        try{
            $contact          = new Contact;
            $contact->name    = $request->name;
            $contact->email   = $request->email;
            $contact->phone   = $request->phone;
            $contact->message = $request->message;
            try{
                Mail::to($request->email)->cc("marisascaponetto@yahoo.com.ar")->send(new SendContact($contact));
                $contact->send_email="Se envió el email";
            } catch (\exception $e) {
                $contact->send_email="Falló el envío: {$e->getMessage()}";
            }
            $contact->save();
        } catch(\exception $e) {
            return response()-> json("Se generó un error: {$e->getMessage() }", 404);
        }
        return response()-> json("Mensaje enviado con éxito! {$request->email}", 201);
    }
}


