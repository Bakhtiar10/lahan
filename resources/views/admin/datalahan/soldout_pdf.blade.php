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
        @foreach($sold_out as $so)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $so->penjual->email }}</td>
            <td>{{ $so->judul_lahan }}</td>
            <td>{{ $so->luas_lahan }}</td>
            <td>{{ $so->jenis_lahan }}</td>
            <td>{{ $so->sertifikat }}</td>
            <td>{{ $so->harga_lahan }}</td>
            <td>{{ $so->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>