<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::paginate(10);
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dump($request->all());
        $validated = $request->validate([
            'id' => 'required|string|min:3|max:255',
            'menu' => 'required|string',
        ]);

        $menu = Menu::create([
            'id' => $validated['id'],
            'menu' => $validated['menu'],
            'created_at' => $request->has('is_created') ? Carbon::now() : null,
            'updated_at' => $request->has('is_updated') ? Carbon::now() : null,

        ]);

        return redirect()->route('orders.index')->with('success', 'Orders added successfully.');;
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string',
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
        $order->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
        //     //Jika tidak ada gambar baru, gunakan gambar lama
        //     'published_at' => $request->has('is_published') ? Carbon::now() : null,
        //     'image' => $validated['image'] ?? $article->image,
        ]);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
