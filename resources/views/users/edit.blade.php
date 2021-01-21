@extends('layouts.admin')

@section("title", "Users")
@section("content_header", "Edit User")

@section("content_header")
    <h4>Edit User
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
                        <h3 class="box-title">{{ __('User Form') }}</h3>
                    </div>
                    {{ Form::model($user, ["method" => "put", "route" => ['users.update', ['id' => $user->id]]]) }}
                    {{ Form::hidden('id', $user->id) }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Name', []) }}
                            {{ Form::text('name', $user->name, ['class' => "form-control", 'required']) }}
                            @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email', []) }}
                            {{ Form::text('email', $user->email, ['class' => "form-control", 'required']) }}
                            @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Password', []) }}
                            {{ Form::password('password', ['class' => "form-control"]) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Password Confirmation', []) }}
                            {{ Form::password('password_confirmation', ['class' => "form-control"]) }}
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
