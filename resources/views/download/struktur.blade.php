@extends('download.template')
@section('table-head')
    <th>No</th>
    <th>Nama Pengurus</th>
    <th>Jabatan</th>
    <th>Status</th>
@endsection
@section('table-body')
    @php
        $i = 1;
    @endphp
    @foreach ($data->struktur as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->nama_pengurus }}</td>
            <td>{{ $item->jabatan }}</td>
            <td>Aktif</td>
        </tr>
    @endforeach
@endsection
