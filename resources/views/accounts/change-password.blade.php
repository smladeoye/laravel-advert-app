@extends('layouts.admin')

@section("title", "Users")
@section("content_header", "Account")

@section("content_header")
    <h4>{{ __("Change Account Password") }}
        @include("components.breadcrumb")
    </h4>
    @include("components.message")
@stop

@section("content")
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('Password Form') }}</h3>
                    </div>
                    {{ Form::model($account, ["method" => "put", "route" => ['accounts.update-password']]) }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('password', 'Password', []) }}
                            {{ Form::password('password', ['required', 'class' => "form-control"]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Password Confirmation', []) }}
                            {{ Form::password('password_confirmation', ['required', 'class' => "form-control"]) }}
                            @error('password')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {{ Form::submit(__("save"), ['class' => 'btn btn-success']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        </div>
    </section>
@stop
