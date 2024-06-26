<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MerchandiseCategory;
use Illuminate\Http\Request;

class MerchandiseCategoryController extends Controller
{
    public function index()
    {
        // Mengambil semua data kategori merchandise
        $categories = MerchandiseCategory::all();
        return view('admin.merchandise-category.index', compact('categories'));
    }

    public function create()
    {
        // Menampilkan halaman untuk membuat kategori merchandise baru
        return view('admin.merchandise-category.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Membuat kategori merchandise baru dengan data yang valid
        MerchandiseCategory::create($request->all());

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('admin.merchandise-category.index')->with('success', 'Kategori merchandise berhasil dibuat.');
    }

    public function edit($id)
    {
        // Mengambil data kategori merchandise berdasarkan ID
        $data = MerchandiseCategory::findOrFail($id);
        return view('admin.merchandise-category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Mengambil data kategori merchandise berdasarkan ID
        $category = MerchandiseCategory::findOrFail($id);
        
        // Update data kategori merchandise
        $category->update($request->all());

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('admin.merchandise-category.index')->with('success', 'Kategori merchandise berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Mengambil data kategori merchandise berdasarkan ID
        $category = MerchandiseCategory::findOrFail($id);

        // Menghapus data kategori merchandise
        $category->delete();

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('admin.merchandise-category.index')->with('success', 'Kategori merchandise berhasil dihapus.');
    }
}
