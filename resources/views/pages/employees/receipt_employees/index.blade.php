@extends('layouts.master')

@section('title')
    Receipts
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Receipts
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Receipts</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Receipts List <small>{{ $receipt_employees->count() }}</small></h3>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Notes</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($receipt_employees as $receipt_employee)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $receipt_employee->employee->name }}</td>
                <td>{{ number_format($receipt_employee->debit, 2) }}</td>
                <td>{{ $receipt_employee->description }}</td>
                <td>
                    <a href="{{ route('receipt_employees.edit',$receipt_employee->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteReceipt{{ $receipt_employee->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @include('pages.employees.receipt_employees.delete')
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Amount</th>
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
