<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\MaterialCollection;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MaterialResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Product;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return MaterialResource
     */
    public function index()
    {
        return MaterialResource::collection(Material::all());
    }
    /**
     * Getting list of available materials for product.
     *
     * @return MaterialCollection
     */
    public function getMaterials(Request $request)
    {
        $request->validate([
            'data' => 'required|array',
            'data.*.product_id' => 'required|exists:products,id',
            'data.*.quantity'   => 'required|numeric|gt:0'
        ]);
        $products_array = [];
        foreach ($request->data as $product)
        {
            $products_array[] = $product['product_id'];
        }
        $result = collect($request->data);
        $result->push('lsdkfj');

//        $result = $result->pluck(['production_id', 'quantity']);
//        $result = $result->map(function ($product){
//
//            return $product['quantity'];
//        });
//        return $result;


//        return $request->data;
        return new ProductCollection(Product::with('materials')->whereIn('id', $products_array)->get());
//        return ProductResource::collection(Product::all());




//        return DB::table('product_materials')
//            ->join('warehouses', 'product_materials.material_id', '=', 'warehouses.material_id')
//            ->join('products', 'product_materials.product_id', '=', 'products.id')
//            ->join('materials', 'product_materials.material_id', '=', 'materials.id')
//            ->select('product_materials.id', 'products.name', 'materials.name', 'product_materials.quantity')
//            ->get()
//            ->reject(function ($result){
//                return $result->name == 'Ip';
//            })
//            ->map(function($result){
//                return $result->name;
//            })
//            ->groupBy(function($result){
//                return $result->name;
//            })
//            ;
    }
}
