@props([
    'part' => 'topbar',
])

@if ($part === 'topbar')
<a href="{{ route('front.cart.index') }}" class="btn px-0 ml-2">
    <i class="fas fa-shopping-cart text-dark"></i>
    <span id="cart-counter-text-{{ $part }}" class="badge text-dark border border-dark rounded-circle"
        style="padding-bottom: 2px;">0</span>
</a>
@elseif ($part === 'navbar')
    <a href="{{ route('front.cart.index') }}" class="btn px-0 ml-3">
        <i class="fas fa-shopping-cart text-primary"></i>
        <span id="cart-counter-text-{{ $part }}" class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
    </a>
@endif

@push('scripts_bottom')
    <script>
        "use strict";

        var {{ $part }}_cart_counter = function () {

            let _onLoadCartCounter = function () {
                fetch(`{{ route('front.ajax.cart-count-update') }}`)
                    .then(response => response.json())
                    .then(data => {
                        _updateCartCounter(data.cart_count);
                    });
            }

            let _updateCartCounter = function (count) {
                // if count n > 99, then show 99+
                if (count > 99) {
                    count = '99+';
                }

                $('#cart-counter-text-{{ $part }}').text(count);
            }

            return {
                init: function () {
                    @auth()
                    _onLoadCartCounter();
                    @endauth
                },

                updateCartCounter: function (count) {
                    _updateCartCounter(count);
                }
            }
        }();

        $(document).ready(function () {
            {{ $part }}_cart_counter.init();
        });
    </script>
@endpush
