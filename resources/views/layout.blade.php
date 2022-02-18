<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lozi - Tìm trọ</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/doi_mk.css')}}" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="'public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{('public/frontend/images/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{('public/frontend/images/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{('public/frontend/images/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('public/frontend/images/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->


        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="URL::to('/')">

                                <img src="{{('public/frontend/images/logo.png')}}" alt="" />
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">

                                <?php
									$admin_id=Session::get('admin_id');
									$admin_type=Session::get('admin_id');
									$name=Session::get('admin_name');
								?>
                                @if ($admin_id)
                                <li>
                                    <a href="#"><i class="fa fa-user"></i>
                                        <?php
										echo($name);
										$name=Session::get('admin_name');
										?>
                                    </a>
                                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>

                                <li><a href="{{URL::to('/change-password/'.$admin_id)}}"><i class="fa fa-cog"></i>Đổi
                                        mật khẩu</a></li>
                                </li>
                                @elseif(($admin_id)== null)
                                <li><a href="{{URL::to('/admin')}}"><i class="fa fa-sign-in"></i>Đăng nhập</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/')}}" class="active">Trang chủ</a></li>

                                <?php
									$admin_id=Session::get('admin_id');
									$admin_type=Session::get('admin_id');
								?>
                                @if ($admin_type == 3)
                                <li class="active"><a href="{{URL::to('/owner-posts/'.$admin_id)}}"> Bài viết của tôi
                                    </a></li>
                                <li class="active"><a href="{{URL::to('/dang-bai')}}"> Đăng bài </a></li>
                                @endif

                                @if ($admin_type == 1)
                                <li class="active"><a href="{{URL::to('/dashboard')}}"> Quay lại trang quản trị </a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{csrf_field()}}
                            <div class="search_box pull-right">
                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm phòng trọ" />
                                <input type="submit" style="margin-top : 0; color: #666" name="search_items"
                                    class="btn btn-primary btn-sm" value="Tìm kiếm"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Loại phòng</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> 
                                        <?php $araara = 1?>
                                        <a href="{{URL::to('/search/'.$araara)}}" >Chung cư</a>
                                    </h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <?php $araara = 2?>
                                        <a href="{{URL::to('/search/'.$araara)}}" >Chung cư mini</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <?php $araara = 3?>
                                        <a href="{{URL::to('/search/'.$araara)}}" >Nhà nguyên căn</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <?php $araara = 4?>
                                        <a href="{{URL::to('/search/'.$araara)}}" >Phòng trọ</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Khu vực</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li>
                                    <?php $araara = 5?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Cầu Giấy</a>
                                    </li>
                                    <li>
                                    <?php $araara = 6?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Hoàn Kiếm</a>
                                    </li>
                                    <li>
                                    <?php $araara = 7?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Đống Đa</a>
                                    </li>
                                    <li>
                                    <?php $araara = 8?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Ba Đình</a>
                                    </li>
                                    <li>
                                    <?php $araara = 9?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Hai Bà Trưng</a>
                                    </li>
                                    <li>
                                    <?php $araara = 10?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Hoàng Mai</a>
                                    </li>
                                    <li>
                                    <?php $araara = 11?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Thanh Xuân</a>
                                    </li>
                                    <li>
                                    <?php $araara = 12?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Long Biên</a>
                                    </li>
                                    <li>
                                    <?php $araara =13?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Nam Từ Liêm</a>
                                    </li>
                                    <li>
                                    <?php $araara =14?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Bắc Từ Liêm</a>
                                    </li>
                                    <li>
                                    <?php $araara =15?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Tây Hồ</a>
                                    </li>
                                    <li>
                                    <?php $araara = 16?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Hà Đông</a>
                                    </li>
                                    <li>
                                    <?php $araara = 17?>
                                        <a href="{{URL::to('/search/'.$araara)}}" > <span class="pull-right"></span>Sơn Tây</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!--/brands_products-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">

                    @yield('content')


                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 039 789 0510</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> timtro_lozi@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <footer id="footer">
            <!--Footer-->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="companyinfo">
                                <h2><span>e</span>-shopper</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="{{('public/frontend/images/iframe1.png')}}" alt="" />

                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="{{('public/frontend/images/iframe2.png')}}" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="{{('public/frontend/images/iframe3.png')}}" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <div class="video-gallery text-center">
                                    <a href="#">
                                        <div class="iframe-img">
                                            <img src="{{('public/frontend/images/iframe4.png')}}" alt="" />
                                        </div>
                                        <div class="overlay-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                    </a>
                                    <p>Circle of Hands</p>
                                    <h2>24 DEC 2014</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="address">
                                <img src="{{('public/frontend/images/map.png')}}" alt="" />
                                <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                        <p class="pull-right">Designed by <span><a target="_blank"
                                    href="http://www.themeum.com">Themeum</a></span></p>
                    </div>
                </div>
            </div>

        </footer>
        <!--/Footer-->


    </footer>
    <!--/Footer-->




    <script src="{{asset('public/backend/js/checkPassword.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
</body>

</html>