<table style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Survei</th>
            <th>Waktu</th>
            <th>Nama Penyurvei</th>
            <th>No Hp Penyurvei</th>
            <th>Nama Penjual</th>
            <th>Alamat Lahan</th>
            <th>Judul Lahan</th>
        </tr>
    </thead>

    <tbody>
        @php $no = 1; @endphp
        @foreach($survei_masuk as $datas)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $datas->tanggal }}</td>
            <td>{{ $datas->waktu }}</td>
            <td>{{ $datas->pembeli->name }}</td>
            <td>{{ $datas->no_hp }}</td>
            <td>{{ $datas->lahan->penjual->name }}</td>
            <td>{{ $datas->lahan->alamat}}</td>
            <td>{{ $datas->lahan->judul_lahan}}</td>
        </tr>
        @endforeach
    </tbody>
</table>