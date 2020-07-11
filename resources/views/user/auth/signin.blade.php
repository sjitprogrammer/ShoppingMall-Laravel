@extends('user.auth.main_layout')

@section('title', 'SignIn')

@section('content')	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
                    {{ csrf_field() }}
					<span class="login100-form-title p-b-43">
						Login to SHOPPING MALL
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" autofocus>
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
                    @if(count($errors)>0)
                        @if($errors->has('error_incorrect'))
                            <p style="color: red;text-align: center;">{{$errors->first('error_incorrect')}}</p>
                        @endif
                    @endif
					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
					<a href="{{url('register')}}" class="txt2">
							Register Account
                        </a>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('app/images/shopping_bg.png');">
				</div>
			</div>
		</div>
	</div>
@endsection