@extends('templates.layouts')

@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">
                    <i class="bi bi-house"></i>
                </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <span>Master Data</span>
            </li>
            <li class="breadcrumb-item " aria-current="page">
                <a href="{{ route('m_products') }}">Product</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <span>{{ $product->name }}</span>
            </li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-4 col-xxl-4">
            <div class="card">
                <div class="card-body">
                    <img src="https://cf.shopee.co.id/file/47dac2535dd4107e550b76ef2ae6cb31" alt="pic-product"
                        class="w-100">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xxl-6">
            <div class="info">
                <p class="text-4xl mb-3">{{ $product->name }}</p>
                <p class="text-4xl mb-2">Rp {{ $product->price }}</p>
                <div class="border-top border-bottom p-2 mt-3">
                    <span class="text-1xl">Description</span>
                </div>
                <div class="description p-2">{{ $product->description }}</div>
            </div>
        </div>
        <div class="col-lg-2 col-xxl-2">
            <div class="border rounded bg-white p-3">
                <div class="mb-3">
                    <p class="text-dark text-sm mb-2">Created at <br/>{{ $product->created_at }}</p>
                    <p class="text-dark text-sm">Last Updated at <br/>{{ $product->updated_at }}</p>
                </div>
                <div class="d-grid gap-2">
                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <a href="" class="btn btn-sm btn-danger">Remove</a>
                </div>
            </div>
        </div>

    </div>
@endsection
