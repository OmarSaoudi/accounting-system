@extends('layouts.master')

@section('title')
    Fee Invoices
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Fee Invoices
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Fee Invoices</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Fee Invoices List <small>{{ $fee_invoices->count() }}</small></h3>
            <br><br>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Fee Type</th>
                <th>Amount</th>
                <th>Department</th>
                <th>Notes</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($fee_invoices as $fee_invoice)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $fee_invoice->employee->name }}</td>
                <td>{{ $fee_invoice->fee->title }}</td>
                <td>{{ number_format($fee_invoice->amount, 2) }}</td>
                <td>{{ $fee_invoice->department->name }}</td>
                <td>{{ $fee_invoice->description }}</td>
                <td>
                    <a href="{{ route('fee_invoices.edit',$fee_invoice->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteFeeInvoices{{ $fee_invoice->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @include('pages.employees.fee_Invoices.delete')
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Fee Type</th>
                <th>Amount</th>
                <th>Department</th>
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
