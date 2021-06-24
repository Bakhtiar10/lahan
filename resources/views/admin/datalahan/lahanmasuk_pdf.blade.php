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
        @foreach($lahan_masuk as $masuk)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $masuk->user->email }}</td>
            <td>{{ $masuk->judul_lahan }}</td>
            <td>{{ $masuk->luas_lahan }}</td>
            <td>{{ $masuk->jenis_lahan }}</td>
            <td>{{ $masuk->sertifikat }}</td>
            <td>{{ $masuk->harga_lahan }}</td>
            <td>{{ $masuk->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>