<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Item;
use App\Models\Location;
use App\Models\MasterFile;
use App\Models\Product;
use App\Models\SlaveFile;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        Item::factory(1)->create()->each(function ($item) {
            // Seed the relation with one address
            $location =Location::factory()->make();
            $item->locations()->save($location);

            // Seed the relation with 5 purchases
            $prodcuct = Product::factory()->make();
            $item->product()->save($prodcuct);
        
        
            // Seed the relation with 5 purchases
            $masterfile = MasterFile::factory()->make();
            $item->files()->save($masterfile);

            // Seed the relation with 5 purchases
            $slavefile = SlaveFile::factory()->make();
            $masterfile->file()->save($slavefile);



            

        });

        Product::factory()->create()->each(function ($product) {
            // Seed the relation with one address
            $category =Category::factory()->make();
            $product->category()->save($category);

            // Seed the relation with 5 purchases
            $subcategory = SubCategory::factory()->make();
            $product->subcategory()->save($subcategory);

            

        });


    //     Item::factory()
    // ->count(1)
    // ->has(Location::factory()->count(1), 'locations')
    // ->create();


        // Item::factory(1)->create()->each(function ($item) {
        //     $item->locations()->saveMany(Location::factory())->make(1);
        // });

        // Item::factory(1)
        //     ->has(Location::factory(1)
        //     ->has(Product::factory(1)
        //     ->has(Category::factory(1)
        //     ->has(SubCategory::factory(1)
        //     ->has(MasterFile::factory(1)
        //     ->has(SlaveFile::factory(1))))))
        // )->create();

        
        // ! user create factory 
        // \App\Models\User::factory(1)->create();

        // ! item create factory
        // \App\Models\Item::factory(1)->create();

        // ! Product create factory
        // \App\Models\Product::factory(1)->create();


        //! Locaiton create factory
        // \App\Models\Location::factory(1)->create();

        //!  master file create factory
        // \App\Models\MasterFile::factory(1)->create();

        // ! slave file create factory
        // \App\Models\SlaveFile::factory(1)->create();

        //  ! category file create factory
        // \App\Models\Category::factory(1)->create();

        // ! sub category create factory
        // \App\Models\SubCategory::factory(1)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
