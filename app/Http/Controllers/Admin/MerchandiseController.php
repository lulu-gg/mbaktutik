<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CustomHelpers;
use App\Helpers\RoleHelpers;
use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\MerchandiseCategory;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchandiseController extends Controller
{
    protected $HOME_URL = 'dashboard/merchandise';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Merchandise::with(['merchandiseCategory', 'organizer']);

        $data = RoleHelpers::isAdmin() ? $query->get() : $query->where(['organizer_id' => Auth::user()->organizer->id])->get();

        return view('admin.merchandise.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = MerchandiseCategory::all();
        $statuses = ['Available', 'Out of Stock'];
        return view('admin.merchandise.create', [
            'categories' => $categories,
            'statuses' => $statuses,
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
        $validatedData = $request->validate(Merchandise::$rules);

        $thumbnail = CustomHelpers::simpleFileUpload(requestFile: $request->thumbnail, path: Merchandise::$FILE_PATH);
        $image = CustomHelpers::simpleFileUpload(requestFile: $request->image, path: Merchandise::$FILE_PATH);

        $merchandise = Merchandise::create([
            ...$validatedData,
            'thumbnail' => $thumbnail,
            'image' => $image,
            'organizer_id' => RoleHelpers::isAdmin() ? Organizer::getInternalOrganizerId() : Auth::user()->organizer->id,
        ]);

        noty('Berhasil Simpan Data', 'info');

        return redirect($this->HOME_URL . "/" . $merchandise->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function show(Merchandise $merchandise)
    {
        $merchandise = Merchandise::with(['merchandiseCategory', 'organizer'])->findOrFail($merchandise->id);
        return view('admin.merchandise.show', ['data' => $merchandise]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchandise $merchandise)
    {
        $categories = MerchandiseCategory::all();
        $statuses = ['Available', 'Out of Stock']; // Atau ambil dari enum jika ada
        
        return view('admin.merchandise.edit', [
            'data' => $merchandise,
            'categories' => $categories,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchandise $merchandise)
    {
        $request->validate(Merchandise::$rules_update);

        $merchandise->update([...$request->except(['thumbnail', 'image'])]);

        if ($request->hasFile('thumbnail')) {
            $uploadedImage = CustomHelpers::simpleFileUpload(requestFile: $request->thumbnail, path: Merchandise::$FILE_PATH, oldPath: $merchandise->thumbnail);
            $merchandise->update(['thumbnail' => $uploadedImage]);
        }

        if ($request->hasFile('image')) {
            $uploadedImage = CustomHelpers::simpleFileUpload(requestFile: $request->image, path: Merchandise::$FILE_PATH, oldPath: $merchandise->image);
            $merchandise->update(['image' => $uploadedImage]);
        }

        noty('Berhasil Edit Data', 'info');

        return redirect($this->HOME_URL . "/" . $merchandise->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchandise  $merchandise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchandise $merchandise)
    {
        try {
            $merchandise->delete();
            noty('Berhasil Hapus Data', 'info');
        } catch (\Exception $e) {
            noty('Gagal Hapus Data', 'error');
        }

        return redirect($this->HOME_URL);
    }

    public function report(Merchandise $merchandise)
    {
        $data = Merchandise::all(); // Sesuaikan dengan data yang diperlukan untuk report
        return view('admin.merchandise.report', [
            'data' => $data
        ]);
    }
}
