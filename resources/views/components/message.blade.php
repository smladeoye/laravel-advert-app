@if( Session::has( 'message' ))
    @if(Session::has( 'message.error' ))
            <div class="alert alert-danger alert-dismissible">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa fa-check"></i> {{ __('Alert') }}!</h4>
                <span class="text text-white">{{ Session::get( 'message.error' ) }}</span>
            </div>
    @endif
    @if(Session::has( 'message.info' ))
        <section class="content-header">
            <div class="alert alert-info alert-dismissible">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa fa-check"></i> {{ __('Alert') }}!</h4>
                <span class="text text-white">{{ Session::get( 'message.info' ) }}</span>
            </div>
        </section>
    @endif
    @if(Session::has( 'message.success' ))
        <section class="content-header">
            <div class="alert alert-success alert-dismissible">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa fa-check"></i> {{ __('Alert') }}!</h4>
                {{ Session::get( 'message.success' ) }}
            </div>
        </section>
    @endif
@endif
