<link type="text/css" rel="stylesheet" href="css/style.css" />
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

<ul id="navBar">
	<!--<li><a  href="?form=atype">New Asset Type</a></li>-->
	<!--<li><a href="?form=company">New Company</a></li>-->
	<li><a href="?form=asset">New Asset</a></li>
	<li><a href="?form=user">New User</a></li>
	<!--<li><a href="?form=images">New Image</a></li>-->
	<!--<li><a href="?form=checkout">Check-out</a></li>-->
	<!--<li><a href="?form=checkin">Check-in</a></li>-->
	<li id="navGrouping">    Asset Mgt    </li>
	<li><a href="?form=editasset">Edit Asset</a>
	<li><a href="?form=editphones">Edit Phones</a>
	<li><a href="?form=reassign_asset">Reassign Asset</a>
	<li><a href="?form=deactivate_asset">Deactivate Asset</a></li>
	<li><a href="?form=deactivate_user">Deactivate User</a></li>
	<li id="navGrouping">     Upload    </li>
	<li><a href="?form=asset_image">Upload Asset Image</a></li>
	<li id="navGrouping">    Reports   </li>
	<!--<li><a href="?form=showpictures">Show Pictures</a></li>-->
	<li><a href="?form=trackingReport">Assigned Assets</a></li>
	<li><a href="?form=asset_summary">Asset Summary</a></li>
	<li><a href="?form=list_assets">List Assets</a></li>
	<!--<li><a href="?form=asset_history">Asset History</a></li>-->
	<!--<li><a href="?form=print_list">Print List</a></li>-->
</ul>
