@extends('master')
@section('header1')
    <meta name="description" content="erp" />
	<title>chantosweb erp</title>
    
@endsection

@section('content')
<div class="container-fluid text-center alterdiv1"> 
 <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">
        <h3 align="left">Your Cart</h3>

        <hr>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif
        <div class="panel-body">  
    <div class="container">
        
        @if (sizeof(Cart::content()) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image">Image</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Cart::content() as $item)
                    <tr> 
                        <td class="table-image"><a href="{{ url('/product', [$item->id]) }}">
                        <img src="{{ asset($item->model->image) }}" class="imgstyle" width="75" height="75" alt="{{$item->name}}" /></a></td>
                        <td><a href="{{ url('/product', [$item->id]) }}">{{ $item->name }}</a></td>
                        <td>
                            <form action="{{ url('/update', [$item->rowId]) }}" method="POST" >
                                {!! csrf_field() !!}
                            <select class="quantity" name="quantity"  data-id="{{ $item->rowId }}">
                                <option {{ $item->quantity }}>{{ $item->quantity }}</option>
                                <option {{ $item->quantity == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $item->quantity == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $item->quantity == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $item->quantity == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $item->quantity == 5 ? 'selected' : '' }}>5</option>
                                <option {{ $item->quantity == 6 ? 'selected' : '' }}>6</option>
                                <option {{ $item->quantity == 7 ? 'selected' : '' }}>7</option>
                                <option {{ $item->quantity == 8 ? 'selected' : '' }}>8</option>
                                <option {{ $item->quantity == 9 ? 'selected' : '' }}>9</option>
                                <option {{ $item->quantity == 10 ? 'selected' : '' }}>10</option>
                            </select><input type="submit" class="btn btn-info btn-sm" value="change">
                            </form>
                        </td>
                        </td>
                        <td>${{ $item->subtotal }}</td>
                        <td class=""></td>
                        <td>
                        <table><tr><td>
                            <form action="{{ url('/remove', [$item->rowId]) }}" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{ $item->rowId }}">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>
                                    </td><td>
                            <form action="" method="POST">
                                {!! csrf_field() !!} 
                                <input type="hidden" name="id" value="{{ $item->rowId }}">
                                <input type="submit" class="btn btn-default btn-sm" value="To Wishlist">
                            </form>
                            </td></tr></table>
                        </td>
                    </tr>

                    @endforeach
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                        <td>${{ Cart::instance('default')->subtotal() }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="table-image"></td>
                        <td></td>
                        <td class="small-caps table-bg" style="text-align: right">Tax</td>
                        <td>${{ Cart::instance('default')->tax() }}</td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr class="border-bottom">
                        <td class="table-image"></td>
                        <td style="padding: 40px;"></td>
                        <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                        <td class="table-bg">${{ Cart::total() }}</td>
                        <td class="column-spacer"></td>
                        <td></td>
                    </tr>

                    <tr class="border-bottom">
                        <td colspan="2"> <a href="{{ url('/') }}" class="btn btn-primary btn-sm">Continue Shopping</a></td>
                        <td  colspan="2">@if(Auth::check())
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" accept-charset="utf-8"> 
            <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="charset" value="utf-8" /> 
                    <input type="hidden" name="business" value="info@chantosweb.com"> 
                    <input type="hidden" name="item_name" value="Chantos Dummy store"> 
                    <input type="hidden" name="amount" value="{{ Cart::total() }}">
                    <input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
                    <input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    <input type="submit" value="Proceed to Checkout" class="btn btn-success btn-sm">
                    </form>
                     @else
                        <a href="{{ url('/signin') }}"  class="btn btn-primary btn-sm">please login/signup to checkout</a>
                        @endif</td>
                        <td  colspan="2"><form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-sm" value="Empty Cart">
                </form></td>
                    </tr>
                </tbody>
            </table>

        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ url('/') }}" class="btn btn-primary btn-sm">Continue Shopping</a>

        @endif


    </div> <!-- end container -->
</div>
</div> <!-- end container -->
</div>
@endsection