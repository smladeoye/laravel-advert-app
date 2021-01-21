@extends('layouts.admin')

@section("content")
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-pen"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?= __("Total Adverts") ?></span>
                        <span class="info-box-number">{{  $total_adverts }}</span>
                        <span class="info-box-link">
                            <a href="{{ route('adverts') }}">{{  __("View All Adverts") }}</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-image"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?= __("Total Banners") ?></span>
                        <span class="info-box-number">{{  $total_banners }}</span>
                        <span class="info-box-link">
                            <a href="{{ route('banners') }}">{{  __("View All Banners") }}</a>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-link"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><?= __("Total Advert Banners") ?></span>
                        <span class="info-box-number">{{  $total_advert_banners }}</span>
                        <span class="info-box-link">
                            <a href="{{ route('advert-banners') }}">{{  __("View All Advert Banners") }}</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
