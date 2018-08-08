@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="{{ __('Login') }}" class="my-5">
                @if ($errors->any())
                    <b-alert show variant="danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </b-alert>
                @endif

                <b-form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <b-form-group
                        label="{{ __('E-Mail Address') }}:"
                        label-for="email"
                        description="{{ __('E-Mail Address') }}: example@example.com">

                        <b-form-input id="email"
                            type="email"
                            name="email" 
                            required
                            class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            value="{{ old('email') }}" 
                            autofocus
                            placeholder="{{ __('E-Mail Address') }}">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group
                        label="{{ __('Password') }}:"
                        label-for="password"
                        description="{{ __('Password') }}: *******">

                        <b-form-input id="password"
                            type="password"
                            name="password" 
                            required
                            class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Password') }}">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group>
                        <b-form-checkbox 
                            id="remember"
                            name="remember"
                            value="accepted"
                            {{ old('remember') ? 'checked="true' : '' }}
                            unchecked-value="not_accepted">
                              {{ __('Remember Me') }}
                        </b-form-checkbox>
                    </b-form-group>

                    <b-button type="submit" class="mr-5" variant="primary">{{ __('Login') }}</b-button>
                    <b-link href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</b-link>
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
