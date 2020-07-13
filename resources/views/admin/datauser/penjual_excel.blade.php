<table style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Terdaftar</th>
        </tr>
    </thead>

    <tbody>
        @php($id = 1)
        @foreach($penjual as $datas)
        <tr>
            <th>{{ $id++}}</th>
            <td>{{ $datas->name }}</td>
            <td>{{ $datas->email }}</td>
            <td>{{ $datas->created_at }}</td>
            <td>
        </tr>
        @endforeach
    </tbody>
</table>