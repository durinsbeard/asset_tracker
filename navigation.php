<!DOCTYPE HTML> 


<script>
startList = function() {
if (document.all&&document;.getElementById) {
navRoot = document.getElementById("nav");
for (i=0; i;
if (node.nodeName=="LI") {
node.onmouseover=function() {
this.className+=" over";
  }
  node.onmouseout=function() {
  this.className=this.className.replace»
 (" over", "");
   }
   }
  }
 }
}
window.onload=startList;
</script>

<style>
* Fix IE. Hide from IE Mac */
* html ul li { float: left; }
* html ul li a { height: 1%; }
/* End */


ul {
 margin: 0;
 padding: 0;
 list-style: none;
 width: 200px;
 	-moz-box-shadow:inset 0px 1px 0px 0px #01A9DB;
	-webkit-box-shadow:inset 0px 1px 0px 0px #01A9DB;
	text-align:center;
	display:block;
	text-shadow:2px 2px 0px #0a2694;
	text-decoration:none;
	color:white;
	font-family:arial;
	font-weight:bold;
	margin-bottom:1px;
	height:30px;
	line-height:30px;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #2b2ba8;
 
 }
 
ul li {
 position: relative;
 	-moz-box-shadow:inset 0px 1px 0px 0px #01A9DB;
	-webkit-box-shadow:inset 0px 1px 0px 0px #01A9DB;
	box-shadow:inset 0px 1px 0px 0px #01A9DB;
	background-color: #000000;  
   
	display:block;
	text-shadow:2px 2px 0px #0a2694;
	text-decoration:none;
	color:white;
	font-family:arial;
	font-weight:bold;
	margin-bottom:1px;
	height:30px;
	line-height:30px;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #2b2ba8;
 }

 
 
 li ul {
 position: absolute;
 left: 199px;
 top: 0;
 display: none;


 }

ul li a {
 display: block;
	-moz-box-shadow:inset 0px 1px 0px 0px #01A9DB;
	-webkit-box-shadow:inset 0px 1px 0px 0px #01A9DB;
	box-shadow:inset 0px 1px 0px 0px #01A9DB;
	
	display:block;
	text-shadow:2px 2px 0px #0a2694;
	text-decoration:none;
	color:white;
	font-family:arial;
	font-weight:bold;
	margin-bottom:1px;
	height:30px;
	line-height:30px;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #2b2ba8;
 }
 
 ul li a:hover {
	display: block;
	background-image: -webkit-linear-gradient(to bottom, #000000, #848484); /* For Chrome 25 and Safari 6, iOS 6.1, Android 4.3 */
	background-image:    -moz-linear-gradient(to bottom, #000000, #848484); /* For Firefox (3.6 to 15) */
	background-image:      -o-linear-gradient(to bottom, #000000, #848484); /* For old Opera (11.1 to 12.0) */ 
	background:         linear-gradient(to bottom, #0040FF, #A9D0F5); /* Standard syntax; must be last */
	color:#FFFFFF;
	}

 
li:hover ul, li.over ul { 
	-moz-box-shadow:inset 0px 1px 0px 0px #01A9DB;
	-webkit-box-shadow:inset 0px 1px 0px 0px #01A9DB;
	background-image: -webkit-linear-gradient(to bottom, #000000, #848484); /* For Chrome 25 and Safari 6, iOS 6.1, Android 4.3 */
	background-image:    -moz-linear-gradient(to bottom, #000000, #848484); /* For Firefox (3.6 to 15) */
	background-image:      -o-linear-gradient(to bottom, #000000, #848484); /* For old Opera (11.1 to 12.0) */ 
	background:         linear-gradient(to bottom, #0040FF, #A9D0F5); /* Standard syntax; must be last */
	color:#FFFFFF;
	display:block;
	text-shadow:2px 2px 0px #0a2694;
	text-decoration:none;
	color:white;
	font-family:arial;
	font-weight:bold;
	margin-bottom:1px;
	height:30px;
	line-height:30px;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #2b2ba8; }
 
 /* Fix IE. Hide from IE Mac */
* html ul li { float: left; height: 1%; }
* html ul li a { height: 1%; }
/* End */

</style>

 <ul >
	
	<li>  Search  
		<ul>
			<li><a href="?form=SearchByUser&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">By User</a></li>
			<li><a href="?form=SearchByMAC&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">By MAC Address</a></li>
			<li><a href="?form=SearchByMAC&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">By Asset Tag</a></li>
			<li><a href="?form=SearchByMAC&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">By Company</a></li>
		</ul>
	</li>
	<li >    Add Information
		<ul>
			<!--<li><a  href="?form=atype&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">New Asset Type</a></li>-->
			<!--<li><a href="?form=company">New Company</a></li>-->
			<li><a href="?form=asset&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">New Asset</a></li>
			<li><a href="?form=user&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">New User</a></li>
		</ul>
	</li>
			<!--<li><a href="?form=images">New Image</a></li>-->
			<!--<li><a href="?form=checkout">Check-out</a></li>-->
			<!--<li><a href="?form=checkin">Check-in</a></li>-->
	<li>    Reports   
		<ul>
			<!--<li><a href="?form=showpictures">Show Pictures</a></li>-->
			<li><a href="?form=alphabeticalTabs&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">Assigned Assets</a></li>
			<li><a href="?form=asset_summary&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">Asset Summary</a></li>
			<li><a href="?form=list_assets&user=<?echo preg_replace('/[^A-Za-z0-9\-]/', '', $user)?>">List Assets</a></li>
			<!--<li><a href="?form=asset_history">Asset History</a></li>-->
			<!--<li><a href="?form=print_list">Print List</a></li>-->
		</ul>
	</li>
	<li>
		<a href="log_out.php" >Log out <?echo ": ". preg_replace('/[^A-Za-z0-9\-]/', '', $user);?></a>
	</li>
</ul>
  </HTML>