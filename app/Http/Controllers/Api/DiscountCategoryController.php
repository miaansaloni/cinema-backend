<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DiscountCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscountCategoryRequest;
use App\Http\Requests\UpdateDiscountCategoryRequest;

class DiscountCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discountCategories = DiscountCategory::all();
        return response()->json($discountCategories);
    }

    /**
     * Display the specified resource.
     */
    public function show(DiscountCategory $discount_category)
    {
         return response()->json($discount_category);
    }

}
