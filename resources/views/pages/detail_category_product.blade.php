@extends('layout')
@section('content')
@foreach($detail_category_product as $key => $detail)
<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <!--
                            <div class="view-product">
								<img src="{{URL::to('public/upload/product/'.$detail->hinh_anh)}}" alt="" />
								<h3>ZOOM</h3>
                            </div>
                            -->
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <a href=""><img src="{{URL::to('public/upload/product/'.$detail->hinh_anh)}}" alt=""></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{URL::to('public/upload/product/'.$detail->hinh_anh_phu1)}}" alt=""></a>
                </div>
                <div class="item">
                    <a href=""><img src="{{URL::to('public/upload/product/'.$detail->hinh_anh_phu2)}}" alt=""></a>
                </div>

            </div>

            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
    <div class="col-sm-7">

        <div class="product-information">
            <!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <p><b>{{$detail->hien_thi}} phòng này</b></p>
            <h2>{{$detail->tieu_de_phong}}</h2>
            <p>Mã phòng: {{$detail-> phong_id }}</p>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "elaravel";
 
            // tạo connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // kiểm connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $sql = "SELECT admin_name, admin_phone FROM tbl_admin Where admin_id=$detail->chu_phong_id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output dữ liệu trên trang
                while($row = $result->fetch_assoc()) {
                    echo "Người đăng: " . $row["admin_name"]. "   - Sdt: " . $row["admin_phone"]. " ";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

            <img src="images/product-details/rating.png" alt="" />
            <span>
                <span>{{number_format($detail->gia_phong)}} vnđ/tháng</span><br>

                <?php
                                        $admin_name=Session::get('admin_name');
                                        $admin_id=Session::get('admin_id');
                                        $admin_type=Session::get('admin_type');
                                        $admin_email=Session::get('admin_email');
										if($admin_type==3 && $detail->hien_thi=='đã hết hạn' && $admin_id==$detail->chu_phong_id){
									?>
                <form method="post" action="{{URL::to('/gia-han-phong/'.$detail->phong_id)}}">
                    {{csrf_field() }}
                    <label>Số lượng phòng còn lại: <b>{{$detail->so_luong_phong}}</b></label>
                    <p></p><br>
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Gia hạn phòng
                    </button>
                </form>
                <?php
										} else if($admin_type==3 && $detail->hien_thi!='đã hết hạn' && $admin_id==$detail->chu_phong_id){
                                        ?>

                <form method="post" action="{{URL::to('/update-so-luong-phong/'.$detail->phong_id)}}">
                    {{csrf_field() }}
                    <label>Số lượng phòng còn lại:
                        <input name="so_luong_phong_moi" type="number" selected
                            value="{{$detail->so_luong_phong}}"></b></label>
                    <p></p><br>
                    <button type="submit" class="btn btn-fefault cart">

                        Cập nhật số lượng phòng
                    </button>
                </form>
                <?php
                                        } else {
									?>
                <label>Số lượng phòng còn lại: <b>{{$detail->so_luong_phong}}</b></label>
                <p></p><br>

                <?php
										}
									?>
            </span>
            <p><b>Địa chỉ:</b> {{$detail->so_nha_duong}} quận {{$detail -> quan}}</p>
            <p><b>Diện tích:</b> {{$detail->dien_tich}} m<sup>2</sup></p>
            <p><b>Địa điểm công cộng:</b> {{$detail->gan_cong_cong}}</p>
            <p><b>Loại phòng:</b> {{$detail->loai_phong}}</p>
            <p><b>Giá điện:</b> {{number_format($detail-> gia_dien)}} VND/Kwh <b>Giá nước:</b>
                {{number_format($detail-> gia_nuoc)}} VND/m<sup>3</sup></p>

            <p><b>Cập nhật lần cuối:</b> {{$detail->updated_at}}</p>
            <p><b>Hết hạn vào:</b> {{$detail->expried_at}}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
        </div>
        <!--/product-information-->
    </div>
</div>
@endforeach
<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Các thông tin thêm</a></li>

            <li><a href="#reviews" data-toggle="tab">Reviews </a></li>
        </ul>
    </div>
    <div class="tab-content ">
        <div class="tab-pane fade active in" id="details">
            <p>- Phòng tắm {{$detail->phong_tam}}</p>
            <p>- {{$detail->nong_lanh}} bình nước nóng</P>
            <p>- {{$detail->phong_bep}}</p>
            <p>- {{$detail->dieu_hoa}} điều hòa</p>
            <p>- {{$detail ->ban_cong}} ban công</p>
        </div>
        <!--
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						
        <div class="tab-pane fade" id="companyprofile">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery3.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery2.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery4.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="tag">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery2.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery3.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery4.jpg" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
-->
        <div class="tab-pane fade" id="reviews">
            <div class="col-sm-12">
                <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "elaravel";
 
            // tạo connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // kiểm connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $sql = "SELECT  reviewer_email,reviewer_name,review_status,review_date FROM reviews Where reviewed_product=$detail->phong_id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // output dữ liệu trên trang
                while($row = $result->fetch_assoc()) {
                    ?>
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>{{$row["reviewer_name"]}}</a></li>
                    <li><a href=""><i class="fa "></i>{{$row["reviewer_email"]}}</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>{{$row["review_date"]}}</a></li>
                </ul>
                <p>{{$row["review_status"]}}</p>
                <?php
                }
            } else {
                echo "Chưa có bài đánh giá nào";
            }
            $conn->close();
            ?>
            <?php
                if($admin_id!=$detail->chu_phong_id){
                ?>
                    <p><br></p>
                    <p><b>Hãy để lại đánh giá của bạn</b></p>

                    <form method="post" action="{{URL::to('/luu-danh-gia/'.$detail->phong_id.'/'.$admin_id)}}">
                    {{csrf_field() }}
                    <span>
											<input name="reviewer_name" type="text" selected value="{{$admin_name}}" placeholder="Tên của bạn*:"/>
											<input name="reviewer_email" type="email" selected value="{{$admin_email}}" placeholder="Email của bạn*:"/>
										</span>
                    <textarea name="review_status"></textarea>

                    <button name="submit" type="submit" class="btn btn-default pull-right">
                        Submit
                    </button>
                    </form>
                    <?php
                }
            
            ?>
            </div>
        </div>

    </div>
</div>
@endsection