<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralParamter;
use Illuminate\Http\Request;

class GeneralParameterController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.general-parameter.edit', [
            'data' => GeneralParamter::first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate(GeneralParamter::$rules);
        GeneralParamter::first()->update($request->all());

        noty('Berhasil Simpan Data', 'info');

        return redirect("/admin/general-parameter");
    }
}
