<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class UpdatePostion extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $material = Material::find($request->material_id);
        $material->position = $request->position;
        $material->save();
        return response()->json(['success' => 'Position updated successfully!']);
    }
}
