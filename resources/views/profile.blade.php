@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Partnerships & Linkages
              <small>Profile</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
 
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Profile</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 text-center">
                            <img src="dist/img/unknown-160x160.jpg" class="avatar img-circle img-thumbnail">
                            <div class="span1">
                                <!--<a data-toggle="modal" href="#" id="editpicture">
                                    <span rel="tooltip" title="Edit Profile Picture"><i class=" fa fa-edit"></i></span>
                                </a>-->
                            </div>
                            <!-- <small><a href="#">Change password</a></small> -->
                        </div>
                        <!--/col-->
                        <div class="col-xs-12 col-sm-8">
                            
                            <h2>{{ Auth::user()->name }}</h2>
                            
                            <p><strong>Email: </strong> {{ Auth::user()->email }} </p>                         
                            <p><strong>Division: </strong>PLO - {{ Auth::user()->division }}</p>
                                <div id="divPersonalInfo" style="float:left;" class="span12">
                                    <table class="table">
                                        <tbody><tr>
                                            <td>
                                                <div style="float: right">
                                                    <!--<a data-toggle="modal" href="#" class="edit-personal-info" data-id="67f5d877-318c-4081-bcfe-9d939ac5ce3a">
                                                        <span rel="tooltip" title="Edit Personal Info"><i class=" fa fa-edit"></i></span>
                                                    </a>-->
                                                </div>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        <!--/col-->
                        <div class="clearfix"></div>

                        <!--/col-->
                    </div>
                    <!--/row-->
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection