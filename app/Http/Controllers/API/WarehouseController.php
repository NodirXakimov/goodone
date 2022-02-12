<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Material;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Material[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Material::all();
    }
    /**
     * Getting list of available materials for product.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getMaterials(Request $request)
    {
        return DB::table('product_materials')
//            ->join('warehouses', 'product_materials.material_id', '=', 'warehouses.material_id')
            ->join('products', 'product_materials.product_id', '=', 'products.id')
            ->join('materials', 'product_materials.material_id', '=', 'materials.id')
            ->select('product_materials.id', 'products.name', 'materials.name', 'product_materials.quantity')
            ->get()
//            ->reject(function ($result){
//                return $result->name == 'Ip';
//            })
//            ->map(function($result){
//                return $result->name;
//            })
            ->groupBy(function($result){
                return $result->name;
            })
            ;
    }
}
