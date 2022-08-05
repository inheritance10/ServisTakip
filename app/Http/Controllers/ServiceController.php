<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Province;
use App\Models\Service;
use App\Models\Town;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $serviceData = Service::all();
        return view('service.service-list',compact('serviceData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::all()->toArray();

        /*for($i = 0; $i<=count($province) ; $i++){
            return $province[$i];
        }*/

        //return count($province);

       // $town = Town::where('city_id',$province->plate);
        //city_id = plate;
        //return $town;

        return view('service.service-add',compact('province'));
    }


    public function regencies($plate){
        $province = Province::find(intval($plate));
        $regencies = Town::where('city_id', '=', $province->plate)->get();
        return response()->json($regencies);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('service_file')){
            $request->validate([
                'service_plate' => 'required',
                'province' => 'required',
                'town' => 'required',
                'service_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'description' => 'required',
            ]);
            $file_name = uniqid().".".$request->service_file->getClientOriginalExtension();
            $request->service_file->move(public_path('images/service'),$file_name);
        }else{
            $file_name = null;
        }


        $province = Province::find($request->province);
        $service = Service::create([
            'service_plate' => $request->service_plate,
            'province' => $province->title,
            'town' => $request->town,
            'service_file' => $file_name,
            'description' => $request->description,
            'customer_id' => null,
            'service_state' => $request->service_state,
            'note' => $request->note
        ]);

        if($service){
            return redirect(route('service.index'))->with('success','Kayıt işlemi başarılı');
        }
        return back()->with('error','Kayıt işlemi başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province = Province::all()->toArray();
        $service = Service::find($id);
        return view('service.service-send',compact('service','province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $service = Service::find($id);


        $request->validate([
           'customer_name' => 'required|string',
           'address' => 'required',
        ]);

         $service->update([
            'description' => $request->description,
            'note' => $request->note,
            'service_state' => $request->service_state
         ]);

        $customer = Customer::create([
            'service_id' => null,
            'name_surname' => $request->customer_name,
            'requested_service' => $request->requested_service,
            'province' => $request->province,
            'town' => $request->town,
            'address' => $request->address
        ]);


        if($service){
            return redirect(route('service.index'))->with('success','Servis Yönlendirildi');
        }
        return back()->with('error','Servis Gönderme Başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
