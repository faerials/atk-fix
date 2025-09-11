<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah ATK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body style="background: linear-gradient(to top, #91AAEA 0%, #F1F8FF 100%); min-height: 100vh;">

    <!-- ======================== Header ======================== -->
    <header class="fixed top-0 left-0 w-full z-50 px-4 pt-4">
        <!-- Navbar -->
        <nav class="relative bg-transparent backdrop-blur-md border border-white/20 rounded-2xl shadow-lg">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-6 py-4">
                <!-- Logo/Brand -->
                <div class="hidden md:block">
            <a class="flex items-center space-x-3 rtl:space-x-reverse">
              <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
              <div class="flex flex-col leading-tight">
                <span class="self-center text-xl font-semibold whitespace-nowrap text-black">URTU ROTEKINFO DIV TIK POLRI</span>
                <span class="text-lg text-gray-600">Admin Panel / Tambah ATK</span>
              </div>
            </a>
          </div>
          <a class="flex items-center space-x-3 rtl:space-x-reverse md:hidden">
         <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
          </a>
                <!-- Back Button -->
                <div class="md:flex items-center space-x-3">
                    <a href="{{ url()->previous() }}">
                        <button type="button"
                            class="inline-flex justify-center items-center py-2.5 px-3 text-sm font-medium text-black rounded-full 
                                   bg-white/30 backdrop-blur-md border border-white/40 hover:bg-white/50 focus:ring-2 focus:ring-white/50 
                                   transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>
                            <span class="d-none d-md-inline">Back</span>
                        </button>
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- ======================== Main Content ======================== -->
    <main class="pt-36 pb-8">
        <div class="container">
            <!-- Form Card -->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="card shadow-lg border-0" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border-radius: 20px;">
                        <!-- Card Header -->
                        <div class="card-header text-center border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px 20px 0 0;">
                            <h4 class="mb-0 text-white fw-bold py-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-circle me-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                                Tambah ATK Baru
                            </h4>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Name</label>
                                    <input type="text" name="nama" id="nama" class="form-control" 
                                           placeholder="Enter item name" required>
                                </div>

                                <!-- Stock -->
                                <div class="col-md-6 mb-3">
                                    <label for="stok" class="form-label">Stock</label>
                                    <input type="number" name="stok" id="stok" class="form-control" 
                                           placeholder="Enter stock quantity" required min="0">
                                </div>

                                <!-- Category -->
                                <div class="col-md-6 mb-3">
                                    <label for="kategori" class="form-label">Category</label>
                                    <select name="kategori" id="kategori" class="form-select" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach (\App\Models\ATK::getKategoriList() as $kat)
                                            <option value="{{ $kat }}">{{ $kat }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Location -->
                                <div class="col-md-6 mb-3">
                                    <label for="lokasi" class="form-label">Location</label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" 
                                           placeholder="Enter storage location" required>
                                </div>

                                <!-- Description -->
                                <div class="col-12 mb-3">
                                    <label for="deskripsi" class="form-label">Description</label>
                                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" 
                                              placeholder="Enter item description (optional)"></textarea>
                                </div>

                                <!-- Image -->
                                <div class="col-12 mb-4">
                                    <label for="gambar" class="form-label">Image</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                                    <div class="form-text">Supported formats: JPG, JPEG, PNG (Max: 2MB)</div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                    <i class="bi bi-x-circle me-1"></i>
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Add Item
                                </button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ======================== Scripts ======================== -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const fileInput = document.getElementById('gambar');
            
            // File size validation
            fileInput?.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Check file size (2MB limit)
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar! Maksimal 2MB.');
                        e.target.value = '';
                        return;
                    }
                    
                    // Check file type
                    const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                    if (!allowedTypes.includes(file.type)) {
                        alert('Format file tidak didukung! Gunakan JPG, PNG, atau GIF.');
                        e.target.value = '';
                        return;
                    }
                }
            });

            // Form submission enhancement
            form?.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = `
                        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                        Menyimpan...
                    `;
                    submitBtn.disabled = true;
                }
            });
        });
    </script>
</body>
</html>