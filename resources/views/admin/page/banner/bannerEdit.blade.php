@extends('admin.layout.body')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sửa banner</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Sửa banner</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <form action="{{ route('banner.update', $banner->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thông tin banner</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label for="inputName">Tên banner</label>
              <input name="name" type="text" id="name" value="{{$banner->name}}" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputName">Tiêu đề</label>
              <input name="title" type="text" id="slug" value="{{$banner->title}}" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputName">Mô tả</label>
              <input name="desc" type="text" id="slug" value="{{$banner->desc}}" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputName">bổ sung</label>
              <input name="sub" type="text" id="slug" value="{{$banner->sub}}" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputName">File</label>
              <img id="image" style="max-width:300px;max-height:100px;"
                src="{{config('app.url').'/userfiles/bannerImg/'.$banner->image}}" alt="">
              <input name="img" type="file" id="files" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputStatus">Trạng thái</label>
              <select id="inputStatus" name='status' class="form-control custom-select">
                <option value="0">Ẩn</option>
                <option @if ($banner->status == 1)
                  selected=""
                  @endif value="1">Hiện</option>
              </select>
            </div>
            @if(session()->has('mess'))
            <div class="col-md-10 mx-auto alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ session()->get('mess') }}</strong>
            </div>

            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

    </div>
    <div class="row">
      <div class="col-12">
        <a href="#" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Sửa" class="btn btn-success float-right">
      </div>
    </div>
  </form>
</section>

@endsection