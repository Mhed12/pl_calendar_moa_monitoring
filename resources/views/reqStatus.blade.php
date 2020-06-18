@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Partnerships & Linkages
              <small>Schedule Request</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Schedule Request</li>
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
              <h3 class="card-title">DataTable of Schecules</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Venue</th>
                  <th>Contact Person</th>
                  <th>Start Date - Time</th>
                  <th>End Date - Time</th>
                  <th>All Day?</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $row)
                  <tr>
                    <td>{{ $row->event_name }}</td>
                    <td>{{ $row->venue }}</td>
                    <td>{{ $row->contact_person }}</td>
                    
                    @if( ($row->allDay) == 0)
                      <td>{{ $row->e_start_date }} - {{ $row->e_start_time }}</td>
                      <td>{{ $row->e_end_date }} - {{ $row->e_end_time }}</td>
                    @else
                    <td>{{ $row->e_start_date }}</td>
                    <td>{{ $row->e_end_date }}</td>
                    @endif
                    
                    @if( $row->allDay == 1)
                      <td>Yes</td>
                    @else
                      <td>No</td>
                    @endif
                    
                    @if( $row->status == 'UPLOADED')
                      <td class="btn-success">UPLOADED</td>
                    @elseif( $row->status == 'DELETED')
                      <td class="btn-danger">DELETED</td>
                    @elseif($row->status == 'UPDATED')
                      <td class="btn-warning">UPDATED</td>
                    @endif

                  </tr>
                @endforeach  
                </tbody>
                <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Venue</th>
                  <th>Contact Person</th>
                  <th>Start Date - Time</th>
                  <th>End Date - Time</th>
                  <th>All Day?</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
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