<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscountCategory;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'discount_percentage' => 'required|numeric|between:0,100',
            'condition' => 'required',
        ]);

        $discountCategory = DiscountCategory::create($request->all());

        return response()->json($discountCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(DiscountCategory $discount_category)
    {
         return response()->json($discount_category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiscountCategory $discount_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountCategoryRequest $request, DiscountCategory $discount_category)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'discount_percentage' => 'required|numeric|between:0,100',
            'condition' => 'required',
        ]);

        $discount_category->update($request->all());

        return response()->json($discount_category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiscountCategory $discount_category)
    {
        $discount_category->delete();
        return response()->json(null, 204);
    }
}
