@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liệt kê danh sách phòng  
                        </div>
                        <div class="row w3-res-tb">
                            <div class="col-sm-5 m-b-xs">
                                <select class="input-sm form-control w-sm inline v-middle">
                                    <option value="0">Tất cả</option>
                                    <option value="1">Phòng đang hiển thị</option>
                                    <option value="2">Phòng hết hạn</option>
                                    <option value="3">Phòng chờ phê duyệt</option>
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
                                        <th>Mã phòng</th>
                                        <th>Tiêu đề</th>
                                        <th>Mã chủ phòng</th>
                                        <th>hình ảnh</th>
                                        <th>Giá phòng</th>
                                        <th>Quận</th>
                                        <th>Hiển thị</th>
                                        
                                        <th style="width:30px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_category_product as $key => $cate_pro)
                                    <tr>
                                        <td><label class="i-checks m-b-none"><input type="checkbox"
                                                    name="post[]"><i></i></label></td>
                                        <td>{{ $cate_pro->phong_id }}</td>
                                        <td>{{ $cate_pro->tieu_de_phong }}</td>
                                        <td>{{ $cate_pro->chu_phong_id }}</td>
                                        <td><img src="{{URL::to('public/upload/product/'.$cate_pro->hinh_anh)}}" height="120" width="130"></td>
                                        <td><span class="text-ellipsis">{{ $cate_pro -> gia_phong }}</span></td>
                                        <td><span class="text-ellipsis">
                                            <?php
                                            if($cate_pro->quan == 'Cầu Giấy'){
                                                echo 'Cầu Giấy';
                                            }elseif($cate_pro-> quan == 'Hoàn Kiếm'){
                                                echo 'Hoàn Kiếm';
                                            }elseif($cate_pro-> quan == 'Đống Đa'){
                                                echo 'Đống Đa';
                                            }elseif($cate_pro-> quan == 'Ba Đình'){
                                                echo 'Ba Đình';
                                            }elseif($cate_pro-> quan == 'Hai Bà Trưng'){
                                                echo 'Hai Bà Trưng';
                                            }elseif($cate_pro-> quan == 'Hoàng Mai'){
                                                echo 'Hoàng Mai';
                                            }elseif($cate_pro-> quan == 'Thanh Xuân'){
                                                echo 'Thanh Xuân';
                                            }elseif($cate_pro-> quan == 'Long Biên'){
                                                echo 'Long Biên';
                                            }elseif($cate_pro-> quan == 'Nam Từ Liêm'){
                                                echo 'Nam Từ Liêm';
                                            }elseif($cate_pro-> quan == 'Bắc Từ Liêm'){
                                                echo 'Bắc Từ Liêm';
                                            }elseif($cate_pro-> quan == 'Tây Hồ'){
                                                echo 'Tây Hồ';
                                            }elseif($cate_pro-> quan == 'Hà Đông'){
                                                echo 'Hà Đông';
                                            } else {
                                                echo 'Sơn Tây';
                                            }

                                            ?>
                                        </span></td>
                                        
                                        <td><span class="text-ellipsis">
                                            <?php
                                                if($cate_pro->hien_thi =='đang hiển thị'){
                                                    ?>
                                                    <a href="{{URL::to('/unactive-category-product/'.$cate_pro->phong_id)}}"><span>{{$cate_pro->hien_thi}}</span></a>
                                                <?php
                                                }else if ($cate_pro->hien_thi =='đang chờ duyệt'){
                                                    ?>
                                                    <a href="{{URL::to('/expired-product/'.$cate_pro->phong_id)}}"><span>{{$cate_pro->hien_thi}}</span></a>
                                                <?php
                                                }else {
                                                    ?>
                                                    <a href="{{URL::to('/active-category-product/'.$cate_pro->phong_id)}}"><span>{{$cate_pro->hien_thi}}</span></a>           
                                                <?php
                                                }
                                            ?>
                                            </span>
                                        </td>

                                        <td>
                                            <a href="{{URL::to('/edit-category-product/'.$cate_pro->phong_id)}}" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                            <a href="{{URL::to('/delete-category-product/'.$cate_pro->phong_id)}}" class="active styling-edit" ui-toggle-class=""
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