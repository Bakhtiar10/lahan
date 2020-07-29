<table class='table table-bordered' style="width:100%">
    <thead>
        <tr align="center" bgcolor="yellow">
        <th>No</th>
            <th>Tanggal Survei</th>
            <th>Waktu</th>
            <th>Nama Penyurvei</th>
            <th>No Hp</th>
            <th>Lokasi</th>
            <th>Judul Lahan</th>
            <th>Nama Penjual</th>
        </tr>
    </thead>

    @php $no = 1; @endphp
    @foreach($konfirmasi as $datas)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $datas->tanggal }}</td>
        <td>{{ $datas->waktu }}</td>
        <td>{{ $datas->pembeli->name }}</td>
        <td>{{ $datas->no_hp }}</td>
        <td>{{ $datas->lahan->alamat}}</td>
        <td>{{ $datas->lahan->judul_lahan}}</td>
        <td>{{ $datas->lahan->penjual->name }}</td>
    </tr>
        @endforeach
    </tbody>
</table>