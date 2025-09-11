<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
  </head>
  <body style="background: linear-gradient(to top, #91AAEA 0%, #F1F8FF 100%); min-height: 100vh;">
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
                <span class="text-lg text-gray-600">Admin Panel</span>
              </div>
            </a>
          </div>
          <a class="flex items-center space-x-3 rtl:space-x-reverse md:hidden">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
          </a>
          <!-- Logout Button -->
          <div class="md:flex items-center space-x-3">
            <form method="POST" action="{{ route('logout') }}"> @csrf <button class="inline-flex justify-center items-center py-2.5 px-3  btn-sm px-sm-2.5 py-sm-2.5 text-sm font-medium text-white rounded-full 
                                   bg-danger hover:bg-gray-100 focus:ring-2 focus:ring-white/50 transition-all duration-200
                                   shadow-lg hover:shadow-xl transform hover:scale-105">
                <span class="d-md-inline">Logout</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-right ml-2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- ======================== Main Content ======================== -->
    <main class="pt-36">
      <!-- ======================== Search Form + Create Button ======================== -->
      <div class="flex items-center justify-end gap-2 mb-4 px-4">
        <!-- Search Form -->
        <form action="{{ route('admin.search') }}#table" method="GET" class="w-full max-w-md">
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-black">Search</label>
          <div class="relative">
            <input type="hidden" name="category" id="selected-category" value="{{ request('category') }}" />
            <!-- Search Input -->
            <input type="text" name="q" id="default-search" value="{{ request('q') }}" class="block w-full py-3 px-6 ps-14 pr-14 text-sm text-black placeholder-white/80 border border-white/40 rounded-full bg-white/30 backdrop-blur-md focus:ring-blue-500 focus:border-blue-500 dark:bg-white/20 dark:border-white/30 dark:placeholder-black/60 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Items..." autocomplete="off" spellcheck="false" />
            <!-- Search Button -->
            <button type="submit" class="absolute left-2 top-2 text-white bg-white hover:bg-blue-800 focus:outline-none font-medium rounded-full w-10 h-10 inline-flex items-center justify-center dark:bg-blue-600 dark:hover:bg-blue-700">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </button>
            <!-- Filter Toggle Button -->
            <button type="button" id="filter-toggle" class="absolute right-2 top-2 text-black bg-white/20 hover:bg-white/40 focus:outline-none font-medium rounded-full w-10 h-10 inline-flex items-center justify-center transition-colors duration-200 {{ request('category') ? 'bg-blue-500 text-white' : '' }}">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 5h16M7 10h6m-3 5h2" />
              </svg>
            </button>
            <!-- Category Dropdown Menu -->
            <div id="category-dropdown" class="absolute right-0 top-full mt-2 w-48 bg-white/90 backdrop-blur-md border border-white/40 rounded-lg shadow-lg dark:bg-white/20 dark:border-white/30 hidden z-10">
              <div class="py-2">
                <a href="{{ route('admin.index') }}#table">
                  <button type="button" class="category-option w-full text-left px-4 py-2 text-sm text-black hover:bg-white/20 {{ request()->routeIs('admin.index') ? 'bg-blue-500/20 font-medium' : '' }}"> All Categories </button>
                </a> @foreach (\App\Models\ATK::getKategoriList() as $kat) <a href="{{ route('admin.filter', $kat) }}#table" method="GET">
                  <button type="button" class="category-option w-full text-left px-4 py-2 text-sm text-black hover:bg-white/20 {{ request()->url() === route('admin.filter', $kat) ? 'bg-blue-500/20 font-medium' : '' }}">
                    {{ $kat }}
                  </button>
                </a> @endforeach
              </div>
            </div>
          </div>
        </form>
        <!-- Create Button -->
        <a href="{{ route('admin.create') }}">
          <button type="button" class="btn btn-success text-sm bg-success focus:outline-none font-medium rounded-full w-10 h-10 inline-flex items-center justify-end">
            <svg class="w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
              <path fill-rule="evenodd" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
            </svg>
          </button>
        </a>
        <!-- URUTKAN NAMA ASC/DESC --> @php $sort = request('sort') === 'asc' ? 'desc' : 'asc'; @endphp <a href="{{ route('admin.index', ['sort' => $sort]) }}#table">
          <button type="button" class="btn btn-white border-black/40 text-sm bg-white button-transparent backdrop-blur-md focus:outline-none 
                           font-medium rounded-full w-10 h-10 inline-flex items-center justify-center"> @if(request('sort') === 'asc') {{-- ASC --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371zm1.57-.785L11 2.687h-.047l-.652 2.157z" />
              <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z" />
            </svg> @else {{-- DESC --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="" class="bi bi-sort-alpha-down-alt" viewBox="0 0 16 16">
              <path d="M12.96 7H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645z" />
              <path fill-rule="evenodd" d="M10.082 12.629 9.664 14H8.598l1.789-5.332h1.234L13.402 14h-1.12l-.419-1.371zm1.57-.785L11 9.688h-.047l-.652 2.156z" />
              <path d="M4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293z" />
            </svg> @endif </button>
        </a>
      </div>
      <!-- ======================== ATK Table Section ======================== -->
      <div class="mx-auto px-4 md:px-8 lg:px-16 xl:px-24">
        <!-- Make table responsive -->
        <div class="overflow-x-auto">
          <table class="table table-bordered min-w-full text-sm align-middle rounded-lg shadow-md">
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
                <td style="overflow-wrap: break-word vertical-align: middle;">{{ $atk->nama }}</td>
                <td style="text-align: center; vertical-align: middle;">{{ $atk->stok }}</td>
                <td style="overflow-wrap: break-word vertical-align: middle;">{{ $atk->kategori }}</td>
                <td style="text-align: center; horizontal-align: middle;">
                  <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-1">
                    <!-- Show Button -->
                    <a data-bs-toggle="modal" data-bs-target="#atkModal{{ $atk->id }}" class="btn btn-sm btn-outline-primary me-1" title="View">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                      </svg>
                    </a>
                    <!-- Edit Button -->
                    <a href="{{ route('admin.edit', $atk->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                      </svg>
                    </a>
                    <!-- Delete Button -->
                    <form action="{{ route('admin.destroy', $atk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus item ini?')"> @csrf @method('DELETE') <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                        </svg>
                      </button>
                    </form>
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
        <div class="d-flex justify-content-end mb-3">
          {{ $atks->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </main>
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>