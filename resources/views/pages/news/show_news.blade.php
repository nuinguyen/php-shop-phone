@extends('layout')
{{--@section('sidebar')--}}
{{--  @include('pages.include.sidebar')--}}
{{--@endsection--}}
@section('content')
    <div class="features_items">


        <div class="product-image-wrapper" style="border: none;">

            @foreach($news_detail as $key => $all_news_detail)
                <div class="single-products" style="margin:10px 0;padding: 2px">
                    <div class="text-center">

                        <img style="float:left;width:30%;padding: 5px;height: 150px" src="{{asset('public/uploads/news/'.$all_news_detail->news_detail_image)}}" alt="{{$all_news_detail->news_detail_id}}" />

                        <h4 style="color:#000;padding: 5px;">{{$all_news_detail->news_detail_name}}</h4>
                        <p >{!!$all_news_detail->news_detail_summary!!}</p>


                    </div>
                    <div class="text-right">
                        <a  href="{{url('/chi-tiet-tin-tuc/'.$all_news_detail->news_detail_id)}}" class="btn btn-default btn-sm">Xem bài viết</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            @endforeach

        </div>

    </div><!--features_items-->
    <ul class="pagination pagination-sm m-t-none m-b-none">

{{--        {!!$all_news_detail->links()!!}--}}

    </ul>
    <!--/recommended_items-->
@endsection
