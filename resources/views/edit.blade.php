<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div style="margin: 200px">
        <h1>Edit Karyawan</h1>
        <form action="/update-karyawan/{{ $karyawan->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="Name" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="Name" aria-describedby="emailHelp" name="Name" value="{{ $karyawan->Name }}">
                @error('Name')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="Umur" aria-describedby="emailHelp" name="Umur" value="{{ $karyawan->Umur }}">
                @error('Umur')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="Alamat" aria-describedby="emailHelp" name="Alamat" value="{{ $karyawan->Alamat }}">
                @error('Alamat')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Telp" class="form-label">No.Telp</label>
                <input type="text" class="form-control" id="Telp" aria-describedby="emailHelp" name="Telp" value="{{ $karyawan->Telp}}">
                @error('Telp')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="Photo" aria-describedby="emailHelp" name="Photo">
                @error('Photo')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>