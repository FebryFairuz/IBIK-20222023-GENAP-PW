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
            <span class="">Cashier: {{ $invoice->order->created_by }}. </span>
            <span>{{ date("F j, Y, g:i a") }}</span>
        </p>
    </div>

    <div class="mt-5">
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
    var objInvoice = {type:"invoice",body:"{{ $invoice->order->code }}"};
    qrcode.clear();
    qrcode.makeCode(JSON.stringify(objInvoice));
</script>
