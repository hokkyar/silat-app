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

<table>
    <thead>
        <tr>
            @yield('table-head')
        </tr>
    </thead>
    <tbody>
        @yield('table-body')
    </tbody>
</table>
