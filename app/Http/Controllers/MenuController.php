<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         //$menus = Menu::all();
        $menus = Menu::paginate(10);
        return view('menus.index', compact('menus'));
        // return view('menus.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $validated = $request->validate([
            'id' => 'required|string|min:6|max:6',
            'nama' => 'required|string',
            'harga' => 'required|numeric',

        ]);

        $menu = Menu::create([
            'id' => $validated['id'],
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],

            'rekomendasi' => $request->has('is_rekomendasi') ? 1: 0,



        ]);

        return redirect()->route('menus.index')->with('success', 'Menus added successfully.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'id' => 'required|string|min:6|max:6',
            'nama' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        // // Simpan gambar jika ada
        // if ($request->hasFile('image')) {
        //     // Validasi gambar
        //     $request->validate([
        //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        //     // Upload gambar dan dapatkan path gambar yang diupload
        //     $imagePath = $request->file('image')->store('public/images');

        //     // Hapus gambar lama jika ada
        //     if ($article->image) {
        //         Storage::delete($article->image);
        //     }

        //     $validated['image'] = $imagePath;
        // }

        // Update artikel
        $menu->update([
            'id' => $validated['id'],
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'rekomendasi' => $request->has('is_rekomendasi') ? 1: 0,
        //     //Jika tidak ada gambar baru, gunakan gambar lama
        //     'published_at' => $request->has('is_published') ? Carbon::now() : null,
        //     'image' => $validated['image'] ?? $article->image,
        ]);
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');

    }
}
