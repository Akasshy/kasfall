@extends('/template/sinav')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Pemasukan</div>
                    <div class="card-body">
                        <form action="/update-pengeluaran/{{$pengeluaran->id}}" method="post">
                            @csrf

                            <div class="form-group row mb-3"> 
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Siswa</label>
                                 <div class="col-md-6">
                                    {{-- <select id="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror" name="id_siswa" required>
                                        @foreach($siswa as $key => $item)
                                            <option value="{{ $pemasukan->id_siswa }}">{{ $pemasukan->siswa->nama }} </option>
                                        @endforeach

                                    </select> --}}
                                    <input class="form-control"  type="text" name="id_siswa" value="{{$pengeluaran->siswa->nama}}" disabled>
    
                                    @error('id_siswa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama_pengeluaran" class="col-md-4 col-form-label text-md-right">Nama Pengeluaran</label>
                                <div class="col-md-6">
                                    <input type="text" name="nama_pengeluaran" id="nama_pengeluaran" class="form-control" value="{{$pengeluaran->nama_pengeluaran}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jumlah_pengeluaran" class="col-md-4 col-form-label text-md-right">Jumlah Pengeluaran</label>
                                <div class="col-md-6">
                                    <input type="number" name="jumlah_pengeluaran" id="jumlah_pengeluaran" class="form-control" value="{{$pengeluaran->jumlah_pengeluaran}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tanggal_pengeluaran" class="col-md-4 col-form-label text-md-right">Tanggal Pengeluaran</label>
                                <div class="col-md-6">
                                    <input type="date" name="tanggal_pengeluaran" id="tanggal_pengeluaran" class="form-control" value="{{$pengeluaran->tanggal_pengeluaran}}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Pemasukan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection