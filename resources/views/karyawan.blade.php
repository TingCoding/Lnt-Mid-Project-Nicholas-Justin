<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chipi Chapa</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/karyawan.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav>
        <div class="left">
            <a href=""><img src="https://png.pngtree.com/png-vector/20190429/ourmid/pngtree-employee-icon-vector-illustration-in-glyph-style-for-any-purpose-png-image_998315.jpg" alt="Karyawan logo"></a>
        </div>
        <div class="right">
            <a href="/home" class="login">Home</a>
            <a href="#">Karyawan</a>
            <a href="/contact-us">Contact Us</a>
            <a href="/login" class="login">Login</a>
        </div>
    </nav>

    <br>

    <div class="karyawan">
        <br><br>
        <h1>Data Karyawan</h1>
        <br>
        <div class="add">
            <a href="/add-karyawan">Tambah Karyawan</a>
        </div>
        <div class="karyawans">
            @forelse ($karyawan as $s)
                <div>
                    <img src="{{ asset('storage/'.$s->Photo) }}" alt="{{ $s->Photo }}">
                    <br><br>
                    <h2>Nama: {{ $s->Name }}</h2>
                    <h2>Umur: {{ $s->Umur }} tahun</h2>
                    <h2>Alamat: {{ $s->Alamat }}</h2>
                    <h2>No.Telp: {{ $s->Telp }}</h2>
                    <br>
                    <div class="edit">
                        <button class="btn btn-success">
                            <a href="/edit-karyawan/{{ $s->id }}">Edit</a> 
                        </button>
                    </div>
                    <br>
                    <form action="/delete-karyawan/{{ $s->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="edit">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </div>
                    </form>
                </div>
            @empty
                <p>{{ "List empty!" }}</p>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>