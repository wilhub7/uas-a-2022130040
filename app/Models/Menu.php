<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $primaryKey= 'id';
public $incrementing= false;
    protected $fillable = [
        'id',

        'nama',
        'rekomendasi',
        'harga',


    ];
public function orders(){
    return $this->belongsToMany(Order::class)->withPivot('quantity');
}

//     public function __invoke(Request $request)
//     {
//         //Ambil data artikel diurutkan berdasarkan tanggal terbaru. lalu tampilkan 7 artikel per halaman
//         $menus = Menu::query()->latest()->paginate(7);
//         return view('landing', compact('menus'));
//     }
 }
