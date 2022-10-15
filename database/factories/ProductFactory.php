<?php

namespace Database\Factories;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $item_id = Item::pluck('id')->toArray();
        return [
            "item_id" =>  1,
            // "item_id" =>  $item_id[array_rand($item_id)],
            "title" => "product 2",
            "negotiable" => false,
            "price" => '54.5',
            "condition" => "New",
            "description" =>"test description",
            "min_quantity" =>10,
            "validity" =>  Carbon::parse("6-10-2021 00:00:00")
        ];
    }
}
