@extends('layout')
@section('content')
    <form method="post" action="{{url('/check-out')}}">
        @csrf
    <section id="cart_items">
        <div class="containerr">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr class="cart_menu">
                        <td class="item" style="padding-left: 50px">
                            <input type="checkbox" class="all_product"  value="" name="" >
                        </td>
                        <td class="image">Sản phẩm</td>
                        <td class="image"></td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="quantity">Thành tiền</td>
                        <td class="total"></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach($show as $key => $value)
                        <tr class="cross"  >
                            <td class="cart_product_id">
                                <input type="checkbox" class="product"  value="{{$value->product_id}}" name="product[]" >
                            </td>
                            <td class="cart_description" >

                                <p><img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" width="90" alt="" /></p>
                            </td>
                            <td>
                                <p>
                                    {{$value->product_name}} <br>
                                    <button>{{$value->classify_type.'-'.$value->classify_value}}</button>
                                </p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($value->product_price,0,',','.').' '.'VNĐ'}}</p>
                                <input type="hidden" class="to_price" value="{{$value->product_price}}" name="price" >

                            </td>
                            <td class="cart_amount" >
{{--                                    <div class="cart_quantity_button">--}}
                                <input type="button" class="cart_quantity_down" name="cart_quantity_down"  data-id_product="{{$value->product_id}}" value="-" >
{{--                                <span id="up_amount">--}}
                                    <input class="cart_quantity_input_{{$value->product_id}}"  id="amount" data-amount="{{$value->cart_detail_amount}}"   type="text" name="cart_amount[]" value="{{$value->cart_detail_amount}}" autocomplete="off" size="2">
{{--                                </span>--}}
                                <input  class="cart_product_id_{{$value->product_id}}" value="{{$value->product_id}}" type="hidden" autocomplete="off" size="2">
                                <input type="button" class="cart_quantity_up" name="cart_quantity_up"  data-id_product="{{$value->product_id}}" value="+" >
{{--                                    </div>--}}
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($subtotal = $value->product_price*$value->cart_detail_amount,0,',','.').' '.'VNĐ'}}</p>
                            </td >
                            <td class="cart_description">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$value->product_id)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-7">

                    </div>
                    <div class="col-sm-5">
                        <h4 style="color: red" class="tong">
                            <div id="total">
                            </div>

                        </h4>


                    </div>
                </div>
            </div>


        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="containerr">
            <div class="row">
                <div class="col-sm-12">
                    <center>

                        <div id="order">

                        </div>

                    </center>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
    </form>



@endsection

