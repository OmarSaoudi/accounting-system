@extends('layouts.master')

@section('title')
    Edit Accountant
@stop

@section('css')

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
       <li class="active">Edit Accountant</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Edit Accountant</h3>
          </div>
            <div class="box-body">
                    <form method="POST" action="{{ route('accountants.update','test') }}" class="form-accountant" data-toggle="validator" autocomplete="off">
                      @csrf
                      {{ method_field('PATCH') }}
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name Arabic</label>
                                 <input type="hidden" value="{{ $accountants->id }}" name="id">
                                 <input type="text" name="name" value="{{ $accountants->getTranslation('name', 'ar') }}" class="form-control" required>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                 <label>Name English</label>
                                 <input type="text" name="name_en" value="{{ $accountants->getTranslation('name', 'en') }}" class="form-control" required>
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
                                    <input type="email" name="email" value="{{ $accountants->email }}" class="form-control" required>
                                    <span class="help-block with-errors"></span>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                   <label>Password</label>
                                   <input type="password" class="form-control" value="{{ $accountants->password }}" name="password" required>
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
                               <input type="date" name="date_birth" value="{{ $accountants->date_birth }}" class="form-control" required>
                               <span class="help-block with-errors"></span>
                            </div>
                          </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                <label>Joining Date</label>
                                <input type="date" name="joining_date" value="{{ $accountants->joining_date }}" class="form-control" required>
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
                                    <input type="text" name="phone" value="{{ $accountants->phone }}" class="form-control" required>
                                    <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Address</label>
                                  <input type="text" name="address" value="{{ $accountants->address }}" class="form-control" required>
                                  <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Status</label>
                                   <br>
                                   <span class="radio-item">
                                    <input type="radio" name="status" value="A" {{ $accountants->status == 'A' ? 'checked' : '' }}> &nbsp;Active &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="status" value="I" {{ $accountants->status == 'I' ? 'checked' : '' }}> &nbsp;Inactive
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
                                           <option value="{{ $gender->id }}" {{ $accountants->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
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
                                        <option value="{{ $wilaya->id }}" {{ $accountants->wilaya_id == $wilaya->id ? 'selected' : '' }}>{{ $wilaya->id }} {{ $wilaya->name }}</option>
                                    @endforeach
                                 </select>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label>Days</label>
                                   <select name="days[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                      @forelse($days as $day)
                                        <option value="{{ $day->id }}" {{ in_array($day->id,$accountants->days->pluck('id')->toArray()) ? 'selected' : null }}>{{ $day->name }}</option>
                                      @empty
                                      @endforelse
                                   </select>
                                </div>
                            </div>
                        </div>
                        {{-- End 3 --}}

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Note</label>
                                  <textarea name="description" class="form-control" placeholder="Enter ...">{{ $accountants->description }}</textarea>
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
