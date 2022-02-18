@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading"> 
                    Thay đổi thông tin phòng 
                    </header>
                    <?php
                    	$message = Session::get('message');
	                    if($message){
	                	    echo '<span class="text-alert">'.$message.'</span>';
		                    Session::put('message',null);
	                    }
	                ?>
                <div class="panel-body">

                    @foreach($edit_category_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->phong_id)}}" method="post"
                        enctype="multipart/form-data">
                            {{csrf_field() }}
                            <div class="form-group">
                                <label>Tiêu đề: </label>
                                <textarea type="text" value="{{ $edit_value -> tieu_de_phong}}" name="category_desc" class="form-control" id="Example_td_1"
                                >{{ $edit_value -> tieu_de_phong}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Giá phòng: </label>
                                <input type="number" name="category_price" class="form-control" id="Example_td_2"
                                value="{{$edit_value->gia_phong}}" >
                            </div>

                            <div class="form-group">
                                <label>Quận,huyện: </label>
                                <select name="category_district" class="form-control input-sm m-bot15">
                                @foreach($edit_category_product as $key => $cate)
                                    @if($cate-> phong_id==$edit_value-> phong_id)
                                    <option selected value="{{$edit_value -> quan}}">{{$edit_value -> quan}}</option>
                                    
                                    <option value="Cầu Giấy">Cầu Giấy</option>
                                    <option value="Hoàn Kiếm">Hoàn Kiếm</option>
                                    <option value="Đống Đa">Đống Đa</option>
                                    <option value="Ba Đình">Ba Đình</option>
                                    <option value="Hai Bà Trưng">Hai Bà Trưng</option>
                                    <option value="Hoàng Mai">Hoàng Mai</option>
                                    <option value="Thanh Xuân">Thanh Xuân</option>
                                    <option value="Long Biên">Long Biên</option>
                                    <option value="Nam Từ Liêm">Nam Từ Liêm</option>
                                    <option value="Bắc Từ Liêm">Bắc Từ Liêm</option>
                                    <option value="Tây Hồ">Tây Hồ</option>
                                    <option value="Hà Đông">Hà Đông</option>
                                    <option value="Sơn Tây">Sơn Tây</option>
                                    @endif
                                @endforeach    
                                </select>
                            </div>
                            
                            <div>
                                <label>Phường,xã: </label>
                                 <input type="text" name="phuong_xa" class="form-control" id="_phuong"
                                 value="{{$edit_value -> phuong_xa}}" >
                            </div>

                            <div class="form-group">
                                <label>Số nhà, đường: </label>
                                <textarea type="text" name="category_add" class="form-control" 
                                 value="{{ $edit_value -> so_nha_duong}}">{{ $edit_value -> so_nha_duong}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Phòng trọ gần địa điểm công cộng nào?</label>
                                <textarea type="text" name="gan_cong_cong" class="form-control" id="Example_td_3"
                                value="{{$edit_value -> gan_cong_cong}}" >{{$edit_value -> gan_cong_cong}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Loại phòng</label>
                                <select name="loai_phong"  class="loaip form-control input-sm m-bot15">
                                @foreach($edit_category_product as $key => $cate)
                                    @if($cate->phong_id==$edit_value->phong_id)
                                    <option selected value="{{$edit_value -> loai_phong}}">{{$edit_value -> loai_phong}}</option>
                                    
                                    <option value="Chung cư">Chung cư</option>
                                    <option value="Chung cư mini">Chung cư mini</option>
                                    <option value="Nhà nguyên căn">Nhà nguyên căn</option>
                                    <option value="Phòng trọ">Phòng trọ</option>
                                    @endif
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Số lượng phòng: </label>
                                <input type="number" name="so_luong_phong" class="form-control" id="_soluongp"
                                value="{{$edit_value -> so_luong_phong}}" >
                            </div>

                            <div class="form-group">
                                <label style="color:green">Giá phòng(VND): </label>
                                <br>
                                <table>
                                    <tr>    
                                        <th><label>Tính theo tháng</label></th>
                                        <!--
                                        <th><label>Tính theo quý</label></th>
                                        <th><label>Tính theo năm</label></th>
                                        -->
                                    </tr>
                                    <tr>
                                        <td><input type="number" name="category_price" class="form-control" id="_giathang"
                                    value="{{$edit_value -> gia_phong}}"></td>
                                    <!--
                                        <td><input type="number" name="giaquy" class="form-control" id="_giaquy"
                                 placeholder="Tính theo quý" ></td>
                                        <td><input type="number" name="gianam" class="form-control" id="gianam"
                                 placeholder="Tính theo năm" ></td>
                                 -->
                                    </tr>
                                
                                </table>
                            </div>

                            <div class="form-group">
                                <label>Diện tích: </label>
                                <input type="number" name="category_area" class="form-control" 
                                    value="{{ $edit_value -> dien_tich}}" >
                            </div>

                            <div class="form-group">
                                <label>Chế độ hiển thị</label>
                                <select name="hien_thi" value="{{$edit_value -> hien_thi}}" class="chedo form-control">
                                @foreach($edit_category_product as $key => $cate)
                                    @if($cate->phong_id==$edit_value->phong_id)
                                    <option selected value="{{$edit_value -> hien_thi}}">{{$edit_value -> hien_thi}}</option>
                                    
                                    <option value="đang hiển thị">đang hiển thị</option>
                                    <option value="đang chờ duyệt">đang chờ duyệt</option>
                                    <option value="đã hết hạn">đã hết hạn</option>
                                    
                                    @endif
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Chế độ</label>
                                <select name="che_do_phong" value="{{$edit_value -> che_do_phong}}" class="chedo form-control">
                                @foreach($edit_category_product as $key => $cate)
                                    @if($cate->phong_id==$edit_value->phong_id)
                                    <option selected value="{{$edit_value -> che_do_phong}}">{{$edit_value -> che_do_phong}}</option>
                                    
                                    <option value="Chung chủ">Chung chủ</option>
                                    <option value="Không chung chủ">Không chung chủ</option>
                                    
                                    @endif
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="color:green">Điều kiện cơ sở vật chất</label>
                                <div>
                                <table>
                                <tr>    
                                        <th style="width:10%"><label>Phòng tắm</label></th>
                                        <th style="width:10%"><label>Nóng lạnh</label></th>
                                        <th style="width:10%"><label>Phòng bếp</label></th>
                                        <th style="width:10%"><label>Điều hòa</label></th>
                                        <th style="width:10%"><label>Ban công</label></th>
                                </tr>
                                <tr>
                                        <td><select name="phong_tam" value="{{$edit_value -> phong_tam}}" class="chedophongtam">
                                        @foreach($edit_category_product as $key => $cate)
                                            @if($cate->phong_id==$edit_value->phong_id)
                                                <option selected value="{{$edit_value -> phong_tam}}">{{$edit_value -> phong_tam}}</option>
                                            
                                                <option value="Chung">Chung</option>
                                                <option value="Khép kín">Khép kín</option>
                                            @endif
                                        @endforeach
                                        </select></td>
                                        <td><select name="nong_lanh" value="{{$edit_value -> nong_lanh}}" class="nonglanh">
                                        @foreach($edit_category_product as $key => $cate)
                                            @if($cate->phong_id==$edit_value->phong_id)
                                                <option selected value="{{$edit_value -> nong_lanh}}">{{$edit_value -> nong_lanh}}</option>
                                            
                                                <option value="Có">Có</option>
                                                <option value="Không">Không</option>
                                            @endif
                                        @endforeach
                                        </select></td>
                                        <td><select name="phong_bep" value="{{$edit_value -> phong_bep}}" class="bep">
                                        @foreach($edit_category_product as $key => $cate)
                                            @if($cate->phong_id==$edit_value->phong_id)
                                                <option selected value="{{$edit_value -> phong_bep}}">{{$edit_value -> phong_bep}}</option>
                                            
                                                <option value="Khu bếp chung">Khu bếp chung</option>
                                                <option value="Khu bếp riêng">Khu bếp riêng</option>
                                                <option value="Không nấu ăn">Không nấu ăn</option>
                                            @endif
                                        @endforeach
                                        </select></td>
                                        <td><select name="dieu_hoa" value="{{$edit_value -> dieu_hoa}}" class="">
                                        @foreach($edit_category_product as $key => $cate)
                                            @if($cate->phong_id==$edit_value->phong_id)
                                                <option selected value="{{$edit_value -> dieu_hoa}}">{{$edit_value -> dieu_hoa}}</option>
                                            
                                                <option value="Có">Có</option>
                                                <option value="Không">Không</option>
                                            @endif
                                        @endforeach
                                        </select></td>
                                        <td><select name="ban_cong" value="{{$edit_value -> ban_cong}}" class="bancong">
                                        @foreach($edit_category_product as $key => $cate)
                                            @if($cate->phong_id==$edit_value->phong_id)
                                                <option selected value="{{$edit_value -> ban_cong}}">{{$edit_value -> ban_cong}}</option>
                                            
                                                <option value="Có">Có</option>
                                                <option value="Không">Không</option>
                                            @endif
                                        @endforeach
                                        </select></td>
                                </tr>
                                </table>
                                <br>
                                   <div>
                                    <label>Giá điện(VND/Kwh): </label>
                                    <input type="text" name="gia_dien" value="{{$edit_value -> gia_dien}}" class="form-control" placeholder="">
                                   </div>

                                   <div>
                                    <label>Giá nước(VND/m3): </label>
                                    <input type="text" name="gia_nuoc" value="{{$edit_value -> gia_nuoc}}" class="form-control" placeholder="">
                                   </div>
                                    <br>
                                    <!--
                                   <div>
                                       <label style="width:20%">Tiện ích khác</label>
                                       <input type="checkbox" name="tu_lanh" value="tu_lanh"><label style="width:20%">Tủ lạnh</label>
                                       <input type="checkbox" name="may_giat" value="may_giat"><label style="width:20%">Máy giặt</label>
                                       <input type="checkbox" name="giuong" value="giuong"><label style="width:20%">Giường</label>
                                   </div>
                                   -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Upload hình ảnh 1: </label>
                                <input type="file" name="category_image1" class="form-control" 
                                 placeholder='.png/jpg' >
                                <img src="{{URL::to('public/upload/product/'.$edit_value ->hinh_anh)}}" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <label>Upload hình ảnh 2:</label>
                                <input type="file" name="category_image2" class="form-control" 
                                 placeholder='.png/jpg' >
                                 <img src="{{URL::to('public/upload/product/'.$edit_value ->hinh_anh_phu1)}}" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <label>Upload hình ảnh 3:</label>
                                <input type="file" name="category_image3" class="form-control" 
                                 placeholder='.png/jpg' >
                                 <img src="{{URL::to('public/upload/product/'.$edit_value ->hinh_anh_phu2)}}" height="100" width="100">
                            </div>

                            <button type="submit" name="update_category_product" class="btn btn-info">Thay đổi danh mục</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>

@endsection