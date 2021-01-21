@extends('layouts.admin')

@section("title", "Advert Banners")

@section("content_header")
    <h5> {{ __("List") . " " . __("Advert Banners") }}
        @include("components.breadcrumb")
    </h5>
    @include("components.message")
@append

@section("content")
    <div class="row">
        <div class="col-12 col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped table-bordered">
                        <tr>
                            <th>{{ __("Id") }}</th>
                            <th>{{ __("Advert Title") }}</th>
                            <th>{{ __("Banner Title") }}</th>
                            <th>{{ __("Max Total Impression") }}</th>
                            <th>{{ __("Max Total Display per Impression") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th>{{ __("Actions") }}</th>
                        </tr>

                        @foreach ($advert_banners as $advert_banner)
                            <tr>
                                <td>{{ $advert_banner->id }}</td>
                                <td>
                                    @if ($advert_banner->advert()->exists())
                                        <a href="{{ route("adverts.view", $advert_banner->advert->id) }}">
                                            {{ $advert_banner->advert->title }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @if ($advert_banner->banner()->exists())
                                        <a href="{{ route("banners.view", $advert_banner->banner->id) }}">
                                            {{ $advert_banner->banner->title }}
                                        </a>
                                    @endif
                                </td>
                                <td>{{ $advert_banner->max_total_impression }}</td>
                                <td>{{ $advert_banner->max_total_display_per_impression }}</td>
                                <td>{!! $advert_banner->status_html !!}</td>
                                <td class="actions" style="white-space:nowrap">
                                    <a href="{{ route("advert-banners.view", ["id" => $advert_banner->id]) }}"
                                       class="btn btn-info btn-xs">{{__("View")}}</a>
                                    <a href="{{ route("advert-banners.edit", ["id" => $advert_banner->id]) }}"
                                       class="btn btn-info btn-xs">{{__("Edit")}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $advert_banners->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
