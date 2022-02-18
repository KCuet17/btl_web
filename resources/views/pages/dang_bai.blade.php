@extends('layout')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading"> <h2>Nhập thông tin phòng</h2> </header>
                <div class="panel-body">
                    <?php
                    	$message = Session::get('message');
	                    if($message){
	                	    echo '<span class="text-alert">'.$message.'</span>';
		                    Session::put('message',null);
	                    }
	                ?>
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/luu-dang-bai')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field() }}
                            <div class="form-group">
                                <label>Tiêu đề: </label>
                                <textarea type="text" name="category_desc" class="form-control" id="Example_td_1"
                                 placeholder="ALo nghe không?" ></textarea>
                            </div>
                            
                            <!--Viết tự động tìm chủ-->
                            <?php
                                $id=Session::get('admin_id');
                                $name=Session::get('admin_name');
                            ?>
                            <div class="form-group">
                                <label for="">Chọn chủ phòng</label>
                                <select class="form-control" name="owner_id" id="">
                                    <option selected value="{{$id}}">{{$id}} {{$name}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Quận,huyện: </label>
                                <select name="category_district" class="form-control input-sm m-bot15">
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
                                </select>
                            </div>
                            <div>
                                <label>Phường,xã</label>
                                 <input type="text" name="phuong_xa" class="form-control" id="_phuong"
                                 placeholder="Nhập tên phường" >
                            </div>
                            <div class="form-group">
                                <label>Số nhà, đường: </label>
                                <input type="text" name="category_add" class="form-control" 
                                 placeholder="vd: số 1 đường Phạm Văn Đồng" >
                            </div>
                            <div class="form-group">
                                <label>Phòng trọ gần địa điểm công cộng nào?</label>
                                <textarea type="text" name="gan_cong_cong" class="form-control" id="Example_td_3"
                                 placeholder="Có gần địa điểm công cộng nào không (trường đại học,trung tâm thương mại.." ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <select name="loai_phong" class="loaip form-control input-sm m-bot15">
                                    <option value="Chung cư">Chung cư</option>
                                    <option value="Chung cư mini">Chung cư mini</option>
                                    <option value="Nhà nguyên căn">Nhà nguyên căn</option>
                                    <option value="Phòng trọ">Phòng trọ</option>
                                </select>
                            </div>
                            <br>
                            
                            <div class="form-group">
                                <label>Số lượng phòng: </label>
                                <input type="number" name="so_luong_phong" class="form-control" id="_soluongp"
                                 placeholder="Ví dụ: 1" >
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
                                 placeholder="Tính theo tháng" ></td>
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
                                 placeholder=".m2" >
                            </div>
                            <div class="form-group">
                                <label>Chế độ</label>
                                <select name="che_do_phong" class="chedo form-control">
                                    <option value="Chung chủ">Chung chủ</option>
                                    <option value="Không chung chủ">Không chung chủ</option>
                                </select>
                            </div>
                            <br>
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
                                        <td><select name="phong_tam" class="chedophongtam">
                                                <option value="Chung">Chung</option>
                                                <option value="Khép kín">Khép kín</option>
                                        </select></td>
                                        <td><select name="nong_lanh" class="nonglanh">
                                                <option value="Có">Có</option>
                                                <option value="Không">Không</option>
                                        </select></td>
                                        <td><select name="phong_bep" class="bep">
                                            <option value="Khu bếp chung">Khu bếp Chung</option>
                                            <option value="Khu bếp riêng">Khu bếp riêng</option>
                                            <option value="Không nấu ăn">Không nấu ăn</option>
                                        </select></td>
                                        <td><select name="dieu_hoa" class="">
                                            <option value="Có">Có</option>
                                            <option value="Không">Không</option>
                                        </select></td>
                                        <td><select name="ban_cong" class="bancong">
                                            <option value="Có">Có</option>
                                            <option value="Không">Không</option>
                                        </select></td>
                                </tr>
                                </table>
                                <br>
                                   <div>
                                    <label>Giá điện(VND/Kwh): </label>
                                    <input type="text" name="gia_dien" class="form-control" placeholder="">
                                   </div>

                                   <div>
                                    <label>Giá nước(VND/m3): </label>
                                    <input type="text" name="gia_nuoc" class="form-control" placeholder="">
                                   </div>
                                    <br>
                                    <!-- xem lại cách lấy dữ liệu checkbox
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
                            </div>
                            <div class="form-group">
                                <label>Upload hình ảnh 2:</label>
                                <input type="file" name="category_image2" class="form-control" 
                                 placeholder='.png/jpg' >
                            </div>
                            <div class="form-group">
                                <label>Upload hình ảnh 3:</label>
                                <input type="file" name="category_image3" class="form-control" 
                                 placeholder='.png/jpg' >
                            </div>

                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection