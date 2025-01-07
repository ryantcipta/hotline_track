<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Imports\OrderImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\DB; 

class OrderController extends Controller
{
    public function index(Request $request)
	{
		
		if ($request->ajax()) {
			$data = Order::select('*');
			return DataTables::of($data)
				->addIndexColumn()
				->addColumn('aksi', function($row) {
					$editUrl = route('order.edit', $row->id); 
					$deleteUrl = route('order.destroy', $row->id); 
					
					return '
						<div style="display: flex; align-items: center; gap: 5px;">
							<a href="' . $editUrl . '">
								<i class="fa fa-pen-to-square" title="Edit" style="color: blue;"></i>
							</a>
							<button data-url="' . $deleteUrl . '" style="border: none; background: none; cursor: pointer;">
								<i class="fa fa-trash" title="Delete" style="color: red;"></i>
							</button>
						</div>
					';

				})
				->rawColumns(['aksi']) 
				->make(true);
		}
		
		return view('/order');
	}

		
		
	// 	return view ('order');
	// }


	// public function getOrders(Request $request)
	// {
	// 	if ($request->ajax()) {
	// 		//$datas = Product::all();
	// 		return datatables()->of(Order::all())->toJson();
	// 	}        
		
	
	// public function getOrders(Request $request)
	// {
	// 	if ($request->ajax()) {
	// 		//$datas = Product::all();
	// 		return datatables()->of(Order::all())->toJson();
	// 	}        
		
	// 	return view ('order');
	// }
 
    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
		
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_order di dalam folder public
		$file->move('file_order',$nama_file);
 
		// import data
		Excel::import(new OrderImport, public_path('/file_order/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data order berhasil diimport!');
 
		// alihkan halaman kembali
		return redirect('/order');
		
	}

	public function edit($id){

		$order = Order::findOrFail($id);
		return view ('orders.edit',compact('order'));

	}

	public function update(Request $request,$id){

		$request ->validate([
			'no_pop_hotline' => 'string|max:255',
			'tgl_order' => 'string|max:255',
			'no_po_md' => 'string|max:255',
			'tgl_proses_md' => 'string|max:255',
			'tgl_order_ke_ahm' => 'string|max:255',
			'etd_ahm' => 'string|max:255',
			'tgl_supply_ahm' => 'string|max:255',
			'tgl_gi_supply_md' => 'string|max:255',
			'no_po_ahm' => 'string|max:255',

		]);

		//cari data order berdasarkan id

		$order = Order::findOrFail($id);

		//update data lama dengan data baru

		$order -> update([
			'no_pop_hotline' => $request->input('no_pop_hotline'),
			'tgl_order' => $request->input('tgl_order'),
			'no_po_md' => $request->input('no_po_md'),
			'tgl_proses_md' => $request->input('tgl_proses_md'),
			'tgl_order_ke_ahm' => $request->input('tgl_order_ke_ahm'),
			'etd_ahm' => $request->input('etd_ahm'),
			'tgl_supply_ahm' => $request->input('tgl_supply_ahm'),
			'tgl_gi_supply_md' => $request->input('tgl_gi_supply_md'),
			'no_po_ahm' => $request->input('no_po_ahm'),
		]);

		//redirect ke halaman order dengan pesan sukses
		return redirect()->route('order')->with('sukses', 'Data order berhasil diupdate.');

	}

	// public function destroy(Order $id){
	// 	$id->delete();
	// 	return redirect()->route('order')->with('sukses','Data order berhasil dihapus.');
	// }


	public function destroy($id)
	{
		try {
			$order = Order::findOrFail($id);
			$order->delete();

			Log::info("Data dengan ID {$id} berhasil dihapus."); // Logging sukses
			return response()->json(['success' => 'Data berhasil dihapus.'], 200);
		} catch (\Exception $e) {
			Log::error("Error saat menghapus data ID {$id}: " . $e->getMessage()); // Logging error
			return response()->json(['error' => 'Terjadi kesalahan saat menghapus data.'], 500);
		}

		return redirect()->route('order')->with('sukses','Data order berhasil dihapus.');
	}


	public function deleteAll(){

		$data = Order::all();

		if($data -> isEmpty()){

			Session::flash('sukses','Tidak ada data yang dihapus.');
		} else{
			Order::truncate();
			Session::flash('sukses','Semua data berhasil dihapus');
		}

		return redirect()->route('order');
		
	}

	
}
