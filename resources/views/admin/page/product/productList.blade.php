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
                 {{-- name	slug	price	sale_price	desc	content	img	status	category_id --}}
                  <tr>
                      <th style="width: 10%">
                          STT
                      </th>
                      <th style="width: 15%">
                          Tên sản phẩm
                      </th>
                       <th style="width: 15%">
                          Giá
                      </th>
                      <th style="width: 15%">
                          Giá sale
                      </th>
                       <th style="width: 15%">
                          Ảnh
                      </th>
                      <th style="width: 10%">
                          Trạng thái
                      </th>
                      <th style="width: 10%">
                          Danh mục
                      </th>
                      
                      <th style="width: 10%">
                        
                      </th>
                  </tr>
              </thead>
              <tbody>
                
                  @php
                      $i = 1 ;
                  @endphp 
                  
                  @foreach ($prod as $prod)
                    

                  <tr>
                      <td>
                          {{$i++}}
                      </td>
                      <td>
                          
                              {{$prod->name}}
                         
                         
                      </td>
                      <td>
                          {{$prod->price}}
                      </td>
                       <td>
                          {{$prod->sale_price}}
                      </td>
                       <td>
                          <img style="max-width:300px;max-height:100px;" src="{{config('app.url').'/userfiles/productImg/'.$prod->img}}" alt="">
                          
                      </td>
                       <td>
                         @if ($prod->status == 0)
                           Ẩn
                         @else
                           Hiện
                         @endif
                      </td>
                       <td>
                          @php
                            $cats = DB::table('category')->find($prod->category_id);
                            echo $cats->name;
                          @endphp
                      </td>

                      <td class="project-actions text-right">
                        <form action="{{route('product.destroy',$prod->id)}}" method="POST">
                            @method('DELETE')
                             @csrf
                          <a class="btn btn-info btn-sm" href="{{route('product.edit',$prod->id)}}">
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