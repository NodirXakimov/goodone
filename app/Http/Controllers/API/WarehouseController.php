<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Material::all();
    }
    /**
     * Getting list of available materials for product.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMaterials(Request $request)
    {
        return Material::findOrFail(1);
    }
}
