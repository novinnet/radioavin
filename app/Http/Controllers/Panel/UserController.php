<?php

namespace App\Http\Controllers\Panel;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function list()
    {
        
        Mail::to('yasfuny@gmail.com')->send(new sendMail('sfsf'));

        $users = User::all();
        return view('Panel.Users.Lists', compact('users'));
    }


    public function Delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return response()->json('کاربر با موفقیت حذف شد');
    }


    
    public function Add(Request $request)
    {
        

        $user = User::create([
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);


        // send sms

        toastr()->success('User Added Successfully');
        return back();

    }
}
