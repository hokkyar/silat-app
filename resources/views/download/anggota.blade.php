@extends('download.template')
@section('table-head')
    <th>No</th>
    <th>Jenis</th>
    <th>Nama</th>
    <th>Tempat/Tgl Lahir</th>
    <th>Status</th>
@endsection
@section('table-body')
    @php
        $i = 1;
    @endphp
    @foreach ($data->anggota as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ Str::title($item->jenis) }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->tempat_lahir . ', ' . $item->tanggal_lahir }}</td>
            <td>Aktif</td>
        </tr>
    @endforeach
@endsection
