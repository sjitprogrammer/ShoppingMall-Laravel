@extends('user.auth.main_layout')

@section('title', 'SignUp')

@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
                    {{ csrf_field() }}
					<span class="login100-form-title p-b-43">
						SIGNUP
                    </span>
                    
					<div class="wrap-input100">
                    <input class="input100 {{old('name')?'has-val':''}}" type="text" name="name" value="{{old('name')}}">
						<span class="focus-input100"></span>
						<span class="label-input100">Display Name</span>
                    </div>
                    
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<input class="input100 {{old('username')?' has-val ':''}}" type="text"  name="username" {{$errors->has('error_username')? ' autofocus ':''}} value="{{old('username')}}">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
                    </div>
                    @if(count($errors)>0)
                        @if($errors->has('error_username'))
                            <p style="color: red;">{{$errors->first('error_username')}}</p>
                        @endif
                    @endif
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" {{$errors->has('error_pass')? ' autofocus ':''}}>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
                    @if(count($errors)>0)
                        @if($errors->has('error_pass'))
                            <p style="color: red;">{{$errors->first('error_pass')}}</p>
                        @endif
                    @endif
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="confirm_password">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirm Password</span>
					</div>
			

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Sign Up
						</button>
                    </div>
				</form>

				<div class="login100-more" style="background-image: url('app/images/shopping_bg.png');">
				</div>
			</div>
		</div>
	</div>
@endsection
