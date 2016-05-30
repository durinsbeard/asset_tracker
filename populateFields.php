<script type="text/javascript" charset="utf-8">      
function updateUsername(){          
	first = document.getElementById("first").value;
	initial = first.charAt(0).toLowerCase();
	last = document.getElementById("last").value;   
	document.getElementById("username").value = initial+last.toLowerCase()+"@srclogisticsinc.com";      
} 
</script> 





<input type="text" name="some_name" value="" id="first" onkeyup="updateUsername();"></br> 
<input type="text" name="some_name" value="" id="last" onkeyup="updateUsername();"></br>  
<input type="text" name="some_name" value="" id="username">
