<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* Background Soft Yellow */
    body {
      background: linear-gradient(135deg, #fff9d9, #fff4c4, #fff7e6);
      min-height: 100vh;
      font-family: "Poppins", sans-serif;
    }

    /* Navbar Soft Cream */
    .navbar {
      background-color: #ffffffd8;
      backdrop-filter: blur(8px);
      border-bottom: 1px solid rgba(255, 214, 122, 0.4);
    }

    h2, h5 {
      font-weight: 600;
      color: #c28b00; /* Honey brown */
    }

    /* Card */
    .card {
      border: none;
      border-radius: 18px;
      box-shadow: 0 4px 20px rgba(179, 142, 0, 0.18);
      background: #fffdf4;
      backdrop-filter: blur(12px);
    }

    /* Table Header */
    table th {
      background: linear-gradient(#ffcc38);
      color: #6a4a00;
      border: none;
    }

    /* Row Hover */
    .table-hover tbody tr {
      transition: 0.2s ease;
    }

    .table-hover tbody tr:hover {
      background-color: #fff3c4;
      transform: scale(1.003);
    }

    /* Buttons */
    .btn {
      border-radius: 10px;
      transition: 0.2s ease;
    }

    .btn:hover {
      transform: translateY(-2px);
      opacity: 0.95;
    }

    .btn-primary {
      background-color: #ffcc33;
      border: none;
      color: #5e4500;
    }

    .btn-primary:hover {
      background-color: #e6b62e;
    }

    .btn-warning {
      background-color: #ffe28b;
      border: none;
      color: #6b4d00;
    }

    .btn-warning:hover {
      background-color: #ffda6a;
    }

    .btn-danger {
      background-color: #ff9f40;
      border: none;
    }

    .btn-danger:hover {
      background-color: #ff8a1a;
    }

    /* Search Box */
    .search-box {
      position: relative;
    }

    .search-box input {
      padding-left: 38px;
      border-radius: 12px;
      border: 1px solid #ffe08a;
      box-shadow: 0 1px 4px rgba(255, 193, 7, 0.25);
      background-color: #fffdf4;
    }

    .search-box i {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #d39b00;
    }

    /* Pagination */
    .pagination .page-item .page-link {
      border: none;
      color: #c28b00;
      border-radius: 10px;
      margin: 0 4px;
      background-color: #fff7dc;
      box-shadow: 0px 1px 3px rgba(184,150,0,0.25);
    }

    .pagination .page-item .page-link:hover {
      background-color: #ffcd45;
      color: white;
    }

    .pagination .active .page-link {
      background-color: #ffcd45;
      color: white;
      box-shadow: 0px 2px 6px rgba(255,193,7,0.4);
    }

    /* Footer */
    .footer {
      text-align: center;
      color: #a0781a;
      font-size: 0.9rem;
      margin-top: 40px;
    }
  </style>
</head>

</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-light py-3 px-4 shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center flex-wrap gap-3">
      <h2 class="mb-0">📦 Data Barang</h2>
      <div class="d-flex align-items-center gap-3">
        <div class="d-flex align-items-center text-muted small">
            <i class="bi bi-person-circle fs-5 text-primary me-2"></i>
            <span>Halo, <strong>{{ Auth::user()->name ?? 'User' }}</strong></span>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm d-flex align-items-center gap-1">
            <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
        </div>
    </div>
  </nav>

  <div class="container py-5">
    <div class="card p-4">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h5 class="fw-semibold mb-0">📋 Daftar Barang</h5>

        <div>
            <a href="{{ route('barang.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i> Tambah
            </a>
        </div>
      </div>

      <!-- Search Full Width -->
      <div class="mb-4">
          <div class="search-box w-100">
              <i class="bi bi-search"></i>
              <input type="text" id="searchInput" class="form-control w-100" placeholder="Cari barang...">
          </div>
      </div>


      <!-- Table -->
<div class="table-responsive">
  <table class="table table-hover align-middle text-center">
    <thead>
      <tr>
        <th style="width: 10%">Kode</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th style="width: 15%">Harga</th>
        <th style="width: 20%">Aksi</th>
      </tr>
    </thead>
    <tbody id="barangTableBody">
      @forelse($barang as $b)
        <tr>
          <td>{{ $b->kode_barang }}</td>
          <td>{{ $b->nama_barang }}</td>

          {{-- KATEGORI --}}
          <td>{{ $b->kategori->nama_kategori ?? '-' }}</td>

          <td><strong>Rp {{ number_format($b->harga_barang, 0, ',', '.') }}</strong></td>
          <td>
            <a href="{{ route('barang.edit', $b->id_barang) }}" class="btn btn-warning btn-sm">
              <i class="bi bi-pencil-square"></i> Edit
            </a>
            <form action="{{ route('barang.destroy', $b->id_barang) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm">
                <i class="bi bi-trash3"></i> Hapus
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-muted py-3">Belum ada data barang</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>


      <!-- Pagination -->
      <div class="d-flex justify-content-center mt-4">
        {{ $barang->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>

  <div class="footer">
    © {{ date('Y') }} Toko Modern | Semua Hak Dilindungi
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Search Script -->
  <script>
    document.getElementById("searchInput").addEventListener("keyup", function () {
      let value = this.value.toLowerCase();
      let rows = document.querySelectorAll("#barangTableBody tr");
      rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(value) ? "" : "none";
      });
    });
  </script>

</body>
</html>
