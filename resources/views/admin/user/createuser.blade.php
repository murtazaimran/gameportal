@extends('master')

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Creation Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">User Creation Form</li>
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

              </div>
            </div>
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">User Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{ route('createUser') }}">
                @csrf
                <div class="card-body">
                  <div class="row">
                   <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name *</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter FullName">
                  </div>
                </div>
 <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address *</label>
                    <input type="email" class="form-control" id="email" name= "email" required placeholder="Enter Email">
                  </div>
                </div>



              <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password *</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                  </div>
                </div>

<div class="col-md-5">
                     <div class="form-group">
                    <label for="exampleInputEmail1">Contact Number *</label>
                    <input type="Number" class="form-control" id="contactnumber"  name="phone" id="phone" placeholder="Enter Contact Number" required>
                  </div>
                </div>

<div class="col-md-5">
                 <div class="form-group">
                  <label>Date of Birth</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="dob" id="dob" required/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              </div>
<div class="col-md-5">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality"  placeholder="Nationality">
                  </div>
                </div>

<div class="col-md-5">
                   <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" id="gender" name="gender">
                          <option value="male" >Male</option>
                          <option value="female">Female</option>
                          <option value="transgender">Transgender</option>
                          <option value="rather_not_say">Rather not say</option>
                        </select>
                      </div>
                    </div>

<div class="col-md-5">
                       <div class="form-group">
                        <label>Us Person</label>
                        <select class="form-control" id="us_person" name="us_person">
                          <option value="1" >Yes</option>
                          <option value="0">No</option>
              
                        </select>
                      </div>
                    </div>

<div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                    <input type="text" class="form-control" id="country" name="country"  placeholder="Country">
                  </div>
                </div>


<div class="col-md-5">
                       <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" class="form-control" id="city" name="city"  placeholder="City">
                  </div>
                </div>

<div class="col-md-5">
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="address" name="address"   placeholder="Address">
                  </div>
                </div>



              </div>






                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create User</button>
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