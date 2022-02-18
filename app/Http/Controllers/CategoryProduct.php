<?php

namespace App\Http\Controllers;
use Session ;
use Illuminate\Http\Request;
use DB ;
use Illuminate\Support\Facades\Redirect ;

class CategoryProduct extends Controller
{
    //
    public function add_category_product(){
        $this->AuthLogin();
        
        $owner = DB::table('tbl_admin')->where('admin_type',3)->orderby('admin_id','desc')->get();

        return view('admin.add_category_product')->with('owner',$owner);
        
    }
    public function all_category_product(){
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product( Request $request ){
        $this->AuthLogin();
        $data = array();

        $data['tieu_de_phong'] = $request->category_desc;
        $data['gia_phong'] = $request->category_price;
        $data['quan'] = $request->category_district;
        $data['so_nha_duong'] = $request->category_add;
        $data['loai_phong'] = $request->loai_phong;
        $data['hien_thi'] = "đang hiển thị";
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
            Session::put('message','Thêm danh mục thành công');
            return Redirect::to('add-category-product');
        }
        $data['hinh_anh'] = '';
        $data['hinh_anh_phu1'] = '';
        $data['hinh_anh_phu2'] = '';
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return Redirect::to('add-category-product');
    }

    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('phong_id',$category_product_id)->update(['hien_thi' => 'đang chờ duyệt']);
        Session::put('message','Đã chuyển sang mục "đang chờ duyệt"');
        return Redirect::to('all-category-product');  
    }

    public function expried_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('phong_id',$category_product_id)->update(['hien_thi' => 'đã hết hạn']);
        Session::put('message','Đã chuyển sang mục "đã hết hạn"');
        return Redirect::to('all-category-product');  
    }

    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('phong_id',$category_product_id)->update(['hien_thi' =>  'đang hiển thị']);
        Session::put('message','Đã chuyển sang mục "đang hiển thị"');
        return Redirect::to('all-category-product');  
    }

    

    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('phong_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request ,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['tieu_de_phong'] = $request->category_desc;
        $data['gia_phong'] = $request->category_price;
        $data['quan'] = $request->category_district;
        $data['so_nha_duong'] = $request->category_add;
        $data['loai_phong'] = $request->loai_phong;
        $data['hien_thi'] = $request->hien_thi;
        $data['dien_tich'] = $request->category_area;
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

            DB::table('tbl_category_product')->where('phong_id',$category_product_id)->update($data);
            Session::put('message','Cập nhật danh mục thành công');
            return Redirect::to('all-category-product');
        }
        
        DB::table('tbl_category_product')->where('phong_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('all-category-product');


    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where( 'phong_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('all-category-product');
    }

    public function update_so_luong_phong(Request $request ,$phong_id){
        $this->AuthLogin();
        $data = array();
        
        $data['so_luong_phong'] = $request->so_luong_phong_moi;
        
        DB::table('tbl_category_product')->where('phong_id',$phong_id)->update($data);
        Session::put('message1','Cập nhật số lượng phòng thành công!');
        return Redirect::to('/detail-category-product/'.$phong_id);
    }
}
