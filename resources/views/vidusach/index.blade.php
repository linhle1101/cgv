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
                margin:20px;
                text-align:center;
            }
            .book
            {
            position:relative;
            margin:10px;
            text-align:center;
            padding-bottom:35px;
            }
            .btn-add-product
            {
            position:absolute;
            bottom:0;
            width:100%;
            }
        </style>
        
</head>
<body>
<x-book-layout>
<x-slot name='title'>
    Sách
</x-slot>
<div id='book-view-div'>
    <div class='list-book'>
        @foreach($data as $row)
            <div class='book'>
            <a href="{{url('sach/detail/'. $row->id)}}">
                <img src="{{asset($row->link_anh_bia)}}" width='200px'
                height='200px'><br>
                <b>{{$row->tieu_de}}</b><br/>
                <i>{{number_format($row->gia_ban,0,",",".")}}đ</i>
            </a>
                <div class='btn-add-product'>
                <button class='btn btn-success btn-sm mb-1 add-product' book_id="{{$row->id}}">
                Thêm vào giỏ hàng
                </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".add-product").click(function(){
            id = $(this).attr("book_id");
            num = 1;
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
        $(".menu-the-loai").click(function(e){
            e.preventDefault();
            let the_loai = $(this).attr("the_loai");
            $.ajax({
                type:"POST",
                dataType:"html",
                url: "{{route('bookview')}}",
                data:{"_token": "{{ csrf_token() }}","the_loai":the_loai},
                beforeSend:function(){
                },
                success:function(data){
                $("#book-view-div").html(data);
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