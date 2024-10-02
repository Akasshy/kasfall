@extends('/template/sinav')
@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light " style="background-color: blueviolet">Tambah Pengeluaran</div>
                    <div class="card-body">
                        <form action="/create-pengeluaran" method="post">
                            @csrf

                            <div class="form-group row mb-3">
                                <label for="pemasukan_id" class="col-md-4 col-form-label text-md-right">Pemasukan ID</label>

                                <div class="col-md-6">
                                    <select id="pemasukan_id" class="form-control @error('pemasukan_id') is-invalid @enderror" name="pemasukan_id" required>
                                        @foreach($pemasukan as $key => $item)
                                            <option value="{{ $item->id }}">{{ $item->siswa->nama }} ( Rp. {{$item->jumlah_pemasukan}} )</option>
                                        @endforeach
                                    </select>

                                    @error('pemasukan_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            {{-- <div class="form-group row mb-3">
                                <label for="nama_pengeluaran" class="col-md-4 col-form-label text-md-right">Nama Pengeluaran</label>
                                <div class="col-md-6">
                                    <input type="text" name="nama_pengeluaran" id="nama_pengeluaran" class="form-control" required>
                                </div>
                            </div> --}}
                            
                           

                            <div class="form-group row mb-3">
                                <label for="jumlah_pengeluaran" class="col-md-4 col-form-label text-md-right">Jumlah Pengeluaran</label>
                                <div class="col-md-6">
                                    <input type="number" name="jumlah_pengeluaran" id="jumlah_pengeluaran" class="form-control" required>
                                     @if ($errors->has('jumlah'))
                                        <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                                     @endif
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="tanggal_pengeluaran" class="col-md-4 col-form-label text-md-right">Tanggal Pengeluaran</label>
                                <div class="col-md-6">
                                    <input type="date" name="tanggal_pengeluaran" id="tanggal_pengeluaran" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn col-md-12 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Tambah Pengeluaran
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