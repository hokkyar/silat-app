<style>
    * {
        font-family: Arial, sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

<h2 style="text-align: center; margin: 28px 0;">{{ $title }} <br> <span style="color: rgb(76, 43, 226);">Cabang
        Olahraga {{ $data->nama_cabor }}</span>
</h2>

<h3 style="color: rgb(76, 43, 226);">Data Pelatih</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tempat/Tgl Lahir</th>
            <th>Nomor Sertifikasi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($pelatih as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    {{ $item->tempat_lahir . ', ' . $item->tanggal_lahir }}
                </td>
                <td>{{ $item->nomor_sertifikasi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3 style="color: rgb(76, 43, 226);">Data Atlet</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tempat, Tgl Lahir</th>
            <th>Sekolah/PT</th>
            <th>Nomor KTA</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($atlet as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->nama }}</td>
                <td> {{ $item->tempat_lahir . ', ' . $item->tanggal_lahir }}</td>
                <td>{{ Str::title($item->sekolah_pt) }}</td>
                <td>{{ $item->nomor_kta }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
