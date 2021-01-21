@extends('layouts.admin')

@section("title", "Users")

@section("content_header")
    <h4>{{ __("List") . " " . __("Users") }}
        @include("components.breadcrumb")
    </h4>
    @include("components.message")
@append

@section("content")
    <div class="row">
        <div class="col-12 col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('List of') . " " . __("Users") }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>{{ __("Id") }}</th>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("Email") }}</th>
                            <th>{{ __("Actions") }}</th>
                        </tr>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="actions" style="white-space:nowrap">
                                    <a href="{{ route("users.view", ["id"=>$user->id]) }}" class="btn btn-info btn-xs">{{__("View")}}</a>
                                    <a href="{{ route("users.edit", ["id"=>$user->id]) }}" class="btn btn-info btn-xs">{{__("Edit")}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{ $users->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop
