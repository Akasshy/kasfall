<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    function show(){
        $data['siswa'] = Siswa::all();
        return view('siswa/show', $data);
    }

    function search(Request $req){
        $data['siswa'] = Siswa::where('nama', 'LIKE', '%'.$req->cari.'%')->orwhere('alamat', 'LIKE','%'.$req->cari.'%')->get();

        return view('siswa/show', $data);
    }

    function create(){
        return view('siswa/create');
    }

    function add(Request $request){
        Siswa::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp
        ]);

        return redirect('siswa/show')->with('Sukses', 'Siswa Berhasil ditambahkan');
    }

    function update(Request $request){
        $data['siswa'] = Siswa::find($request->id);
        return view('siswa/update', $data);
    }

    function edit(Request $request){
        Siswa::where('id', $request->id)->update([
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,
            'nohp' =>$request->nohp
        ]);

        return redirect('/siswa/show')->with('Sukses', 'Siswa Berhasil Diubah');
    }

    function delete(Request $request){
        $siswa = Siswa::find($request->id);
        $delete = Siswa::where('id', $request->id)->delete();

        return redirect('siswa/show')->with('Sukses', 'Siswa Berhasil Dihapus');
    }
}
