@extends('layouts.main2')

@section('content')
<!-- Content Header (Page header) -->
 <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Partnerships & Linkages
          <small>Dashboard</small>
        </h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              @foreach ($activeMoa as $am)
                <h3>{{ $am->activeMoa }}</h3>
              @endforeach

              <p>Active MOAs</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-signature"></i>
            </div>
            <a href="/activeMoa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              @foreach ($two_months as $tm)
                <h3>{{ $tm->two_months }}</h3>
              @endforeach

              <p>2 Months before Expiration</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-alt"></i>
            </div>
            <a href="/twoMonthsMoa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              @foreach ($one_month as $om)
                <h3>{{ $om->one_month }}</h3>
              @endforeach

              <p>1 Month before Expiration</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-alt"></i>
            </div>
            <a href="/oneMonthMoa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              @foreach ($expiredMoa as $em)
                <h3>{{ $em->expiredMoa }}</h3>
              @endforeach

              <p>Expired MOAs</p>
            </div>
            <div class="icon">  
              <i class="fas fa-file-excel"></i>
            </div>
            <a href="/expiredMoa" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    <div class="row">
      <div class="col-md-3">
        <div class="sticky-top mb-3">
          <div class="card" hidden>
            <div class="card-header">
              <h4 class="card-title">Draggable Events</h4>
            </div>
            <div class="card-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-success">Lunch</div>
                <div class="external-event bg-warning">Go home</div>
                <div class="external-event bg-info">Do homework</div>
                <div class="external-event bg-primary">Work on UI design</div>
                <div class="external-event bg-danger">Sleep tight</div>
                <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card" hidden>
            <div class="card-header">
              <h3 class="card-title">Create Event</h3>
            </div>
            <div class="card-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                <ul class="fc-color-picker" id="color-chooser">
                  <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                  <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                  <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                  <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                  <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <div class="input-group">
                <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                <div class="input-group-append">
                  <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                </div>
                <!-- /btn-group -->
              </div>
              <!-- /input-group -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.col -->

      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-body">
            <!-- THE CALENDAR -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
              Add Event
            </button>

            <span class="badge badge-default">LEGENDS:</span> 
              <span class="badge badge-danger">OED</span> 
              <span class="badge badge-primary">PIAD</span> 
              <span class="badge badge-warning">PND</span>
            
            <div id="calendar"></div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Add Event Modal -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="submitSched">
        @csrf
        <div class="modal-body">
          <input class="form-control" name="event_name" type="text" placeholder="Event Name" required>
          <input class="form-control" name="contact_person" type="text" placeholder="Contact Person" required>
          <input class="form-control" name="venue" type="text" placeholder="Venue" required>

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
          <div class="bootstrap-timepicker" id="time-range" id="time-range">
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
          <div class="custom-control custom-checkbox">
            <input type="hidden" name="allDay" value="0">
            <input class="custom-control-input" type="checkbox" id="allDay" name="allDay" value="1">
            <label for="allDay" class="custom-control-label">All Day</label>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form> 
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection