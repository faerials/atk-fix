<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar ATK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head> @vite(['resources/css/app.css', 'resources/js/app.js']) <body class="position-relative" style="background: linear-gradient(to top, #91AAEA 0%, #F1F8FF 100%); min-height: 100vh;">
    <!-- ======================== Header ======================== -->
    <header class="fixed top-0 left-0 w-full z-50 px-4 pt-4">
      <!-- Navbar -->
      <nav class="relative bg-transparent backdrop-blur-md border border-white/20 rounded-2xl shadow-lg">
        <div class="max-w-screen-xl flex flex-wrap:nowrap items-center justify-between mx-auto px-6 py-4">
          <!-- Logo -->
          <div class="hidden md:block">
            <a class="flex items-center space-x-3 rtl:space-x-reverse">
              <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
              <div class="flex flex-col leading-tight">
                <span class="self-center text-xl font-semibold whitespace-nowrap text-black">URTU ROTEKINFO DIV TIK POLRI</span>
                <span class="text-lg text-gray-600">Daftar ATK</span>
              </div>
            </a>
          </div>
          <a class="flex items-center space-x-3 rtl:space-x-reverse md:hidden">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
          </a>
          <!-- Login Button -->
          <div class="md:flex items-center space-x-3">
            <a href="{{ route('login') }}" class="inline-flex justify-center items-center py-2.5 px-3 text-sm font-medium text-black rounded-full 
                   bg-white hover:bg-gray-100 focus:ring-2 focus:ring-white/50 transition-all duration-200
                   shadow-lg hover:shadow-xl transform hover:scale-105"> Login as Admin <svg class="rotate-[-45deg] w-3.5 h-3.5 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
            </a>
          </div>
        </div>
      </nav>
    </header>
    <main class="pt-2">
      <!-- ======================== Hero Section ======================== -->
      <section id="hero" class="hero-section">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:pb-4 lg:py-16">
          <h2 class="hero-welcome"> Selamat Datang di </h2>
          <h1 class="hero-title"> Alat Tulis Kantor URTU </h1>
          <p class="hero-description"> Akses Mudah ke Semua Kebutuhan Alat Tulis Kantor Anda. </p>
        </div>
      </section>
      <!-- ======================== Search Form (DESKTOP) ======================== -->
      <div class="hidden md:block mt-4 px-4">
        <form action="{{ route('atk.search') }}#table" method="GET" class="max-w-xl mx-auto">
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-black">Search</label>
          <div class="relative">
            <!-- Input -->
            <input type="search" name="q" id="default-search" value="{{ request('q') }}" class="block w-full py-3 px-6 ps-14 text-sm text-black placeholder-white/80 
               border border-white/40 rounded-full 
               bg-white/30 backdrop-blur-md 
               focus:ring-blue-500 focus:border-blue-500 
               dark:bg-white/20 dark:border-white/30 dark:placeholder-black/60 
               dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Items..." autocomplete="off" spellcheck="false" required />
            <!-- Tombol di dalam input -->
            <button type="submit" class="absolute left-2 top-2 
               text-white bg-white hover:bg-blue-800 focus:outline-none 
               font-medium rounded-full w-10 h-10 inline-flex items-center justify-center 
               dark:bg-blue-600 dark:hover:bg-blue-700">
              <!-- Ikon di dalam tombol -->
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </button>
          </div>
        </form>
      </div>
      <!-- ======================== Search Form + Kategori Sort (MOBILE) ======================== -->
      <div class="flex items-center justify-center   gap-2 mb-4 px-4 md:hidden">
        <form action="{{ route('atk.search') }}#table" method="GET" class="w-full max-w-md">
          <label for="mobile-search" class="mb-2 text-sm font-medium sr-only">Search</label>
          <div class="relative">
            <input type="hidden" name="category" id="selected-category" value="{{ request('category') }}" />
            <!-- Search Input -->
            <input type="text" name="q" id="mobile-search" value="{{ request('q') }}" class="block w-full py-3 px-6 ps-14 pr-14 text-sm text-black placeholder-white/80 
                               border border-white/40 rounded-full 
                               bg-white/30 backdrop-blur-md 
                               focus:ring-blue-500 focus:border-blue-500 
                               dark:bg-white/20 dark:border-white/30 dark:placeholder-black/60 
                               dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Items..." autocomplete="off" spellcheck="false" />
            <!-- Search Button -->
            <button type="submit" class="absolute left-2 top-2 text-white bg-white hover:bg-blue-800 focus:outline-none 
                               font-medium rounded-full w-10 h-10 inline-flex items-center justify-center 
                               dark:bg-blue-600 dark:hover:bg-blue-700">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </button>
            <!-- Filter Toggle Button -->
            <button type="button" id="filter-toggle" class="absolute right-2 top-2 text-black bg-gray-200 hover:bg-gray-300 focus:outline-none 
                       rounded-full w-10 h-10 inline-flex items-center justify-center 
                       {{ request('category') ? 'bg-blue-500 text-white' : '' }}">
              <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 5h16M7 10h6m-3 5h2" />
              </svg>
            </button>
            <!-- Category Dropdown -->
            <div id="category-dropdown" class="absolute right-0 top-full mt-2 w-48
                        bg-white border border-gray-200 rounded-lg shadow-lg 
                        hidden z-10">
              <div class="py-2">
                <!-- All Categories -->
                <a href="{{ route('atk.index') }}#table">
                  <button type="button" class="category-option w-full text-left px-4 py-2 text-sm text-black hover:bg-white/20
                                       {{ request()->routeIs('atk.index') ? 'bg-blue-100 font-medium' : '' }}"> All Categories </button>
                </a>
                <!-- Kategori --> @foreach (\App\Models\ATK::getKategoriList() as $kat) <a href="{{ route('atk.filter', $kat) }}#table" method="GET">
                  <button type="button" class="category-option w-full text-left px-4 py-2 text-sm text-black hover:bg-white/20
                                           {{ request()->url() === route('atk.filter', $kat) ?'bg-blue-100 font-medium' : '' }}">
                    {{ $kat }}
                  </button>
                </a> @endforeach
              </div>
            </div>
          </div>
        </form>
        {{--sort alphabet--}} @php $sort = request('sort') === 'asc' ? 'desc' : 'asc'; @endphp <a href="{{ route('atk.index', ['sort' => $sort]) }}#table" class="d-flex justify-content-between align-items-center transition"> @if(request('sort') === 'asc') {{-- ASC --}}
          <button type="button" class="btn btn-primary text-sm bg-primary focus:outline-none 
                           font-medium rounded-full w-11 h-11 inline-flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="" height="" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371zm1.57-.785L11 2.687h-.047l-.652 2.157z" />
              <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z" />
            </svg>
          </button> @else {{-- DESC --}}
          <button type="button" class="btn btn-primary text-sm bg-primary focus:outline-none 
                           font-medium rounded-full w-11 h-11 inline-flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="" height="" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
              <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645z" />
              <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371zm1.57-.785L11 9.688h-.047l-.652 2.156z" />
              <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z" />
            </svg>
          </button> @endif </a>
      </div>
      <!-- ======================== Category Buttons ======================== -->
      <div class="flex items-center justify-center mt-2 py-4 md:py-8 flex-wrap d-none d-md-flex">
        {{-- All Categories --}} @php $isAll = request()->routeIs('atk.index'); @endphp <a href="{{ route('atk.index') }}#table" aria-current="{{ $isAll ? 'page' : 'false' }}" class="rounded-full text-base font-medium px-5 py-2.5 text-center ms-3 me-3 mb-3
            {{ $isAll ? 'bg-indigo-600 text-white' : 'bg-indigo-500 text-white hover:bg-indigo-600' }}"> All Categories </a>
        {{-- Kategori Lain --}} @foreach (\App\Models\ATK::getKategoriList() as $kat) @php $isActive = request()->url() === route('atk.filter', $kat); @endphp <a href="{{ route('atk.filter', $kat) }}#table" data-category="{{ $kat }}" aria-current="{{ $isActive ? 'page' : 'false' }}" class="rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3
                    {{ $isActive ? 'bg-slate-700 text-white' : 'bg-slate-500 text-white hover:bg-slate-600' }}">
          {{ $kat }}
        </a> @endforeach
      </div>
      <!-- ======================== Table ======================== -->
      <div class="hidden md:block">
        <div class="py-3 d-flex justify-content-end mb-0" style="margin-right:35px;">
          {{--URUTKAN NAMA ASC/DESC--}} @php $sort = request('sort') === 'asc' ? 'desc' : 'asc'; @endphp <a href="{{ route('atk.index', ['sort' => $sort]) }}#table" class="d-flex justify-content-between align-items-center transition"> @if(request('sort') === 'asc') {{-- ASC --}}
            <button type="button" class="btn btn-primary text-sm bg-primary focus:outline-none 
                           font-medium rounded-full w-11 h-11 inline-flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="" height="" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371zm1.57-.785L11 2.687h-.047l-.652 2.157z" />
                <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z" />
              </svg>
            </button> @else {{-- DESC --}}
            <button type="button" class="btn btn-primary text-sm bg-primary focus:outline-none 
                           font-medium rounded-full w-11 h-11 inline-flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="" height="" fill="currentColor" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
                <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645z" />
                <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371zm1.57-.785L11 9.688h-.047l-.652 2.156z" />
                <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z" />
              </svg>
            </button> @endif </a>
        </div>
      </div>
      <!-- ATK Table Section -->
      <div class="mx-auto px-4 md:px-8 lg:px-16 xl:px-24">
        <!-- Make table responsive -->
        <div class="overflow-x-auto">
          <table class="table table-bordered min-w-full text-sm align-middle rounded-lg shadow-md" id="table">
            <thead class="table-secondary">
              <tr>
                <th style="width: 60px; text-align: center;">No</th>
                <th style="width: 200px;">Nama</th>
                <th style="width: 60px; text-align: center;">Stok</th>
                <th style="width: 250px;">Kategori</th>
                <th style="width: 120px; text-align: center;">Aksi</th>
              </tr>
            </thead>
            <tbody> @foreach ($atks as $index => $atk) <tr>
                <td style="text-align: center; vertical-align: middle;">{{ $atks->firstItem() + $loop->index }}</td>
                <td style="overflow-wrap: break-word vertical-align: middle;">{{$atk->nama}}</td>
                <td style="text-align: center; vertical-align: middle;">{{$atk->stok}}</td>
                <td style="overflow-wrap: break-word vertical-align: middle;">{{$atk->kategori}}</td>
                <td style="text-align: center; vertical-align: middle;">
                  <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-1">
                    <!-- Show Button -->
                    <a data-bs-toggle="modal" data-bs-target="#atkModal{{ $atk->id }}" class="btn btn-sm btn-outline-primary me-1" title="View">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                      </svg>
                    </a>
                  </div>
                </td>
              </tr>
              <!-- Popover detail ATK - Name beside image -->
              <div class="modal fade" id="atkModal{{ $atk->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 95%; max-width: 450px;">
                  <div class="modal-content shadow-lg border-0" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border-radius: 16px;">
                    <!-- Header -->
                    <div class="modal-header text-center border-0 pb-2" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 16px 16px 0 0;">
                      <h6 class="modal-title mb-0 text-white fw-bold w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-info-circle me-2" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                          <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                        </svg> Detail ATK
                      </h6>
                      <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3" data-bs-dismiss="modal"></button>
                    </div>
                    <!-- Body -->
                    <div class="modal-body p-3">
                      <!-- Image & Title Row -->
                      <div class="row align-items-center mb-3">
                        <div class="col-5">
                          <img src="{{ asset('uploads/atk/' . $atk->gambar) }}" alt="{{ $atk->nama }}" class="img-fluid rounded-3 shadow-sm w-100" style="max-height: 100px; object-fit: cover;">
                        </div>
                        <div class="col-7 ps-3">
                          <h6 class="fw-bold text-capitalize mb-0 lh-sm" style="color: #667eea; word-wrap: break-word; overflow-wrap: break-word;">
                            {{ $atk->nama }}
                          </h6>
                        </div>
                      </div>
                      <!-- Details in compact grid -->
                      <div class="row g-2">
                        <div class="col-6">
                          <div class="text-center p-2 rounded-3" style="background: rgba(102, 126, 234, 0.1);">
                            <small class="text-muted d-block">Stok</small>
                            <strong class="text-dark">{{ $atk->stok }}</strong>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="text-center p-2 rounded-3" style="background: rgba(118, 75, 162, 0.1);">
                            <small class="text-muted d-block">Kategori</small>
                            <strong class="text-dark small break-words" style="word-wrap: break-word;">{{ $atk->kategori }}</strong>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="text-center p-2 rounded-3" style="background: rgba(102, 126, 234, 0.1);">
                            <small class="text-muted d-block">Lokasi</small>
                            <strong class="text-dark break-words" style="word-wrap: break-word;">{{ $atk->lokasi ?? '-' }}</strong>
                          </div>
                        </div> @if($atk->deskripsi) <div class="col-12">
                          <div class="p-2 rounded-3" style="background: rgba(118, 75, 162, 0.1);">
                            <small class="text-muted d-block">Deskripsi</small>
                            <small class="text-dark" style="word-wrap: break-word; line-height: 1.3;">{{ Str::limit($atk->deskripsi, 80) }}</small>
                          </div>
                        </div> @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div> @endforeach
            </tbody>
          </table>
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-end mb-3 over rounded-full">
          {{ $atks->links('pagination::bootstrap-5') }}
        </div>
      </div>
      <!-- ======================== Scripts ======================== -->
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const filterToggle = document.getElementById('filter-toggle');
          const categoryDropdown = document.getElementById('category-dropdown');
          const selectedCategoryInput = document.getElementById('selected-category');
          const categoryOptions = document.querySelectorAll('.category-option');
          const mobileSelect = document.querySelector('select[name="category_mobile"]');
          // Toggle dropdown visibility
          filterToggle?.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            categoryDropdown.classList.toggle('hidden');
          });
          // Handle category selection
          categoryOptions.forEach(option => {
            option.addEventListener('click', function() {
              const value = this.dataset.value;
              const text = this.textContent.trim();
              // Update hidden input
              selectedCategoryInput.value = value;
              // Update mobile select if exists
              if (mobileSelect) {
                mobileSelect.value = value;
              }
              // Update filter button appearance
              if (value) {
                filterToggle.classList.add('bg-blue-500', 'text-white');
                filterToggle.classList.remove('bg-white/20');
              } else {
                filterToggle.classList.remove('bg-blue-500', 'text-white');
                filterToggle.classList.add('bg-white/20');
              }
              // Update active state for options
              categoryOptions.forEach(opt => {
                opt.classList.remove('bg-blue-500/20', 'font-medium');
              });
              this.classList.add('bg-blue-500/20', 'font-medium');
              // Hide dropdown
              categoryDropdown.classList.add('hidden');
            });
          });
          // Handle mobile category selection
          mobileSelect?.addEventListener('change', function() {
            selectedCategoryInput.value = this.value;
            // Update filter button appearance
            if (this.value) {
              filterToggle.classList.add('bg-blue-500', 'text-white');
              filterToggle.classList.remove('bg-white/20');
            } else {
              filterToggle.classList.remove('bg-blue-500', 'text-white');
              filterToggle.classList.add('bg-white/20');
            }
            // Submit form automatically on mobile
            this.closest('form').submit();
          });
          // Close dropdown when clicking outside
          document.addEventListener('click', function(e) {
            if (!filterToggle.contains(e.target) && !categoryDropdown.contains(e.target)) {
              categoryDropdown.classList.add('hidden');
            }
          });
          // Prevent dropdown from closing when clicking inside it
          categoryDropdown?.addEventListener('click', function(e) {
            e.stopPropagation();
          });
        });
        //dropdown toggle
        document.addEventListener('DOMContentLoaded', function() {
          const toggleBtn = document.getElementById('filter-toggle-mobile');
          const dropdown = document.getElementById('category-dropdown-mobile');
          toggleBtn.addEventListener('click', function() {
            dropdown.classList.toggle('hidden');
          });
          // otomatis tutup
          document.addEventListener('click', function(e) {
            if (!toggleBtn.contains(e.target) && !dropdown.contains(e.target)) {
              dropdown.classList.add('hidden');
            }
          });
        });
      </script>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>