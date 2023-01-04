@extends('layouts.master')

@section('title')
    Show Employee
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
      <li class="active">Show Employee</li>
    </ol>
   </section>
   <section class="content">
    <div class="row">
     <div class="col-xs-12">
      <div class="box">
       <div class="box-header">
        <h3 class="box-title">Show Employee</h3><br><br>
       </div>
      <br>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Employee Information</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped" style="text-align:center">
                <tbody>
                    <tr>
                        <th scope="row">Accountant Name</th>
                        <td>{{ $employees->name }}</td>
                        <th scope="row">Date Of Birth</th>
                        <td>{{ $employees->date_birth }}</td>
                        <th scope="row">Joining Date</th>
                        <td>{{ $employees->joining_date }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Activity</th>
                        <td>{{ $employees->activity }}</td>
                        <th scope="row">Address</th>
                        <td>{{ $employees->address }}</td>
                        <th scope="row">Phone</th>
                        <td>{{ $employees->phone }}</td>
                    </tr>
                    <tr>
                        <th scope="row">NIF</th>
                        <td>{{ $employees->nif }}</td>
                        <th scope="row">NIC</th>
                        <td>{{ $employees->nic }}</td>
                        <th scope="row">RCN</th>
                        <td>{{ $employees->rcn }}</td>
                        <th scope="row">ART</th>
                        <td>{{ $employees->art }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Department</th>
                        <td>{{ $employees->department->name }}</td>
                        <th scope="row">Wilaya</th>
                        <td>{{ $employees->wilaya->name }}</td>
                        <th scope="row">Gender</th>
                        <td>{{ $employees->gender->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>
                            @if($employees->status == 'A') Active
                            @else Inactive
                            @endif
                        </td>
                        <th scope="row">Note</th>
                        <td>{{ $employees->description }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="modal-footer">
                <a href="{{ route('employees.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    </div>
   </section>
</div>

@endsection

@section('scripts')
@endsection
