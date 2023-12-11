<!DOCTYPE html>
<html lang="en">

@extends('layouts.app')

<body>
    <!-- Navbar -->
    @include('components.navbar')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Detail Makanan
                            <a href="{{ url('/products/create') }}" class="btn btn-primary float-end">Add Data</a>
                        </h4>
                    </div>
                    <div class="card-body me-5">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Makanan</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Gambar</th>
                                    <th>Kode</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->product_name }}</td>
                                        <td>@currency($data->product_price)</td>
                                        <td>{{ $data->product_qty }}</td>
                                        <td><img width="100px" src="{{ asset('storage/' . $data->product_image) }}" alt=""></td>
                                        <td>{{ $data->product_code }}</td>
                                        <td>{{ $data->category }}</td>
                                        <td>
                                            <a href="{{ url('/products/' . $data->id . '/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ url('/products/' . $data->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="delete_makanan" value="{{ $data->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>