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

    <title>ThankYou</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="">
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

<body>
        <div class="text-center">
            <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
            <h2 class="text-success">Your Order Placed Successfully!</h2>
            <h4 class="bg-danger text-light rounded p-2">Items Purchased : ' . $products . '</h4>
            <h4>Your Name : ' . $name . '</h4>
            <h4>Your E-mail : ' . $email . '</h4>
            <h4>Your Phone : ' . $phone . '</h4>
            <h4>Total Amount Paid : ' . number_format($amount_paid,2) . '</h4>
            <h4>Payment Mode : ' . $pmode . '</h4>
        </div>    
</body>
</html>