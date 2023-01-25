@extends('layouts.master')

@section('title')
    Create Employee
@stop

@section('css')

@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Employees
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('employees.index') }}">Employees</a></li>
       <li class="active">Create Employee</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Create Employee</h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('employees.store') }}" class="form-employee" data-toggle="validator" autocomplete="off">
                      @csrf
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Name Arabic</label>
                                 <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Name English</label>
                                 <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Status</label>
                                   <br>
                                   <span class="radio-item">
                                   <input type="radio" name="status" value="A" {{ old('status') == 'A' ? 'checked' : '' }} checked> &nbsp;Active &nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="radio" name="status" value="I" {{ old('status') == 'I' ? 'checked' : '' }}> &nbsp;Inactive
                                   </span>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Date Of Birth</label>
                                  <input type="date" name="date_birth" value="{{ old('date_birth') }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                               </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                   <label>Joining Date</label>
                                   <input type="date" name="joining_date" value="{{ date('Y-m-d') }}" class="form-control" required>
                                   <span class="help-block with-errors"></span>
                                </div>
                             </div>
                        </div>
                        {{-- End 2 --}}

                        {{-- 3 --}}
                        <div class="row">
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required>
                                    <span class="help-block with-errors"></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" required>
                                   <span class="help-block with-errors"></span>
                                 </div>
                             </div>
                             <div class="col-md-4">
                                <div class="form-group">
                                  <label>Activity</label>
                                  <input type="text" name="activity" value="{{ old('activity') }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 3 --}}

                        {{-- 4 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>NIF</label>
                                    <input type="text" name="nif" value="{{ old('nif') }}" class="form-control" required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>NIC</label>
                                    <input type="text" name="nic" value="{{ old('nic') }}" class="form-control" required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>RCN</label>
                                  <input type="text" name="rcn" value="{{ old('rcn') }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ART</label>
                                    <input type="text" name="art" value="{{ old('art') }}" class="form-control" required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 4 --}}

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                   <label>Departments</label>
                                   <select name="department_id" value="{{ old('department_id') }}" class="form-control" required>
                                      <option value="" selected disabled>Select Department</option>
                                      @foreach ($departments as $department)
                                          <option value="{{ $department->id }}">{{ $department->name }}</option>
                                      @endforeach
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                 <label>Genders</label>
                                 <select name="gender_id" value="{{ old('gender_id') }}" class="form-control" required>
                                    <option value="" selected disabled>Select Gender</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}"> {{ $gender->name }}</option>
                                    @endforeach
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                 <label>Wilayas</label>
                                 <select name="wilaya_id" value="{{ old('wilaya_id') }}" class="form-control" required>
                                    <option value="" selected disabled>Select Wilaya</option>
                                    @foreach ($wilayas as $wilaya)
                                        <option value="{{ $wilaya->id }}">{{ $wilaya->id }} {{ $wilaya->name }}</option>
                                    @endforeach
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-3">
                             <div class="form-group">
                                <label>Year</label>
                                <select name="year" class="form-control" required>
                                   <option value="" selected disabled>Select Year</option>
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
                        </div>
                        {{-- End 5 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Note</label>
                                  <textarea name="description" class="form-control" placeholder="Enter ...">{{ old('description') }}</textarea>
                                  <span class="help-block with-errors"></span>
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
<script>$('.form-employee').validator();</script>
<!-- Select2 -->
<script src="{{ URL::asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    $('.select2').select2()
  })
</script>
@endsection
