@extends('master')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Game Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Game Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">

     @if(session()->has('message'))
                
<div class="row">
<div class="col-md-12">
  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                   {{ session()->get('message') }}
            


                       
                    </div>
                @endif

                @if($errors->any())
                   <div class="alert alert-danger">
                    {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif

<!-- Test Start -->


            <!--     TEst End -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="max-height: 800px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Is Approved</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      <th>Approve</th>
                  
                
                    </tr>
                  </thead>
                  <tbody>

                     @foreach ($users as $user)
   
     <tr>
                      <td> {{$user->id}}    </td>
                      <td> {{$user->name}}</td>
                      <td> {{$user->email}}</td>
                      @if($user->id_verified) 
                      <td> Approved </td>
                    @else
                    
                      <td> Unapproved </td> 
                    @endif
                      <td> <a href="editUser/{{ $user->id }}"> <STRONG> EDIT </STRONG> </a></td>
                      <td> <a href="deleteUser/{{ $user->id }}">  <strong>  x </strong>  </a></td>                                                       
                      <td> @if(!$user->id_verified)  <a href="approveUser/{{ $user->id }}">  <strong>  &#10003; </strong>  @endif </a></td>

                    </tr>

    @endforeach

                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
@endsection