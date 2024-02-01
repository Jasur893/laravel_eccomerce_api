<?php

namespace App\Http\Controllers;

use App\Models\PaymentCardType;
use App\Http\Requests\StorePaymentCardTypeRequest;
use App\Http\Requests\UpdatePaymentCardTypeRequest;

class PaymentCardTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->response(PaymentCardType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentCardTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentCardTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentCardType  $paymentCardType
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentCardType $paymentCardType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentCardType  $paymentCardType
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentCardType $paymentCardType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentCardTypeRequest  $request
     * @param  \App\Models\PaymentCardType  $paymentCardType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentCardTypeRequest $request, PaymentCardType $paymentCardType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentCardType  $paymentCardType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentCardType $paymentCardType)
    {
        //
    }
}
