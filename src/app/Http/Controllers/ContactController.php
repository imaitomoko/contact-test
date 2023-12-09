<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function  index()
    {
        return view ('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([ 'last_name', 'first_name', 'gender', 'email', 'zip11', 'addr11', 'building', 'opinion']);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        if($request->input('back') == 'back'){
            return redirect('/')
                        ->withInput();
        }
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'zip11', 'addr11', 'building', 'opinion']);
        Contact::create($contact);

        return view('thanks');
    }

     public function search(Request $request)
    {
        if(isset($request->last_name)){
            $contacts = Contact::where('last_name', $request->last_name)->get();
        }
        else {
            $contacts = Contact::get();
        }
        
        return view('admin', ['contacts' => $contacts, 'last_name' => $request->last_names]);
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/search');
    }
}

