<x-account-panel>
    @if ($errors->any())
    <div style='color:red;width:30%; margin:0 auto'>
    <div >
    {{ __('Whoops! Something went wrong.') }}
    </div>
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif
    <form method = 'post' action="{{route('edit')}}" enctype="multipart/form-data" style='width:30%; margin:0 auto'>
        <div style='text-align:center;font-weight:bold;color:#15c;'>CẬP NHẬT THÔNG TIN SÁCH</div>
        <label>Tiêu đề</label>
        <input type='text' class='form-control form-control-sm' name='tieude' value="{{$data->tieu_de}}">
        <label>Nhà cung cấp</label>
        <input type='text' class='form-control form-control-sm' name='nhacungcap' value="{{$data->nha_cung_cap}}">
        <label>Nhà xuất bản</label>
        <input type='text' class='form-control form-control-sm' name='nxb' value="{{$data->nha_xuat_ban}}">
        <label>Tác giả</label>
        <input type='text' class='form-control form-control-sm' name='tacgia' value="{{$data->tac_gia}}">
        <label>Hình thức bìa</label>
        <input type='text' class='form-control form-control-sm' name='hinhthucbia' value="{{$data->hinh_thuc_bia}}">
        <label>Giá bán</label>
        <input type='text' class='form-control form-control-sm' name='giaban' value="{{$data->gia_ban}}">
        <label>Ảnh bìa</label><br>
        <input type="file" name="anhbia" id="anhbia" accept="image/*" class="form-control-file">
        <input type ='hidden' value='{{$data->id}}' name='id'>
        {{ csrf_field() }}
        <div style='text-align:center;'><input type='submit' class='btn btn-primary mt-1' value='Lưu'></div>
    </form>
</x-account-panel>