<div class="card card-flush bg-body " id="card-order">
    <div class="card-header pt-5">
        <h3 class="card-title fw-bold text-gray-800 fs-2qx">
            Current Order
        </h3>
        <div class="card-toolbar">
            <button class="btn btn-light-primary fs-4 fw-bold py-4 btn-clear">Clear All</button>
        </div>
    </div>
    <div class="card-body">
        <div class="my-order mb-10 list-order table-responsive">
            <table class="table align-middle fs-6">
                <tbody></tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">No selected items</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="my-summary">
            <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                <div class="fs-6 fw-bold text-white">
                    <span class="d-block lh-1 mb-2">Subtotal</span>
                    <span class="d-block mb-2">Discounts</span>
                    <span class="d-block mb-9">Tax(12%)</span>
                    <span class="d-block fs-2qx lh-1">Total</span>
                </div>
                <div class="fs-6 fw-bold text-white text-end">
                    <span class="d-block lh-1 mb-2 grant-sub-total" data-kt-pos-element="total">IDR 0</span>
                    <span class="d-block mb-2" data-kt-pos-element="discount">-IDR 0</span>
                    <span class="d-block mb-9 grant-tax" data-kt-pos-element="tax">IDR 0</span>
                    <span class="d-block fs-2qx lh-1 grant-total" data-grant-total="0" data-kt-pos-element="grant-total">IDR 0</span>
                </div>
            </div>
        </div>

        <div class="my-payment">
            <h1 class="fw-bold text-gray-800 mb-5">Payment Method</h1>
            <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-12" data-kt-buttons="true"
                data-kt-buttons-target="[data-kt-button]" data-kt-initialized="1">
                @auth
                    <input type="hidden" name="current_user" value="{{ auth()->user()->email }}"  />
                @endauth

                @foreach ( $payments as $payment)
                    <label
                        class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4"
                        data-kt-button="true">
                        <input class="btn-check" type="radio" name="payment_id" value="{{ $payment->id }}">

                        <i class="bi {{ $payment->icon }} fs-2hx mb-2 pe-0"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span></i>

                        <span class="fs-7 fw-bold d-block">{{ $payment->name }}</span>
                    </label>
                @endforeach
            </div>

            @auth
            <button class="btn btn-primary fs-1 w-100 py-4 print-bill" type="button">Print Bills</button>
            @else
            <button class="btn btn-primary fs-1 w-100 py-4" disabled="true" type="button">Print Bills</button>
            @endauth

        </div>
    </div>
</div>
