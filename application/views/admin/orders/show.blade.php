@layout('layout.admin')

@section('title')
Order no: {{ $order->id }}
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
      margin-bottom: 16px;
    }

    #content hr { margin: 16px 0; }

    #content .form-horizontal .control-group {
      margin-bottom: 0;
    }

    #content .form-horizontal label:after {
      content: ':';
    } 

    #content .form-horizontal .controls {
      font-size: 14px;
      padding-top: 2px;
    }
  </style>
@endsection 

@section('js')
  @parent
  {{ HTML::script('js/bootbox.min.js') }}
  <script>
    $(function() {

    });
  </script>
@endsection 

@section('content')
  <div>
    <section id="order-detail">
      <h1>Order #{{ $order->id }}</h1>
      <p>Created Date: {{ Helper::change_date_time_format($order->created_at) }}</p>
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
          </tr>
        </thead>
        <tbody>
          <?php 
            $loop = 1;
            $total = 0;
          ?>
          @forelse ($order->items as $item)
            <tr>
              <td class="center">{{ $loop }}</td>
              <td><div class="product-tumbnail" style="background-image: url('{{ $item->product->image }}')"></div></td>
              <td>
                {{ $item->product->name }}
              </td>
              <td class="right">{{ $item->product->size }} {{ $item->product->unit }}</td>
              <td class="right">{{ Helper::add_comma($item->price) }}</td>
              <td class="right">{{ $item->quantity }}</td>
              <td class="right">{{ Helper::add_comma($item->price * $item->quantity) }}</td>
            </tr>
            <?php 
              $loop++;
              $total += ($item->price * $item->quantity);
            ?>
          @empty
            <tr><td colspan="8" class="center">No products in cart.</td></tr> 
          @endforelse
        </tbody>
      </table>
    </section>
    <hr>
    <section id="materials">
      <h1>Materials</h1>
      @if($is_out_of_stock)
        <div class="alert alert-block alert-error">Your materials is not enough for baking.</div>
      @endif
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th class="span1">#</th>
            <th>Name</th>
            <th>Stock Remain</th>
            <th>Required</th>
            <th>Unit</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($materials as $loop => $material)
            <tr class="{{ ($material['remain'] < $material['quantity']) ? 'error' : '' }}">
              <td class="center">{{ $loop++ }}</td>
              <td>{{ $material['name'] }}</td>
              <td class="right">{{ Helper::add_comma($material['remain']) }}</td>
              <td class="right">{{ $material['quantity'] }}</td>
              <td class="right">{{ $material['unit'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>
    <hr>
    <section id="shipping-address">
      <h1>Shipping Address</h1>
      <div class="form-horizontal">
        <div class="control-group">
          <label for="inputName" class="control-label">Name</label>
          <div class="controls"><p>{{ Auth::user()->name }}</p></div>
        </div>
        <div class="control-group">
          <label for="inputTel" class="control-label">Tel</label>
          <div class="controls"><p>{{ Auth::user()->tel }}</p></div>
        </div>
        <div class="control-group">
          <label for="inputLocation" class="control-label">Location</label>
          <div class="controls"><p>{{ $order->location->name }}</p></div>
        </div>
        <div class="control-group">
          <label for="inputAddress" class="control-label">Address</label>
          <div class="controls"><p>{{ Auth::user()->address }}</p></div>
        </div>
      </div>
    </section>
    <hr>
    <section id="total">
      <h1>Total</h1>
      <table class="table table-bordered">
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
                name="orders[head][shiping_fee]" 
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
    </section>
    <hr>
    <section id="page-buttons">
      <div class="right">
        <a href="/admin/orders" class="btn pull-left">Back</a>
        @if($order->stauts == 0)
          <a 
            href="{{ ($material['remain'] < $material['quantity']) ? 'javascript:void(0)' : '/admin/orders/baking/'.$order->id }}" 
            class="btn btn-large btn-primary {{ ($material['remain'] < $material['quantity']) ? 'disabled' : '' }}"
          >Baking</a>
        @endif
      </div>
    </section>
  </div>
@endsection