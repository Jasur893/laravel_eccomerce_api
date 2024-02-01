<?php

namespace App\Repositories;

use App\Models\Stock;

class StockRepository extends Repository
{
    /**
     * @param array $products
     *
     * @return void
     */
    public function subtractFromStock(array $products): void
    {
        foreach ($products as $product) {
            $stock = Stock::find($product['inventory'][0]['id']);
            $stock->quantity -= $product['order_quantity'];
            $stock->save();
        }
    }
}
