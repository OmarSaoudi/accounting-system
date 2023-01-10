@extends('layouts.master')

@section('title')
    Create Processing Fee Employee {{ $employees->name }}
@endsection
@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Processing Fee Employees
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('processing_fees.index') }}">Processing Fee Employees</a></li>
       <li class="active">Create Processing Fee Employee</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Create Processing Fee Employee</h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('processing_fees.store') }}" autocomplete="off">
                      @csrf
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                  <label>Amount</label>
                                  <input type="number" name="debit" class="form-control">
                                  <input type="hidden" name="employee_id"  value="{{ $employees->id }}" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Employee Credit</label>
                                    <input type="text" class="form-control" name="final_balance" value="{{ number_format($employees->employee_account->sum('debit') - $employees->employee_account->sum('credit'), 2) }}" readonly>
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
