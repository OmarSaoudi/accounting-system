@extends('layouts.master')

@section('title')
    Departments
@stop

@section('css')
  @toastr_css
  <link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Departments
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Departments</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Departments List <small>{{ $departments->count() }}</small></h3>
            <br><br>
            <a class="btn btn-success" data-toggle="modal" data-target="#AddDepartment"><i class="fa fa-plus"></i> Add</a>
            <button type="button" class="btn btn-danger" id="btn_delete_all"><i class="fa fa-trash"></i> Delete All</button>
          <!-- /.box-header -->
          <div class="box-body" id="datatable">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th><input type="checkbox" name="select_all" id="example-select-all" onclick="CheckAll('box1', this)"></th>
                <th>#</th>
                <th>Name</th>
                <th>Note</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($departments as $department)
              <tr>
                <td><input type="checkbox"  value="{{ $department->id }}" class="box1"></td>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->description }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditDepartment{{ $department->id }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteDepartment{{ $department->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <!-- Edit -->
               <div class="modal fade" id="EditDepartment{{ $department->id }}">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" style="text-align: center">Department Update</h4>
                     </div>
                    <div class="modal-body">
                     <form action="{{ route('departments.update', 'test') }}" class="form-department" data-toggle="validator" method="POST">
                      {{ method_field('PATCH') }}
                      @csrf
                        <div class="form-group">
                          <input type="hidden" name="id" id="id" value="{{ $department->id }}">
                          <label>Department Name Arabic :</label>
                          <input type="text" name="name" id="name" value="{{ $department->getTranslation('name', 'ar') }}" class="form-control" required>
                          <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                          <label>Department Name English :</label>
                          <input type="text" name="name_en" id="name_en" value="{{ $department->getTranslation('name', 'en') }}" class="form-control" required>
                          <span class="help-block with-errors"></span>
                        </div>
                        <div class="form-group">
                          <label>Note :</label>
                          <input type="text" name="description" id="description" value="{{ $department->description }}" class="form-control">
                          <span class="help-block with-errors"></span>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Save changes</button>
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        </div>
                     </form>
                    </div>
                   </div>
                 </div>
               </div>
              <!-- Edit End -->

              <!-- Delete -->
                <div class="modal fade" id="DeleteDepartment{{ $department->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" style="text-align: center">Delete Department</h4>
                        </div>
                       <div class="modal-body">
                        <form action="{{ route('departments.destroy', 'test') }}" method="POST">
                            {{ method_field('Delete') }}
                            @csrf
                            <div class="modal-body">
                                <p>Are sure of the deleting process ?</p><br>
                                <input id="id" type="hidden" name="id" class="form-control" value="{{ $department->id }}">
                                <input class="form-control" name="name" value="{{ $department->name }}" type="text" readonly>
                            </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-danger">Save changes</button>
                             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                           </div>
                        </form>
                       </div>
                      </div>
                    </div>
                </div>
              <!-- Delete End -->
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th><input type="checkbox" name="select_all" id="example-select-all" onclick="CheckAll('box1', this)"></th>
                <th>#</th>
                <th>Name</th>
                <th>Note</th>
                <th>Operation</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<!-- Add Department -->
  <div class="modal fade" id="AddDepartment">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title" style="text-align: center">Add Department</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('departments.store') }}" class="form-department" data-toggle="validator" method="post">
              @csrf
                <div class="form-group">
                  <label>Department Name Arabic :</label>
                  <input type="text" name="name" id="name" class="form-control">
                  <span class="help-block with-errors"></span>
                </div>
                <div class="form-group">
                  <label>Department Name English :</label>
                  <input type="text" name="name_en" id="name_en" class="form-control">
                  <span class="help-block with-errors"></span>
                </div>
                <div class="form-group">
                  <label>Note :</label>
                  <input type="text" name="description" id="description" class="form-control">
                  <span class="help-block with-errors"></span>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Save changes</button>
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Add Department -->

<!-- Delete All -->
<div class="modal fade" id="delete_all_d">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
              <h4 class="modal-title" style="text-align: center">Delete All Departments</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('delete_all_d') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>Are sure of the deleting process ?</p><br>
                        <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                    </div>

                    <div class="modal-footer">
                         <button type="submit" class="btn btn-danger">Save changes</button>
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- End Delete All -->

@endsection

@section('scripts')
@toastr_js
@toastr_render
<script src="{{ URL::asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>$('.form-department').validator();</script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
<script type="text/javascript">
    $(function() {
       $("#btn_delete_all").click(function() {
           var selected = new Array();
           $("#datatable input[type=checkbox]:checked").each(function() {
               selected.push(this.value);
           });

           if (selected.length > 0) {
               $('#delete_all_d').modal('show')
               $('input[id="delete_all_id"]').val(selected);
           }
       });
    });
</script>
@endsection

