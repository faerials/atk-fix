<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">← Kembali</a>

        <h2>Tambah</h2>
        <form  action="{{ route('admin.store') }}"  method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="nama" required>
                </div>
                <div class="mb-3">
                    <input type="number" name="stok" class="form-control" placeholder="stok" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="kategori" class="form-control" placeholder="kategori" required>
                </div>
                <div class="mb-3">
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                </div>
                
             
                 <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Tambah ATK</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>