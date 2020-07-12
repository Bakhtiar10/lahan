<table class='table table-bordered' style="width:100%">
    <thead>
        <tr align="center" bgcolor="yellow">
            <th>No</th>
            <th>Email</th>
            <th>Judul Lahan</th>
            <th>Luas Lahan</th>
            <th>Jenis Lahan</th>
            <th>Sertifikat</th>
            <th>Harga Lahan</th>
            <th>No Hp</th>
        </tr>
    </thead>

    <tbody>
        @php $no = 1; @endphp
        @foreach($sold_out as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->penjual->email }}</td>
            <td>{{ $data->judul_lahan }}</td>
            <td>{{ $data->luas_lahan }}</td>
            <td>{{ $data->jenis_lahan }}</td>
            <td>{{ $data->sertifikat }}</td>
            <td>{{ $data->harga_lahan }}</td>
            <td>{{ $data->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>