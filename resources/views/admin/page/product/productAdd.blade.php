@extends('admin.layout.body')
@section('content')
@include('ckfinder::setup')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm danh mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm danh mục</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
         <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thông tin danh mục</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="inputName">Tên sản phẩm</label>
                    <input name="name" type="text" id="name" onkeyup="ChangeToSlug('name','slug')" class="form-control" onkeyup="ChangeToSlug('name','')">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Từ khóa</label>
                    <input name="slug" type="text" id="slug" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Giá</label>
                    <input name="price" type="text" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Giá khuyến mãi</label>
                    <input name="sale_price" type="text" id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Mô tả</label>
                  <textarea name="desc" id="desc" cols="" class="form-control" rows="4"></textarea>
                  </div>
                
                 
                </div>
                </div>
              
 
                <div class="col-md-6">
                   <div class="card-body">
                      <div class="form-group">
                        <label for="inputName">Chi tiết</label>
                        <textarea name="detail" id="detail" cols="" class="form-control" rows="4"></textarea>
                      </div>
                      
                      <div class="form-group">
                    <label for="exampleInputFile">Thêm ảnh</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="img" class="" id="img">
                        
                      </div>
                      
                    </div>
                  </div>
                      <div class="form-group">
                        <label for="inputStatus">Trạng thái</label>
                        <select id="inputStatus" name='status' class="form-control custom-select">
                          <option selected="" disabled="">-- chọn --</option>
                          <option value="0">Ẩn</option>
                          <option value="1">Hiện</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputStatus">Danh mục</label>
                        <select id="inputStatus" name="category_id" class="form-control custom-select">
                          <option selected="" disabled=""> chọn danh mục </option>
                          @foreach ($category as  $cats)
                            <option value="{{$cats->id}}">{{$cats->name}}</option>
                          @endforeach
                          
                          
                          
                        </select>
                      </div>
                    </div>  
                </div>
              
              @if(session()->has('mess'))
                    <div class="alert alert-success">
                        {{ session()->get('mess') }}
                    </div>
                @endif
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('ckfinder_browser')}}"></a>
          <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    </section>

<script>
  CKEDITOR.replace( 'detail',{

        filebrowserBrowseUrl     : "{{ route('ckfinder_browser') }}",
        filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",
        filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123", 
        filebrowserUploadUrl     : "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files", 
        filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",
        filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",
});
CKEDITOR.replace( 'desc',{
 toolbar: [
        ['Bold', 'Italic', 'Underline', 'Strike', 'TextColor', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink']
    ]
});

</script>

@endsection