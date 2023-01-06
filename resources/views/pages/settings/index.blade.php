@extends('layouts.master')

@section('title')
    Settings
@stop

@section('css')
@endsection

@section('content')

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
        Settings
     </h1>
     <ol class="breadcrumb">
       <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li class="active">Settings</li>
     </ol>
   </section>

   <section class="content">
      <div class="box box-primary">
          <div class="box-header">
              <h3 class="box-title">Settings</h3>
          </div>
            <div class="box-body">
                    <form action="{{ route('settings.update') }}" method="post" class="form-setting" data-toggle="validator" enctype="multipart/form-data">
                      @csrf
                        {{-- 1 --}}
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Company Name</label>
                                 <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Company Name" required autofocus>
                                 <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 1 --}}

                        {{-- 2 --}}
                        <div class="row">
                           <div class="col-md-6">
                                 <div class="form-group">
                                     <label>Company Title</label>
                                     <input type="text" name="company_title" class="form-control" id="company_title" placeholder="Company Acronym" required autofocus>
                                     <span class="help-block with-errors"></span>
                                 </div>
                            </div>
                        </div>
                        {{-- End 2 --}}

                        {{-- 3 --}}
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Current Year</label>
                                <select name="current_session" class="form-control" id="current_session" required>
                                       @for($y=date('Y', strtotime('- 1 years')); $y<=date('Y', strtotime('+ 10 years')); $y++)
                                          <option>{{ ($y-=1).'-'.($y+=1) }}</option>
                                       @endfor
                                </select>
                                <span class="help-block with-errors"></span>
                              </div>
                            </div>
                        </div>
                        {{-- End 3 --}}

                        {{-- 4 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Company Phone</label>
                                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Company Phone" required>
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                         </div>
                        {{-- End 4 --}}

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Company Email</label>
                                  <input type="text" name="email" class="form-control" id="email" placeholder="Company Email" required>
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                         </div>
                        {{-- End 5 --}}

                        {{-- 6 --}}
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <label>Company Address</label>
                                  <input name="address" class="form-control" id="address" required type="text" class="form-control" placeholder="Address of Company">
                                  <span class="help-block with-errors"></span>
                               </div>
                             </div>
                         </div>
                        {{-- End 6 --}}

                        {{-- 8 --}}
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                     <label>Company logo</label>
                                     <input type="file" name="path_logo" class="form-control" id="path_logo" onchange="preview('.tampil-logo', this.files[0])">
                                     <span class="help-block with-errors"></span><br>
                                     <div class="tampil-logo"></div>
                                  </div>
                              </div>
                          </div>
                         {{-- End 8 --}}

                        <br><br>
                        <div class="form-group" style="text-align:center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Saving Data</button>
                        </div>
                    </form>
            </div>
        </div>
   </section>
</div>

@endsection

@section('scripts')
<script>
    $(function () {
        showData();

        $('.form-setting').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('.form-setting').attr('action'),
                    type: $('.form-setting').attr('method'),
                    data: new FormData($('.form-setting')[0]),
                    async: false,
                    processData: false,
                    contentType: false
                })
                .done(response => {
                    showData();
                    $('.alert').fadeIn();

                    setTimeout(() => {
                        $('.alert').fadeOut();
                    }, 3000);
                })
            }
        });
    });

    function showData() {
        $.get('{{ route('settings.show') }}')
            .done(response => {
                $('[name=current_session]').val(response.current_session);
                $('[name=company_title]').val(response.company_title);
                $('[name=company_name]').val(response.company_name);
                $('[name=phone]').val(response.phone);
                $('[name=address]').val(response.address);
                $('[name=email]').val(response.email);

                let words = response.company_name.split(' ');
                let word  = '';
                words.forEach(w => {
                    word += w.charAt(0);
                });
                $('.logo-mini').text(word);
                $('.logo-lg').text(response.company_name);

                $('.tampil-logo').html(`<img src="{{ url('/') }}${response.path_logo}" width="200">`);
                $('[rel=icon]').attr('href', `{{ url('/') }}/${response.path_logo}`);
            })
            .fail(errors => {
                alert('Unable to display data');
                return;
            });
    }
</script>
@endsection
