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
      Employees Inactive
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('employees.index') }}"><i class="fa fa-dashboard"></i> Employees</a></li>
      <li class="active">Employees Inactive</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Employees Inactive List <small>{{ $employees->count() }}</small></h3>
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Department</th>
                <th>Activity</th>
                <th>NIF</th>
                <th>NIC</th>
                <th>RCN</th>
                <th>ART</th>
                <th>Wilaya</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Joining Date</th>
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
                <td>{{ $employee->nic }}</td>
                <td>{{ $employee->rcn }}</td>
                <td>{{ $employee->art }}</td>
                <td>{{ $employee->wilaya->name }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->joining_date }}</td>
              </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Department</th>
                <th>Activity</th>
                <th>NIF</th>
                <th>NIC</th>
                <th>RCN</th>
                <th>ART</th>
                <th>Wilaya</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Joining Date</th>
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
