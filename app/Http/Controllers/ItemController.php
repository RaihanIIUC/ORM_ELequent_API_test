<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\LocationStoreRequest;
use App\Http\Requests\MasterFileReqeust;
use App\Http\Requests\ProductValidationRequest;
use App\Http\Requests\SlaveFileReqeust;
use App\Http\Requests\Sub_CategoryRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Location;
use App\Models\MasterFile;
use App\Models\Product;
use App\Models\SlaveFile;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function ItemStore(ItemStoreRequest $request)
    {

        Item::create([
            "item_type" => $request->item_type,
            'tradeable' => $request->tradeable,
            "user_id" => auth()->user()->id
        ]);
        return $request->toArray();
    }

    public function LocationStore(LocationStoreRequest $request)
    {

        $loc = Location::create([
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
            "added_by" => \auth()->user()->id
        ]);
    }

    public function show()
    {

        return  Item::with(['added_by','locations', 'product', 'product.category', 'product.subcategory', 'files', 'files.file'])->get();
        // return  Item::with(['locations','product','product.category','product.subcategory'])->get();
        // return  Item::find(1)->product;
        // return  Item::find(1)->locations->toArray();
        // return  Item::find(2)->location->user->toArray();
        // return  Item::find(2)->user->toArray();

    }


    public function productStore(ProductValidationRequest $request)
    {
        $products = Product::create([
            "item_id" => $request->item_id,
            "title" => $request->title,
            "negotiable" => $request->negotiable,
            "price" => $request->price,
            "condition" => $request->condition,
            "description" => $request->description,
            "min_quantity" => $request->min_quantity,
            "validity" => Carbon::parse($request->validity),
                ]);

        return response()->json(['message' => 'Product created successfully!', 'statusCode' => 201], Response::HTTP_CREATED);
    }

    public function categoryStore(CategoryRequest $request)
    {

        Category::create($request->all());
        return response()->json(['message' => 'Category created successfully!', 'statusCode' => 201], Response::HTTP_CREATED);
    }

    public function Sub_categoryStore(Sub_CategoryRequest $request)
    {

        SubCategory::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active
        ]);
        return response()->json(['message' => 'Category created successfully!', 'statusCode' => 201], Response::HTTP_CREATED);
    }


    public function MasterFileStore(MasterFileReqeust $request)
    {
        MasterFile::create($request->all());

        return   response()->json(['message' => 'File created successfully!', 'statusCode' => 201])
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

    public function  SlaveFileStore(SlaveFileReqeust $request)
    {

        $request->file('file')->getSize(); // in bytes

        $file = $request->file('file');

        // Generate a file name with extension
        $fileName = 'hqdefault_' . date("Ymd") . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Save the file
        $path = $file->storeAs('files', $fileName);

        SlaveFile::create([
            'name' => $request->name,
            'master_file_id' => $request->master_file_id,
            'description' => $request->description,
            'file' => url($path),
            'extension' => $file->getClientOriginalExtension(),
            'size' => $request->file('file')->getSize(),
        ]);

        return   response()->json([
            $request->file('file')->getSize(), 'message' => 'slave File created successfully!', 'statusCode' => 201
        ])
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }
}
