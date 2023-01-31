@extends('layouts.master')

@section('title')
    Accountants
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
      Accountants
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Accountants</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Accountants List <small>{{ $accountants->count() }}</small></h3>
            <br><br>
            <a href="accountants/create" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Wilaya</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Date Of Birth</th>
                <th>Joining Date</th>
                <th>Status</th>
                <th>Days</th>
                <th>Operation</th>
              </tr>
              </thead>
              <tbody>
              @foreach($accountants as $accountant)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $accountant->name }}</td>
                <td>{{ $accountant->email }}</td>
                <td>{{ $accountant->wilaya->name }}</td>
                <td>{{ $accountant->gender->name }}</td>
                <td>{{ $accountant->address }}</td>
                <td>{{ $accountant->phone }}</td>
                <td>{{ $accountant->date_birth }}</td>
                <td>{{ $accountant->joining_date }}</td>
                <td>
                    @if($accountant->status == 'A') Active
                    @else Inactive
                    @endif
                </td>
                <td>{{ $accountant->days->pluck('name')->join(', ') }}</td>
                <td>
                  <a href="{{ route('accountants.edit',$accountant->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-info btn-sm" href="{{ route('accountants.show',$accountant->id) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteAccountant{{ $accountant->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @include('pages.accountants.delete')
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Wilaya</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Date Of Birth</th>
                <th>Joining Date</th>
                <th>Status</th>
                <th>Days</th>
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
@toastr_js
@toastr_render
<script src="{{ URL::asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
@endsection
