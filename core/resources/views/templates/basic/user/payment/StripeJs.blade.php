@extends($activeTemplate . 'layouts.' . $layout)
@section('content')
    <div class="container {{ $layout == 'frontend' ? 'py-120' : '' }}">
        <div class="row justify-content-center">
            <div class="col-lg-{{ $layout == 'frontend' ? 8 : 12 }}">
                <h2 class="page-title">{{ __($pageTitle) }}</h2>
                <div class="multi-page-card">
                    <div class="multi-page-card__body">
                        <form action="{{ $data->url }}" method="{{ $data->method }}">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    @lang('You have to pay '):
                                    <strong>{{ showAmount($deposit->final_amount) }} {{ __($deposit->method_currency) }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    @lang('You will get '):
                                    <strong>{{ showAmount($deposit->amount) }} {{ __($general->cur_text) }}</strong>
                                </li>
                            </ul>
                            <script src="{{ $data->src }}" class="stripe-button"
                                @foreach ($data->val as $key => $value)
                                data-{{ $key }}="{{ $value }}" @endforeach></script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-lib')
    <script src="https://js.stripe.com/v3/"></script>
@endpush
@push('script')
    <script>
        (function($) {
            "use strict";
            $('button[type="submit"]').removeClass().addClass("btn btn--base w-100 mt-3").text("Pay Now");
        })(jQuery);
    </script>
@endpush
