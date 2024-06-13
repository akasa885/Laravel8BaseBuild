@props([
    'type' => 'modal',
])

@push('styles_top_head')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endpush

@if ($type === 'modal' || $type === 'all')
    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Product Name : <span class="fw-bolder" id="product-name-cart">NaN</span></p>
                    <p>Product Stock : <span class="fw-bolder" id="product-max-stock-cart">0</span> pcs</p>
                    <!--begin::Input & label button group plus minus-->
                    <div class="input-group input-group-qty">
                        <label class="input-group-text" for="quantity">Quantity</label>
                        <input type="number" class="form-control" value="1" min="1" max="100"
                            id="product-input-quantity" name="quantity">
                        <button class="btn btn-info btn-outline-secondary" type="button" id="button-plus">+</button>
                        <button class="btn btn-danger btn-outline-secondary" type="button" id="button-minus">-</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="javascript:void(0);" id="button-save-to-cart" class="btn btn-primary">Save to cart</a>
                </div>
            </div>
        </div>
    </div>
@elseif ($type === 'innerhtml' || $type === 'all')
@endif

@push('scripts_bottom')
<x-util.swal-for-feedback successReload="false" />
    <script>
        var ModalCartInput = function () {
            let currentProductStock = 0;
            let currentProductName = '';
            let currentProductKey = '';

            let _setProductStock = function (stock) {
                currentProductStock = stock;
                $('#product-max-stock-cart').text(stock);
            }

            let _setModalProductName = function (name) {
                currentProductName = name;
                $('#product-name-cart').text(name);
            }

            let _setModalProductKey = function (key) {
                currentProductKey = key;
            }

            let _resetModalProductInfo = function () {
                currentProductStock = 0;
                currentProductName = '';
                currentProductKey = '';
                $('#product-name-cart').text('NaN');
                $('#product-max-stock-cart').text('0');
                $('#product-input-quantity').val(1);
            }

            let _readStockFromElement = function () {
                currentProductStock = parseInt($('#product-max-stock-cart').text());
            }

            let _initQuantityButton = function () {
                $('#button-plus').click(function () {
                    var quantity = parseInt($('#product-input-quantity').val());
                    if (quantity < currentProductStock) {
                        $('#product-input-quantity').val(quantity + 1);
                    }
                });

                $('#button-minus').click(function () {
                    var quantity = parseInt($('#product-input-quantity').val());
                    if (quantity > 1) {
                        $('#product-input-quantity').val(quantity - 1);
                    }
                });
            }

            let _preventQuantityInput = function () {
                $('#product-input-quantity').on('input', function () {
                    var value = $(this).val();
                    if ((value !== '') && (value.indexOf('.') === -1)) {
                        $(this).val(Math.max(1, value));
                    } else {
                        $(this).val(1);
                    }
                });
            }

            let _activateSaveToCart = function () {
                $('#button-save-to-cart').click(function () {
                    _saveToCart();
                });
            }

            let _saveToCart = function () {
                var quantity = parseInt($('#product-input-quantity').val());
                $.ajax({
                    url: `{{ route('front.ajax.add-to-cart') }}`,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_key: currentProductKey,
                        quantity: quantity,
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: 'Product added to cart'
                            });

                            topbar_cart_counter.updateCartCounter(response.cart_count);
                            navbar_cart_counter.updateCartCounter(response.cart_count);
                            
                            $('#addToCartModal').modal('hide');
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: response.message
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status === 401) {
                            window.location.href = '{{ route('login') }}';
                        }

                        Toast.fire({
                            icon: 'error',
                            title: xhr.responseJSON.message
                        });
                    }
                });
            }

            return {
                init: function () {
                    _preventQuantityInput();
                    _initQuantityButton();
                    _activateSaveToCart();
                },
                setModalProductStock: function (stock) {
                    _setProductStock(stock);
                },
                setModalProductName: function (name) {
                    _setModalProductName(name);
                },
                setModalProductKey: function (key) {
                    _setModalProductKey(key);
                },
                resetModalProductInfo: function () {
                    _resetModalProductInfo();
                },
            }
        }();
        $(document).ready(function () {
            ModalCartInput.init();

            $('#addToCartModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var productName = button.data('product-name');
                var productKey = button.data('product-key');
                var productStock = button.data('product-stock');
                var modal = $(this);
                ModalCartInput.setModalProductName(productName);
                ModalCartInput.setModalProductKey(productKey);
                ModalCartInput.setModalProductStock(productStock);
            });

            $('#addToCartModal').on('hidden.bs.modal', function (e) {
                ModalCartInput.resetModalProductInfo();
            });
        });
    </script>
@endpush
