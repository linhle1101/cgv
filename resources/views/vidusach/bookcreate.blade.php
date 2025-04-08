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
    <form method = 'post' action="{{route('addbook')}}" enctype="multipart/form-data" style='width:30%; margin:0 auto'>    
        <label>Tiêu đề</label>
        <input type='text' class='form-control form-control-sm' name='tieude' value="">
        <label>Nhà cung cấp</label>
        <input type='text' class='form-control form-control-sm' name='nhacungcap' value="">
        <label>Nhà xuất bản</label>
        <input type='text' class='form-control form-control-sm' name='nxb' value="">
        <label>Tác giả</label>
        <input type='text' class='form-control form-control-sm' name='tacgia' value="">
        <label>Hình thức bìa</label>
        <input type='text' class='form-control form-control-sm' name='hinhthucbia' value="">
        <label>Giá bán</label>
        <input type='text' class='form-control form-control-sm' name='giaban' value="">
        <label>Ảnh bìa</label><br>
        <input type="file" name="anhbia" id="anhbia" accept="image/*" class="form-control-file">
        
        {{ csrf_field() }}
        <div style='text-align:center;'><input type='submit' class='btn btn-primary mt-1' value='Lưu'></div>
    </form>
</x-account-panel>