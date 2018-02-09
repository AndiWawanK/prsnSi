
            </div> <!-- /.container-fluid -->
        </div> <!-- /#page-wrapper -->
    </div> <!-- /#wrapper -->
<!-- ======================================== -->

<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap-select.min.js"></script>
<script src="../assets/js/plugins/morris/raphael.min.js"></script>
<script src="../assets/js/plugins/morris/morris.min.js"></script>
<script src="../assets/js/plugins/morris/morris-data.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">
<script src="../assets/js/multi-select.js"></script>
<script>
$(document).ready(function(){
  var date_input=$('input[name="date"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  date_input.datepicker({
    format: 'mm/dd/yyyy',
    container: container,
    todayHighlight: true,
    autoclose: true,
  })

})
$(".dropdown-menu li a").click(function(){
var selText = $(this).text();
$(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');

//combobox behavior
if (selText=="United States") {
    $("#btnUS").removeClass("hide");
    $("#btnCA").addClass("hide");
}
else if (selText=="Canada") {
    $("#btnCA").removeClass("hide");
    $("#btnUS").addClass("hide");
}

});

$("#btnSearch").click(function(){
alert($('.btn-select').text()+", "+$('.btn-select2').text());
});
// $('.selectpicker').selectpicker({
//   style: 'btn-info',
//   size: 4
// });
$("#password").password('toggle');
$('#my-select').multiSelect();
function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" width="200">';
        };
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function absen(kelas,jurusan,tanggal) {
  $('#status').html('loading...');
  $.post("absen.php",{kelas:kelas,jurusan:jurusan,tanggal:tanggal},function(res) {
    $('#status').html('');
    var data = JSON.parse(res);
    var tabelData = "";
    data.forEach(function(dat) {
      tabelData += "<tr><td>"+dat.nis+"</td><td>"+dat.nama+"</td><td>"+dat.kelas+"</td><td>"+dat.jurusan+"</td><td>"+dat.tanggal+"</td><td>"+dat.keterangan+"</td></tr>";
    });
    console.log(tabelData);
    $('#bodyTabel').html(tabelData);
    $('#downloadAbsen').html(tabelData);
  })
  console.log(kelas);
  console.log(jurusan);
  console.log(tanggal);
}


</script>
</body>
</html>
