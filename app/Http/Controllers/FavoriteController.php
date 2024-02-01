<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\JsonResponse;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return auth()->user()->favorites()->paginate(20);
    }

    public function store(Request $request): JsonResponse
    {
        auth()->user()->favorites()->attach($request->product_id);

        return response()->json([
            'success' => true
        ]);
    }

    /*
     *  Todo refactor response. make standart format
     * */
    public function destroy($favorite_id): JsonResponse
    {
        if (auth()->user()->hasfavorite($favorite_id)){
            auth()->user()->favorites()->detach($favorite_id);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Favorite does not exsist in this user']);
    }
}
