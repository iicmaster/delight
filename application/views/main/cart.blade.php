@layout('layout.main')

@section('title')
Products
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

    #content tfoot {
      font-size: 16px;
      font-weight: bold;
    }
  </style>
@endsection 

@section('content')
  <div>
    <h1>Cart</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
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
            <td>{{ $product->name }}</td>
            <td class="span2 right">{{ $product->price }}</td>
          </tr>
          <?php 
            $loop++;
            $total += $product->price;
          ?>
        @empty
          <tr><td colspan="4"><p>No products in cart.</p></td></tr> 
        @endforelse
      </tbody>
      @if ($total > 0)
        <tfoot>
          <tr>
            <td colspan="3" class="right">Total</td>
            <td class="span2 right">{{ $total }}</td>
          </tr> 
        </tfoot>
      @endif

    </table>
  </div>
@endsection