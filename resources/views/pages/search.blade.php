@extends('layout')
@section('content')

<div class="features_items">
    <h2 class="title text-center">Kết quả tìm kiếm</h2>
    <h2>
        <?php
		if($search_room=='[]'){
			echo('Không tìm thấy bài viết nào phù hợp!');
		}
	?>
    </h2>
    @foreach($search_room as $key => $cate)
    <?php
		if($cate->hien_thi=='đang hiển thị'){
	?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{URL::to('public/upload/product/'.$cate->hinh_anh)}}" style="height:230px">
                    <h2>{{number_format($cate -> gia_phong)}} vnđ/tháng</h2>
                    <p>{{$cate->tieu_de_phong}}</p>
                    <!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>-->
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>{{number_format($cate -> gia_phong)}} vnđ/tháng</h2>
                        <p>{{$cate->phuong_xa}} {{$cate->quan}}</p>
                        <p>gần {{$cate->gan_cong_cong}}</p>
                        <p>{{$cate->dien_tich}} m<sup>2</sup></p>
                        <!--<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>-->
                        <a href="{{URL::to('/detail-category-product/'.$cate->phong_id)}}"
                            class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <!--
								    <div class="choose">
									    <ul class="nav nav-pills nav-justified">
										    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm mục yêu thích</a></li>
										    <li><a href="#"><i class="fa fa-plus-square"></i>Thêm vào so sánh</a></li>
									    </ul>
								    </div>
									-->
        </div>
    </div>
    <?php
		}
	?>
    @endforeach

</div>

@endsection