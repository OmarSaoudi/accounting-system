@extends('layouts.master')

@section('title')
    Edit Processing Fee Student

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Processing Fee Students
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('processing_fees.index') }}">Processing Fee Students</a></li>
       <li class="active">Edit Processing Fee Student</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Edit Processing Fee Student <label style="color: red">{{ $processing_fees->student->name }}</label></h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{route('processing_fees.update','test')}}" autocomplete="off">
                        @method('PUT')
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label>Amount</label>
                                  <input type="number" class="form-control" name="debit" value="{{ $processing_fees->amount }}">
                                  <input type="hidden" name="student_id" value="{{ $processing_fees->student->id }}" class="form-control">
                                  <input type="hidden" name="id"  value="{{ $processing_fees->id }}" class="form-control">
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Note</label>
                                  <textarea name="description" class="form-control" placeholder="Enter ...">{{ $processing_fees->description }}</textarea>
                              </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('processing_fees.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
