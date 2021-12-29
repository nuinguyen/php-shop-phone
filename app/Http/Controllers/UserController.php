<?php

namespace App\Http\Controllers;
use App\Banner;
use App\District;
use App\News;
use App\Order;
use App\OrderDetail;
use App\Classify;
use App\User;
use App\Category;
use App\Village;
use App\City;
use PhpParser\Node\Expr\Empty_;
use Psy\Util\Json;
use Session;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function quen_mat_khau(){
        return view('pages.user.forget_password');
    }
    public function recover_pass(Request $request){
        $data=$request->all();
//        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
//        $title_mail = "Lấy lại mật khẩu nuinguyen@gmail.com.com".' '.$now;
        $title_mail = "Lấy lại mật khẩu nuinguyen@gmail.com.com";
        $user = User::where('email',$data['user_email'])
            ->where('phone',$data['user_phone'])
            ->get();
        foreach($user as $key => $value){
            $user_id = $value->id;
        }

        if($user){
            $count_user = $user->count();
            if($count_user==0){
                return redirect()->back()->with('error', 'Email chưa được đăng ký để khôi phục mật khẩu');
            }else{
                $token_random = Str::random();
                $user = User::find($user_id);
//                $user->user_token = $token_random;
                $user->save();
                //send mail

                $to_email = $data['user_email'];//send to this email
                $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);

                $data = array("name"=>$title_mail,"body"=>$link_reset_pass,'email'=>$data['user_email']); //body of mail.blade.php

                Mail::send('pages.user.forget_password', ['data'=>$data] , function($message) use ($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);//send this mail with subject
                    $message->from($data['email'],$title_mail);//send from this mail
                });
                //--send mail
                return redirect()->back()->with('message', 'Gửi mail thành công,vui lòng vào email để reset password');
            }
        }
    }



//    public function order_my(Request $request){
//            $data=$request->all();
//        if($data['ord_id']=='1'){
//            $order_detail=OrderDetail::join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
//                ->join('tbl_order','tbl_order.order_id','=','tbl_order_detail.order_id')
//                ->where('tbl_order.user_id',Auth::user()->id)->where('order_status','0')->get();
//        }elseif($data['ord_id']=='2'){
//            $order_detail=OrderDetail::join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
//                ->join('tbl_order','tbl_order.order_id','=','tbl_order_detail.order_id')
//                ->where('tbl_order.user_id',Auth::user()->id)->where('order_status','1')->get();
//        }else{
//            $order_detail=OrderDetail::join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
//                ->join('tbl_order','tbl_order.order_id','=','tbl_order_detail.order_id')
//                ->where('tbl_order.user_id',Auth::user()->id)->where('order_status','2')->get();
//        }
//
//        $category=Category::orderby('category_id','asc')->get();
//        return view('pages.user.show_myorder')->with(compact('category','order_detail'));
//    }
    public function order_my(Request $request){
        $data=$request->all();
        if($data['ord_id']=='3'){
            $order_detail=OrderDetail::join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
                ->join('tbl_order','tbl_order.order_id','=','tbl_order_detail.order_id')
                ->join('tbl_classify','tbl_classify.classify_id','=','tbl_order_detail.classify_id')
                ->where('tbl_order.user_id',Auth::user()->id)->where('order_status','2')->get();
        }elseif($data['ord_id']=='2'){
            $order_detail=OrderDetail::join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
                ->join('tbl_order','tbl_order.order_id','=','tbl_order_detail.order_id')
                ->join('tbl_classify','tbl_classify.classify_id','=','tbl_order_detail.classify_id')
                ->where('tbl_order.user_id',Auth::user()->id)->where('order_status','1')->get();
        }elseif($data['ord_id']=='1' || $data['ord_id']==''){
            $order_detail=OrderDetail::join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
                ->join('tbl_order','tbl_order.order_id','=','tbl_order_detail.order_id')
                ->join('tbl_classify','tbl_classify.classify_id','=','tbl_order_detail.classify_id')
                ->where('tbl_order.user_id',Auth::user()->id)->where('order_status','0')->get();
        }

        $output = '';
        $output .= '
			 <table id="details" class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Hinh Anh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Thanh tien</th>
                </tr>
                </thead>
                <tbody>
				';

        foreach($order_detail as $key => $detail){

            $output.='
					<tr>
						<td>'.($key+1).'</td>
						<td><img src="'.url('public/uploads/product/'.$detail->product_image).'" class="img-thumbnail" width="100" height="100"></td>
						<td>'.$detail->product_name.'
						<br>
                        <button>'.$detail->classify_type.'-'.$detail->classify_value.'</button>
						</td>
						<td>'.$detail->order_detail_amount.'</td>
						<td>'.number_format($detail->product_price,0,',','.').'</td>
						<td>'.number_format(($detail->product_price)*($detail->order_detail_amount) ,0,',','.').'</td>

					</tr>
					';
        }

        $output.='
				</tbody>
				</table>
				';
        echo $output;
    }


    public  function my_order(){
//        $order_detail=OrderDetail::join('tbl_product','tbl_product.product_id','=','tbl_order_detail.product_id')
//        ->join('tbl_order','tbl_order.order_id','=','tbl_order_detail.order_id')
//        ->where('tbl_order.user_id',Auth::user()->id)->where('order_status','0')->get();

        //CATEGORY
        $category=Category::orderby('category_id','asc')->get();
        //BANNER
        $all_banner = Banner::orderBy('banner_id','DESC')->get();
        ///NEWS
        $news=News::where('news_status','1')->orderby('news_id','desc')->get();

        return view('pages.user.show_myorder')->with(compact('category','all_banner','news'));
    }
    public  function save_profile(Request $request){

        $city=City::where('city_id',$request->city)->first();
        $district=District::where('district_id',$request->district)->first();
        $village=Village::where('village_id',$request->village)->first();
        User::where('id', Auth::user()->id)
            ->update(
                ['name' => $request->name,
                    'birth' => $request->birth,
                    'gender' => $request->gender,
                    'phone' => $request->phone,
                    'address' => $request->team.'-'.$village->village_name .'-'.  $district->district_name.'-'. $city->city_name
                ]
            );
        // gán lại thông tin mới của khách vào session
//        Auth::user()->name = $request->name;
//        Auth::user()->birth = $request->birth;
//        Auth::user()->gender = $request->gender;
//        Auth::user()->phone = $request->phone;
//        Auth::user()->tinh = $request->tinh;
//        Auth::user()->huyen = $request->huyen;
//        Auth::user()->team = $request->team;
//        Auth::user()->address = $request->address;
        return Redirect::to('/profile');
    }
    public function select_address(Request $request){
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
    public function profile(){
        $city = City::orderby('city_id','ASC')->get();
        $district = District::orderby('district_id','ASC')->get();
        $village = Village::orderby('village_id','ASC')->get();
        $category=Category::orderby('category_id','asc')->get();
        $address=User::where('id',Auth::user()->id)->first();
        //BANNER
        $all_banner = Banner::orderBy('banner_id','DESC')->get();
        ///NEWS
        $news=News::where('news_status','1')->orderby('news_id','desc')->get();

        if($address->address){
            list($address_team,$address_village,$address_district,$address_city)=explode("-",$address->address);
        }else{
            $address_team='';
            $address_village='';
            $address_district='';
            $address_city='';
        }


        return view('pages.user.show_profile')->with(compact('category','city','district','village','address_city','address_team','address_district','address_village','all_banner','news'));
    }
    public function dang_ky(){
        return view ('pages.user.show_signup');
    }
    public function dang_nhap(){
        return view('admin_login');
    }
    public function dang_xuat(){
        Auth::logout();
        Session::put('customer_name',null);
        return view('admin_login');
    }
    public function signup(Request $request){
        $data=$request->all();

        $user=new User();
        $user->name=$data['user_name'];
        $user->email=$data['user_email'];
        $user->password=md5($data['user_password']);
        $user->level=2;

        $user->save();
        return redirect('/register-auth')->with('message','Dang Ky Thanh Coong');
    }
}
