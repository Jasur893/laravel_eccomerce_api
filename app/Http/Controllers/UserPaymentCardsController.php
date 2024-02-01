<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserPaymentCardResource;
use App\Models\UserPaymentCards;
use App\Http\Requests\StoreUserPaymentCardsRequest;
use App\Http\Requests\UpdateUserPaymentCardsRequest;
use App\Repositories\PaymentCardRepository;

class UserPaymentCardsController extends Controller
{
    public function __construct(
      protected PaymentCardRepository $paymentCardRepository
    ) {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->response(UserPaymentCardResource::collection(auth()->user()->paymentCards));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserPaymentCardsRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserPaymentCardsRequest $request)
    {
        $this->paymentCardRepository->savePaymentCard($request);

        return $this->success('card added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPaymentCards  $userPaymentCards
     * @return \Illuminate\Http\Response
     */
    public function show(UserPaymentCards $userPaymentCards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPaymentCards  $userPaymentCards
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPaymentCards $userPaymentCards)
    {
        //
    }
}
