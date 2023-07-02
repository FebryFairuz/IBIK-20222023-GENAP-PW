<div class="card card-xxl-stretch mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <div class="card-title">
            <h5 class="fw-bolder text-gray-900 m-0">
                Tabel of Transaction
            </h5>
        </div>
    </div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="table-orders">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th>No</th>
                        <th>Code</th>
                        <th>Billing</th>
                        <th>Payment Type</th>
                        <th>Cashier</th>
                        <th>Submited Date</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($orders) > 0)
                        @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>
                                <span class="d-block fw-bold">{{ $order->code }}</span>
                                <span class="text-muted">Sale {{ $order->TotalItem }} item</span>
                            </td>
                            <td>IDR {{ number_format($order->total,0,',','.')  }}</td>
                            <td>{{ $order->payment_name }}</td>
                            <td>{{ $order->created_by }}</td>
                            <td>{{ date('d M Y, H:m', strtotime($order->created_at)) }}</td>
                            <td>
                                <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 detail-order" data-code="{{ $order->code }}">
                                    <i class="bi bi-arrow-right-square"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach

                    @else
                        <tr>
                            <td colspan="5">No record found</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
