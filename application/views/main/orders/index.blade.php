@layout('layout.main')

@section('title')
Order History
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

    });
  </script>
@endsection 

@section('content')
  <div>
    <h1>Order History</h1>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Created Date</th>
          <th>Status</th>
          <th>View Detail</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($orders as $key => $order)
          <tr>
            <td class="center">{{ ++$key }}</td>
            <td class="center">{{ Helper::change_date_time_format($order->created_at) }}</td>
            <td class="center">{{ $order->status_text_for_customer }}</td>
            <td class="center">
              <a class="btn" href="/orders/{{ $order->id }}" title="Order detail"><i class="icon-list"></i></a>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="center">No order to display.</td></tr> 
        @endforelse
      </tbody>
    </table>
  </div>
@endsection