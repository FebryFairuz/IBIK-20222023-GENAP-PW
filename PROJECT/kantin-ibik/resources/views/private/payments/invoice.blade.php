@include("private.templates.header")

<div class="border p-5">
    <div class="text-center">
        <h1>Kantin IBI Kesatuan</h1>
        <p class="fs-7">Jl. Rangga Gading No.01, Gudang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16123</p>
    </div>
    <div class="text-start mt-5">
        <p class="mb-0 text-uppercase">
            <span class="fw-bolder">Bill no: {{ $invoice->order->code }}</span>
        </p>
        <p class="mb-0">
            <div class="d-flex justify-content-between">
            <span class="">Cashier: {{ $invoice->order->created_by }}. </span>
            @if (!@empty($invoice->detail))
                <span>{{ date('F j, Y, g:i a', strtotime($invoice->order->created_at)) }}</span>
            @else
                <span>{{ date("F j, Y, g:i a") }}</span>
            @endif
        </div>
        </p>
    </div>

    @if (!@empty($invoice->detail))
        <div class="border-top pt-5">
            <table class="table">
                <tbody>
                    @foreach ($invoice->detail as $index => $detail )
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->quantity }} pcs</td>
                        <td class="text-end">IDR {{ number_format($detail->price,0,',','.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <span class="fw-bold">{{ count($invoice->detail) }} items</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Sub total</td>
                        <td colspan="2" class="text-end">IDR {{ number_format($invoice->order->totalBill,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td>Discounts</td>
                        <td colspan="2" class="text-end">0</td>
                    </tr>
                    <tr>
                        <td>Tax(12%)</td>
                        <td colspan="2" class="text-end">IDR {{ number_format($invoice->order->taxBill,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bolder">Total</td>
                        <td colspan="2" class="text-end fw-bolder">IDR {{ number_format($detail->total,0,',','.') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bolder">Payment</td>
                        <td colspan="2" class="text-end fw-bolder">
                            {{ $detail->payment_name }}
                        </td>
                    </tr>
                </tfoot>
            </table>

        </div>
    @endif
    <div class="mt-5 border-top pt-5">
        <div class="d-flex justify-content-center align-items-center p-5">
            <div class="canva-qrcode" id="qrcodes"></div>
        </div>
        <p class="mb-0 text-center mt-3">
            Scan this qrcode from <b>KANTIN IBIK mobile apps</b> to get the receipt.
        </p>
    </div>

</div>

@include("private.templates.bottom")

<script src="{{ url('./assets/js/qrcode.min.js') }}"></script>
<script>
    var qrcode = new QRCode(document.getElementById("qrcodes"),{
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.L
    });

    // Generate QR code
    var objInvoice = {type:"invoice",body:"{{ $invoice->order->code }}"};//isi value dari qrcode
    qrcode.clear();
    qrcode.makeCode(JSON.stringify(objInvoice));
</script>
