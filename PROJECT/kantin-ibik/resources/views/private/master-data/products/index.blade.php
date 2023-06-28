@extends('templates.layouts')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-8 col-xxl-8">
            <div class="card border-0">
                <div class="card-header bg-white border-0 px-4 py-3">
                    <div class="card-title">
                        <h5 class="fw-bolder text-gray-900 m-0">List of product</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle ">
                            <thead class="fs-6 fw-bold bg-light">
                                <tr class="fs-7">
                                    <th>No</th>
                                    <th width="30%">Name</th>
                                    <th>Description</th>
                                    <th width="20%">Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="fw-6 text-secondary">
                                @if (count($products) > 0)
                                    @foreach ($products as $index => $product)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <div style="height: 30px; overflow: hidden;">
                                                    {{ $product->description }}
                                                </div>
                                            </td>
                                            <td>Rp {{ $product->price }}</td>
                                            <td>{{ ($product->is_active) ? "Yes":"No" }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-sm btn-icon bg-red-500 text-white hover:bg-red-700"
                                                        title="Remove" type="button"
                                                        onclick="RemoveItem({{ $product->id }})">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                    <button title="Edit"
                                                        class="btn btn-sm btn-icon  bg-indigo-500 text-white hover:bg-indigo-700"
                                                        type="button" onclick="EditItem({{ $product->id }})">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <a href="{{ route('m_products_detail', $product->id) }}" title="Detail"
                                                        class="btn btn-sm btn-icon  bg-orange-500 text-white hover:bg-orange-700"
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
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-4">
            @include('modules.master-data.products.create')
        </div>
    </div>


    <script>
        const RemoveItem = (id) => {
            if (confirm("Are you sure wants to remove this item ?")) {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    var data = JSON.parse(this.response);
                    alert(data.message);
                    window.location.href = "{{ route('m_products') }}";
                }
                xmlhttp.open("GET", "{{ url('') }}/master-data/products/remove/" + id);
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
                var data = JSON.parse(this.response);
                id_.value = data.id;
                name.value = data.name;
                desc.value = data.description;
                price.value = data.price;
                if(data.is_active === 1){
                    is_active_Y.checked = true;
                }else{
                    is_active_N.checked = true;
                }
            }
            xmlhttp.open("GET", "{{ url('') }}/master-data/products/edit/" + id);
            xmlhttp.send();
        }
    </script>
@endsection
