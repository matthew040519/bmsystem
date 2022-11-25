<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\BarangayModel;
use App\Models\BarangayAdminModel;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //
    public function index()
    {
        if (!session()->has('id')) { // to secure that the user is loggin
            return redirect('/');
        }
        else
        {

            return view::make('admindashboard');
            
        }
    }

    public function barangay()
    {
        if (!session()->has('id')) { // to secure that the user is loggin
            return redirect('/');
        }
        else
        {

            return view::make('barangay');
            
        }
    }

    public function getBarangay()
    {
       
        $barangay = BarangayModel::where('active', 1)->orderby('id','asc')->get(); 

        $barangayData['data'] = $barangay;

        return json_encode($barangayData);
    }

    public function insert_barangay(Request $request)
    {
        $request->validate([
            'barangay_name' => 'required',
            'barangay_address' => 'required',
        ]);
        $barangay = new BarangayModel();
        $barangay->barangay_name = $request->barangay_name;
        $barangay->barangay_address = $request->barangay_address;
        $barangay->save();
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function barangay_admin()
    {
        if (!session()->has('id')) { // to secure that the user is loggin
            return redirect('/');
        }
        else
        {
            $barangay = BarangayModel::where('active', 1)->get();

            return view::make('barangayadmin')->with('barangay', $barangay);
            
        }
    }

    public function getBarangayAdmin()
    {
       
        $barangay_admin = BarangayModel::join('tblbarangay_admin', 'tblbarangay.id', '=', 'tblbarangay_admin.barangay_id')->where('active', 1)->orderby('tblbarangay_admin.id','asc')->get(); 

        $barangayAdminData['data'] = $barangay_admin;

        return json_encode($barangayAdminData);
    }

    public function insert_barangay_admin(Request $request)
    {
        $request->validate([
            'barangay_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'contactno' => 'required',
            'address' => 'required',
        ]);
        $barangay_admin = new BarangayAdminModel();
        $barangay_admin->barangay_id = $request->barangay_name;
        $barangay_admin->username = $request->username;
        $barangay_admin->password = Hash::make($request->password);
        $barangay_admin->email = $request->email;
        $barangay_admin->contact_number = $request->contactno;
        $barangay_admin->address = $request->address;
        $barangay_admin->save();
        return json_encode(array(
            "statusCode"=>200
        ));
    }
}
