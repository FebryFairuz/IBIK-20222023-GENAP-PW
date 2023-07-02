$(document).ready(function () {
    var arrOrder = [];
    var totalBill = 0;
    var taxBill = 0;
    var totalPay = 0;
    var arrBill = { product: [], payment: 0, billing: 0, loading:false, current_user:"" };

    $listOrder = $("#card-order .list-order > .table > tbody");
    const formatRupiah = (angka, prefix) => {
        var number_string = angka
                .toString()
                .replace(/[^,\d]/g, "")
                .toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    };

    const FetchItem = (data) => {
        var item =
            "<tr><td>" +
            '<div class="menu">' +
            '<div class="d-flex justify-content-start align-items-center">' +
            '<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">' +
            data.name +
            "</span>" +
            "</div>" +
            "</div></td>" +
            '<td><div class="count text-end">' +
            '    <div class="position-relative d-flex align-items-center" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="10" data-kt-dialer-step="1" data-kt-dialer-decimals="0">' +
            '        <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400 btn-remove-item" data-jml="' +
            data.jml +
            '" data-index="' +
            data.index +
            '" data-kt-dialer-control="decrease">' +
            '            <span class="fs-3x">-</span>' +
            "        </button>" +
            '        <input type="text" class="form-control border-0 text-center px-0 fs-3 fw-bold text-gray-800 w-30px" data-kt-dialer-control="input" placeholder="Amount" name="manageBudget" readonly="" value="' +
            data.jml +
            '" />' +
            '        <button type="button" class="btn btn-icon btn-sm btn-light btn-icon-gray-400 btn-add-item" data-jml="' +
            data.jml +
            '" data-index="' +
            data.index +
            '" data-kt-dialer-control="increase">' +
            '            <span class="fs-3x">+</span>' +
            "        </button>" +
            "    </div>" +
            "</div></td>" +
            '<td><div class="price">' +
            '    <span class="fw-bold text-primary fs-2" data-kt-pos-element="item-total" data-item-price="' +
            data.t_bill +
            '">' +
            formatRupiah(data.t_bill) +
            "</span>" +
            "</div>" +
            "</div></td></tr>";
        return item;
    };

    const FetchOrder = () => {
        $tableOrder = $("#card-order .list-order > .table");
        $tableOrder.find("tbody").empty();
        $tableOrder.find("tfoot").remove();
        arrOrder.map((v, index) => {
            v.index = index;
            v.t_bill = v.jml * v.price;
            var item = FetchItem(v);
            $listOrder.append(item);
        });
        //$grantBill = $("#card-order .my-summary .grant-total");
        totalBill = arrOrder.reduce((a, v) => (a = a + v.t_bill), 0);
        taxBill = (12 / 100) * totalBill;
        totalPay = totalBill + taxBill;
        $("#card-order .my-summary .grant-sub-total").text(
            formatRupiah(totalBill)
        );
        $("#card-order .my-summary .grant-tax").text(formatRupiah(taxBill));
        $("#card-order .my-summary .grant-total").text(formatRupiah(totalPay));
    };

    const ChangeJmlItem = (array, id, newValue) => {
        for (let i = 0; i < array.length; i++) {
            if (array[i].id === id) {
                array[i].jml = newValue;
                break;
            }
        }
    };

    const RemoveItem = (index) => {
        arrOrder.splice(index, 1);
        FetchOrder();
    };

    const AddItem = (data) => {
        var isExist = arrOrder.filter((item) => item.id === data.id);
        if (Object.values(isExist).length > 0) {
            ChangeJmlItem(arrOrder, data.id, isExist[0].jml + 1);
            FetchOrder();
        } else {
            data.jml = 1;
            arrOrder.push(data);
            FetchOrder();
        }
    };

    $("#list-product").on("click", ".add-product", function () {
        $itsme = $(this);
        if (!arrBill.loading) {
            var data = $itsme.data("item");
            AddItem(data);
        }
    });
    $listOrder.on("click", ".btn-add-item", function () {
        $itsme = $(this);
        if (!arrBill.loading) {
            var index = $itsme.data("index");
            var jml = $itsme.data("jml");
            arrOrder[index].jml = jml + 1;
            FetchOrder();
        }
    });
    $listOrder.on("click", ".btn-remove-item", function () {
        $itsme = $(this);
        if (!arrBill.loading) {
            var index = $itsme.data("index");
            var jml = $itsme.data("jml");
            if (jml <= 1) {
                arrOrder.splice(index, 1);
                FetchOrder();
            } else {
                arrOrder[index].jml = jml - 1;
                FetchOrder();
            }
        }
    });
    $("#card-order .btn-clear").click(function () {
        if (!arrBill.loading) {
            if (Object.values(arrOrder).length > 0) {
                arrOrder = [];
                FetchOrder();
                $tableOrder = $("#card-order .list-order > .table");
                $tableOrder.append(
                    '<tfoot><tr><td colspan="3">No selected items</td></tr></tfoot>'
                );
            }
        }
    });

    $("#card-order input[name=payment_id]").on("change", function (e) {
        var value = $(this).val();
        arrBill.payment = parseInt(value);
    });

    $("#card-order .print-bill").on("click", function (e) {
        var itsme = $(this);

        if (Object.values(arrOrder).length > 0) {
            if (arrBill.payment) {
                var totalBill = arrOrder.reduce(
                    (a, v) => (a = a + v.t_bill),
                    0
                );
                var taxBill = (12 / 100) * totalBill;
                var totalPay = totalBill + taxBill;
                arrBill.billing = totalPay;
                arrBill.product = arrOrder;
                arrBill.loading = true;
                arrBill.current_user = $("#card-order .my-payment input[name=current_user]").val();
                itsme.text("Processing...").prop("disabled", true);
                var results = PushOrder(arrBill);
                if(results.result){
                    arrBill = { product: [], payment: 0, billing: 0, loading:false, current_user:"" };
                    itsme.text("Print Bills").prop("disabled", false);
                    arrOrder = [];
                    FetchOrder();
                    ShowModalBill({header:"Invoice Billing", body:InvoiceBilling(results.data)});
                }else{
                    arrBill = { product: [], payment: 0, billing: 0, loading:false, current_user:"" };
                    alert(results.message);
                    arrOrder = [];
                    FetchOrder();
                    itsme.text("Print Bills").prop("disabled", false);
                }
                //push to api
                //end push to api
            } else {
                alert("Method payment has not been selected");
            }
        } else {
            alert("Please fill up the item");
        }
    });

    $("#form-product .upload-image").on("change", function (e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#image-container").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $("#table-orders").on("click",".detail-order",function(){
        var itsme = $(this);
        var code = itsme.data('code');
        var settings = {
            "url": "http://localhost:8000/api/invoice/"+code,
            "method": "GET",
            "timeout": 0,
          };

          $.ajax(settings).done(function (response) {
            console.log(response);
            if(response.result){
                if(Object.values(response.data).length > 0){
                    var orderindex = response.data[0];
                    orderindex.totalBill = response.data.reduce((a, v) => (a = a + v.price), 0);
                    orderindex.taxBill = (12 / 100) * orderindex.totalBill;
                    ShowModalBill({header:"Detail Transaction - "+code, body:InvoiceBilling({order:orderindex,detail:response.data}) });
                }

            }
          }).fail(function(error){
            console.log(error);
            ShowModalBill({header:"Error", body:error.responseText});
          });
        //
    })

    const InvoiceBilling = (data) =>{
        let encObj = jwt_encode(data, "1b!k_pWl");
        var element;
        var settings = {
            "url": "http://localhost:8000/invoice/"+encObj,
            "method": "GET",
            "async": false,
            "dataType": "html",
            "timeout": 0
          };

          $.ajax(settings).done(function (response) {
            element = response;
          }).fail(function(error){
            console.log(error);
            ShowModalBill({header:"Error", body:error.responseText});
          });

        return element
    }

    const PushOrder = (param) =>{
        var result = {};
        var settings = {
            "url": "http://localhost:8000/api/order",
            "method": "POST",
            "async": false,
            "timeout": 0,
            "headers": {
              "Content-Type": "application/json"
            },
            "data": JSON.stringify(param),
          };

          $.ajax(settings).done(function (response) {
            console.log(response);
            result = response;
          }).fail(function(error){
            console.log(error);
            alert("Failed generate invoice, try again.");
          });

        return result
    }

    const ShowModalBill = (param) =>{
        $("#modal-kantin-ibik .modal-title").html(param.header)
        $("#modal-kantin-ibik .modal-body").html(param.body)
        $("#modal-kantin-ibik").modal("show");
    }
});
