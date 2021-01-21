@extends('layouts.admin')

@section("title", "Banners")
@section("content_header")
    <h4>
        {{ __("View") . " " . __("Banner") }}
        @include("components.breadcrumb")
    </h4>
@stop
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <span class="box-title">{{ __("Banner") . " " . __("Information") }}</span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <td>
                                {{ $banner->id }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Title') ?></th>
                            <td>
                                {{ $banner->title }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Image Type') ?></th>
                            <td>
                                {{ strtoupper($banner->image_location_type_code) }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Image') ?></th>
                            <td>
                                <a href="{{ route("banners.download", ["id" => $banner->id]) }}">{{ $banner->image }}</a>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td>
                                {!! $banner->status_html !!}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Created By') ?></th>
                            <td>
                                {{ $banner->creator()->exists() ? $banner->creator->name : ""  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Updated By') ?></th>
                            <td>
                                {{ $banner->updater()->exists() ? $banner->updater->name : ""  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Created At') ?></th>
                            <td>
                                {{ $banner->created_at  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Updated At') ?></th>
                            <td>
                                {{ $banner->updated_at  }}
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
