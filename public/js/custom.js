setInterval(timeupdate, 6000)
function timeupdate() {
    let tanggal = new Date()
    let jam = tanggal.getHours()
    if (jam == 12) {
        $.ajax({
            type: "get",
            url: "mobile",
            success: function (response) {
                // console.log(jam)
            }
        });
    }
}



var header = document.getElementById("payment");
var btns = document.getElementsByClassName("form-pay");
var pay = document.getElementsByClassName("pays");
// var btns = $("#form-pay");
for (var i = 0; i < btns.length; i++) {
    // console.log(i)
    btns[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("linepay");
        if (current.length > 0) {
            current[0].className = current[0].className.replace(" linepay", "");
        }
        this.className += " linepay";
    });
}

var dm = document.getElementsByClassName("linedm")

for (var i = 0; i < dm.length; i++) {
    dm[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("linedmchange");
        if (current.length > 0) {
            current[0].className = current[0].className.replace(" linedmchange", "");
        }
        this.className += " linedmchange";
    });

}


$('#pay-button').click(function (e) {
    e.preventDefault();
    let zone = $("#zone").val()
    let user = $("#userserver").val()
    let userservergenshin = $("#userservergenshin").val()
    let username = $("#username").val()
    let usernameff = $("#usernameff").val()
    let usernamegenshin = $("#usernamegenshin").val()
    let useridff = $("#useridff").val()
    let harga = $("#hargaakhir").val()
    let metodepembayaran = $("#metodepembayaran").val()
    let nohp = $("#nohp").val()
    let zonegenshin = $("#check-server-genshin").val()
    $('#modal_user').text(user)
    $('#modal_userserver_genshin').text(userservergenshin)
    $('#modal_server').text(zone)
    $('#modal_username').text(username)
    $('#modal_usernameff').text(usernameff)
    $('#modal_usernamegenshin').text(usernamegenshin)
    $('#modal_useridff').text(useridff)
    $('#modal_harga').text(harga)
    $('#modal_nohp').text(nohp)
    $('#modal_metodepembayaran').text(metodepembayaran)
    $('#hargamodal').val(harga)
    $('#modal_zone-genshin').text(zonegenshin)
    $('#modal_harga').priceFormat({
        prefix: 'Rp ',
        centsLimit: 0,
        thousandsSeparator: '.',
    });
});


$('#bayarakhirqris').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "checkQris",
        data: {
            invoiceid: $("#qris-invoice").val(),
            orderid: $("#orderid_qris").val(),
            harga: $("#hargamodal").val(),
            username:$("#username").val()
        },
        dataType: "json",
        success: function (response) {
            // $("#modal-qris_bayar").modal("show")
            if (response.qris_status) {
                Swal.fire(
                    {
                        text: 'Terima kasih sudah topup disini:)'
                    }
                )
            }
            console.log(response)
            $.ajax({
                type: "get",
                url: "diggie_qris",
                data: {
                    orderid: $("#orderid_qris").val(),
                    user: $("#userserver").val(),
                    zone: $("#zone").val(),
                    kodeproduk: $("#skucode").val()
                },
                dataType: "json",
                success: function (response) {
                    console.log("success");
                    console.log(response);
                    $.ajax({
                        type: "get",
                        url: "wa_notif",
                        data: {
                            orderid: $('#orderid_qris').val(),
                            game: $("#skuproduk").val(),
                            nohp: $("#nohp").val(),
                        },
                        dataType: "json",
                        success: function (response) {
                            console.log(response)
                        }
                    });
                }
            })
        }
    })
});
$('#bayarakhirqris-ff').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "checkQris_ff",
        data: {
            invoiceid: $("#qris-invoice").val(),
            orderid: $("#orderid_qris").val(),
            harga: $("#hargamodal").val(),
            usernameff:$("#usernameff").val()
        },
        dataType: "json",
        success: function (response) {
            // $("#modal-qris_bayar").modal("show")
            if (response.qris_status) {
                Swal.fire(
                    {
                        text: 'Terima kasih sudah topup disini:)'
                    }
                )
            }
            console.log(response)
            $.ajax({
                type: "get",
                url: "diggie_qris_ff",
                data: {
                    orderid: $("#orderid_qris").val(),
                    useridff: $("#useridff").val(),
                    kodeproduk: $("#skucode").val()
                },
                dataType: "json",
                success: function (response) {
                    console.log("success");
                    console.log(response);
                    $.ajax({
                        type: "get",
                        url: "wa_notif",
                        data: {
                            orderid: $('#orderid_qris').val(),
                            game: $("#skuproduk").val(),
                            nohp: $("#nohp").val(),
                        },
                        dataType: "json",
                        success: function (response) {
                            console.log(response)
                        }
                    });
                }
            })
        }
    })
});

$('#bayarakhir').click(function (e) {
    e.preventDefault();
    let harga = $("#hargaakhir").val()
    $('#modal_harga_qris').text(harga)
    $('#modal_harga_qris').priceFormat({
        prefix: 'Rp ',
        centsLimit: 0,
        thousandsSeparator: '.',
    });
    // console.log(harga);
    let metode = $("#metodepembayaran").val()
    if (metode == "qris") {
        $.ajax({
            type: "get",
            url: "Qris",
            data: {
                game: $("#skuproduk").val(),
                nohp: $("#nohp").val(),
                harga: $("#hargamodal").val(),
                username:$("#username").val()
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                $("#qris-invoice").val(response.qris_invoice_id)
                $("#orderid_qris").val(response.orderid)

                $("#staticBackdrop").modal("hide")
                $("#modal-qris").modal("show")
                // $("#body-qris").append(qrcode.makeCode(response))
                new QRCode(document.getElementById("qrcode"), response.qris_content);
                var timer = new Timer();
                timer.start({ countdown: true, startValues: { seconds: 1800 } });

                $('#modal-timer').html(timer.getTimeValues().toString());

                timer.addEventListener('secondsUpdated', function (e) {
                    $('#modal-timer').html(timer.getTimeValues().toString());
                });

                timer.addEventListener('targetAchieved', function (e) {
                    $('#modal-timer').html('EXPIRED');
                    $("#modal-qris").modal("hide")
                });
            }
        });
    } else {
        $.ajax({
            type: "get",
            url: "midtrans",
            data: {
                game: $("#skuproduk").val(),
                nama: $("#username").val(),
                nohp: $("#nohp").val(),
                harga: $("#hargamodal").val(),
                metode: $("#metodepembayaran").val()
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                window.snap.pay(response.snap, {
                    onSuccess: function (result) {
                        /* You may add your own implementation here */
                        console.log(result);
                        orderid=$("#orderid").val(result.order_id)
                        // send_response_to_form(result);
                        $.ajax({
                            type: "get",
                            url: "diggie",
                            data: {
                                orderid: result.order_id,
                                user: $("#userserver").val(),
                                zone: $("#zone").val(),
                                kodeproduk: $("#skucode").val()
                            },
                            dataType: "json",
                            success: function (response) {
                                console.log("success");
                                console.log(response);
                                $.ajax({
                                    type: "get",
                                    url: "wa_notif",
                                    data: {
                                        orderid:$("#orderid").val(),
                                        game: $("#skuproduk").val(),
                                        nohp: $("#nohp").val(),
                                    },
                                    dataType: "json",
                                    success: function (response) {
                                        console.log(response)
                                    }
                                });
                            }
                        });
                    }
                    , onPending: function (result) {
                        /* You may add your own implementation here */
                        console.log(result);
                        $.ajax({
                            type: "get",
                            url: "gagal_midtrans",
                            data: {
                                orderid: result.order_id,
                            },
                            dataType: "json",
                            success: function (response) {
                                // console.log(response)
                                // console.log("gagal");
                            }
                        });
                        // send_response_to_form(result);
                    }
                    , onError: function (result) {
                        /* You may add your own implementation here */
                        console.log(result);
                        // send_response_to_form(result);
                    }
                    , onClose: function () {
                        /* You may add your own implementation here */

                        alert('you closed the popup without finishing the payment');
                    }
                })
            }

        });
    }
});


$('#bayarakhir-ff').click(function (e) {
    e.preventDefault();
    let harga = $("#hargaakhir").val()
    $('#modal_harga_qris').text(harga)
    $('#modal_harga_qris').priceFormat({
        prefix: 'Rp ',
        centsLimit: 0,
        thousandsSeparator: '.',
    });
    // console.log(harga);
    let metode = $("#metodepembayaran").val()
    if (metode == "qris") {
        $.ajax({
            type: "get",
            url: "Qris_ff",
            data: {
                game: $("#skuproduk").val(),
                nohp: $("#nohp").val(),
                harga: $("#hargamodal").val(),
                usernameff:$("#usernameff").val()
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                $("#qris-invoice").val(response.qris_invoice_id)
                $("#orderid_qris").val(response.orderid)

                $("#staticBackdrop").modal("hide")
                $("#modal-qris").modal("show")
                // $("#body-qris").append(qrcode.makeCode(response))
                new QRCode(document.getElementById("qrcode"), response.qris_content);
                var timer = new Timer();
                timer.start({ countdown: true, startValues: { seconds: 1800 } });

                $('#modal-timer').html(timer.getTimeValues().toString());

                timer.addEventListener('secondsUpdated', function (e) {
                    $('#modal-timer').html(timer.getTimeValues().toString());
                });

                timer.addEventListener('targetAchieved', function (e) {
                    $('#modal-timer').html('EXPIRED');
                    $("#modal-qris").modal("hide")
                });
            }
        });
    } else {
        $.ajax({
            type: "get",
            url: "midtrans",
            data: {
                game: $("#skuproduk").val(),
                nama: $("#usernameff").val(),
                nohp: $("#nohp").val(),
                harga: $("#hargamodal").val(),
                metode: $("#metodepembayaran").val()
            },
            dataType: "json",
            success: function (response) {
                console.log(response)
                window.snap.pay(response.snap, {
                    onSuccess: function (result) {
                        /* You may add your own implementation here */
                        console.log(result);
                        orderid=$("#orderid").val(result.order_id)
                        // send_response_to_form(result);
                        $.ajax({
                            type: "get",
                            url: "diggie_ff",
                            data: {
                                orderid: result.order_id,
                                useridff: $("#useridff").val(),
                                kodeproduk: $("#skucode").val()
                            },
                            dataType: "json",
                            success: function (response) {
                                console.log("success");
                                console.log(response);
                                $.ajax({
                                    type: "get",
                                    url: "wa_notif",
                                    data: {
                                        orderid:$("#orderid").val(),
                                        game: $("#skuproduk").val(),
                                        nohp: $("#nohp").val(),
                                    },
                                    dataType: "json",
                                    success: function (response) {
                                        console.log(response)
                                    }
                                });
                            }
                        });
                    }
                    , onPending: function (result) {
                        /* You may add your own implementation here */
                        console.log(result);
                        $.ajax({
                            type: "get",
                            url: "gagal_midtrans",
                            data: {
                                orderid: result.order_id,
                            },
                            dataType: "json",
                            success: function (response) {
                                // console.log(response)
                                // console.log("gagal");
                            }
                        });
                        // send_response_to_form(result);
                    }
                    , onError: function (result) {
                        /* You may add your own implementation here */
                        console.log(result);
                        // send_response_to_form(result);
                    }
                    , onClose: function () {
                        /* You may add your own implementation here */

                        alert('you closed the popup without finishing the payment');
                    }
                })
            }

        });
    }
});


$('#button-check').click(function (e) {
    e.preventDefault();
    let user = $("#userserver").val()
    let zone = $("#zone").val()
    $.ajax({
        type: "get",
        url: `https://v1.apigames.id/merchant/M221108HOUQ8811AK/cek-username/mobilelegend?user_id=${user}.${zone}&signature=a484838c71c1d0c89c76ab8527e10519`,
        dataType: "json",
        success: function (response) {
            console.log(response.data.username)
            $("#username").val(response.data.username)
            console.log(response)
            if (response.data.username) {
                Swal.fire(
                    {
                        imageUrl: 'asset/img/taytay3.png',
                        imageWidth: 130,
                        imageHeight: 130,
                        title: 'TayTay ID',
                        text: 'Username Anda:' + (response.data.username),
                        icon: 'success'
                    }
                )
            } else {
                Swal.fire(
                    {
                        imageUrl: "asset/img/taytay3.png",
                        imageWidth: 130,
                        imageHeight: 130,
                        title: 'TayTay ID',
                        text: 'Username Anda Tidak Diketahui',
                        icon: 'error'
                    }
                )
            }

        }

    });
});


function harga(param, kode, produk) {
    if (param > 100 && param < 1000000) {
        cetakharga(param)
    }
    $("#skucode").val(kode)
    $("#skuproduk").val(produk)
    // console.log(param, kode)
    $('.price-number').priceFormat({
        prefix: 'Rp ',
        centsLimit: 0,
        thousandsSeparator: '.',
    });
}

function cetakharga(param) {
    let ppn = 0.05 * param
    let adminQris = 0.018 * param
    let adminbank = 4400
    let adminmart = 5000
    let adminewallet = 0.02 * param
    let Qris = parseInt(param)
    let untung = 0.06 * param
    let untungQris = 0.05 * param
    let ewallet = parseInt(param)
    $("#hargadm").val(param)
    // Qris
    $("#price-number-Qris").text(parseInt(Qris + untungQris + ppn + adminQris))
    $("#real-harga-Qris").val(parseInt(Qris + untungQris + ppn + adminQris))
    // Gopay
    $("#price-number-gopay").text(parseInt(ewallet + adminewallet + untung + ppn))
    $("#real-harga-gopay").val(parseInt(ewallet + adminewallet + untung + ppn))
    // shopeepay
    $("#price-number-shopeepay").text(parseInt(ewallet + adminewallet + untung + ppn))
    $("#real-harga-shopeepay").val(parseInt(ewallet + adminewallet + untung + ppn))
    // bca
    $("#price-number-bca").text(parseInt(ewallet + adminbank + untung + ppn))
    $("#real-harga-bca").val(parseInt(ewallet + adminbank + untung + ppn))
    // bri
    $("#price-number-bri").text(parseInt(ewallet + adminbank + untung + ppn))
    $("#real-harga-bri").val(parseInt(ewallet + adminbank + untung + ppn))
    // bni
    $("#price-number-bni").text(parseInt(ewallet + adminbank + untung + ppn))
    $("#real-harga-bni").val(parseInt(ewallet + adminbank + untung + ppn))
    // alfamrt
    $("#price-number-alfamart").text(parseInt(ewallet + adminmart + untung + ppn))
    $("#real-harga-alfamart").val(parseInt(ewallet + adminmart + untung + ppn))
    // indomaret
    $("#price-number-indomaret").text(parseInt(ewallet + adminmart + untung + ppn))
    $("#real-harga-indomaret").val(parseInt(ewallet + adminmart + untung + ppn))


}


function metode(param) {
    // console.log(param)
    let hargaakhir
    //  let hargaakhir = $("#price-number-gopay").text()
    if (param == 'gopay') {
        hargaakhir = $("#real-harga-gopay").val()
        // console.log(hargaakhir)
    } else if (param == ('qris')) {
        hargaakhir = $("#real-harga-Qris").val()
    } else if (param == ('shopeepay')) {
        hargaakhir = $("#real-harga-shopeepay").val()
    } else if (param == ('bca_va')) {
        hargaakhir = $("#real-harga-bca").val()
    } else if (param == ('bri_va')) {
        hargaakhir = $("#real-harga-bri").val()
    } else if (param == ('bni_va')) {
        hargaakhir = $("#real-harga-bni").val()
    } else if (param == ('alfamart')) {
        hargaakhir = $("#real-harga-alfamart").val()
    } else if (param == ('indomaret')) {
        hargaakhir = $("#real-harga-indomaret").val()
    } else if (param == ('gopay')) {
        hargaakhir = $("#real-harga-Qris").val()
    }

    // console.log(hargaakhir);
    $('#hargaakhir').val(hargaakhir)
    $('#metodepembayaran').val(param)
}


// __________________________________________________________________________________
// FF
$('#button-check-idff').click(function (e) {
  e.preventDefault();
  let useridff = $("#useridff").val()
  $.ajax({
    type: "get",
    url: `https://v1.apigames.id/merchant/M221108HOUQ8811AK/cek-username/freefire?user_id=${useridff}&signature=a484838c71c1d0c89c76ab8527e10519`,
    dataType: "json",
    success: function (response) {
      console.log(response.data.username)
      $("#usernameff").val(response.data.username)
      console.log(response)
      if (response.data.username) {
        Swal.fire(
          {
            imageUrl: 'asset/img/taytay3.png',
            imageWidth: 130,
            imageHeight: 130,
            title: 'TayTay ID',
            text: 'Username Anda:' + (response.data.username),
            icon: 'success'
          }
        )
      } else {
        Swal.fire(
          {
            imageUrl: "asset/img/taytay3.png",
            imageWidth: 130,
            imageHeight: 130,
            title: 'TayTay ID',
            text: 'Username Anda Tidak Diketahui',
            icon: 'error'
          }
        )
      }

    }

  });
});

// Genshin Impact

$('#button-check-genshin').click(function (e) {
    e.preventDefault();
    let userservergenshin = $("#userservergenshin").val()
    let zonegenshin = $("#check-server-genshin").val()
    // console.log(zonegenshin);
    $.ajax({
        type: "get",
        url: `https://api-bo.my.id/v2.1/game/gensin/?id=${userservergenshin}&server=${zonegenshin.toUpperCase()}&key=ef0d2d51d39448f`,
        dataType: "json",
        success: function (response) {
            // console.log(response.nickname);
            $("#usernamegenshin").val(response.nickname)
            if (response.nickname) {
                Swal.fire(
                    {
                        imageUrl: 'asset/img/taytay3.png',
                        imageWidth: 130,
                        imageHeight: 130,
                        title: 'TayTay ID',
                        text: 'Username Anda:' + (response.nickname),
                        icon: 'success'
                    }
                )
            } else {
                Swal.fire(
                    {
                        imageUrl: "asset/img/taytay3.png",
                        imageWidth: 130,
                        imageHeight: 130,
                        title: 'TayTay ID',
                        text: 'Username Anda Tidak Diketahui',
                        icon: 'error'
                    }
                )
            }

        }

    });
});


