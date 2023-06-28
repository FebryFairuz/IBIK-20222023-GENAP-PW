<div class="card card-flush bg-body " id="card-order">
    <div class="card-header pt-5">
        <h3 class="card-title fw-bold text-gray-800 fs-2qx">
            Current Order
        </h3>
        <div class="card-toolbar">
            <button class="btn btn-light-primary fs-4 fw-bold py-4">Clear All</button>
        </div>
    </div>
    <div class="card-body">
        <div class="my-order mb-10 list-order">
            <div class="d-flex justify-content-between align-items-center bg-primary">
                <div class="menu bg-danger">
                    <div class="d-flex justify-content-start align-items-center">
                        <img src="{{ url('./assets/media/uploads/products/1-soto-ayam.jpeg') }}" alt="product" class="rounded bg-light w-50px h-50px rounded-3 me-3" />
                        <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">sumbangan</span>
                    </div>
                </div>
                <div class="count bg-info text-end">
                    <div class="input-group w-150px">
                        <button class="input-group-text" type="button">+</button>
                        <input type="text" class="form-control text-center w-10px" placeholder="0" >
                        <button class="input-group-text" type="button">-</button>
                    </div>
                </div>
                <div class="price"></div>
            </div>
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
                    <span class="d-block lh-1 mb-2" data-kt-pos-element="total">IDR 0</span>
                    <span class="d-block mb-2" data-kt-pos-element="discount">-IDR 0</span>
                    <span class="d-block mb-9" data-kt-pos-element="tax">IDR 0</span>
                    <span class="d-block fs-2qx lh-1" data-kt-pos-element="grant-total">IDR 0</span>
                </div>
            </div>
        </div>

        <div class="my-payment">
            <h1 class="fw-bold text-gray-800 mb-5">Payment Method</h1>
            <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-12" data-kt-buttons="true"
                data-kt-buttons-target="[data-kt-button]" data-kt-initialized="1">
                <label
                    class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 active"
                    data-kt-button="true">
                    <input class="btn-check" type="radio" name="method" value="0">

                    <i class="bi bi-cash fs-2hx mb-2 pe-0"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span></i>

                    <span class="fs-7 fw-bold d-block">Cash</span>
                </label>

                <label
                    class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4"
                    data-kt-button="true">
                    <input class="btn-check" type="radio" name="method" value="1">

                    <i class="bi bi-credit-card fs-2hx mb-2 pe-0"><span class="path1"></span><span
                            class="path2"></span></i>

                    <span class="fs-7 fw-bold d-block">Card</span>
                </label>

                <label
                    class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4"
                    data-kt-button="true">
                    <input class="btn-check" type="radio" name="method" value="2">

                    <i class="bi bi-wallet2 fs-2hx mb-2 pe-0"><span class="path1"></span><span
                            class="path2"></span></i>

                    <span class="fs-7 fw-bold d-block">E-Wallet</span>
                </label>
            </div>

            <button class="btn btn-primary fs-1 w-100 py-4" type="button">Print Bills</button>
        </div>
    </div>
</div>
