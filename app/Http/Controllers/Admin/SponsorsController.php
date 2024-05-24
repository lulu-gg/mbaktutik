<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CustomHelpers;
use App\Http\Controllers\Controller;
use App\Models\Sponsors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SponsorsController extends Controller
{
    protected $HOME_URL = 'dashboard/sponsors';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sponsors::all();
        return view('admin.sponsors.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rangeDisplayOrder = range(1, 100);
        $exceptDisplayOrder = Sponsors::pluck('display_order')->toArray();
        $availableDisplayOrder = array_filter($rangeDisplayOrder, fn ($value) => !in_array($value, $exceptDisplayOrder));

        return view('admin.sponsors.create', [
            'availableDisplayOrder' => $availableDisplayOrder
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Sponsors::$rules);

        $uploadedImage = CustomHelpers::simpleFileUpload(requestFile: $request->logo, path: Sponsors::$FILE_PATH);

        Sponsors::create([...$request->all(), 'logo' => $uploadedImage]);

        noty('Berhasil Simpan Data', 'info');

        return redirect($this->HOME_URL);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsors  $sponsors
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsors $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsors  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsors $sponsor)
    {
        $rangeDisplayOrder = range(1, 100);
        $exceptDisplayOrder = Sponsors::where('id', '!=', $sponsor->id)->pluck('display_order')->toArray();
        $availableDisplayOrder = array_filter($rangeDisplayOrder, fn ($value) => !in_array($value, $exceptDisplayOrder));

        return view('admin.sponsors.edit', ['data' => $sponsor, 'availableDisplayOrder' => $availableDisplayOrder]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsors  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsors $sponsor)
    {
        $request->validate(Sponsors::$rules_update);
        $sponsor->update($request->all());

        if ($request->hasFile('logo')) {
            $uploadedImage = CustomHelpers::simpleFileUpload(requestFile: $request->logo, path: Sponsors::$FILE_PATH, oldPath: $sponsor->logo);
            $sponsor->update([...$request->all(), 'logo' => $uploadedImage]);
        } else {
            $sponsor->update($request->except('logo'));
        }

        noty('Berhasil Edit Data', 'info');

        return redirect($this->HOME_URL);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsors  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsors $sponsor)
    {
        try {
            File::delete(public_path(Sponsors::$FILE_PATH . $sponsor->logo));
            $sponsor->delete();
            noty('Berhasil Hapus Data', 'info');
        } catch (\Exception $e) {
            noty('Gagal Hapus Data', 'error');
        }

        return redirect($this->HOME_URL);
    }
}
