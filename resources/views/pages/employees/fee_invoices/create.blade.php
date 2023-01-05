@extends('layouts.master')

@section('title')
    Create Fee Invoice {{ $employees->name }}
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
       <li class="active">Create Fee Invoice</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Create Fee Invoice</h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('fee_invoices.store') }}">
                      @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Employee</label>
                                   <select class="form-control" name="employee_id" required>
                                      <option value="{{ $employees->id }}">{{ $employees->name }}</option>
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Fee type</label>
                                   <select name="fee_id" class="form-control" required>
                                      <option selected disabled>Select Fee type</option>
                                      @foreach($fees as $fee)
                                            <option value="{{ $fee->id }}">{{ $fee->title }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Amount</label>
                                   <select name="amount" class="form-control" required>
                                      <option selected disabled>Select Amount</option>
                                      @foreach($fees as $fee)
                                         <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 1 --}}


                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Note</label>
                                  <textarea name="description" class="form-control" placeholder="Enter ..."></textarea>
                              </div>
                            </div>
                        </div>

                        <br><br>

                        <input type="hidden" name="department_id" value="{{ $employees->department_id }}">

                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
