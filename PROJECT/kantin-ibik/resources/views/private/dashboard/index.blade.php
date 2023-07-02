@extends('private.templates.layout')

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="d-flex justify-content-between">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    POS System
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Catalog Item</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                @auth
                <a href="{{ route('reporting') }}" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">
                    Recent Orders
                </a>
                <a class="btn btn-sm fw-bold btn-primary" href="{{ route('catalog-product') }}">New Product</a>
                @else
                <a href="{{ url('/signin') }}" class="btn btn-lg fw-bold btn-danger">Sign In</a>
                @endauth

            </div>
        </div>

        <div id="my-pos" class="d-flex flex-column flex-xl-row mt-10">
            <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">
                <div class="card card-flush card-p-0 bg-transparent border-0 ">
                    <div class="card-body">
                        @include('private.dashboard.catalog')
                    </div>
                </div>
            </div>
            <div class="flex-row-auto w-xl-425px">
                @include('private.dashboard.order')
            </div>
        </div>
    </div>
@endsection
