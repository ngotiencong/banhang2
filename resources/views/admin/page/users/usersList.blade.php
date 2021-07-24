@extends('admin.layout.body')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                
                  <tr>
                      <th style="width: 10%">
                          STT
                      </th>
                      <th style="width: 15%">
                          Họ tên
                      </th>
                       <th style="width: 15%">
                          Số điện thoại
                      </th>
                      <th style="width: 15%">
                          Email
                      </th>
                       <th style="width: 15%">
                          Địa chỉ
                      </th>
                      <th style="width: 15%">
                          Trạng thái
                      </th>
                      
                      <th style="width: 15%">
                        
                      </th>
                  </tr>
              </thead>
              <tbody>
                
                  @php
                      $i = 1 ;
                  @endphp 
                  
                  @foreach ($users as $users)
                    

                  <tr>
                      <td>
                          {{$i++}}
                      </td>
                      <td>
                          
                              {{$users->name}}
                         
                         
                      </td>
                      <td>
                          {{$users->phone}}
                      </td>
                       <td>
                          {{$users->email}}
                      </td>
                      <td>
                          {{$users->adress}}
                      </td>
                       <td>
                         @if ($users->status == 0)
                           Ẩn
                         @else
                           Hiện
                         @endif
                      </td>
                      <td class="project-actions text-right">
                        <form action="{{route('users.destroy',$users->id)}}" method="POST">
                            @method('DELETE')
                             @csrf
                          <a class="btn btn-info btn-sm" href="{{route('users.edit',$users->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Sửa
                          </a>
                          
                           
                            <button type="submit" Class="btn btn-danger btn-sm">
                              <i class="fas fa-trash">
                              </i>
                              Xóa
                         </button>
                        </form>
                        
                          
                      </td>
                  </tr>
                  
                      @endforeach
                  
              </tbody>
              
          </table>
          
        </div>
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      {{$data['shortlist']->links()}}
    </section>
    <!-- /.content -->


@endsection