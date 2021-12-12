


@extends('admin_layout')
@section('admin_content')
    <form role="form" action="{{URL::to('/save-import')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{--        {{(isset($show_import)) ? method_field('PUT') : ""}}--}}


        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <header class="panel-heading">
                        Nhap Hang
                    </header>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <div class="panel-body">

                        <div class="position-center">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nha cung cap</label>
                                <select name="import_provider" class="form-control input-sm m-bot15">
                                    @foreach($provider as $item)
                                        <option {{(isset($show_import) && $show_import[0]->provider_id == $item->provider_id)  ? "selected" : ""}}  value="{{$item->provider_id}}">{{$item->provider_name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" >San Pham</label>
                                <select name="import_product[]" class="tags_select_choose form-control input-sm m-bot15" multiple="multiple" >
                                    @if (isset($show_import))
                                        @foreach ($product as $key => $item)
                                            <option {{(in_array($item->product_id, $arrIdProduct)) ? "selected" : ""}} value="{{$item->product_id}}">{{$item->product_name}}</option>
                                        @endforeach
                                    @else
                                        @foreach ($product as $item)
                                            <option  value="{{$item->product_id}}">{{$item->product_name}} </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>So luong</th>
                                    <th>Thanh tien</th>
                                </tr>
                                </thead>
                                <tbody class="list_product">
                                @if (isset($show_import))
                                    @foreach ($show_import as $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->product_name}}</td>
                                            <td><input type="text" data-type="currency" name="price[]" class="form-control price_import text-right" value="{{($item->import_detail_price)}}"></td>
                                            <td><input type="number" name="amount[]" class="form-control text-right"  value="{{$item->import_detail_amount}}"></td>
                                            <td  class="total text-right">{{($item->import_detail_amount*$item->import_detail_price)}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                            <div class="row">

                                <div class="col-md-6"></div>
                                <div class="col-md-4">
                                    <p>Số lượng:</p>
                                    <p>Tổng tiền:</p>
                                    <!-- <p>Chi phí <small>(phí vận chuyển...)</small>:</p> -->
                                    <p class="p-t-15"><b>Tổng tiền thanh toán:</b></p>
                                </div>
                                <div class="col-md-2">
                                    <p class="totalAmount"><br></p>
                                    <p class="totalPrice"><br></p>
                                    <p><input type="text" class="form-control transport" name="cost" value="{{isset($show_import)?$show_import[0]->import_cost:0}}"></p>
                                    <p><b class="sumAll"></b></p>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ghi chus</label>
                                        <textarea style="resize: none" rows="8" class="form-control" name="import_note" id="exampleInputPassword1" placeholder="Nội dung sản phẩm">
                                            {{isset($show_import)?$show_import[0]->import_note:""}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            @if(isset($show_import))
                                <a href="{{URL::to('/all-import')}}"><button type="button"  name="import_status"   class="btn btn-info add_import">Thoat</button></a>
                            @else
                                <button type="submit"  name="import_status"  value="0" class="btn btn-info add_import">Thêm DS hoa don</button>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function(){
            $('.tags_select_choose').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
        }) ;
    </script>
@endsection



