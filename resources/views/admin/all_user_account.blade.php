@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liệt kê danh sách tài khoản  
                        </div>
                        <div class="row w3-res-tb">
                            <div class="col-sm-5 m-b-xs">
                                <select class="input-sm form-control w-sm inline v-middle">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Tài khoản chủ trọ</option>
                                    <option value="2">Tài khoản người dùng</option>
                                </select>
                                <button class="btn btn-sm btn-default">Chọn</button>
                            </div>
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="button">Tìm kiếm!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                        <?php
                    	$message = Session::get('message');
	                    if($message){
	                	    echo '<span class="text-alert" style="color:red">'.$message.'</span>';
		                    Session::put('message',null);
	                    }
	                ?>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th style="width:20px;">
                                            <label class="i-checks m-b-none">
                                                <input type="checkbox"><i></i>
                                            </label>
                                        </th>
                                        <th>Mã tài khoản</th>
                                        <th>Email</th>
                                        <th>Tên người dùng</th>
                                        <th>Số điện thoại</th>
                                        <th>Loại tài khoản</th>
                                        <th>Số căn cước(chủ trọ)</th>
                                        <th>Địa chỉ(chủ trọ)</th>
                                        <th style="width:30px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_user_account as $key => $user_pro)
                                    <tr>
                                        <td><label class="i-checks m-b-none"><input type="checkbox"
                                                    name="post[]"><i></i></label></td>
                                        <td> {{ $user_pro-> admin_id }} </td>           
                                        <td>{{ $user_pro-> admin_email }}</td>
                                        <td>{{ $user_pro-> admin_name }}</td>
                                        <td><span class="text-ellipsis">{{ $user_pro -> admin_phone }}</span></td>
                                        <td><span class="text-ellipsis">
                                            <?php
                                            if($user_pro->admin_type == 1){
                                                echo 'ADMIN';
                                            }elseif($user_pro-> admin_type == 2){
                                                echo 'Người dùng';
                                            }else {
                                                echo 'Chủ Trọ';
                                            }

                                            ?>
                                        </span></td>
                                        <td>{{$user_pro->admin_cccd}}</td>
                                        
                                        <td>{{$user_pro-> admin_add}}</td>
                                        <td>
                                            <a href="{{URL::to('/edit-account/'.$user_pro->admin_id)}}" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                            <a href="{{URL::to('/delete-account/'.$user_pro->admin_id)}}" class="active styling-edit" ui-toggle-class=""
                                            onclick="return confirm('Bạn có chắc chắn xóa mục này?')">
                                                <i class="fa fa-times text-danger text"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">

                                <div class="col-sm-5 text-center">
                                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                                </div>
                                <div class="col-sm-7 text-right text-center-xs">
                                    <ul class="pagination pagination-sm m-t-none m-b-none">
                                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                        <li><a href="">1</a></li>
                                        <li><a href="">2</a></li>
                                        <li><a href="">3</a></li>
                                        <li><a href="">4</a></li>
                                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>   
@endsection