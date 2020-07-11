<table style="width:100%">
    <thead>
        <tr>
            <td style="text-align: center">No</td>
            <td style="text-align: center">Nama</td>
            <td style="text-align: center">Email</td>
            <td style="text-align: center">Tanggal</td>
            <td style="text-align: center">Komentar</td>

        </tr>
    </thead>
    
    <tbody>
        @php $id = 1; @endphp
        @foreach($koments as $koment)
        <tr>
            <td style="text-align: center">{{ $id++ }}</td>
            <td widht="15%" style="text-align: center">{{ $koment->user->name }}</td>
            <td widht="25%" style="text-align: center">{{ $koment->user->email }}</td>
            <td widht="20%" style="text-align: center">{{ $koment->created_at }}</td>
            <td widht="40%" style="text-align: center">{{ $koment->content }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
