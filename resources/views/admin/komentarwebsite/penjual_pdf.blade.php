<table class='table table-bordered' style="width:100%">
    <thead>
        <tr align="center" bgcolor="yellow">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tanggal & Waktu</th>
            <th>Komentar</th>
        </tr>
    </thead>
    
    <tbody>
        @php $id = 1; @endphp
        @foreach($penjual as $data)
        <tr>
            <td>{{ $id++ }}</td>
            <td>{{ $data->penjual->name }}</td>
            <td>{{ $data->penjual->email }}</td>
            <td>{{ $data->created_at }}</td>
            <td>{{ $data->content }}</td>
        </tr>
        @endforeach
    </tbody>
</table>