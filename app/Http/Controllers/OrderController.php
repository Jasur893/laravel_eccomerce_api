<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use App\Models\Stock;
use App\Models\UserAddress;
use App\Repositories\OrderRepository;
use App\Repositories\StockRepository;
use App\Services\OrderService;
use App\Services\ProductService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function __construct(
        protected OrderService $orderService,
        protected ProductService $productService
    ) {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Order::class, 'order');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        if (request()->has('status_id')) {
            return $this->response(
                OrderResource::collection(
                    auth()->user()->orders()->where(
                        'status_id',
                        request('status_id')
                    )->paginate(10)
                )
            );
        }

        return $this->response(
            OrderResource::collection(auth()->user()->orders()->paginate(10))
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreOrderRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        // O'zgaruvchilarni belgilash
        list(
            $sum, $products, $notFoundProducts, $address, $deliveryMethod
            )
            = $this->defineVariables($request);

        // Omborda product bor, yo'qligini tekshirish
        list(
            $sum, $products, $notFoundProducts
            )
            = $this->productService->checkForStock(
            $request['products'],
            $sum,
            $products,
            $notFoundProducts
        );

        // bor bo'lsa buyurtma yaratish
        if ($notFoundProducts === [] && $products !== [] && $sum !== 0) {
            $order = $this->orderService->saveOrder(
                $deliveryMethod,
                $sum,
                $request,
                $address,
                $products
            );
            return $this->success('order created', $order);
        }

        return $this->error(
            'some products not found or does not have in inventory',
            ['not_found_products' => $notFoundProducts]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order): JsonResponse
    {
        return $this->response(new OrderResource($order));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateOrderRequest $request
     * @param \App\Models\Order                     $order
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return 1;
    }

    /**
     * @param StoreOrderRequest $request
     *
     * @return array
     */
    public function defineVariables(StoreOrderRequest $request): array
    {
        $sum = 0;
        $products = [];
        $notFoundProducts = [];
        $address = UserAddress::find($request->address_id);
        $deliveryMethod = DeliveryMethod::findOrFail(
            $request->delivery_method_id
        );

        return array(
            $sum,
            $products,
            $notFoundProducts,
            $address,
            $deliveryMethod
        );
    }


}
