@extends('/template/sinav')
@section('content')
        
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200" style="font-family: Verdana, Geneva, Tahoma, sans-serif"
            >
              Tabel Pengeluaran
          </h2>
            <div class="flex items-center justify-start mb-3 mt-3">
              <a
              href="/create-pengeluaran"
              class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mb-3" style="width: 300px"
              >
              Tambah Pengeluaran
              <span class="ml-2 fs-6" aria-hidden="true">+</span>
              </a>

              <form action="/pemasukan" method="post">
                @csrf
                <input
                name="cari"
                class=" mt-1 pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                type="text"
                id="nama_siswa"
                placeholder="Cari berdasarkan Nama"
                aria-label="Search"
                style=" width: 485px; margin-left: 200px"
                />
                <button class="btn text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple " style="height: 40px;">Cari</button>

              </form>

              
            </div>
            @if (session()->has('Sukses'))
            <div class="alert alert-success" style="width: 100%">
                {{ session()->get('Sukses') }}
            </div>
          @endif

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                  <table class="w-full whitespace-no-wrap">
                    <thead>
                      <tr
                        class="tracking-wide text-left text-gray-500  border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif"
                      >
                        <th class="px-4 py-3">No</th>
                         
                        <th class="px-4 py-3">Nama Siswa</th>
                        {{-- <th class="px-4 py-3">Nama Pengeluaran</th> --}}
                        <th class="px-4 py-3">Jumlah (Rp)</th>
                        {{-- <th class="px-4 py-3">Status</th> --}}
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif"> 
                      @foreach ($pengeluaran as $key => $item)
                          
                      <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">{{$key+1}}</td>
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                          
                            <div>
                              <p class="font-semibold fs-7 ps-4" >{{$item->siswa->nama}}</p>
                            </div>
                          </div>
                        </td>

                        {{-- <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                              <!-- Avatar with inset shadow -->
                            
                              <div>
                                <p class="font-semibold fs-7" >{{$item->nama_pengeluaran}} {{$item->nama_siswa}}</p>
                              </div>
                            </div>
                          </td> --}}

                        <td class="px-4 py-3 fs-7">
                          Rp. {{$item->jumlah_pengeluaran}}
                        </td>
                        {{-- <td class="px-4 py-3 text-xs">
                          <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                          >
                            Masuk
                          </span>
                        </td> --}}
                        <td class="px-4 py-3 fs-7">
                          {{$item->tanggal_pengeluaran}}
                        </td>
                        <td class="px-4 py-3">
                          <div class="flex items-center space-x-4 text-sm">
                            {{-- <a href="/update-pengeluaran/{{$item->id}}"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Edit"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                ></path>
                              </svg>
                            </a> --}}
                            <a href="/pengeluaran/delete/{{$item->id}}"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Delete"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </a>
                          </div>
                        </td>
                      </tr>
  
                      {{-- <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                          <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            
                            <div>
                              <p class="font-semibold">Who</p>
                             
                            </div>
                          </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                          Rp.5.000
                        </td>
                        <td class="px-4 py-3 text-xs">
                          <span
                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"
                          >
                            Keluar
                          </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                          6/10/2020
                        </td>
                        <td class="px-4 py-3">
                          <div class="flex items-center space-x-4 text-sm">
                            <a
                              href="/"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Edit"
                            >
                              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                ></path>
                              </svg>
                            </a>

                            <a href="/" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"aria-label="Delete">
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </a>

                          </div>
                        </td>
                      </tr>   --}}

                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </main>
@endsection
 
