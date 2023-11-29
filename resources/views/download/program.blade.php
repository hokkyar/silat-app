@extends('download.template')
@section('table-head')
    <th>No</th>
    <th>Jenis</th>
    <th>Nama Program</th>
    <th>Tanggal</th>
    <th>Lokasi</th>
@endsection
@section('table-body')
    @php
        $i = 1;
    @endphp
    @foreach ($data->program as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ Str::title($item->jenis) }}</td>
            <td>{{ $item->nama_program }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->lokasi }}</td>
        </tr>
    @endforeach
@endsection
