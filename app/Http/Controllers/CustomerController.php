<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Province;
use App\Models\Service;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerData = Customer::with('getService')->get();

        $service_plate = $customerData[0]->getService[0]->service_plate;
        //return
        return view('customer.customer-list',compact('customerData','service_plate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = Service::where('service_state' , '=' , 1)->get();

        $province = Province::all()->toArray();
        return view('customer.customer-add',compact('province','service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create([
            'service_id' => $request->service_id,
            'name_surname' => $request->customer_name,
            'requested_service' => $request->requested_service,
            'province' => $request->province,
            'town' => $request->town,
            'address' => $request->address
        ]);

        $serviceSend = Service::find($request->service_id);

        $serviceSend->update([
           'service_state' => 0
        ]);

        if($customer){
            return redirect(route('customer.index'))->with('success','Müşteri Kaydı yapıldı ve servis yönlendirildi');
        }
        return back()->with('error','Müşteri kaydı Başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
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
