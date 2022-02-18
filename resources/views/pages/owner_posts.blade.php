@extends('layout')
@section('content')

<div class="features_items table-agile-info">
    <!--features_items-->
    <h2 class="title text-center">Các phòng của tôi</h2>
    <?php
        if($all_owner_product=='[]'){
            echo ('  Bạn chưa có bài đăng nào rồi! Hãy đến mục tạo bài viết :)');
        }
        
    ?>
    <div class=" table-responsive">

        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            @foreach($all_owner_product as $key => $owner_item)
            
            <tbody>
                <tr>
                    <td><img src="{{URL::to('public/upload/product/'.$owner_item->hinh_anh)}}" alt=""
                            style="height:200px;width:200px"></td>
                    <td style="text-align:center"><span>
                            <h3 style="color:#FF9900">{{$owner_item->tieu_de_phong}}</h3>
                        </span><br>
                        <span><b>{{$owner_item->quan}}</b></span><br>
                        <span><b style="color:#FF9900">{{number_format($owner_item->gia_phong)}}</b> vnđ/tháng</span><br>
                        <span>Còn lại <b>{{$owner_item->so_luong_phong}}</b>, <b>{{$owner_item->hien_thi}}</b></span>
                    </td>
                        
                    <td>
                        <form method="get" action="{{URL::to('/detail-category-product/'.$owner_item->phong_id)}}">
                        {{csrf_field() }}
                            <button type="submit" class="btn btn-fefault cart">
                                Xem chi tiết
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

</div>

<!--features_items-->

@endsection