<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategory = $_GET['subcategory'];
        $subCategory = Sub_Category::find($subCategory);
        return view(
            'admin.addnewmaterial',
            [
                'subCategory' => $subCategory
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newMaterial = new Material();
        $newMaterial->title = $request->title;
        $newMaterial->content = $request->content;
        $newMaterial->course_id = $request->course_id;
        $newMaterial->save();



        return redirect()->route('subcategories.edit', $request->course_id)->with('success', 'Material added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        Material::destroy($material->id);
        return redirect()->route('subcategories.edit', $material->course_id)->with('success', 'Material deleted successfully!');
    }
}
