<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function __invoke(Request $request)
    {
        //Ambil data artikel diurutkan berdasarkan tanggal terbaru. lalu tampilkan 7 artikel per halaman
        $orders = Menu::query()->latest()->paginate(7);
        return view('landing', compact('orders'));
    }
    public function menus(){
        return $this->belongsToMany(Order::class,'order_menu')->withPivot('quantity');
    }//nyambungin tabel antara menu dengan order menggunakan pivottable
}
