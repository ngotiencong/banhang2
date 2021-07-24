@extends('admin.layout.body')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm tài khoản</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm tài khoản</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
         <form action="{{ route('users.update',$users->id)}}" method="post" >
            @csrf
            @method('put')
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Thông tin tài khoản</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
               
              <div class="form-group">
                <label for="inputName">Họ và tên</label>
                <input name="name" value="{{$users->name}}" required="" type="text" id="name" class="form-control">
              </div>
                
              <div class="form-group">
                <label for="inputName">Số điện thoại</label>
                <input name="phone" value="{{$users->phone}}" required="" type="text" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                <input name="email" value="{{$users->email}}" required="" type="email" id="" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputName">Địa chỉ</label>
                <input name="adress" value="{{$users->adress}}" required="" type="text" id="" class="form-control">
              </div>
               {{-- <div class="form-group">
                <label for="inputName">Mật khẩu</label>
                <input name="password" required="" type="text" id="" class="form-control">
              </div> --}}
               <div class="form-group">
                        <label for="inputStatus">Trạng thái</label>
                        <select id="" name='status' class="form-control custom-select">
                          <option value="1">Hiện</option>
                          <option @if ($users->status == 0)
                            selected=""
                          @endif value="0">Ẩn</option>
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