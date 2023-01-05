@extends('layouts.master')

@section('title')
    Edit Receipt Employee

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Receipt Employee
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('receipt_employees.index') }}">Receipt Employees</a></li>
       <li class="active">Edit Receipt Employee</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Edit Receipt Employee</h3>
          </div>
            <div class="box-body">
                    <form action="{{ route('receipt_employees.update','test') }}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label>Amount</label>
                                  <input type="number" name="debit" value="{{ $receipt_employees->debit }}" class="form-control">
                                  <input type="hidden" name="employee_id"  value="{{ $receipt_employees->employee->id }}" class="form-control">
                                  <input type="hidden" name="id"  value="{{ $receipt_employees->id }}" class="form-control">
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Note</label>
                                  <textarea name="description" class="form-control" placeholder="Enter ...">{{ $receipt_employees->description }}</textarea>
                              </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('receipt_employees.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
