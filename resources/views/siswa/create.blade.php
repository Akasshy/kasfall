@extends('/template/sinav')
@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-light fw-bold" style="background-color: blueviolet">Tambah Siswa</div>
                    <div class="card-body">
                        <form action="/siswa/create" method="post">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Siswa</label>
                                <div class="col-md-6">
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                                <div class="col-md-6">
                                    <input type="text" name="alamat" id="alamat" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="nohp" class="col-md-4 col-form-label text-md-right">No Handphone</label>
                                <div class="col-md-6">
                                    <input type="text" name="nohp" id="nohp" class="form-control" required>
                                </div>
                            </div>

                            

                            <div class="form-group row ">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn col-md-12 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Tambah Siswa
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