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
        <h3 align="left">Your Wishlist</h3>

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
    <div class="container">
       
        @if (sizeof(Cart::instance('wishlist')->content()) > 0)

            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image"></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                 @foreach (Cart::instance('wishlist')->content() as $item)
                    <tr>
                        <td class="table-image">
                        <img src="{{ asset('$item->model->image) }}"class="imgstyle" width="75" height="75" alt="{{$item->name}}" ></td>
                        <td>{{ $item->name }}</td>

                        <td>${{ $item->subtotal }}</td>
                        <td class=""></td>
                        <td><table><tr><td>
                            <form action="{{ url('/remove', [$item->rowId]) }}" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{{ $item->rowId }}">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>
                                    </td><td>
                            <form action="{{ url('/switchToCart', [$item->rowId]) }}" method="POST">
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

                </tbody>
            </table>

            <a href="{{ url('/') }}" class="btn btn-primary btn-sm">Continue Shopping</a> &nbsp;
            <a href="#" class="btn btn-success btn-sm">Proceed to Checkout</a>

            <div style="float:right">
                <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-sm" value="Empty Cart">
                </form>
            </div>

        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ url('/') }}" class="btn btn-primary btn-sm">Continue Shopping</a>

        @endif


    </div> <!-- end container -->
</div>
</div> <!-- end container -->
</div>
@endsection