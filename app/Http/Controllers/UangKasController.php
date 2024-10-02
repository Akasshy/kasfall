<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class UangKasController extends Controller
{
    function dashboard(){
        // Pemasukan
        $data['total_pemasukan'] = Pemasukan::sum('jumlah_pemasukan');
        // $pemasukan = Pemasukan::all();
        // $data['total_user'] = $pemasukan->unique('id')->count();

        // Pengeluaran
        $data['total_pengeluaran'] = Pengeluaran::sum('jumlah_pengeluaran');

        // $pengeluaran = Pengeluaran::all();
        // $data['total'] = $pengeluaran->unique('id')->count();

        // Siswa
        $siswa = Siswa::all();
        $data['total_siswa'] = $siswa->unique('id')->count();
        
        return view('dashboard', $data);
    }
    //
    function index(){
        $data['pemasukan'] = Pemasukan::all();
        $data['pengeluaran'] = Pengeluaran::all();
        $data['pemasukan'] = Pemasukan::orderBy('tanggal_pemasukan', 'desc')->get();    
        // $id = Siswa::find('id',$request->id);  
        // $pemasukan = Siswa::with('siswa:id,nama')->find($id);
        // $data = $pemasukan->siswa->nama;

        return view('pemasukan', $data);
    }

    function search(Request $req){
        // $data['pemasukan'] = Siswa::where('siswas.nama', 'LIKE', '%'.$req->cari.'%')
        // ->join('pemasukans', 'pemasukans.id_siswa', '=', 'siswas.id')->select('pemasukans', 'siswas')->get();
        // $data['pemasukan'] = Siswa::where('nama','LIKE', '%'.$req->cari.'%')->get();

        $nama = $req->input('nama');
        $jumlah =  $req->input('jumlah_pemasukan');

        $data['pemasukan'] = Pemasukan::join('siswas', 'nama', '=', 'pemasukans.jumlah_pemasukan')
        ->where('siswas.nama', 'LIKE', '%'.$nama.'%')
        ->orWhere('pemasukans.jumlah_pemasukan', '%'.$jumlah.'%')
        ->get();
        return view('pemasukan', $data);
    }

    function caritanggal(Request $request){

        $this->validate($request, [
            'tanggal_awal' => 'required|date|before_or_equal:tanggal_akhir',
            'tanggal_akhir' => 'required|date|before_or_equal:tanggal_awal',
        ]);

        $tanggalawal = $request->input('tanggal_awal');
        $tanggalakhir = $request->input('tanggal_akhir');

        
        $data['pemasukan'] = Pemasukan::whereBetween('tanggal', [$tanggalawal, $tanggalakhir])->get();

        return view('pemasukan', $data);
    }

    function createpemasukan(){
        $data['siswa'] = Siswa::all();
        $data['pemasukan'] = Siswa::all();
        return view('create-pemasukan',$data);
    }

    function addpemasukan(Request $request){
        $request->validate([
            'id_siswa' => 'required',
            'jumlah_pemasukan' => 'required|numeric',
            'tanggal_pemasukan' => 'required|date'
        ]);

        $pemasukan = new Pemasukan();
        $pemasukan->id_siswa = $request->input('id_siswa');
        $pemasukan->jumlah_pemasukan = $request->input('jumlah_pemasukan');
        $pemasukan->tanggal_pemasukan = $request->input('tanggal_pemasukan');

        $pemasukan->save();

        return redirect('/pemasukan')->with('Sukses', 'Pemasukan Berhasil ditambahkan');
    }

    function updatepemasukan(Request $request){
        $data['pemasukan'] = Pemasukan::find($request->id);
        $data['siswa'] = Siswa::find($request->id);
        return view('update-pemasukan', $data);
    }

    function editpemasukan(Request $request, $id)
    {
        $pemasukan = Pemasukan::find($id);

        if (!$pemasukan) {
            return redirect('/pemasukan')->withErrors(['pemasukan_id' => 'Pemasukan Not Found']);
        }

        $pemasukan->jumlah_pemasukan =$request->jumlah_pemasukan;
        $pemasukan->tanggal_pemasukan =$request->tanggal_pemasukan;
        $pemasukan->save();

        return redirect('/pemasukan')->with('Sukses', 'Pemasukan Berhasil Diubah');

    }

    function deletepemasukan(Request $request){
        $pemasukan = Pemasukan::find($request->id);
        $delete = Pemasukan::where('id', $request->id)->delete();
        $total_pemasukan = Pemasukan::sum('jumlah_pemasukan');

        if ($pemasukan->delete()) {
            $new_total_pemasukan = $total_pemasukan - $pemasukan->jumlah_pemasukan;
            session()->flash('Sukses', 'Pemasukan Berhasil dihapus!');
            return redirect('/pemasukan')->with('total_pemasukan', $new_total_pemasukan);
        }else {
            session()->flash('Error', 'Gagal Menghapus Pemasukan');
            return redirect('/pemasukan');
        }
    }

    function createpengeluaran(){
        return view('create-pengeluaran');
    }

    // function addpengeluaran(Request $request)
    // {
    //     $pengeluaran = new Pengeluaran();
    //     $pengeluaran->nama_siswa = $request->input('nama_siswa');
    //     $pengeluaran->nama_pengeluaran = $request->input('nama_pengeluaran');
    //     $pengeluaran->jumlah_pengeluaran = $request->input('jumlah_pengeluaran');
    //     $pengeluaran->tanggal_pengeluaran = $request->input('tanggal_pengeluaran');
    //     $pengeluaran->pemasukan_id = $request->input('pemasukan_id');

    //     $total_pemasukan = Pemasukan::find($pengeluaran->pemasukan_id)->total_pemasukan;
        
    //     if ($pengeluaran->save()) {
    //         $new_total_pemasukan = $total_pemasukan - $pengeluaran->jumlah_pengeluaran;
    //         Pemasukan::where('id', $pengeluaran->pemasukan_id)->update(['total_pemasukan' => $new_total_pemasukan]);
    //         session()->flash('Sukses', 'Pengeluaran Berhasil ');
    //         return redirect('/pemasukan');
    //     }else{
    //         session()->flash('Gagal', 'Gagal Menambahkan ');
    //         return redirect('/pemasukan');
    //     }
    // }


}