@extends('master')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Games List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Games List</li>
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


<!-- Test Start -->


            <!--     TEst End -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Games</h3>

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
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Game ID</th>
                      <th>Game Title</th>
                      <th>Game Type</th>
                      <th>Chat Logs</th>
                      <th> Creation Date & Time </th>
                      <th style="text-align: center;"> Delete Game </th>
                
                    </tr>
                  </thead>
                  <tbody>

                     @foreach ($games as $game)
   
     <tr>
                      <td> {{$game->id}}    </td>
                      <td> {{$game->game_name}}</td>
                      <td> {{$game->game_type}}</td>
                      <td> <a href="{{ route('getLogsDetails')}}"> <i class="fa fa-file" style="font-size:24px"></i> </a></td>
                      <td> {{$game->created_at}} </td>
                      <td style="text-align: center;"> <a href=""> <strong> X </strong> </a></td>
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