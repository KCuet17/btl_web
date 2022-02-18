<?php

namespace App\Http\Controllers;
use Session ;
use Illuminate\Http\Request;
use DB ;
use Illuminate\Support\Facades\Redirect ;

class HomeController extends Controller
{

    public function search(Request $req){
       
        $keywords = $req->keywords_submit ;

        $search_room = DB::table('tbl_category_product')
        ->orwhere('phong_id','like','%'.$keywords.'%')
        ->orwhere('gia_phong','like','%'.$keywords.'%')
        ->orwhere('quan','like','%'.$keywords.'%')
        ->orwhere('so_nha_duong','like','%'.$keywords.'%')
        ->orwhere('phuong_xa','like','%'.$keywords.'%')
        ->orwhere('loai_phong','like','%'.$keywords.'%')
        ->orwhere('che_do_phong','like','%'.$keywords.'%')
        ->orwhere('tieu_de_phong','like','%'.$keywords.'%')
        ->get();
        
        return view('pages.search')->with('search_room',$search_room);
        // SELECT * FROM authors INNER JOIN books ON books.`author_id` = authors.`id` INNER JOIN categories ON books.`category_id` = categories.`id` WHERE authors.`author_name` LIKE "%2%";
    }

    public function search_product($araara){
        $search_room = array();
        if($araara == 1){
            $search_room = DB::table('tbl_category_product')
            ->where('loai_phong','Chung cư')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 2){
            $search_room = DB::table('tbl_category_product')
            ->where('loai_phong','Chung cư mini')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 3){
            $search_room = DB::table('tbl_category_product')
            ->where('loai_phong','Nhà nguyên căn')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 4){
            $search_room = DB::table('tbl_category_product')
            ->where('loai_phong','Phòng trọ')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 5){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Cầu Giấy')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 6){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Hoàn Kiếm')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 7){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Đống Đa')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 8){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Ba Đình')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 9){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Hai Bà Trưng')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 10){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Hoàng Mai')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 11){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Thanh Xuân')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 12){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Long Biên')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara ==13){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Nam Từ Liêm')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara ==14){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Bắc Từ Liêm')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 15){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Tây Hồ')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 16){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Hà Đông')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        else if($araara == 17){
            $search_room = DB::table('tbl_category_product')
            ->where('quan','Sơn Tây')
            ->get();
            return view('pages.search')->with('search_room',$search_room);
        }
        
        return view('pages.search')->with('search_room',$search_room);
    }

    public function gia_han_phong($phong_id){
        
        $this->AuthLogin();
        $data = array();
        $data['updated_at'] = NOW();
        $data['hien_thi'] = 'đang chờ duyệt';
        DB::table('tbl_category_product')->where('phong_id',$phong_id)->update($data);
        
        Session::put('message1','Đã gửi yêu cầu tới ADMIN');
        return Redirect::to('/');
       
    }
    public function detail_category_product($category_product_id){
        $detail_category_product = DB::table('tbl_category_product')->where('phong_id',$category_product_id)->get();
        $manager_category_product = view('pages.detail_category_product')->with('detail_category_product',$detail_category_product);
        return view('layout')->with('pages.detail_category_product', $manager_category_product);
    }

    public function dang_bai(){
        return view('pages.dang_bai');
    }

    public function index(){
        $category_product = DB::table('tbl_category_product')->where('hien_thi','đang hiển thị')->where('so_luong_phong','>',0)->orderby('phong_id','desc')->get();
        return view('pages.home')->with('category_product',$category_product);
    }
    public function luu_dang_bai( Request $request ){
        $this->AuthLogin();
        $data = array();

        $data['tieu_de_phong'] = $request->category_desc;
        $data['gia_phong'] = $request->category_price;
        $data['quan'] = $request->category_district;
        $data['so_nha_duong'] = $request->category_add;
        $data['loai_phong'] = $request->loai_phong;
        $data['hien_thi'] = 'đang chờ duyệt';
        $data['dien_tich'] = $request->category_area;
        $data['chu_phong_id']= $request->owner_id;
        $data['phuong_xa'] = $request->phuong_xa;
        $data['gan_cong_cong'] = $request->gan_cong_cong;
        $data['so_luong_phong'] = $request->so_luong_phong;
        $data['che_do_phong'] = $request->che_do_phong;
        $data['phong_tam'] = $request->phong_tam;
        $data['nong_lanh'] = $request->nong_lanh;
        $data['phong_bep'] = $request->phong_bep;
        $data['dieu_hoa'] = $request->dieu_hoa;
        $data['ban_cong'] = $request->ban_cong;
        $data['gia_dien'] = $request->gia_dien;
        $data['gia_nuoc'] = $request->gia_nuoc;
        $data['tu_lanh'] = 0;
        $data['may_giat'] = 1;
        $data['giuong'] = 0;
        $data['create_at']= NOW();
        $data['updated_at'] = NOW();
        
        $get_image1 = $request->file('category_image1');
        $get_image2 = $request->file('category_image2');
        $get_image3 = $request->file('category_image3');
        if($get_image1 && $get_image2 && $get_image3){
            $get_name_image1 = $get_image1 -> getClientOriginalName();
            $name_image1 = current(explode('.',$get_name_image1));
            $new_image1 = rand(0,99).'.'.$get_image1->getClientOriginalExtension();
            $get_image1->move('public/upload/product',$new_image1);
            $data['hinh_anh'] = $new_image1;

            $get_name_image2 = $get_image2 -> getClientOriginalName();
            $name_image2 = current(explode('.',$get_name_image2));
            $new_image2 = rand(0,99).'.'.$get_image2->getClientOriginalExtension();
            $get_image2->move('public/upload/product',$new_image2);
            $data['hinh_anh_phu1'] = $new_image2;

            $get_name_image3 = $get_image3 -> getClientOriginalName();
            $name_image3 = current(explode('.',$get_name_image3));
            $new_image3 = rand(0,99).'.'.$get_image3->getClientOriginalExtension();
            $get_image3->move('public/upload/product',$new_image3);
            $data['hinh_anh_phu2'] = $new_image3;

            DB::table('tbl_category_product')->insert($data);
            Session::put('message1','Gửi yêu cầu đăng bài thành công');
            return Redirect::to('pages.dang_bai');
        }
        $data['hinh_anh'] = '';
        $data['hinh_anh_phu1'] = '';
        $data['hinh_anh_phu2'] = '';
        DB::table('tbl_category_product')->insert($data);
        Session::put('message1','Gửi yêu cầu đăng bài thành công');
        return Redirect::to('pages.dang_bai');
    }

    public function owner_posts($admin_id){
        $all_owner_product = DB::table('tbl_category_product')->where('chu_phong_id',$admin_id)->get();

        $manager_owner_product = view('pages.owner_posts')->with('all_owner_product',$all_owner_product);
        return view('layout')->with('pages.owner_posts', $manager_owner_product);
    }

    public function luu_danh_gia( Request $request,$phong_id,$admin_id ){
        $data = array();

        $data['reviewer_id'] = $admin_id;
        $data['reviewed_product'] = $phong_id;
        $data['review_status'] = $request->review_status;
        $data['review_date'] = now();
        $data['reviewer_name'] = $request->reviewer_name;
        $data['reviewer_email'] = $request->reviewer_email;

        DB::table('reviews')->insert($data);
        Session::put('message1','Gửi đánh giá thành công!');
        return Redirect::to('');
    }


}
