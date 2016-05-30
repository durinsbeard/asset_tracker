<html>
<head>
	<script src="JS\jquery.js" type="text/javascript"></script>
	<script src="JS\jquery.inputmask.js" type="text/javascript"></script>

	<script>
	$(document).ready(function(){
    $(":input").inputmask();
	});
	</script>
</head>
<input data-inputmask="'alias': 'date'" />
<input data-inputmask="'mask': '99-9999999'" />
</html>