<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Http\Requests\Categoria\SolicitudActualizacion;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can::business.index')->only(['index']);
        $this->middleware('can::business.edit')->only(['update']);
    }

    public function index()
    {
        $business = Business::where('id',1)->firstOrFail();
        return view ('admin.business.index', compact('business'));
    }

    public function update(SolicitudActualizacion $request, Business $business)
    {
        $image_name='422-4228187_mando-de-ps4-png-clipart.png';
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }
        
        $business->update($request->all()+['logo'=>$image_name,]);

        return redirect()->route('business.index');
    }
}
