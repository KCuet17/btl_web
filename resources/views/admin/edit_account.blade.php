@extends('admin_layout')
@section('admin_content')

<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading"> Nhập thông tin tài khoản chủ trọ </header>
                <?php
                    	$message = Session::get('message');
	                    if($message){
	                	    echo '<span class="text-alert">'.$message.'</span>';
		                    Session::put('message',null);
                        }
	                ?>
                <div class="panel-body">
                    @foreach($edit_user_account as $edit_pro)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-user-account/'.$edit_pro->admin_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field() }}
                            <div class="form-group">
                                <label for="username">Email đăng kí</label>
                                <input class="form-control" type="text" selected value="{{$edit_pro->admin_email}}" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="fullname">Họ và tên</label>
                                <input class="form-control" type="text" selected value="{{$edit_pro->admin_name}}" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input class="form-control" type="text" selected value="{{$edit_pro->admin_phone}}" name="phone" id="phone">    
                            </div>

                            <div class="form-group">
                                <label for="cccd">Số căn cước công dân</label>
                                <input class="form-control" type="text" selected value="{{$edit_pro->admin_cccd}}" name="cccd" id="cccd">    
                            </div>

                            <div class="form-group">
                                <label for="add">Địa chỉ</label>
                                <input class="form-control" type="text" selected value="{{$edit_pro->admin_add}}" name="add" id="phone">    
                            </div>
                        <!--
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input class="form-control" type="password" placeholder="******" name="password" id="password">
                            </div>

                            <div class="form-group">
                                <label for="password-repeat">Nhập lại mật khẩu</label>
                                <input class="form-control" type="password" placeholder="******" name="repassword-repeat" id="repassword">
                            </div>
                            -->
                            <button type="submit" class="submit btn btn-info" name='add_user_account'>Cập nhật tài khoản</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

@endsection