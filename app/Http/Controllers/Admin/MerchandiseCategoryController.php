<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MerchandiseCategory;
use Illuminate\Http\Request;

class MerchandiseCategoryController extends Controller
{
    public function index()
    {
        $categories = MerchandiseCategory::all();
        return view('admin.merchandise-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.merchandise-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        MerchandiseCategory::create($request->all());

        return redirect()->route('admin.merchandise-category.index')->with('success', 'Merchandise category created successfully.');
    }

    public function edit($id)
    {
        $data = MerchandiseCategory::findOrFail($id);
        return view('admin.merchandise-category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = MerchandiseCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.merchandise-category.index')->with('success', 'Merchandise category updated successfully.');
    }

    // Tambahkan method lainnya seperti destroy sesuai kebutuhan
}
