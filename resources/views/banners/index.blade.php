@extends('layouts.admin')

@section("title", "Banners")

@section("content_header")
    <h4>List Banners
        @include("components.breadcrumb")
    </h4>
    @include("components.message")
@append

@section("content")
    <div class="row">
        <div class="col-12 col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __("List of ") }} {{ __("Banners") }}</h3>
                    <div class="box-tools">
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped table-bordered">
                        <tr>
                            <th>{{ __("Id") }}</th>
                            <th>{{ __("Title") }}</th>
                            <th>{{ __("Image Type") }}</th>
                            <th>{{ __("Image") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th>{{ __("Actions") }}</th>
                        </tr>

                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{ $banner->id }}</td>
                                <td>{{ $banner->title }}</td>
                                <td>{{ strtoupper($banner->image_location_type_code) }}</td>
                                <td>
                                    <a href="{{ route("banners.download", ["id" => $banner->id]) }}">{{ $banner->image }}</a>
                                </td>
                                <td>{!! $banner->status_html !!}</td>
                                <td class="actions" style="white-space:nowrap">
                                    <a href="{{ route("banners.view", ["id"=>$banner->id]) }}"
                                       class="btn btn-info btn-xs">{{__("View")}}</a>
                                    <a href="{{ route("banners.edit", ["id"=>$banner->id]) }}"
                                       class="btn btn-info btn-xs">{{__("Edit")}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $banners->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
