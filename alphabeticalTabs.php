<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<link href="assets/css/styles.css" rel="stylesheet" /></pre>
<link type="text/css" rel="stylesheet" href="css/style.css"/>
<script src="JS/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<!-- Include JavaScript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script><script type="text/javascript" src="assets/js/script.js"></script>
<script>
$(function () {
    var _alphabets = $('.alphabet > a');
    var _contentRows = $('#countries-table tbody tr');
	_alphabets.click(function () {
       var _letter = $(this), _text = $(this).text(), _count = 0;
			
			returnInfo(_text);
			
	});
});
function returnInfo(_text) {
	if (_text=="") {
     document.getElementById("names").innerHTML="";
     return;
   } 
   if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp=new XMLHttpRequest();
   } else { // code for IE6, IE5
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange=function() {
     if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("names").innerHTML=xmlhttp.responseText;
     }
   }
   xmlhttp.open("GET","userData.php?firstInitial=" + _text + "&rnd=" + Math.random(),true);
   xmlhttp.send();
 }
</script>
<div class="wrapper">
<center>
<div class="alphabet">
            <a class="first" href="#">A</a>
            <a href="#">B</a>
            <a href="#">C</a>
            <a href="#">D</a>
            <a href="#">E</a>
            <a href="#">F</a>
            <a href="#">G</a>
            <a href="#">H</a>
            <a href="#">I</a>
            <a href="#">J</a>
            <a href="#">K</a>
            <a href="#">L</a>
            <a href="#">M</a>
            <a href="#">N</a>
            <a href="#">O</a>
            <a href="#">P</a>
            <a href="#">Q</a>
            <a href="#">R</a>
            <a href="#">S</a>
            <a href="#">T</a>
            <a href="#">U</a>
            <a href="#">V</a>
            <a href="#">W</a>
            <a href="#">X</a>
            <a href="#">Y</a>
            <a class="last" href="#">Z</a></div></center>
<div id="names">
</div>
</div>
<pre>
    


