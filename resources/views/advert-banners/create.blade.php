<?php
/**
 *
 */
?>

@extends('layouts.admin')

@section("title", "Advert Banners")
@section("content_header")
    <section class="content-header">
        <h4>
            Create Advert Banner
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
                    {{ Form::model($advert_banner, ["route" => ['advert-banners.store']]) }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('advert_code', 'Advert:', []) }}
                            {{ Form::select('advert_code', $adverts, $advert_banner->advert_code, ['placeholder' => __("select an advert..."),'required','class' => 'form-control']) }}
                            @error('advert_code')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('banner_id', 'Banner:', []) }}
                            {{ Form::select('banner_id', $banners, $advert_banner->banner_id, ['placeholder' => __("select a banner..."),'required','class' => 'form-control']) }}
                            @error('banner_id')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('max_total_impression', 'Max Total Impression:', []) }}
                            {{ Form::number('max_total_impression', $advert_banner->max_total_impression, ['class' => "form-control", 'required']) }}
                            @error('max_total_impression')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('max_total_display_per_impression', 'Max Total Display per Impression:', []) }}
                            {{ Form::number('max_total_display_per_impression', $advert_banner->max_total_display_per_impression, ['class' => "form-control", 'required']) }}
                            @error('max_total_display_per_impression')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('status', 'Status:', []) }}
                            {{ Form::select('status', ['1' => 'Active', '0' => 'Inactive'], $advert_banner->status, ['class' => 'form-control']) }}
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
