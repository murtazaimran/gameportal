@extends('master')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Game Creation Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Game Creation Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

               @if(session()->has('message'))
                


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
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Game Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('createGame') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Game Title *</label>
                    <input type="text" class="form-control" id="game_name" name="game_name" required placeholder="Enter Game Title">
                  </div>
            
                      <!-- select -->
                      <div class="form-group">
                        <label>Select Game Type</label>
                        <select class="form-control" id="gametype" name="game_type">
                          <option value="slots" >Slots</option>
                          <option value="poker">Poker</option>
                          <option value="blackjack">Blackjack</option>
                          <option value="roulette">Roulette</option>
                        </select>
                      </div>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create Game</button>
                </div>
              </form>
            </div>



            <!-- /.card -->

            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
      
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection