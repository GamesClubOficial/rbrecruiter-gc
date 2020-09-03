@extends('breadcrumbs.auth.main')

@section('authpage')

  <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="/img/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="{{ config('adminlte.logo_img') }}" alt="logo" class="logo">{{ config('adminlte.logo') }}
              </div> <!-- main content start -->
              <p class="login-card-description">{{__('messages.register_acc')}}</p>
              <div class="alert alert-warning alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p><b>{{__('messages.pwsec.line1')}}</b></p>
                  <p>{{__('messages.pwsec.line2')}}</p>

                  <p>{{__('messages.pwsec.line3')}} </p>
                  <ul>
                    <li>
                      {{__('messages.pwsec.line4')}}
                    </li>
                    <li>
                      {{__('messages.pwsec.line5')}}
                    </li>
                    <li>
                      {{__('messages.pwsec.line6')}}
                    </li>
                    <li>
                      {{__('messages.pwsec.line7')}}
                    </li>
                  </ul>
              </div>
              <form action="{{ route('register') }}" method="POST" id="registerForm">
                  @csrf
                  <div class="form-group">
                    <label for="name" class="sr-only">{{__('messages.contactlabel_name')}}</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="{{__('messages.contactlabel_name')}}">
                  </div>
                  <div class="form-group mb-4">
                    <label for="email" class="sr-only">{{__('messages.contactlabel_email')}}</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="{{__('messages.contactlabel_email')}}">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">{{__('messages.password')}}</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{__('messages.password')}}">
                  </div>
                  <div class="form-group mb-4">
                    <label for="passwordc" class="sr-only">{{__('messages.sronly_confirmpassword')}}</label>
                    <input type="password" id="passwordc" name="password_confirmation" class="form-control" placeholder="{{__('messages.sronly_confirmpassword')}}" />
                  </div>

                  <div class="form-group mt-5">
                    <label for="mcusername" class="sr-only">{{__('messages.sronly_mcusername')}}</label>
                    <input type="text" name="uuid" class="form-control" id="mcusername" placeholder="{{__('messages.sronly_mcusername')}}" />
                  </div>
                  <input name="register" id="register" class="btn btn-block login-btn mb-4" type="submit" value="{{__('messages.register_txt')}}">
                </form>
                <p class="login-card-footer-text">{{__('messages.have_account')}} <a href="{{ route('login') }}" class="text-reset">{{__('messages.login_here')}}</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">{{__('messages.terms')}}</a>
                  <a href="#!">{{__('messages.ppolicy')}}</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop
