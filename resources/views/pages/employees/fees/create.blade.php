@extends('layouts.master')

@section('title')
    Create Fee
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
       <li class="active">Create Fee</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Create Fee</h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('fees.store') }}" autocomplete="off">
                      @csrf
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Title Arabic</label>
                                 <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Title English</label>
                                 <input type="text" name="title_en" value="{{ old('title_en') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Amount</label>
                                   <input type="number" name="amount" value="{{ old('amount') }}" class="form-control" required>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Departments</label>
                                   <select name="department_id" class="form-control">
                                      <option value="" selected disabled>Select Department</option>
                                      @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"> {{ $department->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Academic Year</label>
                                 <select name="year" class="form-control" required>
                                    <option value="" selected disabled>Select Academic Year</option>
                                    @php
                                       $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year + 4 ;$year++)
                                       <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Fee type</label>
                                   <select name="fee_type" class="form-control">
                                      <option value="" selected disabled>Select Fee type</option>
                                      <option value="1">Study fees</option>
                                      <option value="0">Bus fees</option>
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 2 --}}

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
                            <a href="{{ route('fees.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')

@endsection
