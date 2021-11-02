<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;
use App\Product;
use App\Category;
use App\Producer;
use App\Provider;
use DB;
use App\ProductClassify;
use App\Albums;
use App\Classify;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function product(){
        $category=Category::orderby('category_id','asc')->get();
        $provider=Provider::orderby('provider_id','asc')->get();
        $producer=Producer::orderby('producer_id','asc')->get();
        $classify=Classify::orderby('classify_id','asc')->get();

        return view('admin.product.product')->with(compact('category','provider','producer','classify'));
    }
    public function all_product(){

        $all_product=Product::orderby('product_id','desc')
            ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
            ->get();
        return view('admin.product.all_product')->with(compact('all_product'));

    }

    public function save_product(Request $request){

        $statement = DB::select("SHOW TABLE STATUS LIKE 'tbl_product'");

        $nextId = $statement[0]->Auto_increment;

        $data = $request->all();
        $product = new Product();
        $product->product_name = $data['product_name'];
        $product->product_slug = $data['product_slug'];
        $product->product_price = $data['product_price'];
        $product->product_summary = $data['product_summary'];
        $product->product_desc = $data['product_desc'];
        $product->product_status = $data['product_status'];
        //--
        $product->category_id = $data['product_category'];
        $product->producer_id = $data['product_producer'];
        $product->provider_id = $data['product_provider'];
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$data['product_image']->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
        }
        $product->product_image = $data['product_image'];
        $product->save();

        $get_albumns = $request->file('file');
        if($get_albumns){
            foreach($get_albumns as $image){
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image =  $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('public/uploads/gallery',$new_image);
                $albums = new Albums();
                $albums->albums_image = $new_image;
                $albums->product_id = $nextId ;
                $albums->save();
            }
        }
        foreach ($data['product_classify'] as $classify){
            $arrclassify = new ProductClassify();
            $arrclassify->classify_id = $classify;
            $arrclassify->product_id = $nextId;
            $arrclassify->save();
        }

        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect('/product');
    }
    public function edit_category($category_id){
        $edit_category = Category::find($category_id);
        return view('admin.category.edit_category')->with(compact('edit_category'));
    }

    public function update_category(Request $request, $category_id){
        $data = $request->all();
        $category = Category::find($category_id);
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        $category->category_desc = $data['category_desc'];
        $category->category_status = $data['category_status'];
        $category->save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return redirect()->back();
    }
    public function delete_product($product_id){
        $delete_product = Product::find($product_id);
        $delete_product->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return redirect()->back();
    }

    ///////////// GARLLY \\\\\\\\\\\\\

    public function select_gallery(Request $request){
//        $product_id = $request->pro_id;
        $albums = Albums::where('product_id')->get();
        $albums_count = $albums->count();
        $output = ' <form>
    					'.csrf_field().'

    					<table class="table table-hover">
                                    <thead>
                                      <tr>
                                      	<th>Thứ tự</th>
                                        <th>Hình ảnh</th>
                                        <th>Quản lý</th>
                                      </tr>
                                    </thead>
                                    <tbody>

    	';
        if($albums_count>0){
            $i = 0;
            foreach($albums as $key => $album){
                $i++;
                $output.='

    				 <tr>
    				 					<td>'.$i.'</td>

                                        <img src="'.url('public/uploads/gallery/'.$album->albums_image).'" class="img-thumbnail" width="120" height="120">

                                        <input type="file" class="file_image" style="width:40%" data-gal_id="'.$album->albums_id.'" id="file-'.$album->albums_id.'" name="file" accept="image/*" />

                                        </td>
                                        <td>
                                        	<button type="button" data-gal_id="'.$album->albums_id.'" class="btn btn-xs btn-danger delete-gallery">Xóa</button>
                                        </td>
                                      </tr>
    			';
            }
        }else{
            $output.='
    				 <tr>
                                        <td colspan="4">Sản phẩm chưa thư viện ảnh</td>
                                      </tr>
    			';

        }
        $output.='
    				 </tbody>
    				 </table>
    				 </form>
    			';
        echo $output;
    }

    public function details_product($product_id){

        //CATEGORY
        $category=Category::where('category_status','1')->orderby('category_id','asc')->get();
        $product=Product::join('tbl_pro_class','tbl_pro_class.product_id','=','tbl_product.product_id')
            ->join('tbl_classify','tbl_pro_class.classify_id','=','tbl_classify.classify_id')
             ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')
            ->where('tbl_pro_class.product_id',$product_id)
            ->get();
//        ->join('tbl_pro_class','tbl_pro_class.product_id','=','tbl_product.product_id')
//            ->join('tbl_classify','tbl_pro_class.classify_id','=','tbl_classify.classify_id')
        //BANNER
//        dd($product);
        $all_banner = Banner::orderBy('banner_id','DESC')->get();


        $category_id=$product[0]->category_id;

        $albums=Albums::where('product_id',$product_id)->get();

        // tim san pham lien quan
        $related=Product::where('product_status','1')->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
            ->where('tbl_category.category_id',$category_id)
            ->whereNotIn('product_id',[$product_id])->paginate(3);

        return view('pages.product.show_details')->with(compact('category','product','related','albums','all_banner'));
    }

    public function quickview(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);

        $pro_class = ProductClassify::where('product_id',$product_id)
            ->join('tbl_classify','tbl_pro_class.classify_id','=','tbl_classify.classify_id')->get();
        $output['product_classify'] = '';

        foreach($pro_class as $key => $pl){
            $output['product_classify'].= '<button name="tick[]" class="tick"  value="'.$pl->classify_id.'">'.$pl->classify_type.'-'.$pl->classify_value.'</button>';
        }

        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
//        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price,0,',','.').'VNĐ';
        $output['product_image'] = '<p><img width="100%" src="public/uploads/product/'.$product->product_image.'"></p>';

        $output['product_button'] = '<input type="button" value="Them Gio Hang" class="btn btn-primary btn-sm add-to-cart-quickview" id="buy_quickview" data-id_product="'.$product->product_id.'"  name="add-to-cart">';

        $output['product_quickview_value'] = '

        <input type="hidden" value="'.$product->product_id.'" class="cart_product_id_'.$product->product_id.'">

        <input type="hidden" value="'.$product->product_amount.'" class="cart_product_amount_'.$product->product_id.'">

        <input type="hidden" value="1" class="cart_product_qty_'.$product->product_id.'">';

        echo json_encode($output);


    }


}
