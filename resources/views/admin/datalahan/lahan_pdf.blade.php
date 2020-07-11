<!-- <table class='table table-bordered' style="width:100%">
    <thead>
        <tr align="center" bgcolor="yellow">
            <th>No</th>
            <th>Email</th>
            <th>Judul Lahan</th>
            <th>Luas Lahan</th>
            <th>Jenis Lahan</th>
            <th>Sertifikat</th>
            <th>Foto</th>
            <th>Harga Lahan</th>
            <th>No Hp</th>
        </tr>
    </thead>

    <tbody>
        @php $id = 1; @endphp
        @foreach($datalahan as $data)
        <tr>
            <td>{{ $id++ }}</td>
            <td>{{ $data->user->email }}</td>
            <td>{{ $data->judul_lahan }}</td>
            <td>{{ $data->luas_lahan }}</td>
            <td>{{ $data->jenis_lahan }}</td>
            <td>{{ $data->sertifikat }}</td>
            <td>
                <img src="{{ asset($data->foto) }}" alt="" width="50">
            </td>
            <td>{{ $data->harga_lahan }}</td>
            <td>{{ $data->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table> -->