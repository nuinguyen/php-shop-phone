
@extends('admin_layout')
@section('admin_content')
    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-lg-6">
                <section class="panel">

                    <header class="panel-heading">
                        Thêm sản phẩm
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
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="product_name" class="form-control " id="slug" placeholder="Tên danh mục" onkeyup="ChangeToSlug();">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="product_slug" class="form-control " id="convert_slug" placeholder="Tên danh mục">
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" >Phân loại</label>
                                <select name="product_classify[]" class="tags_select_choose form-control input-sm m-bot15" multiple="multiple" >
                                    @foreach ($classify as $item)
                                        <option  value="{{$item->classify_id}}">{{$item->classify_type}} - {{$item->classify_value}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Tom Tat sản phẩm</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="product_summary" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Nội dung sản phẩm"></textarea>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <section class="panel">
                    <div class="panel-heading">
                        Liệt kê danh mục sản phẩm
                    </div>
                    <div class="panel-body">


                        <div class="position-center">

                            <div class="table-responsive">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="product_category" class="form-control input-sm m-bot15">
                                        @foreach($category as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nha san xuat</label>
                                    <select name="product_producer" class="form-control input-sm m-bot15">
                                        @foreach($producer as $key => $prod)
                                            <option value="{{$prod->producer_id}}">{{$prod->producer_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nha cung cap</label>
                                    <select name="product_provider" class="form-control input-sm m-bot15">
                                        @foreach($provider as $key => $prov)
                                            <option value="{{$prov->provider_id}}">{{$prov->provider_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>


                                <div class="row">
                                    {{--                            <form action="{{url('/insert-gallery/'.$pro_id)}}" method="POST" enctype="multipart/form-data">--}}
                                    {{--                                @csrf--}}
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" id="file" name="file[]" accept="image/*" multiple>
                                        <span id="error_gallery"></span>
                                    </div>
                                    <div class="col-md-3" >
                                        <input type="submit" name="upload" name="taianh" value="Tải ảnh" class="btn btn-success ">
                                    </div>
                                    {{--                            </form>--}}

                                </div>
                                {{--                        <div class="row">--}}
                                {{--                            <form>--}}
                                {{--                                @csrf--}}
                                {{--                                <div id="gallery_load">--}}

                                {{--                                </div>--}}
                                {{--                            </form>--}}

                                {{--                        </div>--}}


                                <br>

                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </div>
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



