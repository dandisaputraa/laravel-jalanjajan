@extends('layouts.app')

@include('components.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Add Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('products/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="product_name" class="form-label">Nama Makanan</label>
                                <input type="text" name="product_name" class="form-control" id="product_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="product_price" class="form-label">Harga</label>
                                <input type="number" name="product_price" class="form-control" id="product_price" required>
                            </div>
                            <div class="mb-3">
                                <label for="product_qty" class="form-label">Jumlah</label>
                                <input type="number" name="product_qty" class="form-control" id="product_qty" required>
                            </div>
                            <div class="mb-3">
                                <label for="product_image" class="form-label">Gambar</label>
                                <input type="file" name="product_image" class="form-control" id="product_image" required>
                            </div>
                            <div class="mb-3">
                                <label for="product_code" class="form-label">Kode</label>
                                <input type="text" name="product_code" class="form-control" id="product_code" required>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Kategori</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="Makanan">Makanan</option>
                                    <option value="Minuman">Minuman</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_makanan" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
