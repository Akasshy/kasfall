<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    function show(){
        $data['pengeluaran'] = Pengeluaran::all();
        $data['pemasukan'] = Pemasukan::all();
        $data['pengeluaran'] = Pengeluaran::orderBy('tanggal_pengeluaran', 'asc')->get();

        return view('pengeluaran', $data);
    }

    function create(){
        $data['pemasukan'] = Pemasukan::all();
        
        return view('create-pengeluaran', $data);
    }

    function search(Request $req){
        $data['pengeluaran'] = Pengeluaran::where('tanggal_pengeluaran',$req->cari)->get();
        $data['pengeluaran'] = Pengeluaran::where('nama_pengeluaran', 'LIKE', '%'.$req->cari.'%')->get();

        return view('pengeluaran', $data);
    }

    function add(Request $req){
        // $req->validate([
        //     'nama_pengeluaran' => 'required',
        //     'pemasukan_id' => 'required',
        //     'jumlah_pengeluaran' => 'required|numeric',
        //     'tanggal_pengeluran' => 'required|date'
        // ]);

        
        $totalpemasukan = Pemasukan::sum('jumlah_pemasukan');
        if ($req->jumlah_pengeluaran > $totalpemasukan) {
        return back()->withErrors(['jumlah' => 'Jumlah Pengeluaran tidak boleh lebih dari total pemasukan siswa'])->withInput();
        }

        $pemasukan = Pemasukan::find($req->pemasukan_id);
        
        
        $pengeluaran = new Pengeluaran();
        // $pengeluaran->nama_pengeluaran = $req->nama_pengeluaran;
        $pengeluaran->pemasukan_id = $req->pemasukan_id;
        $pengeluaran->jumlah_pengeluaran = $req->jumlah_pengeluaran;
        $pengeluaran->tanggal_pengeluaran = $req->tanggal_pengeluaran;
        $pemasukan->jumlah_pemasukan -= $req->jumlah_pengeluaran;
        $pemasukan->save();
        $pengeluaran->save();

        
        session()->flash('Sukses', 'Pengeluaran Berhasil Ditambahkan !');
        
        return redirect('/pengeluaran');
    }

    function delete(Request $request, $id){
        $pengeluaran = Pengeluaran::find($id);
        $pemasukan = Pemasukan::find($pengeluaran->pemasukan_id);

        $pemasukan->jumlah_pemasukan += $pengeluaran->jumlah_pengeluaran;
        $pemasukan->save();

        $pengeluaran->delete();

        return redirect('/pengeluaran');
    }

    // function update(Request $request){
    //     $data['pemasukan'] = Pemasukan::find($request->id);
    //     $data['siswa'] = Siswa::find($request->id);
    //     $data['pengeluaran'] = Pengeluaran::find($request->id);
    //     return view('update-pengeluaran', $data);

    // }
    
    // In your PengeluaranController
    // public function edit(Request $request, $id)
    // {
    //     $pengeluaran = Pengeluaran::find($id);

    //     if (!$pengeluaran) {
    //         // If no expenditure with the same ID exists, return an error
    //         return back()->withErrors(['Pengeluaran tidak ditemukan']);
    //     }

    //     $lama_jumlah = $pengeluaran->jumlah;
    //     $baru_jumlah = $request->jumlah_pengeluaran;


    //     $pengeluaran->nama_pengeluaran = $request->nama_pengeluaran;
    //     $pengeluaran->jumlah_pengeluaran = $baru_jumlah;
    //     $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
    //     $pengeluaran->save();

    //     $total_pemasukan = Pemasukan::sum('jumlah_pemasukan');
    //     $pengeluaran->pemasukan->update([
    //         'total_pemasukan' => $total_pemasukan
    //     ]);
       

    //     return redirect('/pengeluaran');
    // }
}
