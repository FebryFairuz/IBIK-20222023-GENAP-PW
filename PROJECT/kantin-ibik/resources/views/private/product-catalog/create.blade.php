<div class="card card-xxl-stretch mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h5 class="card-title">Form Product</h5>
    </div>
    <div class="card-body py-3">
        @if ($errors->any())
            <div class="alert alert-danger mb-5">
                <strong>Error!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success mb-5">
                <p>{{ $message }}</p>
            </div>
        @endif

        <form action={{ route('catalog-product-post') }} method="post" autocomplete="off" id="form-product"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-8">
                <label class="required form-label">Name</label>
                <input type="hidden" class="form-control id" name="id" />
                <input type="text" class="form-control name" name="name" />
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-8">
                <label class="required form-label">Description</label>
                <textarea class="form-control description" name="description"></textarea>
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-8">
                <label class="required form-label">Price</label>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">IDR</span>
                    <input type="text" class="form-control price" name="price" placeholder="0" />
                </div>
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-8">
                <label class="required form-label">Active</label>
                <div class="d-flex justify-content-center align-items-center">
                    <label class="me-5 ">
                        <input type="radio" class="is_active_Y" name="is_active" value="1" /> Yes
                    </label>
                    <label class="me-5">
                        <input type="radio" class="is_active_N" name="is_active" value="0" /> No
                    </label>
                </div>
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-8">
                <label class="form-label d-block">Image Product</label>
                <div class="text-center">
                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3">
                        <div class="image-input-wrapper w-150px h-150px">
                            <img src="{{ url('assets/media/svg/files/blank-image.svg') }}" alt="img" class="w-150px h-150px" id="image-container" />
                        </div>
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change">
                            <i class="bi bi-pencil fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="file" name="image" class=" upload-image" accept=".png, .jpg, .jpeg">
                        </label>
                    </div>
                    <div class="text-muted mt-2">
                        Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted
                    </div>
                </div>
            </div>
            <div class="text-end mt-20 mb-10">
                <button class="py-2 px-4 btn btn-clear" type="reset">Clear</button>
                <button class="py-2 px-4 btn btn-primary" type="submit">Save changes</button>
            </div>
        </form>
    </div>
</div>



