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
    body {
      background: linear-gradient(135deg, #eef2f3, #dfe9f3);
      min-height: 100vh;
      font-family: "Poppins", sans-serif;
    }

    .navbar {
      background-color: #ffffffc7;
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      background: #ffffffb8;
      backdrop-filter: blur(12px);
    }

    table th {
      background: linear-gradient(#467bff);
      color: white;
      border: none;
    }

    .table-hover tbody tr {
      transition: all 0.2s ease-in-out;
    }

    .table-hover tbody tr:hover {
      background-color: #f2f6ff;
      transform: scale(1.005);
    }

    .btn {
      border-radius: 10px;
      transition: all 0.2s ease-in-out;
    }

    .btn:hover {
      transform: translateY(-2px);
    }

    .search-box {
      position: relative;
    }

    .search-box input {
      padding-left: 38px;
      border-radius: 10px;
      border: 1px solid #d0d7de;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .search-box i {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #6c757d;
    }

    h2 {
      font-weight: 600;
      color: #0d6efd;
    }

    /* Pagination modern style */
    .pagination {
      margin: 0;
    }

    .pagination .page-item .page-link {
      border: none;
      color: #0d6efd;
      border-radius: 10px;
      margin: 0 4px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      transition: all 0.2s ease-in-out;
    }

    .pagination .page-item .page-link:hover {
      background-color: #0d6efd;
      color: #fff;
      transform: translateY(-2px);
    }

    .pagination .active .page-link {
      background-color: #0d6efd;
      color: white;
      box-shadow: 0 2px 6px rgba(13,110,253,0.4);
    }

    .footer {
      text-align: center;
      color: #6c757d;
      font-size: 0.9rem;
      margin-top: 40px;
    }
  </style>
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
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <h5 class="fw-semibold mb-0">📋 Daftar Barang</h5>

        <div class="d-flex gap-2">
          <!-- Search -->
          <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text" id="searchInput" class="form-control" placeholder="Cari barang...">
          </div>

          <!-- Tambah -->
          <a href="{{ route('barang.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-plus-circle"></i> Tambah
          </a>
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
