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
        @foreach($pembeli as $user)
        <tr>
            <th>{{ $id++}}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
        </tr>
        @endforeach
    </tbody>
</table>