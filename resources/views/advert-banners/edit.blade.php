@extends('layouts.admin')

@section("title", "Advert Banners")

@section("content")
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ __("List of ") }} {{ __("Adverts") }}</h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>{{ __("Id") }}</th>
                                <th>{{ __("Title") }}</th>
                                <th>{{ __("Description") }}</th>
                                <th>{{ __("Code") }}</th>
                                <th>{{ __("Status") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>

                            @foreach ($adverts as $advert)
                                <tr>
                                    <td>{{ $advert->id }} ?></td>
                                    <td>{{ $advert->title }} ?></td>
                                    <td>{{ $advert->description }} ?></td>
                                    <td>{{ $advert->code }} ?></td>
                                    <td>{{ $advert->status }} ?></td>
                                    <td class="actions" style="white-space:nowrap">
                                        <a href="{{ route("adverts.view", ["id"=>$advert->id]) }}"
                                           class="btn btn-info btn-xs">{{__("View")}}</a>
                                        <a href="{{ route("adverts.edit", ["id"=>$advert->id]) }}"
                                           class="btn btn-info btn-xs">{{__("Edit")}}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{ $adverts->links() }}
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop
