<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $item_id = Item::pluck('id')->toArray();
        $user_id = User::pluck('id')->toArray();
        return [
            "item_id" =>  1,
            // "item_id" =>  $item_id[array_rand($item_id)],
            "code" => "SU-00000001",
            "item_id" => "2",
            "country" => "BD",
            "address_1" => "Khilkhet",
            "address_2" => "Khilkhet",
            "city" => "Dhaka",
            "state" => "Dhaka",
            "zone" => "Uttara",
            "zip_code" => "1210",
            "lat" => 23.830646510005334,
            "lng" => 90.42397062039595,
            "type" => "offer",
            "added_by" =>  1,
        ];
    }
}
