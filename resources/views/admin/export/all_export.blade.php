

@extends('admin_layout')
@section('admin_content')
{{--    <form role="form" action="{{URL::to('/save-import')}}" method="post" enctype="multipart/form-data">--}}
{{--        {{ csrf_field() }}--}}

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">

                    <header class="panel-heading">
                        Danh sach nhap Hang
                    </header>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                    <div class="panel-body">

                        {{--                        <div class="position-center">--}}

                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Nhap kho</th>
                                <th>Ngay nhap</th>
                                <th>So san pham</th>
                                <th>Tong tien Nhap</th>
                                <th>Tac vu</th>
                            </tr>
                            </thead>
                            <tbody class="">

                            @foreach($export as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        @if ($item->export_status==1)
                                            <label class='badge badge-success'>Đã Xuat kho</label>
                                        @else
                                            <label class='badge badge-secondary'>Chờ xuat kho</label>
                                        @endif
                                    </td>
                                    <td>{{$item->export_date}}</td>
                                    <td>{{$item->count_all}}</td>
                                    <td>{{$item->total_all}}</td>
                                    <td>
                                        @if ($item->export_status==1)
                                            <a href="{{URL::to('/show-export/'.$item->export_id)}}"><button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Xem</button></a>
                                        @else

                                            <a href="{{URL::to('/add-export/'.$item->export_id)}}"><button class="btn btn-success btn-sm"> Nhập kho</button></a>
                                            <a href=""><button class="btn btn-warning btn-sm">Sửa</button></a>
                                            <form role="form" action="{{URL::to('/delete-export/'.$item->export_id)}}" method="post" >
                                                @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Xóa</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                        <button type="submit"  name="import_status" value="0" class="btn btn-info add_import">Thêm DS hoa don</button>
                    </div>

                    {{--                    </div>--}}

                </section>
            </div>

        </div>
{{--    </form>--}}

    <script>
        $(document).ready(function(){
            $('.tags_select_choose').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
        }) ;
    </script>
@endsection



