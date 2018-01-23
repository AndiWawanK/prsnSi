
            </div> <!-- /.container-fluid -->
        </div> <!-- /#page-wrapper -->
    </div> <!-- /#wrapper -->
<!-- ======================================== -->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap-select.min.js"></script>
<script src="../assets/js/plugins/morris/raphael.min.js"></script>
<script src="../assets/js/plugins/morris/morris.min.js"></script>
<script src="../assets/js/plugins/morris/morris-data.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
<script>
$( function() {
  $( "#datepicker" ).datepicker();
} );
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
$('.selectpicker').selectpicker({
  style: 'btn-info',
  size: 4
});
$("#password").password('toggle');
</script>
</body>
</html>
