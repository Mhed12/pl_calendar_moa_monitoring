@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Partnerships & Linkages
              <small>Memorandum of Agreements</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Memorandum of Agreements</li>
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
              <h3 class="card-title">DataTable of Memorandum of Agreements</h3>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                Create New MOA
            </button>
            <!-- /.card-header -->
            <div class="card-body">
              <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link {{ Request::segment(1) === 'moaList' ? 'active' : null }}" href="/moaList" role="tab">All</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::segment(1) === 'activeMoa' ? 'active' : null }}" href="/activeMoa" role="tab">Active MOA(s)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::segment(1) === 'twoMonthsMoa' ? 'active' : null }}" href="/twoMonthsMoa" role="tab">Expiring within 2 Months</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::segment(1) === 'oneMonthMoa' ? 'active' : null }}" href="/oneMonthMoa" role="tab">Expiring within 1 Month</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::segment(1) === 'expiredMoa' ? 'active' : null }}" href="/expiredMoa" role="tab">Expired MOA(s)</a>
                </li>
              </ul>
              <div class="tab-content" id="custom-content-above-tabContent">
                
                <div class="tab-pane fade show {{ Request::segment(1) === 'moaList' ? 'active' : null }}" id="/moaList" role="tabpanel" aria-labelledby="allMoa-tab">
                  <!-- All -->
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name of Partner</th>
                      <th>Description of Partnership</th>
                      <th>Date Signed</th>
                      <th>Expiration Date</th>
                      <th>OPR</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($dataMoa as $item)
                        <tr>
                            <td>{{$item->par_name}}</td>
                            <td>{{$item->par_description}}</td>
                            <td>{{$item->date_signed}}</td>
                            <td>{{$item->date_expiration}}</td>
                            <td>{{$item->par_opr}}</td>

                            <td>
                              <a type="button" class="btn btn-block btn-warning" 
                              data-par_id="{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-par_opr="{{ $item->par_opr }}"
                              data-par_description="{{ $item->par_description }}"
                              data-date_signed="{{ $item->date_signed_edit }}"
                              data-date_expiration="{{ $item->date_expiration_edit }}" 
                              data-toggle="modal" data-target="#editModalMoa">Edit</a>
                              <br>
                              <a type="button" class="btn btn-block btn-danger" 
                              data-par_id = "{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-toggle="modal" data-target="#deleteModalMoa">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name of Partner</th>
                        <th>Description of Partnership</th>
                        <th>Date Signed</th>
                        <th>Expiration Date</th>
                        <th>OPR</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                  <!-- END All --> 
                </div>

                <div class="tab-pane fade show {{ Request::segment(1) === 'activeMoa' ? 'active' : null }}" id="/activeMoa" role="tabpanel">
                  <!-- Active MOA-->
                  <table id="activeMoaTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name of Partner</th>
                      <th>Description of Partnership</th>
                      <th>Date Signed</th>
                      <th>Expiration Date</th>
                      <th>OPR</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($dataMoa_am as $item)
                        <tr>
                            <td>{{$item->par_name}}</td>
                            <td>{{$item->par_description}}</td>
                            <td>{{$item->date_signed}}</td>
                            <td>{{$item->date_expiration}}</td>
                            <td>{{$item->par_opr}}</td>

                            <td>
                              <a type="button" class="btn btn-block btn-warning" 
                              data-par_id="{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-par_opr="{{ $item->par_opr }}"
                              data-par_description="{{ $item->par_description }}"
                              data-date_signed="{{ $item->date_signed_edit }}"
                              data-date_expiration="{{ $item->date_expiration_edit }}" 
                              data-toggle="modal" data-target="#editModalMoa">Edit</a>
                              <br>
                              <a type="button" class="btn btn-block btn-danger" 
                              data-par_id = "{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-toggle="modal" data-target="#deleteModalMoa">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name of Partner</th>
                        <th>Description of Partnership</th>
                        <th>Date Signed</th>
                        <th>Expiration Date</th>
                        <th>OPR</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                  <!-- END Active MOA --> 
                </div>

                <div class="tab-pane fade show {{ Request::segment(1) === 'twoMonthsMoa' ? 'active' : null }}" id="/twoMonthsMoa" role="tabpanel">
                  <!-- two months before -->
                  <table id="two_months_moa_table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name of Partner</th>
                      <th>Description of Partnership</th>
                      <th>Date Signed</th>
                      <th>Expiration Date</th>
                      <th>OPR</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($dataMoa_tm as $item)
                        <tr>
                            <td>{{$item->par_name}}</td>
                            <td>{{$item->par_description}}</td>
                            <td>{{$item->date_signed}}</td>
                            <td>{{$item->date_expiration}}</td>
                            <td>{{$item->par_opr}}</td>
                            <td>
                              <a type="button" class="btn btn-block btn-warning" 
                              data-par_id="{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-par_opr="{{ $item->par_opr }}"
                              data-par_description="{{ $item->par_description }}"
                              data-date_signed="{{ $item->date_signed_edit }}"
                              data-date_expiration="{{ $item->date_expiration_edit }}" 
                              data-toggle="modal" data-target="#editModalMoa">Edit</a>
                              <br>
                              <a type="button" class="btn btn-block btn-danger" 
                              data-par_id = "{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-toggle="modal" data-target="#deleteModalMoa">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name of Partner</th>
                        <th>Description of Partnership</th>
                        <th>Date Signed</th>
                        <th>Expiration Date</th>
                        <th>OPR</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                  <!-- END two months before -->      
                </div>

                <div class="tab-pane fade show {{ Request::segment(1) === 'oneMonthMoa' ? 'active' : null }}" id="/oneMonthMoa" role="tabpanel">
                  <!-- one months before -->
                  <table id="one_months_moa_table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name of Partner</th>
                      <th>Description of Partnership</th>
                      <th>Date Signed</th>
                      <th>Expiration Date</th>
                      <th>OPR</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($dataMoa_om as $item)
                        <tr>
                            <td>{{$item->par_name}}</td>
                            <td>{{$item->par_description}}</td>
                            <td>{{$item->date_signed}}</td>
                            <td>{{$item->date_expiration}}</td>
                            <td>{{$item->par_opr}}</td>
                            <td>
                              <a type="button" class="btn btn-block btn-warning" 
                              data-par_id="{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-par_opr="{{ $item->par_opr }}"
                              data-par_description="{{ $item->par_description }}"
                              data-date_signed="{{ $item->date_signed_edit }}"
                              data-date_expiration="{{ $item->date_expiration_edit }}" 
                              data-toggle="modal" data-target="#editModalMoa">Edit</a>
                              <br>
                              <a type="button" class="btn btn-block btn-danger" 
                              data-par_id = "{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-toggle="modal" data-target="#deleteModalMoa">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name of Partner</th>
                        <th>Description of Partnership</th>
                        <th>Date Signed</th>
                        <th>Expiration Date</th>
                        <th>OPR</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                  <!-- END one months before --> 
                </div>
                <div class="tab-pane fade show {{ Request::segment(1) === 'expiredMoa' ? 'active' : null }}" id="/expiredMoa" role="tabpanel">
                  <!-- expired date -->
                  <table id="expired_moa_table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Name of Partner</th>
                      <th>Description of Partnership</th>
                      <th>Date Signed</th>
                      <th>Expiration Date</th>
                      <th>OPR</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($dataMoa_ed as $item)
                        <tr>
                            <td>{{$item->par_name}}</td>
                            <td>{{$item->par_description}}</td>
                            <td>{{$item->date_signed}}</td>
                            <td>{{$item->date_expiration}}</td>
                            <td>{{$item->par_opr}}</td>
                            <td>
                              <a type="button" class="btn btn-block btn-warning" 
                              data-par_id="{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-par_opr="{{ $item->par_opr }}"
                              data-par_description="{{ $item->par_description }}"
                              data-date_signed="{{ $item->date_signed_edit }}"
                              data-date_expiration="{{ $item->date_expiration_edit }}" 
                              data-toggle="modal" data-target="#editModalMoa">Edit</a>
                              <br>
                              <a type="button" class="btn btn-block btn-danger" 
                              data-par_id = "{{ $item->par_id }}"
                              data-par_name = "{{ $item->par_name }}" 
                              data-toggle="modal" data-target="#deleteModalMoa">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name of Partner</th>
                        <th>Description of Partnership</th>
                        <th>Date Signed</th>
                        <th>Expiration Date</th>
                        <th>OPR</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                  <!-- END expired moa --> 
                </div>
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

    <!-- Create MOA MODAL -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create New MOA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="submit">
                    @csrf
                    <div class="modal-body">
                      <input class="form-control" name="par_name" type="text" placeholder="Name of Partner" required>
                      <input class="form-control" name="par_opr" type="text" placeholder="Office of Primary Responsibility " required>
                      <textarea class="form-control" name="par_description" rows="3" placeholder="Description of Partnership" required></textarea>
                      <!-- Date Range Picker -->
                      <div class="bootstrap-timepicker" id="date-range" id="date-range">
                        <div class="form-group">
                          <div class="input-group date" id="datepicker" data-target-input="nearest">
                            <label for="date_signed">Date Signed:</label>
                            <input type="date" id="date_signed" name="date_signed" class="form-control" required/>
                            <label for="date_expiration">Expiration Date:</label>
                            <input type="date" id="date_expiration" name="date_expiration"class="form-control" required/>
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
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
    </div>

    <!-- Edit MOA MODAL -->
    <div class="modal fade" id="editModalMoa">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create New MOA</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <form method="POST" action="editMoa">
                  @csrf
                  @method('put')
                  <div class="modal-body">
                    <input type="hidden" id="par_id" name="par_id">
                    <input class="form-control" name="par_name" id="par_name" type="text" placeholder="Name of Partner" required>
                    <input class="form-control" name="par_opr" id="par_opr" type="text" placeholder="Office of Primary Responsibility " required>
                    <textarea class="form-control" name="par_description" id="par_description" rows="3" placeholder="Description of Partnership" required></textarea>
                    <!-- Date Range Picker -->
                    <div class="bootstrap-timepicker" id="date-contract" id="date-contract">
                      <div class="form-group">
                        <div class="input-group date" id="datepicker" data-target-input="nearest">
                          <label for="date_signed">Date Signed:</label>
                          <input type="date" id="date_signed" name="date_signed" class="form-control" required/>
                          <label for="date_expiration">Expiration Date:</label>
                          <input type="date" id="date_expiration" name="date_expiration"class="form-control" required/>
                        </div>
                        <!-- /.input group -->
                      </div>
                      <!-- /.form group -->
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
    </div>

   <!-- Start DELETE MOA Modal -->
   <div class="modal fade" id="deleteModalMoa">
    <div class="modal-dialog modal-sm">
      <div class="modal-content bg-warning">
        <div class="modal-header">
          <h4 class="modal-title">Delete</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="deleteMoa" id="deleteFormMoa">
        @csrf
        @method('put')
        <div class="modal-body">
          <p>Confirm Delete?</p>
          <input type="hidden" id="par_id" name="par_id">
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
  <!-- End DELETE MOA Modal -->
@endsection