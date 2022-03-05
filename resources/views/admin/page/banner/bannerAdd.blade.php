@extends('admin.layout.body')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm banner</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
         <form action="{{ route('banner.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
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
                <input name="name" type="text" id="name" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Tiêu đề</label>
                <input name="title" type="text" id="slug" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Mô tả</label>
                <input name="desc" type="text" id="slug" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">bổ sung</label>
                <input name="sub" type="text" id="slug" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Ảnh</label>
                <input name="img" type="file" id="img" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Trạng thái</label>
                <select id="inputStatus" name='status' class="form-control custom-select">
                  <option selected="" disabled="">-- chọn --</option>
                  <option value="0">Ẩn</option>
                  <option value="1">Hiện</option>
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
          <input type="submit" value="Create new Porject" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    </section>
    
@endsection