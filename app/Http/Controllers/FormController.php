<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function formCreate (){
         return view('form');
    }

    public function formSubmit(Request $request) {
        $rules = [
            'name'=>'required|max:5',
            'email'=>'required|email',
        ];
        $customMessage = [
            'name.required'=>'আপনার সঠিক নাম দিন?',
            'name.max'=>'You can not use for 5 character for name',
            'email.required'=>'Enter Your Email',
            'email.email'=>'Email Must Be Valid Email',
        ];

        $this->validate($request,$rules,$customMessage);

        return $request->all();

        
    }
}

