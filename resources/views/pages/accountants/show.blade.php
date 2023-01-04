@extends('layouts.master')

@section('title')
    Show Accountant
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
      <li class="active">Show Accountant</li>
    </ol>
   </section>
   <section class="content">
    <div class="row">
     <div class="col-xs-12">
      <div class="box">
       <div class="box-header">
        <h3 class="box-title">Show Accountant</h3><br><br>
       </div>
      <br>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Accountant Information</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped" style="text-align:center">
                <tbody>
                    <tr>
                        <th scope="row">Accountant Name</th>
                        <td>{{ $accountants->name }}</td>
                        <th scope="row">Email</th>
                        <td>{{ $accountants->email }}</td>
                        <th scope="row">Phone</th>
                        <td>{{ $accountants->phone }}</td>
                        <th scope="row">Address</th>
                        <td>{{ $accountants->address }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Wilaya</th>
                        <td>{{ $accountants->wilaya->name }}</td>
                        <th scope="row">Gender</th>
                        <td>{{ $accountants->gender->name }}</td>
                        <th scope="row">Day</th>
                        <td>{{ $accountants->days->pluck('name')->join(', ') }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date Of Birth</th>
                        <td>{{ $accountants->date_birth }}</td>
                        <th scope="row">Joining Date</th>
                        <td>{{ $accountants->joining_date }}</td>
                        <th scope="row">Status</th>
                        <td>
                            @if($accountants->status == 'A') Active
                            @else Inactive
                            @endif
                        </td>
                        <th scope="row">Note</th>
                        <td>{{ $accountants->description }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="modal-footer">
                <a href="{{ route('accountants.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
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
