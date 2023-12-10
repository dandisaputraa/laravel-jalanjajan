@include('components.navbar')

<div class="container mt-5">
<div class="row">
    <div class="col-md-12">
        <div class="card mt-5">
            <div class="card-header">
                <h4>Detail Kuliner</h4>
            </div>
            <div class="card-body">

                        <form method="post" action="/products/{{$products->id}}/edit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                        <div class="mb-3">
                                            <label>Nama Makanan</label>
                                            <input type="text" name="product_name" value="{{$products->product_name}}" class="form-control" placehoder="Nama Produk">
                                        </div>
                                        <div class="mb-3">
                                            <label>Harga</label>
                                            <input type="number" name="product_price" value="{{$products->product_price}}" class="form-control" placeholder="Harga">
                                        </div>
                                        <div class="mb-3">
                                            <label>Jumlah</label>
                                            <input type="number" name="product_qty" value="{{$products->product_qty}}" class="form-control" placeholder="Jumlah">
                                        </div>
                                        <div class="input-group">
                                            <div class="">
                                                <input class="form-control mb-3" type="file" id="product_image" name="product_image" onchange="previewImage()">
                                                <input type="hidden" name="oldImage" class="custom-file-input" value="{{ $products->product_image }}" id="exampleInputFile">
                                                @if($products->product_image)
                                                <img src="{{ asset('storage/' . $products->product_image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                @else
                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Kode</label>
                                            <input type="text" name="product_code" value="{{$products->product_code}}" class="form-control" placeholder="Kode">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Kategori</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="Makanan" {{ $products->category == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                                <option value="Minuman" {{ $products->category == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Input</button>
                                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

    </script>