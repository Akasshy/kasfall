@extends('/template/sinav')
@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light fw-bold" style="background-color: blueviolet">Tambah Pemasukan</div>
                    <div class="card-body">
                        <form action="/create-pemasukan" method="post">
                            @csrf
                            <div class="form-group row mb-3"> 
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Siswa</label>
                                 <div class="col-md-6">
                                    <select id="id_siswa" class="form-control @error('id_siswa') is-invalid @enderror" name="id_siswa" required>
                                        @foreach($siswa as $key => $item)
                                            <option value="{{ $item->id }}"> {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="jumlah_pemasukan" class="col-md-4 col-form-label text-md-right">Jumlah Pemasukan</label>
                                <div class="col-md-6">
                                    <input type="number" name="jumlah_pemasukan" id="jumlah_pemasukan" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="tanggal_pemasukan" class="col-md-4 col-form-label text-md-right">Tanggal Pemasukan</label>
                                <div class="col-md-6">
                                    <input type="date" name="tanggal_pemasukan" id="tanggal_pemasukan" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn col-md-12 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Tambah Pemasukan
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