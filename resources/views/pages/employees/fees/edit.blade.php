@extends('layouts.master')

@section('title')
    Edit Fee
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
       <li class="active">Edit Fee</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Edit Fee</h3>
          </div>
            <div class="box-body">
                <form action="{{ route('fees.update','test') }}" method="POST">
                      @csrf
                      {{ method_field('PATCH') }}
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Title Arabic</label>
                                 <input type="hidden" value="{{ $fees->id }}" name="id">
                                 <input type="text" name="title" value="{{ $fees->getTranslation('title', 'ar') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Title English</label>
                                 <input type="text" name="title_en" value="{{ $fees->getTranslation('title', 'en') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Amount</label>
                                   <input type="number" name="amount" value="{{ $fees->amount }}" class="form-control" required>
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
                                        @foreach($departments as $department)
                                          <option value="{{ $department->id }}" {{ $department->id == $fees->department_id ? 'selected' : ""}}>{{ $department->name }}</option>
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
                                       <option value="{{ $year }}" {{$year == $fees->year ? 'selected' : ' '}}>{{ $year }}</option>
                                    @endfor
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Fee type</label>
                                   <select name="fee_type" class="form-control">
                                      <option value="1" {{ $fees->fee_type == 1 ? 'selected': '' }}>Study fees</option>
                                      <option value="0" {{ $fees->fee_type == 0 ? 'selected': ''}}>Bus fees</option>
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
                                  <textarea name="description" class="form-control" placeholder="Enter ...">{{ $fees->description }}</textarea>
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
