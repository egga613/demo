@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors)>0)
                        <div class="alert alert-danger"> 
                             @foreach ($errors->all() as $err) 
                                {{$err}} <br>
                            @endforeach
                        </div>
                        @endif
                        @if (session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                        <form action="admin/user/editPost/{{$user->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Pass</label>
                                <input type="password"  class="form-control" name="password"  />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"  />
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                @if ($user->type==0)
                                <input disabled class="form-control" name="type" value="Admin" />
                                @else
                                <input disabled class="form-control" name="type" value="Nhân viên" />
                                @endif
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="status" type="radio"  id="inlineRadio1" value="0" {{$user->status=='0'?"checked":""}}>
                                <label class="form-check-label" for="inlineRadio1"> <span class="badge badge-info">đã liên hệ </span></label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" name="status" type="radio"  id="inlineRadio2" value="1" {{$user->status=='1'?"checked":""}}>
                                <label class="form-check-label" for="inlineRadio2">
                                  <span class="badge badge-warning">chưa liên hệ</span>
    
    
                                </label>
                              </div>
                           
                            
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->

                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection