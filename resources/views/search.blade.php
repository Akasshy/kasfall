<h1>Result</h1>
@foreach ($pemasukan as $key => $item)
    <li>
        {{$item->siswa->nama}} {{$item->jumlah_pemasukan}}
    </li>
@endforeach