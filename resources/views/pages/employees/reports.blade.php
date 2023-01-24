@extends('layouts.master')

@section('title')
    Employees Reports
@stop

@section('css')

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
       <li><a href="{{ route('employees.index') }}">Employees</a></li>
       <li class="active">Employees Reports</li>
     </ol>
   </section>

   <section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Employees Reports</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('search_employees') }}" method="post" role="search" autocomplete="off">
                {{ csrf_field() }}

                {{-- 3 --}}
                <div class="row">
                    <div class="col-md-6" id="start_at">
                        <label>From the date of</label>
                        <input type="date" class="form-control fc-datepicker" value="{{ $start_at ?? '' }}" name="start_at">
                    </div>
                    <div class="col-md-6" id="end_at">
                        <label>To date</label>
                        <input type="date" class="form-control fc-datepicker" value="{{ $end_at ?? '' }}" name="end_at">
                    </div>
                </div>
                {{-- End 3 --}}
                <br><br>
                <div class="form-group" style="text-align:center">
                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                </div>
            </form>
        </div>
        <div class="box-body">
            @if (isset($details))
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
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $employee)
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
                  <td>
                      @if($employee->status == 'A') Active
                      @else Inactive
                      @endif
                  </td>
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
                  <th>Status</th>
                </tr>
                </tfoot>
            </table>
            @endif
        </div>
    </div>
   </section>

</div>

@endsection

@section('scripts')
<script>
    var date = $('.fc-datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    }).val();
</script>
@endsection
