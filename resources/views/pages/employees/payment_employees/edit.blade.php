@extends('layouts.master')

@section('title')
    Edit Payment Employee

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Payment Employee
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('payment_employees.index') }}">Payment Employees</a></li>
       <li class="active">Edit Payment Employee</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Edit Payment Employee <label style="color: red">{{ $payment_employees->employee->name }}</label></h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('payment_employees.update','test') }}" autocomplete="off">
                      @csrf
                      @method('PUT')
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label>Amount</label>
                                  <input type="number" class="form-control" name="debit" value="{{ $payment_employees->amount }}">
                                  <input type="hidden" class="form-control" name="employee_id" value="{{ $payment_employees->employee->id }}">
                                  <input type="hidden" class="form-control" name="id" value="{{ $payment_employees->id }}">
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Note</label>
                                  <textarea name="description" class="form-control" placeholder="Enter ...">{{ $payment_employees->description }}</textarea>
                              </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('payment_employees.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
