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
        @foreach($lahan_jual as $jual)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $jual->user->email }}</td>
            <td>{{ $jual->judul_lahan }}</td>
            <td>{{ $jual->luas_lahan }}</td>
            <td>{{ $jual->jenis_lahan }}</td>
            <td>{{ $jual->sertifikat }}</td>
            <td>{{ $jual->harga_lahan }}</td>
            <td>{{ $jual->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>