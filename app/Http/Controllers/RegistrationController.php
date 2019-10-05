<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        return view('registration.index');
    }

    public function store(Request $request)
    {
        if ($request->password == $request->passwordConfirmation) {
            $params = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'type' => 'user',
            ];
            

            $aidi = DB::table('users')
                ->insertGetId($params);
                $params2 = [
                    'customerName' => $request->username,
                    'kotaDistribusi' => $request->city,
                    'alamatEmail' => $request->email,
                    'address' => $request->address,
                    'phone'=>$request->phone,
                    'customerId'=>$aidi
    
                ];
            DB::table('customer')
                ->insert($params2);

            return redirect('/login');
        } else {
            return redirect('registration.index');
        }
    }
}
