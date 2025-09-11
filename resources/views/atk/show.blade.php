<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Detail ATK</title>
</head>
<body>
   
<div class="container mt-2">
    <div class="mb-2">
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">← Kembali</a>
    </div>

    <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Detail ATK</h4>
    </div>
    <div class="card shadow">
        <div class="row g-0"> 
            <div class="col-md-5">
                @if ($atks->gambar)
                    <img src="{{ asset('uploads/atk/' . $atks->gambar) }}" class="img-fluid h-100 w-100" style="object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/400x300?text=No+Image" class="img-fluid">
                @endif
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h4 class="card-title">{{ $atks->nama }}</h4>
                         <p><strong>Stok:</strong> {{ $atks->stok }}</p>
                    <p><strong>Kategori:</strong> {{ $atks->kategori }}</p>
                    <p><strong>Lokasi:</strong> {{ $atks->lokasi }}</p>
                    <p><strong>Deskripsi:</strong><br>{{ $atks->deskripsi}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>