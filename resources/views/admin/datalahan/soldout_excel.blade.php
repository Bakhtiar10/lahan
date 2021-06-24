<table style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Penjual</th>
            <th>Judul Lahan</th>
            {{-- <th>Foto Lahan</th> --}}
            <th>Harga Lahan</th>
            <th>Pada Tanggal</th>
        </tr>
    </thead>

    <tbody>
        @php $no = 1; @endphp
        @foreach ($sold_out as $so)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $so->lahan->user->name }}</td>
                <td>{{ $so->lahan->judul_lahan }}</td>
                <td>{{ $so->lahan->harga_lahan }}</td>
                <td>{{ $so->lahan->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
