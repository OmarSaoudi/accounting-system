@extends('layouts.master')

@section('title')
    Create Accountant
@stop

@section('css')
<link rel="stylesheet" href="{{ URL::asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css') }}">
<style>
    .radio-item input[type="radio"]{visibility : hidden;width:20px;height:20px;margin: 0 5px 0px 5px;padding: 0;cursor: pointer;}
    .radio-item input[type="radio"]:before{position : relative;margin: 4px -25px -4px 0;display: inline-block;visibility : visible;width:20px;height:20px;border-radius: 10px;border: 2px inset rgb(150,150,150,0.75);background: radial-gradient(ellipse at top left, rgb(255,255,255) 0%,rgb(250,250,250), 5%,rgb(230,230,230) 95%, rgb(225,255,255) 100%);content: '';cursor: pointer;}
    .radio-item input[type="radio"]:checked:after{position : relative;top:  0;left: 9px;display: inline-block;border-radius: 6px; visibility : visible;width:12px;height:12px;background: radial-gradient(ellipse at top left, rgb(240,255,220) 0%,rgb(225,250,100), 5%,rgb(75,75,0) 95%, rgb(25,100,0) 100%);content: '';cursor: pointer;}
    .radio-item input[type="radio"].true:checked:after{background: radial-gradient(ellipse at top left, rgb(240,255,220) 0%,rgb(225,250,100), 5%,rgb(75,75,0) 95%, rgb(25,100,0) 100%);}
    .radio-item input[type="radio"].false:checked:after{background: radial-gradient(ellipse at top left, rgb(255,255,255) 0%,rgb(250,250,250), 5%,rgb(230,230,230) 95%, rgb(225,255,255) 100%);}
    .radio-item label{display: inline-block;margin: 0;padding: 0;line-height: 25px;height:25px;cursor: pointer;}
</style>
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Accountants
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="{{ route('accountants.index') }}">Accountants</a></li>
       <li class="active">Create Accountant</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Create Accountant</h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('accountants.store') }}" class="form-accountant" data-toggle="validator" autocomplete="off">
                      @csrf
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name Arabic</label>
                                 <input type="text" name="name" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name English</label>
                                 <input type="text" name="name_en" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 2 --}}
                        <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                    <span class="help-block with-errors"></span>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                   <label>Password</label>
                                   <input type="password" class="form-control" name="password" required>
                                   <span class="help-block with-errors"></span>
                                 </div>
                             </div>
                        </div>
                        {{-- End 2 --}}

                        {{-- 2 --}}
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                               <label>Date Of Birth</label>
                               <input type="date" name="date_birth" class="form-control" required>
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

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" name="address" class="form-control" required>
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
                                </div>
                            </div>
                        </div>
                        {{-- End 2 --}}

                        {{-- 3 --}}
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Genders</label>
                                 <select name="gender_id" class="form-control" required>
                                    <option value="" selected disabled>Select Gender</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}"> {{ $gender->name }}</option>
                                    @endforeach
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Wilayas</label>
                                 <select name="wilaya_id" class="form-control" required>
                                    <option value="" selected disabled>Select Wilaya</option>
                                    @foreach ($wilayas as $wilaya)
                                        <option value="{{ $wilaya->id }}">{{ $wilaya->id }} {{ $wilaya->name }}</option>
                                    @endforeach
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Days</label>
                                   <select name="days[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Day" style="width: 100%;">
                                      @forelse($days as $day)
                                         <option value="{{ $day->id }}"> {{ $day->name }}</option>
                                      @empty
                                      @endforelse
                                   </select>
                                   <span class="help-block with-errors"></span>
                                </div>
                            </div>
                        </div>
                        {{-- End 3 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Note</label>
                                  <textarea name="description" class="form-control" placeholder="Enter ..."></textarea>
                                  <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                            <a href="{{ route('accountants.index') }}" class="btn btn-warning"><i class="fa fa-undo"></i> Back</a>
                        </div>
                    </form>
                </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ URL::asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>$('.form-accountant').validator();</script>
<script>
  $(function () {
    $('.select2').select2()
  })
</script>
@endsection
