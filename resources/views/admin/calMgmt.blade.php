@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Partnerships & Linkages
              <small>Calendar Management</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Calendar Management</li>
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
                  <th>Division</th>
                  <th>All Day?</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                  <tr>
                    <td>{{ $row->event_name }}</td>
                    <td>{{ $row->venue }}</td>
                    <td>{{ $row->contact_person }}</td>
                            
                    @if( ($row->allDay) == 0)
                      <td>{{ $row->e_start_date }} - {{ $row->e_start_time }}</td>
                      <td>{{ $row->e_end_date }} - {{ $row->e_end_time }}</td>
                    @else {{--  @if( ($row->allDay) == 0) --}}
                      <td>{{ $row->e_start_date }}</td>
                      <td>{{ $row->e_end_date }}</td>
                    @endif{{-- END if of @if( ($row->allDay) == 0) --}}  

                    <td>{{ $row->division }}</td>
                            
                    @if( $row->allDay == 1)
                      <td>Yes</td>
                    @else{{-- ( $row->allDay == 1) --}} 
                      <td>No</td>
                    @endif{{-- END if of @if( $row->allDay == 1) --}}  
                    <td>

                      <!--<a href="#" type="button" class="edit" title="Edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></a>-->
                      @if( ($row->allDay) == 0)
                      <a type="button" class="btn btn-block btn-warning" 
                        data-event_id="{{ $row->event_ID }}"
                        data-log_id = "{{ $row->log_ID }}" 
                        data-event_name="{{ $row->event_name }}"
                        data-venue="{{ $row->venue }}"
                        data-contact_person="{{ $row->contact_person }}"
                        data-division="{{ $row->division }}"
                        data-e_start_date="{{ $row->e_start_date_edit }}"
                        data-e_end_date="{{ $row->e_end_date_edit }}"
                        data-e_start_time="{{ $row->e_start_time_edit }}"
                        data-e_end_time="{{ $row->e_end_time_edit }}"
                        data-allDay="{{ $row->allDay }}"    
                      data-toggle="modal" data-target="#editModal">Edit</a>
                      @else
                      <a type="button" class="btn btn-block btn-warning" 
                        data-event_id="{{ $row->event_ID }}"
                        data-log_id = "{{ $row->log_ID }}" 
                        data-event_name="{{ $row->event_name }}"
                        data-venue="{{ $row->venue }}"
                        data-contact_person="{{ $row->contact_person }}"
                        data-division="{{ $row->division }}"
                        data-e_start_date="{{ $row->e_start_date_edit }}"
                        data-e_end_date="{{ $row->e_end_date_edit }}"
                        data-allday="{{ $row->allDay }}"   
                      data-toggle="modal" data-target="#editModal">Edit</a>
                      @endif
                      <br>

                      <!--onclick="return confirm('Confirm Delete?');" for test-->
    
                      <a type="button" class="btn btn-block btn-danger" 
                        data-log_id = "{{ $row->log_ID }}"
                        data-event_id="{{ $row->event_ID }}" 
                        data-event_name = "{{ $row->event_name }}" 
                      data-toggle="modal" data-target="#deleteModal">Delete</a>
                       
                    </td>
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
                  <th>Division</th>
                  <th>All Day?</th>
                  <th>Action</th>
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

    <!-- Start EDIT Event Modal -->
    <div class="modal fade" id="editModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="update" id="editForm">
            @csrf
            @method('put')
              <div class="modal-body">
                <input name="event_ID" id="event_ID" type="hidden">
                <input name="log_ID" id="log_ID" type="hidden">
                <input class="form-control" name="event_name" id="event_name" type="text" placeholder="Event Name" required>
                <input class="form-control" name="contact_person" id="contact_person" type="text" placeholder="Contact Person" required>
                <input class="form-control" name="venue" id="venue" type="text" placeholder="Venue" required>

                <!-- Date Range Picker -->
                <div class="bootstrap-timepicker" id="date-range" id="date-range">
                  <div class="form-group">
                    <div class="input-group date" id="datepicker" data-target-input="nearest">
                      <label for="e_start_date">Start Date:</label>
                      <input type="date" id="e_start_date" name="e_start_date" class="form-control" required/>
                      <label for="e_end_date">End Date:</label>
                      <input type="date" id="e_end_date" name="e_end_date"class="form-control" required/>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>        

                <!-- time Range Picker -->
                <div class="bootstrap-timepicker" id="timeRanges" name="timeRanges">
                  <div class="form-group">
                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <label for="e_start_time">Start Time:</label>
                      <input type="hidden" name="e_start_time" value="0">
                      <input type="time" id="e_start_time" name="e_start_time" class="form-control"/>
                      <label for="e_end_time">End Time:</label>
                      <input type="hidden" name="e_end_time" value="0">
                      <input type="time" id="e_end_time" name="e_end_time" class="form-control"/>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>        

                <!-- /.form group -->            
                <!-- Checkbox -->
                <!--<div class="custom-control custom-checkbox">
                  <input type="hidden" name="allDay" id="allDay">
                  <input class="custom-control-input" type="checkbox" id="allDay" name="allDay">
                  <label for="allDay" class="custom-control-label">All Day</label>
                </div>-->
                  <input type="hidden" name="allDay" id="allDay" >
                  <input type="checkbox" id="allDays" name="allDays">
                  <label for="allDay">All Day</label>

              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div> 
          </form> 
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- End EDIT Event Modal -->

    <!-- Start DELETE Event Modal -->
    <div class="modal fade" id="deleteModal">
      <div class="modal-dialog modal-sm">
        <div class="modal-content bg-warning">
          <div class="modal-header">
            <h4 class="modal-title">Delete</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="delete" id="deleteForm">
          @csrf
          @method('put')
          <div class="modal-body">
            <p>Confirm Delete?</p>
            <input type="hidden" id="log_ID" name="log_ID">
            <input type="hidden" id="event_ID" name="event_ID">  
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="delete" class="btn btn-danger">Confirm</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- End DELETE Event Modal -->

@endsection