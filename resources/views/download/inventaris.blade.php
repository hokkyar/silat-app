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

<h3 style="color: rgb(76, 43, 226);">Aset Habis Pakai</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jenis Barang</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($hp as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->jenis_barang }}</td>
                <td>{{ $item->harga_satuan }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->kondisi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3 style="color: rgb(76, 43, 226);">Aset Tidak Habis Pakai</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jenis Barang</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($thp as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->jenis_barang }}</td>
                <td>{{ $item->harga_satuan }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->kondisi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
