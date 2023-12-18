<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/gaya2.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <title>Order</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="img/logo4.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
          JalanJajan.ID
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
          </ul>
          <form class="d-flex ms-auto">
            <a role="button" class="btn btn-light me-2" type="button" href="/kuliner"><i class="fa-solid fa-right-from-bracket"></i></i> Kembali</a>
          </form>
        </div>
      </div>
    </nav>

    <h3 class="text-center mt-4 mb-4"></h3>
    <div class="row justify-content-center">
    <h3 class="text-center mt-5 mb-4"></h3>
    <div class="row justify-content-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 px-4 pb-4" id="order">
                <h4 class="text-center text-warning p-2">Complete your order!</h4>
                <div class="jumbotron p-3 mb-2 text-center">
                    <h6 class="lead"><b>Product(s): </b>{{ $allItems }}</h6>
                    <h6 class="lead"><b>Delivery Charge: </b>Free</h6>
                    <h5><b>Total Amount Payable: </b>{{ number_format($grand_total, 2) }}/-</h5>
                </div>
                <form action="{{ route('order.place') }}" method="post" id="placeOrder">
                    @csrf
                    <input type="hidden" name="products" value="{{ $allItems }}">
                    <input type="hidden" name="amount_paid" value="{{ $grand_total }}">
                    <div class="form-group mb-2">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
                    </div>
                    <div class="form-group mb-2">
                        <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
                    </div>
                    <div class="form-group mb-2">
                        <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
                    </div>
                    <h6 class="text-center lead">Select Payment Mode</h6>
                    <div class="form-group">
                        <select name="pmode" class="form-control mb-2">
                            <option value="" selected disabled>-Select Payment Mode-</option>
                            <option value="cod">Cash On Delivery</option>
                            <option value="netbanking">Net Banking</option>
                            <option value="cards">Debit/Credit Card</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

</body>

</html>
