<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\BarangayAdminModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use View;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $username = $request->username;
        $password = $request->password;

        $user = UserModel::where('name', $username)->first();
        $admincount = UserModel::where('name', $username)->count();

        $brgyadmin = BarangayAdminModel::where('username', $username)->first();
        $brgyadmincount = BarangayAdminModel::where('username', $username)->count();

        if($admincount > 0)
        {
            if(Hash::check($password, $user->password))
            {
                $request->session()->put('id', $user->id);
                $request->session()->put('username', $user->name);
                    // $request->session()->put('root', $users->root);
                // return view::make('admindashboard');
                return redirect('admindashboard');
            }
        }
        if($brgyadmincount > 0)
        {
            if(Hash::check($password, $brgyadmin->password))
            {
                $request->session()->put('id', $brgyadmin->id);
                $request->session()->put('username', $brgyadmin->username);
                $request->session()->put('brgyid', $brgyadmin->barangay_id);
                    // $request->session()->put('root', $users->root);
                // return view::make('admindashboard');
                return redirect('brgyadmin');
            }
        }
    }

    public function logout()
    {
         session()->flush();
       return redirect('/');
    }
}
