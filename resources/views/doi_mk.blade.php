@extends('layout')
@section('content')
    


    <?php
        $password = Session::get('admin_password');
        $id = Session::get('admin_id');
    ?>    
        

<form action="{{URL::to('/update-password/'.$id)}}" method="POST" onsubmit=" return check_change_password($password)">
    {{csrf_field() }}
    <div class="register">
    <h1>Đổi mật khẩu</h1>
    <hr> 
    <input type="password" placeholder="Mật khẩu hiện tại" name="old_password" id="old_password">

    <input type="password" placeholder="Mật khẩu mới" name="new_password" id="new_password">
    <input type="password" placeholder="Nhập lại mật khẩu mới" name="repassword" id="repassword">
    
    <button type="submit" class="submit" name='add_tbl_admin'onsubmit=" check_change_password($password)" >Xác nhận</button>
    </div>
    <div class="register login">
    
    </div>
</form>



@endsection