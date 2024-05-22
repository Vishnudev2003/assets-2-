<div class="modal fade" id="supportModal">
    <div class="modal-dialog modal-dialog-centered preview-modal">
        <div class="modal-content">
            <button class="btn-close close-preview flex-center" data-bs-dismiss="modal" type="button" aria-label="Close"> <i class="fas fa-times"></i></button>
            <div class="modal-body text-center">
                <form action="{{ route('payment.index') }}" method="post">
                    @csrf
                    <div class="buy-coffee-card">
                        <div class="modal-body__img">
                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, getFileSize('userProfile')) }}" alt="">
                        </div>
                        <h3 class="buy-coffee-card__title">@lang('Buy') <span class="name">{{ __($user->fullname) }}</span> @lang('a') {{ __(@$user->donate_emoji_name) }}
                        </h3>
                        <div class="buy-coffee-card__list">
                            <span class="coffee-cup text--base">
                                {{ @$user->donate_emoji }}
                            </span>
                            <span class="times"><i class="la la-times"></i></span>
                            <ul class="coffee-no-of-cups">
                                <li class="number-of-cup flex-center" data-daonation_amount="{{ $coffee * 1 }}">1</li>
                                <li class="number-of-cup flex-center" data-daonation_amount="{{ $coffee * 2 }}">2</li>
                                <li class="number-of-cup flex-center" data-daonation_amount="{{ $coffee * 3 }}">3</li>
                                <li class="number-of-cup flex-center" data-daonation_amount="{{ $coffee * 5 }}">5</li>
                                <li class="custom-cups"><input class="form--control" name="quantity" type="number" placeholder="20" /></li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <input class="form--control" name="donor_identity" type="text" value="{{ old('donor_identity') }}" placeholder="@lang('Name or twitter (optional)')">
                        </div>
                        <div class="form-group">
                            <textarea class="form--control mb-3" id="message" name="message" placeholder="@lang('Say something (optional)')">{{ old('message') }}</textarea>
                            <label class="privet-message form--check" for="privet-message">
                                <span class="custom--check">
                                    <input class="form-check-input" id="privet-message" name="is_message_private" type="checkbox">
                                </span>
                                <span class="form-check-label">@lang('Make this message private?') </span>
                            </label>
                        </div>
                        @if (@$user->donationSetting->cause_percent > 0)
                            <div class="donation-indicate flex-align gap-2 mb-4"><span class="icon"><img alt="" src="{{ getImage($activeTemplateTrue . 'images/icons/support.png') }}"></span>{{ getAmount($user->donationSetting->cause_percent) }}% @lang('of all proceeds go to') {{ __($user->donationSetting->institute) }}</div>
                        @endif
                        <input class="summation" name="amount" type="hidden" value="{{ $coffee * 1 }}">
                        <input name="user_id" type="hidden" value="{{ $user->id }}">
                        <button class="btn btn--base w-100">@lang('Support') <span class="donation-amount">{{ $general->cur_sym . getAmount(@$coffee) }}</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
