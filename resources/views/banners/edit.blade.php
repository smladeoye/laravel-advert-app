<?php
/**
 *
 */
?>

@extends('layouts.admin')

@section("title", "Banners")
@section("content_header")
    <section class="content-header">
        <h4>
            Edit Banner
            @include("components.breadcrumb")
        </h4>
    </section>
@stop

@section("content")
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= __('Form') ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {{ Form::model($banner, ["method" => "put", "enctype" => "multipart/form-data", "route" => ['banners.update', ['id' => $banner->id]]]) }}
                    {{ Form::hidden('id', $banner->id) }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('title', 'Title:', []) }}
                            {{ Form::text('title', $banner->title, ['class' => "form-control", 'required']) }}
                            @error('title')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('image_location_type_code', 'Image Location:', []) }}
                            {{ Form::select('image_location_type_code',["file" => "File"], $banner->image_location_type_code, ['required','class' => 'form-control']) }}
                            @error('image_location_type_code')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('image', 'Banner Image:', []) }}
                            {{ Form::file('image', ['class' => 'form-control']) }}
                            @error('image')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('status', 'Status:', []) }}
                            {{ Form::select('status', ['1' => 'Active', '0' => 'Inactive'], $banner->status, ['class' => 'form-control']) }}
                            @error('status')
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
    </section>
@stop
