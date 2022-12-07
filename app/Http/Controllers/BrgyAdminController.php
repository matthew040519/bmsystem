<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\PurokModel;
use App\Models\PurokAdminModel;
use Illuminate\Support\Facades\Hash;


class BrgyAdminController extends Controller
{
    //
    public function index()
    {
        return View::make('brgyadmindashboard');
    }

    public function purok()
    {
        return View::make('purok');
    }

    public function getPurok()
    {
        
        $brgy_id = session()->get('brgyid');

        // dd($brgy_id);

        $purok = PurokModel::select('*', 'tblpurok.id as purok_id')->join('tblbarangay', 'tblbarangay.id', '=', 'tblpurok.barangay_id')->where('tblbarangay.active', 1,)->where('tblpurok.barangay_id', $brgy_id)->orderby('tblbarangay.id','asc')->get(); 

        $purokData['data'] = $purok;
        return json_encode($purokData);

    }

    public function insert_purok(Request $request)
    {
        $request->validate([
            'purok_name' => 'required',
        ]);

        $user_id = $request->session()->get('id');
        $brgyid = $request->session()->get('brgyid');

        $purok = new PurokModel();
        $purok->barangay_id = $brgyid;
        $purok->user_id = $user_id;
        $purok->purok_name = $request->purok_name;
        $purok->save();
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function purok_admin()
    {
        return View::make('purokadmin');
    }

    public function insert_purok_admin(Request $request)
    {
        $brgyid = $request->session()->get('brgyid');

        $request->validate([
            'purok_name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'contactno' => 'required',
        ]);
        
        $purok_admin = new PurokAdminModel();
        $purok_admin->barangay_id = $brgyid;
        $purok_admin->purok_id = $request->purok_name;
        $purok_admin->username = $request->username;
        $purok_admin->password = Hash::make($request->password);
        $purok_admin->email = $request->email;
        $purok_admin->contact_number = $request->contactno;
        $purok_admin->save();
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function getPurokAdmin()
    {
        
        $brgy_id = session()->get('brgyid');

        $purok = PurokModel::select('*', 'tblpurok.id as purok_id')->join('tblbarangay', 'tblbarangay.id', '=', 'tblpurok.barangay_id')->join('tblpurokadmin', 'tblpurokadmin.purok_id', '=', 'tblpurok.id')->where('tblbarangay.active', 1,)->where('tblpurok.barangay_id', $brgy_id)->orderby('tblbarangay.id','asc')->get(); 

        $purokData['data'] = $purok;
        return json_encode($purokData);

    }
}
