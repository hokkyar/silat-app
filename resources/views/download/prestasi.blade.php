@extends('download.template')
@section('table-head')
    <th>No</th>
    <th>Nama Kejuaraan</th>
    <th>Tanggal</th>
    <th>Prestasi</th>
    <th>Sertifikat</th>
@endsection
@section('table-body')
    @php
        $i = 1;
    @endphp
    @foreach ($data->prestasi as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->nama_kejuaraan }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->prestasi }}</td>
            <td>{{ $item->sertifikat }}</td>
        </tr>
    @endforeach
@endsection
