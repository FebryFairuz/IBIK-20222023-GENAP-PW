@extends('private.templates.layout')

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="d-flex justify-content-between">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                Recent Order
            </h1>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted">Report Transaction</li>
            </ul>
        </div>
    </div>

    <div class="row mt-8">
        <div class="col-md-8">
            @include('private.reporting.table-order')
        </div>
        <div class="col-md-4">
            @include('private.reporting.chart_invoice')
        </div>
    </div>
</div>
@endsection
