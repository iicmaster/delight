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
      margin-left: 16px;
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

    #content div ul li div div.product-tumbnail {
      background-position: center;
      background-size: cover;
      height: 200px;  
      width: 200px;  
      left: inherit;
      padding: inherit;
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

    #content div#services, #content div#about, #content div.span12,
    #content > div#services, #content > div#about, #content > div.span12 {
      width: 960px;
      padding: 0px;
    }

    #content div#services, #content div#about, #content div.row,
    #content > div#services, #content > div#about, #content > div.row {
      padding: 0;
      margin-left: -32px;
      width: inherit;
    }

    #content div h1 { 
      margin-bottom: 16px;
    }

  </style>
@endsection 

@section('content')
<div class="container">
  <h1>Products</h1>
  <div class="row">
    <div class="span12">
      <ul class="thumbnails">
        @foreach ($products as $product)
        <li class="span3">
          <div class="thumbnail">
            <div class="product-tumbnail" style="background-image: url('{{ $product->image }}')"></div>
            <div class="caption">
              <h5>{{ $product->name }}</h5>
              <ul>
                <li>Size: {{ $product->size }} {{ $product->unit }}</li>
                <li>Price: {{ $product->price }} ฿</li>
              </ul>
              <div class="center"><a class="btn" href="/cart/add/{{ $product->id }}">Add <i class="icon-shopping-cart"></i></a></div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>  
  </div>
</div>
@endsection