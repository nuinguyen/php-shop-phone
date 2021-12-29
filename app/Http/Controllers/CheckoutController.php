<?php

namespace App\Http\Controllers;

use App\Banner;
use App\News;
use App\Product;
use App\Sale;
use App\Ship;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Category;
use App\Cart;
use App\CartDetail;
use Auth;
use App\City;
use App\District;
use App\Village;
use App\Receiver;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\Redirect;




class CheckoutController extends Controller
{

    public function chot_don(Request $request){

        $statement = DB::select("SHOW TABLE STATUS LIKE 'tbl_order'");
        $nextId = $statement[0]->Auto_increment;

        $data = $request->all();
        $cartDetail = CartDetail::join('tbl_product','tbl_cart_detail.product_id','=','tbl_product.product_id')
            ->join('tbl_cart','tbl_cart.cart_id','=','tbl_cart_detail.cart_id')->where('tbl_cart.user_id',Auth::user()->id)
            ->whereIn('tbl_product.product_id', $data['key'])
            ->get()->toArray();
//        dd($cartDetail);
        $city=City::where('city_id',$data['city'])->first();
        $district=District::where('district_id',$data['district'])->first();
        $village=Village::where('village_id', $data['village'])->first();
        $receiver = new Receiver();
        if($data['receiver_name'] && $data['receiver_phone'] && $data['receiver_team'] && $data['city'] && $data['district'] && $data['village'] ){
            $receiver->receiver_name = $data['receiver_name'];
            $receiver->receiver_phone = $data['receiver_phone'];
            $receiver->receiver_address = $request->receiver_team.'-'.$village->village_name .'-'.  $district->district_name.'-'. $city->city_name;
        }else{
            $receiver->receiver_name =Auth::user()->name;
            $receiver->receiver_phone = Auth::user()->phone;
            $receiver->receiver_address = Auth::user()->address;
        }
        $receiver->receiver_note = $data['receiver_note'];
        $receiver->save();
        $receiver_id = $receiver->receiver_id;
//        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->receiver_id = $receiver_id;
        $order->order_method=$data['order_method'];
        $order->order_status=0;
        $order->order_total=$data['order_total'];
        $order->order_ship = $data['order_ship'];
        $order->order_sale = 'sale';
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();

            foreach( $cartDetail as $key => $cart){
                $order_detail = new OrderDetail();
                $order_detail->order_id =$nextId;
                $order_detail->product_id = $cart['product_id'];
                $order_detail->classify_id = $cart['classify_id'];
                DB::table('tbl_cart_detail')->where('product_id',$cart['product_id'])->delete();
                $order_detail->order_detail_amount = $cart['cart_detail_amount'];
                $order_detail->save();
            }
        return Redirect::to('/');
    }


    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp'] && $data['maqh'] && $data['xaid']){
        $feeship = Ship::where('city_id',$data['matp'])->where('district_id',$data['maqh'])->where('village_id',$data['xaid'])->first();

        }else{
        $address=User::where('id',Auth::user()->id)->first();
        list($address_team,$address_village,$address_district,$address_city)=explode("-",$address->address);
        $feeship = Ship::where('city_name',$address_city)->where('district_id',$address_district)->where('village_id',$address_village)->first();
        }
        if($feeship){
            $output = '';
            $all_total=($feeship->ship_feeship+$data['order_total']);
            $output .= '
			 <p> Phi Van chuyen la: '.number_format($feeship->ship_feeship,0,',','.').' '.'VNĐ'.' </p>
			 <p> Tong tien la: '.number_format($all_total,0,',','.').' '.'VNĐ'.' </p>
			 <input type="hidden" name="order_ship" class="order_ship" value="'.$feeship->ship_feeship.'">
             <input type="hidden" name="order_total" class="order_total" value="'.$all_total.'">
				';
        }
        else{
            $output = '';
            $all_total=(25000+$data['order_total']);
            $output .= '
			 <p> Phi Van chuyen la: '.number_format(25000,0,',','.').' '.'VNĐ'.' </p>
			 <p> Tong tien la: '.number_format($all_total,0,',','.').' '.'VNĐ'.' </p>
               <input type="hidden" name="order_ship" class="order_ship" value="25000">
             <input type="hidden" name="order_total" class="order_total" value="'.$all_total.'">
				';
        }
//        Session::put('total',$all_total);
        echo $output;
    }


    public function select_ship_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_district = District::where('city_id',$data['ma_id'])->orderby('district_id','ASC')->get();
                $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_district as $key => $district){
                    $output.='<option value="'.$district->district_id.'">'.$district->district_name.'</option>';
                }
            }else{

                $select_village = Village::where('district_id',$data['ma_id'])->orderby('village_id','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>';
                foreach($select_village as $key => $village){
                    $output.='<option value="'.$village->village_id.'">'.$village->village_name.'</option>';
                }
            }
            echo $output;
        }
    }

    public function check_out(Request $request){
        $data=$request->all();
        $address=User::where('id',Auth::user()->id)->first();
        list($address_team,$address_village,$address_district,$address_city)=explode("-",$address->address);
        $city_id=City::where('city_name',$address_city)->first();
        $district=District::where('district_name',$address_district)->first();
        $village=Village::where('village_name',$address_village)->first();
        $feeship = Ship::where('city_id',$city_id->city_id)->where('district_id',$district->district_id)->where('village_id',$village->village_id)->first();
        if($feeship==null){
            $ship_feeship=25000;
        }else{
            $ship_feeship=$feeship->ship_feeship;
        }
        //CATEGORY
        $city = City::orderby('city_id','ASC')->get();
        $show=CartDetail::join('tbl_product','tbl_cart_detail.product_id','=','tbl_product.product_id')
            ->join('tbl_cart','tbl_cart.cart_id','=','tbl_cart_detail.cart_id')
            ->join('tbl_classify','tbl_classify.classify_id','=','tbl_cart_detail.classify_id')
            ->where('tbl_cart.user_id',Auth::user()->id)
            ->whereIn('tbl_product.product_id', $data['product'])
            ->get();
        $category=Category::orderby('category_id','asc')->get();
        //BANNER
        $all_banner = Banner::orderBy('banner_id','DESC')->get();
        //NEWS
        $news=News::orderby('news_id',"ASC")->get();

        //dd($ship_feeship);


        return view ('pages.checkout.show_checkout')->with(compact('category','city','show','all_banner','ship_feeship','news'));
    }








    public function calculate_sale(Request $request){
        $data = $request->all();
        $sale = Sale::where('sale_code',$data['sale_code'])->first();
//        if($sale){
        $output = '';
        $output .= '
			 <p> Ma Giam Gia la: '.number_format($sale->sale_number,0,',','.').' '.'VNĐ'.' </p>
				';
        $cou[] = array(
            'sale_code' => $sale->sale_code,
            'sale_condition' => $sale->sale_condition,
            'sale_number' => $sale->sale_number,
        );
        Session::put('sale',$cou);
//                    }
//                Session::save();
//                Session::put('message','Thêm mã giảm giá thành công');
//            }
//        }else{
//            Session::put('error','Mã giảm giá không đúng');
//        }
        echo $output;

    }
    public function clculate_sale(Request $request){
        $data = $request->all();
        $sale = Sale::where('sale_code',$data['sale_code'])->first();
        if($sale){
            $count_coupon = $sale->count();
            if($count_coupon>0){
                $coupon_session = Session::get('sale');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
//                        $cou[] = array(
//                            'sale_code' => $sale->sale_code,
//                            'sale_condition' => $sale->sale_condition,
//                            'sale_number' => $sale->sale_number,
//
//                        );
//                        Session::put('sale',$cou);
                    }
                }else{
//                    $cou[] = array(
//                        'sale_code' => $sale->sale_code,
//                        'sale_condition' => $sale->sale_condition,
//                        'sale_number' => $sale->sale_number,
//
//                    );
//                    Session::put('sale',$cou);
                }
                Session::save();
                Session::put('message','Thêm mã giảm giá thành công');
            }

        }else{
            Session::put('error','Mã giảm giá không đúng');
        }
    }

    public function clculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Ship::where('city_id',$data['matp'])->where('district_id',$data['maqh'])->where('village_id',$data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                    foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->ship_feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee',25000);
                    Session::save();
                }
            }

        }
    }






}
