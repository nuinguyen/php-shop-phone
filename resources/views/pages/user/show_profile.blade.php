@extends('layout')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Thông Tin</h2>

        <form method="post" action="{{URL::to('/save-profile')}}">
            @csrf
            <div class="col-lg-6">
                <label for="exampleInputPassword1">Ho Va Ten</label>
                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Ho Ten">
                <label for="exampleInputPassword1">Ngay Sinh</label>
                <input type="date" class="form-control" name="birth"  value="{{Auth::user()->birth}}" placeholder="Ngay sinh">
                <label for="exampleInputPassword1">Gioi Tinh</label>
                <div>
                    <input type="radio" name="gender" id="Nam" {{Auth::user()->gender == "Nam" ? 'checked' : ''}} value="Nam"><label for="Nam">Nam</label>
                    <input type="radio" name="gender" id="Nu " {{Auth::user()->gender == "Nu" ? 'checked' : ''}} value="Nu"><label for="Nu">Nu</label>
                </div>
                <label for="exampleInputPassword1">Số điện thoại</label>
                <input type="text" name="phone" class="form-control"   value="{{Auth::user()->phone}}" placeholder="SDT">

            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn thành phố</label>
                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                        <option value="">--Chọn tỉnh thành phố--</option>
                        @foreach($city as $key => $ci)
{{--                            <option value="{{$ci->city_id}}"  >{{$ci->city_name}}</option>--}}
                            {{--                                <option value="{{Auth::user()->address != null ? (Auth::user()->address[2] == $ci->city_id ) : $ci->city_id }}" >{{$ci->city_name}}</option>--}}
                            <option value="{{$ci->city_id}} "{{Auth::user()->address != null ? ($address_city == $ci->city_name ? 'selected' : '') : ''}} >{{$ci->city_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                    <select name="district" id="district" class="form-control input-sm m-bot15 district choose">
                        <option value="">--Chọn quận huyện--</option>
                        @foreach($district as $key => $ci)
                            <option value="{{$ci->district_id}}" {{Auth::user()->address != null ? ($address_district == $ci->district_name ? 'selected' : '') : ''}} >{{$ci->district_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Chọn xã phường</label>
                    <select name="village" id="village" class="form-control input-sm m-bot15 village">
                        <option value="">--Chọn xã phường--</option>
                        @foreach($village as $key => $ci)
                            <option value="{{$ci->village_id}}" {{Auth::user()->address != null ? ($address_village == $ci->village_name ? 'selected' : '') : ''}} >{{$ci->village_name}}</option>
                        @endforeach
                    </select>
                </div>

                <label for="exampleInputPassword1">Thôn xóm đội</label>
                <input type="text" name="team" class="form-control" value="{{$address_team}}" placeholder="Thon xom">

            </div>
            <button type="submit" name="add_profile" class="btn btn-info">Lưu</button>

        </form>
    </div><!--features_items-->
    <!--/recommended_items-->
@endsection
