@extends('admin.layout.body')
@section('content')
@php
  $i = (Request::get('page')-1)*4 +1 ;
@endphp

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
                          Tên banner
                      </th>
                      <th style="width: 25%">
                          Tiêu đề
                      </th>
                      <th style="width: 25%">
                        Ảnh
                      </th>
                      
                      <th style="width: 15%">
                        
                      </th>
                  </tr>
              </thead>
              <tbody>
                
                  
                  
                  @foreach ($banner as $banner)
                  

                  <tr>
                      <td>
                          {{$i++}}
                      </td>
                      <td>
                          
                              {{$banner->name}}
                         
                         
                      </td>
                      <td>
                          {{$banner->title}}
                      </td>
                      <td>
                        <img style="max-width:300px;max-height:100px;" src="{{config('app.url').'/userfiles/bannerImg/'.$banner->image}}" alt="">
                      
                      </td>
                      <td class="project-actions text-right">
                        <form action="{{route('banner.destroy',$banner->id)}}" method="POST">
                            @method('DELETE')
                             @csrf
                          <a class="btn btn-info btn-sm" href="{{route('banner.edit',$banner->id)}}">
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