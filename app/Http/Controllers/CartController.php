<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Category;
use App\Product;
use App\Cart;
use App\CartDetail;
use Auth;
//use Cart;

use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
    public function update_quantity(Request $request){
        $data=$request->all();
        $cart = Cart::where('user_id',Auth::user()->id )->first();
        $cartDetail = CartDetail::where('cart_id', $cart->cart_id)
            ->where('product_id', $data['cart_product_id'])
            ->update(['cart_detail_amount'=> $data['cart']]);
    }

    public function show_cart(){

        $show=CartDetail::join('tbl_cart','tbl_cart_detail.cart_id','=','tbl_cart.cart_id')
            ->where('tbl_cart.user_id',Auth::user()->id)->count();
        $output = '';
        $output.='<span class="badges">'.$show.'</span>';
        echo $output;
    }

    public function save_cart(Request $request){
        $data=$request->all();
        $cart = Cart::where('user_id',Auth::user()->id )->get();
        //check xem cos gio hang chua
        if(isset($cart[0]->user_id)){
            // nếu có giỏ hàng rồi thì lấy dssp trong giỏ
            $cartDetail = CartDetail::where('cart_id', $cart[0]->cart_id)
                ->where('product_id', $data['id'])
                ->get();
            /// check xem có sp chuẩn bị thêm đã có trong giỏ hàng chưa
            if (isset($cartDetail[0]->product_id)) {
                    if( $cartDetail[0]->classify_id==$data['classify_name'] ){
                        // nếu sp đã có trong giỏ hàng thì chỉ cần update thêm số lượng
                        CartDetail::where('cart_id', $cart[0]->cart_id)
                            ->where('product_id', $data['id'])
                            ->where('classify_id', $data['classify_name'])
                            ->update(['cart_detail_amount' => $cartDetail[0]->cart_detail_amount + $data['amount']]);
                    }else{
                        // nếu sp chưa có trong giỏ hàng thì thêm vào
                        $cartDetail = new CartDetail();
                        $cartDetail->cart_id = $cart[0]->cart_id;
                        $cartDetail->product_id = $data['id'] ;
                        $cartDetail->cart_detail_amount = $data['amount'];
                        $cartDetail->classify_id = $data['classify_name'] ;
                        $cartDetail->save();
                    }

            } else {
                // nếu sp chưa có trong giỏ hàng thì thêm vào
                $cartDetail = new CartDetail();
                $cartDetail->cart_id = $cart[0]->cart_id;
                $cartDetail->product_id = $data['id'] ;
                $cartDetail->cart_detail_amount = $data['amount'];
                $cartDetail->classify_id = $data['classify_name'] ;
                $cartDetail->save();
            }
        }
        else{
            // neesu kh chua cho gio hang
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();

            $cartdetail = new CartDetail();
            $cartdetail->cart_detail_amount = $data['amount'];
            $cartdetail->cart_id = $cart->cart_id ;
            $cartdetail->product_id = $data['id'] ;
            $cartdetail->classify_id = $data['classify_name'] ;
            $cartdetail->save();
        }
    }

    public function save_to_cart(Request  $request){
        $data=$request->all();
        $cart = Cart::where('user_id',Auth::user()->id )->get();
        //check xem cos gio hang chua
        if(isset($cart[0]->user_id)){
            // nếu có giỏ hàng rồi thì lấy dssp trong giỏ
            $cartDetail = CartDetail::where('cart_id', $cart[0]->cart_id)
                ->where('product_id', $data['id'])
                ->get();
            /// check xem có sp chuẩn bị thêm đã có trong giỏ hàng chưa
            if (isset($cartDetail[0]->product_id)) {
                if( $cartDetail[0]->classify_id==$data['classify_name'] ){
                    // nếu sp đã có trong giỏ hàng thì chỉ cần update thêm số lượng
                    CartDetail::where('cart_id', $cart[0]->cart_id)
                        ->where('product_id', $data['id'])
                        ->where('classify_id', $data['classify_name'])
                        ->update(['cart_detail_amount' => $cartDetail[0]->cart_detail_amount + $data['amount']]);
                }else{
                    // nếu sp chưa có trong giỏ hàng thì thêm vào
                    $cartDetail = new CartDetail();
                    $cartDetail->cart_id = $cart[0]->cart_id;
                    $cartDetail->product_id = $data['id'] ;
                    $cartDetail->cart_detail_amount = $data['amount'];
                    $cartDetail->classify_id = $data['classify_name'] ;
                    $cartDetail->save();
                }
            } else {
                // nếu sp chưa có trong giỏ hàng thì thêm vào
                $cartDetail = new CartDetail();
                $cartDetail->cart_id = $cart[0]->cart_id;
                $cartDetail->product_id = $data['id'] ;
                $cartDetail->cart_detail_amount = $data['amount'];
                $cartDetail->classify_id = $data['classify_name'] ;
                $cartDetail->save();
            }
        }else{           // neesu kh chuwa cho gio hang

            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();

            $cartdetail = new CartDetail();
            $cartdetail->cart_detail_amount = $data['amount'];
            $cartdetail->cart_id = $cart->cart_id ;
            $cartdetail->product_id = $data['id'] ;
            $cartdetail->classify_id = $data['classify_name'] ;
            $cartdetail->save();
        }
    }

    public function cart(){
//        Session::put('message',Auth::user()->id);
        ///CATEGORY
        $show=CartDetail::join('tbl_product','tbl_cart_detail.product_id','=','tbl_product.product_id')
            ->join('tbl_cart','tbl_cart.cart_id','=','tbl_cart_detail.cart_id')
            ->join('tbl_classify','tbl_classify.classify_id','=','tbl_cart_detail.classify_id')
            ->where('tbl_cart.user_id',Auth::user()->id)->get();
        $category=Category::orderby('category_id','asc')->get();
        //BANNER
        $all_banner = Banner::orderBy('banner_id','DESC')->get();
        return view('pages.cart.show_cart')->with(compact('category','show','all_banner'));
    }

    public function delete_to_cart($pro_id){
        $cart=Cart::where('user_id',Auth::user()->id )->get();
        $delete_cart_detail = CartDetail::where('product_id',$pro_id)->where('cart_id',$cart[0]->cart_id);
        $delete_cart_detail->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return Redirect::to('/cart');
    }
}
//
//public function ad_cart_ajax(Request $request){
//
//    $data=$request->all();
//
//
//    $cart = Cart::where('user_id',Auth::user()->id )->get();
//
//    //check xem cos gio hang chua
//    if(isset($cart[0]->user_id)){
//        // nếu có giỏ hàng rồi thì lấy dssp trong giỏ
//        $cartDetail = CartDetail::where('cart_id', $cart[0]->cart_id)
//            ->where('product_id', $data['cart_product_id'])
//            ->get();
//        /// check xem có sp chuẩn bị thêm đã có trong giỏ hàng chưa
//        if (isset($cartDetail[0]->product_id)) {
//            // nếu sp đã có trong giỏ hàng thì chỉ cần update thêm số lượng
////                    DB::table('cart_details')
////                        ->where('product_id', product_id)
////                        ->where('cart_id', $cart[0]->cart_id)
////                        ->update(['amount' => $cartDetail[0]->cart_detail_amount + $amount]);
//        } else {
//            // nếu sp chưa có trong giỏ hàng thì thêm vào
//            $cartDetail = new CartDetail();
//            $cartDetail->cart_id = $cart[0]->cart_id;
//            $cartDetail->product_id = $data['cart_product_id'];
//            $cartDetail->cart_detail_amount = $data['cart_product_amount'];
//            $cartDetail->save();
//        }
//    }
//
//    else{           // neesu kh chuwa cho gio hang
//
//        $cart = new Cart();
//        $cart->user_id = Auth::user()->id;
//        $cart->save();
//
//        $cartdetail = new CartDetail();
//        $cartdetail->cart_detail_amount = $data['cart_product_amount'];
//        $cartdetail->cart_id = $cart->cart_id ;
//        $cartdetail->product_id = $data['cart_product_id'] ;
//        $cartdetail->save();
//    }
//    return Redirect::to('/cart');
//
//}
