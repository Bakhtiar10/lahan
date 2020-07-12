<table class='table table-bordered' style="width:100%">
    <thead>
        <tr align="center" bgcolor="yellow">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Terdaftar</th>
        </tr>
    </thead>

    <tbody>
        @php($id = 1)
        @foreach($penjual as $data)
        <tr>
            <th>{{ $id }}</th>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->created_at }}</td>
        </tr>
        @php($id++)
        @endforeach
    </tbody>
</table>