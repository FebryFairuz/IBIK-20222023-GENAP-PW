@extends('private.templates.layout')

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="d-flex justify-content-between">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Catalog Product
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Product Item</li>
            </ul>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <button class="btn btn-sm fw-bold btn-primary">Total item {{ $products->count() }}</button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-8 col-xxl-8">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <div class="card-title">
                        <h5 class="fw-bolder text-gray-900 m-0">List of product</h5>
                    </div>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <thead class="">
                                <tr class="fw-bolder text-muted">
                                    <th>No</th>
                                    <th width="30%">Name</th>
                                    <th>Description</th>
                                    <th width="20%">Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="fw-6">
                                @if ($products->count() > 0)
                                    @foreach ($products as $index => $product)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <div class="symbol-label bg-light">
                                                            @if($product->images)
                                                                <img src="{{ url('./assets/media/uploads/products/'.$product->images) }}" alt="{{ $product->name }}" class="w-100">
                                                            @else
                                                                <img src="{{ url('./assets/media/logo/img-food.jpeg') }}" alt="{{ $product->name }}" class="w-100">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="ms-5">
                                                        <span class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                                            {{ $product->name }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fs-7">
                                                    {{ $product->description }}
                                                </div>
                                            </td>
                                            <td>IDR {{ number_format($product->price,0,',','.')  }}</td>
                                            <td>
                                                <span class="badge badge-light-{{ ($product->is_active) ? 'primary':'danger' }}">
                                                    {{ ($product->is_active) ? "Active":"Not Active" }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                        title="Remove" type="button"
                                                        onclick="RemoveItem({{ $product->id }})">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                    <button title="Edit"
                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                        type="button" onclick="EditItem({{ $product->id }})">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <a href="{{ url('catalog-product/detail/'.$product->id) }}" title="Detail"
                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                        type="button">
                                                        <i class="bi bi-arrow-right-square"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No record found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-4">
            @include('private.product-catalog.create')
        </div>
    </div>
</div>


<script>
    const RemoveItem = (id) => {
        if (confirm("Are you sure wants to remove this item ?")) {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                var responce = JSON.parse(this.response);
                alert(responce.message);
                window.location.href = "{{ route('catalog-product') }}";
            }
            xmlhttp.open("GET", "{{ url('') }}/api/product/remove/" + id);
            xmlhttp.send();
        }
    }

    const EditItem = (id) => {
        var targetDiv = document.getElementById("form-product");
        let id_ = targetDiv.getElementsByClassName("id")[0];
        let name = targetDiv.getElementsByClassName("name")[0];
        let desc = targetDiv.getElementsByClassName("description")[0];
        let price = targetDiv.getElementsByClassName("price")[0];
        let is_active_Y = targetDiv.getElementsByClassName("is_active_Y")[0];
        let is_active_N = targetDiv.getElementsByClassName("is_active_N")[0];

        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            var responce = JSON.parse(this.response);
            if(responce.result){
                id_.value = responce.data.id;
                name.value = responce.data.name;
                desc.value = responce.data.description;
                price.value = responce.data.price;
                if(responce.data.is_active === 1){
                    is_active_Y.checked = true;
                }else{
                    is_active_N.checked = true;
                }
            }else{
                alert("No record found");
            }
        }
        xmlhttp.open("GET", "{{ url('') }}/api/product/detail/" + id);
        xmlhttp.send();
    }
</script>
@endsection
