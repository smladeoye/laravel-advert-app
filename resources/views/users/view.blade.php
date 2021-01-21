@extends('layouts.admin')

@section("title", __("Users"))
@section("content_header")
    <h4>
        {{ __("View") . " " . __("User") }}
        @include("components.breadcrumb")
    </h4>
@stop
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <span class="box-title">{{ __("User") . " " . __("Information") }}</span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <td>
                                {{ $user->id }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Created By') ?></th>
                            <td>
                                {{ $user->creator()->exists() ? $user->creator->name : ""  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Updated By') ?></th>
                            <td>
                                {{ $user->updater()->exists() ? $user->updater->name : ""  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Created At') ?></th>
                            <td>
                                {{ $user->created_at  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Updated At') ?></th>
                            <td>
                                {{ $user->updated_at  }}
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
