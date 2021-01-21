@extends('layouts.admin')

@section("title", "Adverts")
@section("content_header")
    <section class="content-header">
        <h4>
            Adverts
            @include("components.breadcrumb")
        </h4>
    </section>
@stop
@section("content")
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-info"></i>
                        <span class="box-title">{{ __("Advert") . " " . __("Information") }}</span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td>
                                    {{ $advert->id }}
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Title') ?></th>
                                <td>
                                    {{ $advert->title }}
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Description') ?></th>
                                <td>
                                    {{ $advert->description }}
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('First Name') ?></th>
                                <td>
                                    {{ $advert->code }}
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Status') ?></th>
                                <td>
                                    {!! $advert->status_html !!}
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Created By') ?></th>
                                <td>
                                    {{ $advert->creator()->exists() ? $advert->creator->name : ""  }}
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Updated By') ?></th>
                                <td>
                                    {{ $advert->updater()->exists() ? $advert->updater->name : ""  }}
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Created At') ?></th>
                                <td>
                                    {{ $advert->created_at  }}
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('Updated At') ?></th>
                                <td>
                                    {{ $advert->updated_at  }}
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
    </section>

@stop
