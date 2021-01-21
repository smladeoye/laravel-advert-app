<?php
/**
 *
 */
?>

@extends('layouts.admin')

@section("title", "Advert")
@section("content_header")
    <h5>
        Edit Advert
        @include("components.breadcrumb")
    </h5>
@stop

@section("content")
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
                {{ Form::model($advert, ['method' => 'put', 'route' => ['adverts.update', $advert->id]]) }}
                <div class="box-body">
                    {{ Form::hidden('id', $advert->id) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Title:', []) }}
                        {{ Form::text('title', $advert->title, ['class' => "form-control", 'required']) }}
                        @error('title')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description:', []) }}
                        {{ Form::text('description', $advert->description, ['class' => 'form-control']) }}
                        @error('description')
                        <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('status', 'Status:', []) }}
                        {{ Form::select('status', ['1' => 'Active', '0' => 'Inactive'], $advert->status, ['class' => 'form-control']) }}
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
@stop
