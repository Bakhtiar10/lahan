<table style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Judul</th>
            <th>Luas</th>
            <th>Jenis</th>
            <th>Sertifikat</th>
            <th>Harga</th>
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