<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

Use Illuminate\Support\Facades\Storage;
Use Symfony\Component\HttpFoundation\Response;

// Request 
Use App\Http\Requests\ConfigPayment\UpdateConfigPaymentRequest;

// Use everything here
Use Gate;
Use Auth;

// Models
Use App\Models\MasterData\ConfigPayment;

class ConfigPaymentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('config_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $config_payment = ConfigPayment::all();

        return view('pages.backsite.master-data.config-payment.index', compact('config_payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(/* ConfigPayment $config_payment */ $id)
    {
        // return view('pages.backsite.master-data.config-payment.show', compact('$config_payment'));

        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigPayment $config_payment)
    {
        abort_if(Gate::denies('config_payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.master-data.config-payment.edit', compact('$config_payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfigPaymentRequest $request, ConfigPayment $config_payment)
    {
        // Get all request
        $data = $request->all();

        // Reformat data before send to database
        // $data['fee'] = str_replace(',', '', $data['fee']);
        // $data['fee'] = str_replace('IDR ', '', $data['fee']);
        // $data['vat'] = str_replace(',', '', $data['vat']);

        // Send data to database
        $config_payment->update($data);

        alert()->success('Success', 'The config payment has been updated!');
        return redirect()->route('backsite.config-payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(/* ConfigPayment $config_payment */ $id)
    {
        // $config_payment->delete();

        // alert()->success('Success', 'The config payment has been deleted!');
        // return back();

        return abort(404);
    }
}
