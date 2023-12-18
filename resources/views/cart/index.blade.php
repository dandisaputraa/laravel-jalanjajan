<!DOCTYPE html>
<html lang="en">


@extends('layouts.app')

<body>
    
    @include('components.navbar')

    <div class="container mt-5">
        <div style="display:{{ session('showAlert', 'none') }}" class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('message') }}</strong>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center mt-5">
                <thead>
                    <tr>
                        <td colspan="7">
                            <h4 class="text-center text-info m-0">Products in your cart!</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>
                            <a href="{{ route('cart.clear') }}" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');">
                                <i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td>{{ $cart->id }}</td>
                            <td><img src="{{ asset('storage/' . $cart->product_image) }}" width="50"></td>
                            <td>{{ $cart->product_name }}</td>
                            <td>Rp.{{ number_format($cart->product_price, 2) }}</td>
                            <td>
                                <input type="number" class="form-control itemQty" data-pid="{{ $cart->id }}" value="{{ $cart->qty }}" style="width:75px;">
                            </td>
                            <td>Rp.{{ number_format($cart->total_price, 2) }}</td>
                            <td>
                                <a href="{{ route('cart.remove.item', ['id' => $cart->id]) }}" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">
                            <a href="{{ url('/kuliner') }}" class="btn btn-success">
                                <i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping
                            </a>
                        </td>
                        <td colspan="2"><b>Grand Total</b></td>
                        <td><b>Rp.{{ number_format($grandTotal, 2) }}</b></td>
                        <td>
                            <a href="{{ url('/order') }}" class="btn btn-info {{ ($grandTotal > 1) ? '' : 'disabled' }}">
                                <i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>


</body>
</html>