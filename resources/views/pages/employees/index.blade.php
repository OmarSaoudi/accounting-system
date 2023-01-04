@extends('layouts.master')

@section('title')
    Employees
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Employees
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Employees</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Employees List <small>{{ $employees->count() }}</small></h3>
            <br><br>
            <a href="employees/create" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Department</th>
                <th>Activity</th>
                <th>NIF</th>
                <th>RCN</th>
                <th>ART</th>
                <th>Wilaya</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Date Of Birth</th>
                <th>Joining Date</th>
                <th>Status</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($employees as $employee)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->department->name }}</td>
                <td>{{ $employee->activity }}</td>
                <td>{{ $employee->nif }}</td>
                <td>{{ $employee->rcn }}</td>
                <td>{{ $employee->art }}</td>
                <td>{{ $employee->wilaya->name }}</td>
                <td>{{ $employee->gender->name }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->date_birth }}</td>
                <td>{{ $employee->joining_date }}</td>
                <td>
                    @if($employee->status == 'A') Active
                    @else Inactive
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-flat">Operation</button>
                        <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a></li>
                          <li><a class="btn btn-info btn-sm" href="{{ route('employees.show',$employee->id) }}"><i class="fa fa-eye"></i></a></li>
                          <li><a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteEmployee{{ $employee->id }}"><i class="fa fa-trash"></i></a></li>
                        </ul>
                    </div>
                </td>
              </tr>
              @include('pages.employees.delete')
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Department</th>
                <th>Activity</th>
                <th>NIF</th>
                <th>RCN</th>
                <th>ART</th>
                <th>Wilaya</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Date Of Birth</th>
                <th>Joining Date</th>
                <th>Status</th>
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

@endsection


@section('scripts')
<script src="{{ URL::asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
@endsection
