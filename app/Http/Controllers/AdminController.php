<?php
namespace App\Http\Controllers;
use Session ;
use Illuminate\Http\Request;
use DB ;
use Illuminate\Support\Facades\Redirect ;

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function show_form_dk(){
        return view('form_dk');
    }

    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = ($request->admin_password) ;
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',md5($admin_password))->first() ;
        if ($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);

            Session::put('admin_type',$result->admin_type);
            Session::put('admin_email',$admin_email);
       
            if ($result->admin_type == 1 ){
                return Redirect::to('/dashboard');
            }
            else return Redirect::to('/');
    
        }else {
	        Session::put('message','Tài khoản hoặc mật khẩu không chính xác');
            return Redirect::to('/admin') ;
        }       
    }

    // đăng xuất
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        Session::put('admin_type',null);
        Session::put('admin_email',null);
        Session::put('admin_phone',null);
        Session::put('admin_cccd',null);
        return Redirect::to('/admin')  ;
    }


    
    //lưu đb tài khoản người thuê đăng kí 
   
    public function save_tbl_admin(Request $request){
        $data = array();
        $data['admin_email'] = $request->email ;
        $data['admin_password'] = md5($request->password);
        $data['admin_name'] = $request->name;
        $data['admin_phone'] = $request->phone;
        $data['admin_type'] = 2;
        $data['created_at'] = NOW();

        DB::table('tbl_admin')->insert($data);

        return Redirect::to('/admin');
    }

    public function changePassword($admin_id){
        
        $admin_change_password = DB::table('tbl_admin')->where('admin_id',$admin_id)->get();

        return view('change_password')->with('admin_change_password',$admin_change_password);
    }

    //luu mk moi
    public function update_password(Request $request, $admin_id){
        $data = array();
        $data['admin_password'] = md5($request->new_password);
        $data['updated_at'] = NOW();

        DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
        Session::put('message','Đổi mật khẩu thành công');
        return Redirect::to('/');
    }
}       
