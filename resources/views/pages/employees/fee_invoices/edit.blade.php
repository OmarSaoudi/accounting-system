@extends('layouts.master')

@section('title')
    Edit Fee Invoice
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
       <li class="active">Edit Fee Invoice</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Edit Fee Invoice</h3>
          </div>
            <div class="box-body">
                    <form action="{{ route('fee_invoices.update','test') }}" method="post" autocomplete="off">
                      @method('PUT')
                      @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Student</label>
                                   <input type="text" value="{{ $fee_invoices->employee->name }}" readonly  class="form-control">
                                   <input type="hidden" value="{{ $fee_invoices->id }}" name="id" class="form-control">
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Amount</label>
                                   <input type="number" value="{{ $fee_invoices->amount }}" name="amount" class="form-control">
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Fee type</label>
                                   <select name="fee_id" class="form-control" required>
                                      @foreach($fees as $fee)
                                            <option value="{{$fee->id}}" {{ $fee->id == $fee_invoices->fee_id ? 'selected':"" }}>{{ $fee->title }}</option>
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
                                  <textarea name="description" class="form-control" placeholder="Enter ...">{{ $fee_invoices->description }}</textarea>
                              </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('fee_invoices.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
