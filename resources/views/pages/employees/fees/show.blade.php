@extends('layouts.master')

@section('title')
    Show Fee
@stop

@section('css')
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
      <li><a href="{{ route('fees.index') }}">Fees</a></li>
      <li class="active">Show Fee</li>
    </ol>
   </section>
   <section class="content">
    <div class="row">
     <div class="col-xs-12">
      <div class="box">
       <div class="box-header">
        <h3 class="box-title">Show Fee</h3><br><br>
       </div>
      <br>
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Fee Information</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped" style="text-align:center">
                <tbody>
                    <tr>
                        <th scope="row">Fee Title</th>
                        <td>{{ $fees->title }}</td>
                        <th scope="row">Amount</th>
                        <td>{{ $fees->amount }}</td>
                        <th scope="row">Fee Type</th>
                        <td>
                            @if ($fees->fee_type === 1)
                                 Study fees
                            @else
                                 Bus fees
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Department</th>
                        <td>{{ $fees->department->name }}</td>
                        <th scope="row">Year</th>
                        <td>{{ $fees->year }}</td>
                        <th scope="row">Description</th>
                        <td>{{ $fees->description }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="modal-footer">
                <a href="{{ route('fees.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
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
