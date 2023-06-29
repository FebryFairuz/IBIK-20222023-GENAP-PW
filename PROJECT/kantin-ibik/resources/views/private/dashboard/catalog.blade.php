<div id="catalog">
    <ul class="nav nav-pills d-flex justify-content-between nav-pills-custom gap-3 mb-6" role="tablist">
        <!--begin::Item-->
        <li class="nav-item mb-3 me-0" role="presentation">
            <!--begin::Nav link-->
            <a class="nav-link active nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show"
                data-bs-toggle="pill" href="#kt_pos_food_content_1" style="width: 138px;height: 180px"
                aria-selected="false" role="tab" tabindex="-1">
                <!--begin::Icon-->
                <div class="nav-icon mb-3">
                    <!--begin::Food icon-->
                    <img src={{ url('./assets/media/nav-icon/svg-spaghetti.svg') }} class="w-50px"
                        alt="">
                    <!--end::Food icon-->
                </div>
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="">
                    <span class="text-gray-800 fw-bold fs-2 d-block">Lunch</span>
                    <span class="text-gray-400 fw-semibold fs-7">{{ $products->count() }} Options</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::Nav link-->
        </li>
        <!--end::Item-->

        <!--begin::Item-->
        <li class="nav-item mb-3 me-0" role="presentation">
            <!--begin::Nav link-->
            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex flex-column flex-stack pt-9 pb-7 page-bg"
                data-bs-toggle="pill" href="#kt_pos_food_content_2" style="width: 138px;height: 180px"
                aria-selected="true" role="tab">
                <!--begin::Icon-->
                <div class="nav-icon mb-3">
                    <!--begin::Food icon-->
                    <img src="{{ url('./assets/media/nav-icon/svg-salad.svg') }}" class="w-50px"
                        alt="salad">
                    <!--end::Food icon-->
                </div>
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="">
                    <span class="text-gray-800 fw-bold fs-2 d-block">Salad</span>
                    <span class="text-gray-400 fw-semibold fs-7">0 Salads</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::Nav link-->
        </li>
        <!--end::Item-->

        <!--begin::Item-->
        <li class="nav-item mb-3 me-0" role="presentation">
            <!--begin::Nav link-->
            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg"
                data-bs-toggle="pill" href="#kt_pos_food_content_3" style="width: 138px;height: 180px"
                aria-selected="false" role="tab" tabindex="-1">
                <!--begin::Icon-->
                <div class="nav-icon mb-3">
                    <!--begin::Food icon-->
                    <img src="{{ url('./assets/media/nav-icon/svg-cheeseburger.svg') }}" class="w-50px" alt="">
                    <!--end::Food icon-->
                </div>
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="">
                    <span class="text-gray-800 fw-bold fs-2 d-block">Burger</span>
                    <span class="text-gray-400 fw-semibold fs-7">0 Burgers</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::Nav link-->
        </li>
        <!--end::Item-->

        <!--begin::Item-->
        <li class="nav-item mb-3 me-0" role="presentation">
            <!--begin::Nav link-->
            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg"
                data-bs-toggle="pill" href="#kt_pos_food_content_4" style="width: 138px;height: 180px"
                aria-selected="false" role="tab" tabindex="-1">
                <!--begin::Icon-->
                <div class="nav-icon mb-3">
                    <!--begin::Food icon-->
                    <img src="{{ url('./assets/media/nav-icon/svg-coffee.svg') }}" class="w-50px" alt="">
                    <!--end::Food icon-->
                </div>
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="">
                    <span class="text-gray-800 fw-bold fs-2 d-block">Coffee</span>
                    <span class="text-gray-400 fw-semibold fs-7">0 Beverages</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::Nav link-->
        </li>
        <!--end::Item-->

        <!--begin::Item-->
        <li class="nav-item mb-3 me-0" role="presentation">
            <!--begin::Nav link-->
            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg"
                data-bs-toggle="pill" href="#kt_pos_food_content_5" style="width: 138px;height: 180px"
                aria-selected="false" role="tab" tabindex="-1">
                <!--begin::Icon-->
                <div class="nav-icon mb-3">
                    <!--begin::Food icon-->
                    <img src="{{ url('./assets/media/nav-icon/svg-cheesecake.svg') }}" class="w-50px" alt="">
                    <!--end::Food icon-->
                </div>
                <!--end::Icon-->

                <!--begin::Info-->
                <div class="">
                    <span class="text-gray-800 fw-bold fs-2 d-block">Dessert</span>
                    <span class="text-gray-400 fw-semibold fs-7">0 Desserts</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::Nav link-->
        </li>
        <!--end::Item-->

    </ul>

    <div class="tab-content" id="list-product">
        <div class="tab-pane fade active show" id="kt_pos_food_content_1" role="tabpanel">
            <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">
            @foreach ($products as $product)
                <div class="card card-flush flex-row-fluid p-6 pb-5 mw-100 cursor-pointer add-product" data-item="{{ $product }}">
                    <div class="card-body text-center">
                        @if($product->images)
                        <img src="{{ url('./assets/media/uploads/products/'.$product->images) }}" alt="{{ $product->name }}" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px">
                        @else
                        <img src="{{ url('./assets/media/logo/img-food.jpeg') }}" alt="{{ $product->name }}" class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px">
                        @endif
                        <div class="mb-2">
                            <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">{{ $product->name }}</span>
                            <span class="text-gray-400 fw-semibold d-block fs-6 mt-n1 text-capitalize">{{ $product->description }}</span>
                        </div>
                        <span class="text-success text-end fw-bold fs-1">IDR {{ number_format($product->price,0,',','.') }}</span>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="kt_pos_food_content_2" role="tabpanel">
            No record found
        </div>
        <div class="tab-pane fade" id="kt_pos_food_content_3" role="tabpanel">
            No record found
        </div>
        <div class="tab-pane fade" id="kt_pos_food_content_4" role="tabpanel">
            No record found
        </div>
        <div class="tab-pane fade" id="kt_pos_food_content_5" role="tabpanel">
            No record found
        </div>
    </div>
</div>

