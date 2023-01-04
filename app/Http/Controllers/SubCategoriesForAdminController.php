<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use App\Models\Sub_Category;
use Illuminate\Http\Request;

class SubCategoriesForAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = Sub_Category::all();
        $categories = Category::all();
        foreach ($categories as $category) {
            $category->subCategories = Sub_Category::where('category_id', $category->id)->get();
        }

        return view(
            'admin.subcategoriesforadmin',
            [
                'subCategories' => $subCategories,
                'categories' => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subCategory = new Sub_Category();
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $subCategory->image = $imageName;
        } else {
            $subCategory->image = 'subCategorydefault.jpg';
        }
        $subCategory->save();
        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCategory = Sub_Category::find($id);
        $subCategory->category = Category::find($subCategory->category_id);
        $subCategory->materials = Material::where('course_id', $subCategory->id)->get();
        return view(
            'admin.editsubcategory',
            [
                'subCategory' => $subCategory
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
