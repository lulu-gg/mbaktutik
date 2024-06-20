<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchandise;
use App\Models\MerchandiseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerchandiseController extends Controller
{
    public function index()
    {
        $data = Merchandise::all();
        return view('admin.merchandise.index', compact('data'));
    }

    public function create()
    {
        $categories = MerchandiseCategory::all()->pluck('name', 'id');
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive']; // Sesuaikan dengan status yang Anda gunakan
        return view('admin.merchandise.create', compact('categories', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'merchandise_category_id' => 'required|exists:merchandise_categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'status' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'seo' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
        ]);

        $merchandise = new Merchandise($request->all());
        $merchandise->slug = Str::slug($request->name);
        $merchandise->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('merchandise_images', 'public');
                // Simpan path gambar ke dalam database atau relasi lain jika diperlukan
            }
        }

        return redirect()->route('merchandise.index')->with('success', 'Merchandise created successfully.');
    }

    // Tambahkan method lainnya seperti show, edit, update, destroy sesuai kebutuhan
}
