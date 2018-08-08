@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="{{ __('Register') }}" class="my-5">
                @if ($errors->any())
                    <b-alert show variant="danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </b-alert>
                @endif
                
                <b-form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @csrf

                    <b-form-group
                        label="{{ __('Name') }}:"
                        label-for="name"
                        description="{{ __('Name') }}: Aleverarise">

                        <b-form-input id="name"
                            type="text"
                            name="name" 
                            required
                            class="{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            value="{{ old('name') }}" 
                            autofocus
                            placeholder="{{ __('Name') }}">
                        </b-form-input>
                    </b-form-group>

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

                    <b-form-group
                        label="{{ __('Confirm Password') }}:"
                        label-for="password-confirm"
                        description="{{ __('Confirm Password') }}: *******">

                        <b-form-input id="password-confirm"
                            type="password"
                            name="password_confirmation" 
                            required
                            class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                            placeholder="{{ __('Confirm Password') }}">
                        </b-form-input>
                    </b-form-group>
                  
                    <b-button type="submit" class="mr-5" variant="primary">{{ __('Register') }}</b-button>
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
