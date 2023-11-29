@extends('download.template')
@section('table-head')
    <th>No</th>
    <th>Tanggal</th>
    <th>Jenis Barang</th>
    <th>Harga Satuan</th>
    <th>Jumlah</th>
    <th>Kondisi</th>
    <th>Jenis</th>
@endsection
@section('table-body')
    @php
        $i = 1;
    @endphp
    @foreach ($data->inventaris as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->jenis_barang }}</td>
            <td>{{ $item->harga_satuan }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->kondisi }}</td>
            <td>{{ $item->jenis_aset }}</td>
        </tr>
    @endforeach
@endsection
