@extends('layouts.master')

@section('title')
    Accountants Reports
@stop

@section('css')

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
       <li><a href="{{ route('accountants.index') }}">Accountants</a></li>
       <li class="active">Accountants Reports</li>
     </ol>
   </section>

   <section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Accountants Reports</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('search_accountants') }}" method="post" role="search" autocomplete="off">
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
                    <a href="{{ route('accountants.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
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
                <th>Email</th>
                <th>Wilaya</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Date Of Birth</th>
                <th>Joining Date</th>
                <th>Status</th>
                <th>Days</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($details as $accountant)
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
                </tr>
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
