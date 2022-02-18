<?php
namespace App\Http\Controllers;
use Session ;
use Illuminate\Http\Request;
use DB ;
use Illuminate\Support\Facades\Redirect ;

class AccountController extends Controller
{
    public function add_user_account(){
        return view('admin.add_user_account');
    }   

    public function add_user_account1(){
        return view('admin.add_user_account');
    }

    public function all_user_account(){
        $all_user_account = DB::table('tbl_admin')->get();
        $manager_user_account = view('admin.all_user_account')->with('all_user_account',$all_user_account);
        return view('admin_layout')->with('admin.all_user_account',$manager_user_account);
    }

    public function save_user_account(Request $request){
        $data = array();
        $data['admin_email'] = $request->email ;
        $data['admin_password'] = md5($request->password);
        $data['admin_name'] = $request->name;
        $data['admin_phone'] = $request->phone;
        $data['admin_cccd'] = $request->cccd;
        $data['admin_add'] = $request->add;
        $data['admin_type'] = 3;
        $data['created_at'] = NOW();
        

        DB::table('tbl_admin')->insert($data);
        Session::put('message','Thêm tài khoản thành công');
        return Redirect::to('/all-user-account');
    }

    public function edit_account($admin_id){
        $this->AuthLogin();

        $edit_user_account = DB::table('tbl_admin')->where('admin_id',$admin_id)->get();
        $manager_category_product = view('admin.edit_account')->with('edit_user_account',$edit_user_account);
        return view('admin_layout')->with('admin.edit_account', $manager_category_product);
    }

    public function delete_account($admin_id){
        $this->AuthLogin();
        DB::table('tbl_admin')->where( 'admin_id',$admin_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('all-user-account');
    }

    public function update_user_account(Request $request,$admin_id){
        $data = array();
        
        $data['admin_email'] = $request->email;
        $data['admin_name'] = $request->name;
        $data['admin_phone'] = $request->phone;
        $data['admin_cccd'] = $request->cccd;
        $data['admin_add'] = $request->add;
        $data['updated_at'] = NOW();
        

        DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
        Session::put('message','Cập nhật tài khoản thành công');
        return Redirect::to('/all-user-account');
    }
    
}