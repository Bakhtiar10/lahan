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
        @foreach($koments as $koment)
        <tr>
            <td>{{ $id++ }}</td>
            <td>{{ $koment->user->name }}</td>
            <td>{{ $koment->user->email }}</td>
            <td>{{ $koment->created_at }}</td>
            <td>{{ $koment->content }}</td>
        </tr>
        @endforeach
    </tbody>
</table>