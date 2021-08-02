@extends('admin.layout.body')
@section('content')
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
         <form action="{{ route('category.store')}}" method="post" enctype="multipart/form-data" >
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
            <div class="card-body">
               
              <div class="form-group">
                <label for="inputName">Tên danh mục</label>
                <input name="name" type="text" id="name" class="form-control" onkeyup="ChangeToSlug('name','slug')">
              </div>
               <div class="form-group">
                <label for="inputName">Từ khóa</label>
                <input name="slug" type="text" id="slug" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">File</label>
                <input name="img" type="file" id="img" class="form-control">
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