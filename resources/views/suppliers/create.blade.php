<!DOCTYPE html>
<html>
<head>
    <title>Tambah Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Tambah Supplier Baru</h2>
                    <a class="btn btn-secondary" href="{{ route('suppliers.index') }}">
                        Kembali
                    </a>
                </div>

                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_supplier" class="form-label">Nama Supplier:</label>
                        <input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No. Telepon:</label>
                        <input type="text" name="no_telepon" class="form-control" placeholder="No. Telepon">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
