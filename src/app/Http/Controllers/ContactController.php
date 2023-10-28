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
        $query = User::query();

        if ($request->has('last_name')) {
            $query->Last_nameSearch($request->input('last_name'));
        }

         if ($request->has('gender')) {
            $query->GenderSearch($request->input('gender'));
        }

         if ($request->has('start_date')) {
            $query->Start_dateSearch($request->input('start_date'));
        }

         if ($request->has('end_date')) {
            $query->End_dateSearch($request->input('end_date'));
        }

         if ($request->has('email')) {
            $query->EmailSearch($request->input('email'));
        }

        $results = $query->get();
        $contacts = Contact::simplePaginate(10);
        return view('/admin', compact('last_name', 'gender', 'created_at', 'email'), ['contact' => $contact]);
    }

    public function destroy(request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/delete')
    }
}

