@extends('admin_layout')
@section('admin_content')

<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading"> Nhập thông tin tài khoản chủ trọ </header>
                <div class="panel-body">
                    <?php
                    	$message = Session::get('message');
	                    if($message){
	                	    echo '<span class="text-alert">'.$message.'</span>';
		                    Session::put('message',null);
	                    }
	                ?>
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-user-account')}}" method="post">
                            {{csrf_field() }}
                            <div class="form-group">
                                <label for="username">Email đăng kí</label>
                                <input class="form-control" type="text" placeholder="Nhập địa chỉ email dùng để đăng kí" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="fullname">Họ và tên</label>
                                <input class="form-control" type="text" placeholder="Họ và tên" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input class="form-control" type="text" placeholder="Nhập số điện thoại" name="phone" id="phone">    
                            </div>

                            <div class="form-group">
                                <label for="cccd">Số căn cước công dân</label>
                                <input class="form-control" type="text" placeholder="Nhập số căn cước" name="cccd" id="cccd">    
                            </div>

                            <div class="form-group">
                                <label for="add">Địa chỉ</label>
                                <input class="form-control" type="text" placeholder="Nhập số điện thoại" name="add" id="phone">    
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input class="form-control" type="password" placeholder="******" name="password" id="password">
                            </div>

                            <div class="form-group">
                                <label for="password-repeat">Nhập lại mật khẩu</label>
                                <input class="form-control" type="password" placeholder="******" name="repassword-repeat" id="repassword">
                            </div>
                            <button type="submit" class="submit btn btn-info" name='add_user_account'>Thêm tài khoản</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection