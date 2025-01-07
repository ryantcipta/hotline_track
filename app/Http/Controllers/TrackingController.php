<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TrackingController extends Controller
{
    public function index (Request $request )
    {
        // Ambil parameter 'search' dari request
    $search = $request->input('search');

    // Jika ada input search, cari berdasarkan 'no_pop_hotline'
    if ($search) {
        $order = Order::whereRaw("TRIM(no_pop_hotline) = ?", [$search])->get();
    } else {
        $order = collect(); // Kosongkan koleksi jika tidak ada pencarian
    }

    // Kembalikan view dengan hasil pencarian dan parameter 'search'
    return view('home.tracking', compact('order', 'search'));
    }


    // public function show(string $id): View{

    //     //get post order by id
    //     $order = Order::findOrFail($id);

    //     return view('home.tracking', compact('order'));
    // }

    

    // public function showTracking()
    // {
    //     // Ambil data dari database
    //     $order = Order::all();

    //     // Tambahkan 3 hari pada tgl_gi_supply_md untuk setiap item
    //     // foreach ($orders as $item) {
    //     //     $item->tgl_kirim_ke_dealer = Carbon::parse($item->tgl_gi_supply_md)->addDays(3)->format('d-m-Y'); // Format bisa disesuaikan
    //     // }

    //     return view('home.tracking', compact('order'));
    // }
}
