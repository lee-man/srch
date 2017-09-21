<?php
session_start();
$messages = "";

if(!isset($_SESSION['messages'])){
	$_SESSION['messages'] ="";
}

?>

<!DOCTYPE html>
<html>
<HEAD>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
<script src="/srch/js/jquery.js"></script>
<script src="/srch/js/jquery-2.1.3.min.js"></script>
<script src="/srch/js/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="/srch/js/jquery-ui.css" >
<style>
 fieldset {
	border: 0;
	padding: 0;
	margin: 0;
	min-width: 0;

 }

</style>

</HEAD>
<BODY>
<form action="" method="post" id="frmmgr" name="frmmgr">
<fieldset id="fset" name="fset">

	<div align="center">
		<input style="border:0px;background-color:#F2F2F2;" type='text' size='40' id='fmessage' name='fmessage'/>

		<p>
		<label for="">Name: </label>
		<input type='text' size='30' name='fname' id='fname' value=""  />
		<label for="">Company: </label>
		<input type='text' size='30' name='fcompany' id='fcompany'  value=""  disabled />
		&nbsp;&nbsp;&nbsp;
		<input type="button" value="Switch Input Fields" id="switch" name="switch"/>&nbsp;
		</p>
		<p>
		&nbsp;
		<input type="reset" value="Reset"  id="reset"/>
		<!--<input type="Submit" value="Submit"  id="Submit" style="display: none;";/>-->
		</p>

		<p>
			<div id="xmessages" style="align:center;border-style:none;text-align:center;color:red;" > <?php echo $messages; ?></div>
		</p>
	</div>

</fieldset>

<div id="editfrm" name="editfrm" align="center" ></div>

</form>



</BODY>


<script type="text/javascript ">
	$(function() {
	   //autocomplete name

	     $("#fname").autocomplete({
	        source: "/srch/autosearch.php?search=f",
	        minLength: 2,
	        autoFocus: true,

			 change: function (event, ui) {
       //your code
		   },
		   close: function (event, ui) {
				 var fnme = $("#fname").val();
				//alert(fnme );
				$("#editfrm" ).load( "/srch/editform.php?term="+encodeURIComponent(fnme));
			}
			});

	    //autocomplete name
	    $("#fcompany").autocomplete({
	        source: "/srch/autosearch.php?search=c",
	        minLength: 2,
	        autoFocus: true,

			change: function (event, ui) {
			//your code
			},
			close: function (event, ui) {
				 var fnme = $("#fcompany").val();
				//alert(fnme );
				$("#editfrm" ).load( "/srch/editform.php?term="+encodeURIComponent(fnme));
			}
			});
	});
</script>

<script type="text/javascript ">
	  $("#switch").on("click", function(){
			var toggle = $("#fname").prop("disabled");

			$("#fname").prop("disabled", !toggle );
			$("#fcompany").prop("disabled", toggle );
		});

		//$(".reset").click(function() {
		//   $(this).closest('form').find("input[type=text], textarea").val("");
		//		$("#fcompany").prop("disabled", !$("#fcompany").prop("disabled"));
		//});


		//});

</script>
</html>


<?php
if(isset($_SESSION['messages'])){
	echo $messages = $_SESSION['messages'];
}
?>
