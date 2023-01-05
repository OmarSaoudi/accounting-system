@extends('layouts.master')

@section('title')
    Fees
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Fees
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Fees</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Fees List <small>{{ $fees->count() }}</small></h3>
            <br><br>
            <a href="fees/create" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Department</th>
                <th>Academic Year</th>
                <th>Notes</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($fees as $fee)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $fee->title}}</td>
                <td>{{ number_format($fee->amount, 2) }}</td>
                <td>{{ $fee->department->name }}</td>
                <td>{{ $fee->year }}</td>
                <td>{{ $fee->description }}</td>
                <td>
                    @if ($fee->fee_type === 1)
                        <label class="badge badge-success">Study fees</label>
                    @else
                        <label class="badge badge-danger">Bus fees</label>
                    @endif</td>
                <td>
                  <a href="{{ route('fees.edit',$fee->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-info btn-sm" href="{{ route('fees.show',$fee->id) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteFee{{ $fee->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @include('pages.employees.fees.delete')
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Department</th>
                <th>Academic Year</th>
                <th>Notes</th>
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
