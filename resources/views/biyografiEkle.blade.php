<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>hakkımda ekle</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    <link rel="stylesheet" href="{{asset("assets/sweet-alert/sweetalert2.css")}}">
</head>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
@include("shared.header")
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
    @include("shared.sidebar")
    <!-- partial -->
<div class="main-panel">
    <div class="content-wrapper" >
        <div class="page-header">
            <h3 class="page-title">Biyografi Ekleme </h3>
        </div>
        <div class="row" >
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body"style="background: lightgrey">
                        @csrf
                        <input type="hidden" id="biyografiid" value="{{ isset($biyografi->biyografiid) ? $biyografi->biyografiid : ""}}">
                        <div class="form-group">
                            <label for="foto">FOTOĞRAF</label>
                            <br>
                            <input type="hidden" id="fotoName" value="{{ isset($biyografi->foto) ? $biyografi->foto : ""}}">
                            <input type="file"  name="foto" id="foto">
                        </div>
                        <div class="form-group">
                            <label for="ad">İSİM</label>
                            <input type="text" class="form-control" name="isim" id="isim" placeholder="isim" value="{{ isset($biyografi->isim) ? $biyografi->isim : ""}}">
                        </div>
                        <div class="form-group">
                            <label for="aciklama">Açıklama</label>
                            <textarea  class="form-control" rows="5" name="aciklama" id="aciklama" placeholder="aciklama">{{ isset($biyografi->aciklama) ?  strip_tags($biyografi->aciklama) : ""}} </textarea>
                        </div>
                        <button type="submit" class="btn btn-dark" id="kaydet">kaydet</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
<script src="{{asset("assets/sweet-alert/sweetalert2.js")}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->

<script >
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name=_token]').val()
            }
        })
        $('#kaydet').on('click', function(){

            let data = {
                biyografiid:$("#biyografiid").val(),
                isim: $('#isim').val(),
                aciklama: $('#aciklama').val()
            }
            let errorMsg = "";
            if(data.isim == "") errorMsg += "- isim alanı boş bırakılamaz.<br>";

            if(errorMsg != "") {
                return Swal.fire({
                    title: "Hata",
                    html: errorMsg,
                    icon: "error"
                })
            };
            let formData = new FormData();
            formData.append("foto", $("#foto").prop("files")[0]);
            formData.append("fotoName", $("#fotoName").val());
            formData.append("biyografiid", $("#biyografiid").val()),
                formData.append("isim", $("#isim").val()),
                formData.append("aciklama", $("#aciklama").val()),
                $.ajax({
                    type: 'POST'
                    ,url: '{{route('biyografiEklendi')}}'
                    ,data : formData
                    ,contentType: false
                    ,processData: false
                    ,success: function(success){
                        if(success.islemDurum == 1) {
                            window.location.href = '{{route('biyografiEkle')}}'
                        }else{
                            alert("biyografi eklenemedi.")
                        }

                    }
                })

        })
    })


</script>
</body>
</html>
