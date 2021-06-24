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