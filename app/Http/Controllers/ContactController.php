<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {
        $contact = new Contact();

        $contact->user_id = $request->user()->id;
        // Seleccionamos el id del usuario según el email introducido.
        $userContact = User::where('email', $request->input('inputEmail'));

        $contact->contact_id = $userContact->first()->id;

        $contact->save();

        return redirect(route('mipanel'));
    }
}
