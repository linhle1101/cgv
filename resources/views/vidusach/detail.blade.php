<html>
    <head>
        <style>
            .navbar 
            {
                background-color: #ff5850;
                font-weight:bold;
            }
            .nav-item a 
            {
                color: #fff!important;
            }
            .navbar-nav 
            {
                margin:0 auto;
            }
            .list-book
            {
                display:grid;
                grid-template-columns:repeat(4,24%);
            }
            .book 
            {
                margin:10px;
                text-align:center;
            }
        </style>
</head>
<body>
<x-book-layout>
    <x-slot name='title'>
        Chi tiết sách 
    </x-slot>
<div style="width: 100%; margin:0 auto; padding:10px;">
    @foreach ($data as $data) 
        <h2>{{$data->tieu_de}}</h2>
        <div style="float:left;">
            <img src="{{asset($data->link_anh_bia)}}" width=100%; height=180px;>
        </div>
        <div style="float:left; margin-left: 10px;">
            Nhà cung cấp: {{$data->nha_cung_cap}}<br>
            Nhà xuất bản: {{$data->nha_xuat_ban}}<br>
            Tác giả: {{$data->tac_gia}}<br>
            Hình thức bìa: {{$data->hinh_thuc_bia}}<br>
            <div class='mt-1'>
                Số lượng mua:
                <input type='number' id='product-number' size='5' min="1" value="1">
                <button class='btn btn-success btn-sm mb-1' id='add-to-cart'>Thêm vào giỏ hàng</button>
            </div>
        </div>
        <br style="clear:both">
        <div>
        <b> Mô tả: </b><br>
        {{$data->mo_ta}}
        </div>
    @endforeach
</div>
<script>
    $(document).ready(function(){
        $("#add-to-cart").click(function(){ 
            
            id = "{{$data->id}}";
            num = $("#product-number").val();
            $.ajax({
                type:"POST",
                dataType:"json",
                url: "{{route('cartadd')}}",
                data:{"_token": "{{ csrf_token() }}","id":id,"num":num},
                beforeSend:function(){
                },
                success:function(data){
                    $("#cart-number-product").html(data);
                },
                error: function (xhr,status,error){
                },
                complete: function(xhr,status){
                }
            });
        });
    });
</script>
</x-book-layout>
</body>
</html>