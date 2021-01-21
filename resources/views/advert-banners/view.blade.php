@extends('layouts.admin')

@section("title", __("Banners"))
@section("content_header")
    <h4>
        {{ __("View") . " " . __("Advert Banner") }}
        @include("components.breadcrumb")
    </h4>
@stop
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <span class="box-title">{{ __("Advert Banner") . " " . __("Information") }}</span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <td>
                                {{ $advert_banner->id }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Advert Title') ?></th>
                            <td>
                                @if($advert_banner->advert()->exists())
                                    <a href="{{ route("adverts.view", $advert_banner->advert->id)}}">{{ $advert_banner->advert->title }}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Banner Title') ?></th>
                            <td>
                                @if($advert_banner->banner()->exists())
                                    <a href="{{ route("banners.view", $advert_banner->banner->id)}}">{{ $advert_banner->banner->title }}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Banner Image') ?></th>
                            <td>
                                <a href="{{ route("banners.download", $advert_banner->banner->id) }}">{{ $advert_banner->banner->image }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td>
                                {!! $advert_banner->status_html !!}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Created By') ?></th>
                            <td>
                                {{ $advert_banner->creator()->exists() ? $advert_banner->creator->name : ""  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Updated By') ?></th>
                            <td>
                                {{ $advert_banner->updater()->exists() ? $advert_banner->updater->name : ""  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Created At') ?></th>
                            <td>
                                {{ $advert_banner->created_at  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Updated At') ?></th>
                            <td>
                                {{ $advert_banner->updated_at  }}
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- ./col -->
    </div>
@stop
