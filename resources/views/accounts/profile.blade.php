@extends('layouts.admin')

@section("title", __("Account"))
@section("content_header")
    <h4>
        {{ __("My") . " " . __("Profile") }}
        @include("components.breadcrumb")
    </h4>
@stop
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <span class="box-title">{{ __("Profile") . " " . __("Information") }}</span>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <td>
                                {{ $account->id }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <td>
                                {{ $account->name }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td>
                                {{ $account->name }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Created By') ?></th>
                            <td>
                                {{ $account->creator()->exists() ? $account->creator->name : ""  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Updated By') ?></th>
                            <td>
                                {{ $account->updater()->exists() ? $account->updater->name : ""  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Created At') ?></th>
                            <td>
                                {{ $account->created_at  }}
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Updated At') ?></th>
                            <td>
                                {{ $account->updated_at  }}
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
