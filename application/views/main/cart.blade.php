@layout('layout.main')

@section('title')
Cart
@endsection

@section('css')
  @parent
  <style type="text/css" media="screen">
    #content div ul li div.thumbnail {
        border: 1px solid #DDDDDD;
        border-radius: 4px 4px 4px 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.055);
        display: block;
        line-height: 20px;
        padding: 4px;
        transition: all 0.2s ease-in-out 0s;
    }

    #content div ul.thumbnails > li {
      background-color: #F9F9F9;
      float: left;
      margin-bottom: 20px;
      margin-left: 20px;
      width: 220px;
      height: auto;
    }

    #content div ul li div.thumbnail div.caption  {
        color: #555555;
        padding: 9px;
        left: inherit;
        position: inherit;
        top: inherit;
    }

    #content div.product-tumbnail {
      background-position: center;
      background-size: cover;
      height: 64px;  
      width: 64px;  
      left: inherit;
      padding: inherit;
      margin: inherit;
      position: inherit;
      top: inherit;
    }

    #content div.caption ul  {
      margin-bottom: 16px;
    }

    #content div.caption ul li {
      float: none;
      height: inherit;
      width: inherit;
    }

    #content .table th {
      text-align: center;
    }

    #content tfoot {
      font-size: 18px;
      /*font-weight: bold;*/
    }

    #content div#services, #content div#about, #content div.btn {
      width: auto;
      margin: inherit;
      padding: 11px 19px;
      position: inherit;
    }

    #content div form input { margin: 0; }
    #content div form textarea { 
      height: auto;
      width: 206px; 
    }

    #content div h1 { 
      margin-bottom: 32px;
    }

    #content hr { margin: 16px 0; }
  </style>
@endsection 

@section('js')
  @parent
  {{ HTML::script('js/bootbox.min.js') }}
  <script>
    $(function() {
      $('#inputLocation').on('change', function() {
        var shippingFee = parseInt($('option:selected', this).attr('price'));
        var total = parseInt($('#total').html());
        var grandTotal = shippingFee + total

        $('#shipping-fee').html(shippingFee);
        $('#shipping-fee-input').val(shippingFee);
        $('#grand-total').html(grandTotal);
      });

      $('#submit-btn').on('click', function(event) {
          if ($('form')[0].checkValidity()) {
            event.preventDefault();
            bootbox.confirm("Confirm submit order", function(result) {
              if (result) {
                $('form').submit();
              }
            });
          }
      });

    });
  </script>
@endsection 

@section('content')
  <div>
    {{ Form::open('cart/checkout', 'POST', array('class' => 'form-horizontal')) }}
      <h1>Cart</h1>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Size</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $loop = 1;
            $total = 0;
          ?>
          @forelse ($cart as $product)
            <tr>
              <td>{{ $loop }}</td>
              <td><div class="product-tumbnail" style="background-image: url('{{ $product->image }}')"></div></td>
              <td>
                {{ $product->name }}
                <input 
                  type="hidden" 
                  name="orders[items][{{ $loop }}][product_id]" 
                  class="right" 
                  value="{{ $product->id }}"
                >
              </td>
              <td class="right">{{ $product->size }} {{ $product->unit }}</td>
              <td class="right">
                {{ Helper::add_comma($product->price) }}
                <input 
                  type="hidden" 
                  name="orders[items][{{ $loop }}][price]" 
                  class="right" 
                  value="{{ $product->price }}"
                >
              </td>
              <td class="right">
                <input 
                  type="text" 
                  name="orders[items][{{ $loop }}][quantity]" 
                  class="right" 
                  value="{{ $product->quantity }}"
                >
              </td>
              <td class="right">{{ Helper::add_comma($product->price * $product->quantity) }}</td>
              <td class="center">
                <a class="btn" href="/cart/remove/{{ $product->id }}" title="Remove this product from cart"><i class="icon-remove"></i></a>
              </td>
            </tr>
            <?php 
              $loop++;
              $total += ($product->price * $product->quantity);
            ?>
          @empty
            <tr><td colspan="8" class="center">No products in cart.</td></tr> 
          @endforelse
        </tbody>
      </table>
      @if (count($cart) > 0)
        <hr>
        <h1>Shipping Address</h1>
        <div class="control-group">
          <label for="inputName" class="control-label">Name</label>
          <div class="controls">
            <input 
              id="inputName" 
              name="orders[head][name]" 
              placeholder="Name" 
              required
              type="text" 
              value="{{ Auth::user()->name }}" 
            >
          </div>
        </div>
        <div class="control-group">
          <label for="inputTel" class="control-label">Tel</label>
          <div class="controls">
            <input 
              id="inputTel" 
              name="orders[head][tel]" 
              placeholder="Tel" 
              required
              type="text" 
              value="{{ Auth::user()->tel }}" 
            >
          </div>
        </div>
        <div class="control-group">
          <label for="inputLocation" class="control-label">Location</label>
          <div class="controls">
            <select id="inputLocation" name="orders[head][location_id]" required>
              <option value="" selected disabled>Please select</option>
              @foreach ($locations as $location)
                <option value="{{ $location->id }}" price="{{ $location->price }}">{{ $location->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="control-group">
          <label for="inputAddress" class="control-label">Address</label>
          <div class="controls">
            <textarea 
              type="text" 
              placeholder="Address" 
              id="inputAddress" 
              name="orders[head][address]" 
              required
            >{{ Auth::user()->address }}</textarea>
          </div>
        </div>
        <hr>
        <h1>Total</h1>
        <table class="table table-striped table-bordered">
          <tbody>
            <tr>
              <td class="right">Total</td>
              <td class="right">
                <span id="total">{{ Helper::add_comma($total) }}</span>
                <input 
                  id="total-input" 
                  name="orders[head][total]" 
                  type="hidden" 
                  value="{{ $total }}"
                >
              </td>
            </tr>
              <td class="right">Shipping fee</td>
              <td class="right">
                <span id="shipping-fee">0</span>
                <input 
                  id="shipping-fee-input" 
                  name="orders[head][shipping_fee]" 
                  type="hidden" 
                >
              </td>
          </tbody>
          <tfoot>
            </tr>
              <td class="right">Grand Total</td>
              <td class="right">
                <span id="grand-total">{{ $total }}</span>
              </td>
            </tr>
          </tfoot>
        </table>
        <hr>
        <div class="button-wraper right"><button type="submit" id="submit-btn" class="btn btn-large btn-primary">Buy</button></div>
      @endif
    </form> 
  </div>
@endsection