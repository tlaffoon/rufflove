<?php 
// Change the database credentials at line no. 3 and Google API Key on line no. 25
	$p_link_member = mysql_connect("localhost", "<Database User Name>", "<Database Password>");
	mysql_select_db("atmfinder_db",$p_link_member);


<html>
<head>
<!-- Dependencies -->  
<!-- Sam Skin CSS for TabView -->  
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.5.0/build/tabview/assets/skins/sam/tabview.css">   
  
<!-- JavaScript Dependencies for Tabview: -->  
<script type="text/javascript" src="http://yui.yahooapis.com/2.5.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>  
<script type="text/javascript" src="http://yui.yahooapis.com/2.5.0/build/element/element-beta-min.js"></script>  
  
<!-- OPTIONAL: Connection (required for dynamic loading of data) -->  
<script type="text/javascript" src="http://yui.yahooapis.com/2.5.0/build/connection/connection-min.js"></script>  
   
<!-- Source file for TabView -->  
<script type="text/javascript" src="http://yui.yahooapis.com/2.5.0/build/tabview/tabview-min.js"></script>
</head>
<h3>ATM Finder</h3>

    <script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=<AIzaSyDlSkSQhNbpFg_-I5qgFJtEdpd7KzR27Z8>" type="text/javascript"></script>
    <script type="text/javascript">

    var map = null;
    var geocoder = null;

    function initialize() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        //map.setCenter(new GLatLng(37.4419, -122.1419), 13);
		map.addControl(new GLargeMapControl());
    	map.addControl(new GMapTypeControl());
        geocoder = new GClientGeocoder();
		 <? $ATMFound=false;
		 	if($_REQUEST['txtzip']!="")
		    {
				 $sql="select LATITUDE,LONGITUDE  from tbl_zip_code  where zip_code='".$_REQUEST['txtzip']."'";
				
				
				$obj=mysql_query($sql);
				if(mysql_num_rows($obj)>0)
				{
					$rs=mysql_fetch_object($obj);
					
					$LATITUDE=$rs->LATITUDE;
					$LONGITUDE=$rs->LONGITUDE;
					

					$sql1="";
					$sql1.="SELECT *, (6371* ACOS( COS( RADIANS($LATITUDE) ) * COS( RADIANS( LATITUDE ) ) * COS( RADIANS( $LONGITUDE) - RADIANS(LONGITUDE) ) + SIN( RADIANS($LATITUDE) ) * SIN( RADIANS( LATITUDE ) ) ) ) AS DISTANCE  FROM TBL_ATM_LOCATIONS HAVING DISTANCE<=".$_REQUEST['cmbDistance'];
					$obj1=mysql_query($sql1);
					$ATM_details="<table cellpadding=\"4\" cellspacing=\"1\" border=\"0\" width=\"100%\" bgcolor=\"#CCCCCC\">";
						$rowcount=0;
						$bgcolor="#F2EFE9";

					if(mysql_num_rows($obj1)>0)
					{  
						$ATMFound =true;
						$ATM_details.="<tr bgcolor=\"#F2F0EB\"><td><strong>ATM</strong></td><td><strong>Distance (KM)</strong></td></tr>";
						while($rs1=mysql_fetch_object($obj1))
						{
							$rowcount++;
							if($rowcount%2==0){
								$bgcolor="#EEEDEA";
							}
							$ATM_address=$rs1->ATM_ADDRESS;
							$ATM_city=$rs1->ATM_CITY;
							$ATM_state=$rs1->ATM_STATE;
							$ATM_zip = $rs1->ATM_ZIPCODE;
							$ATM_details.="<tr><td bgcolor=".$bgcolor.">";
							$ATM_details.=$ATM_address.", ".$ATM_city.", ".$ATM_state." $ATM_zip";
							$ATM_details.="</td><td  bgcolor=".$bgcolor." align=\"center\">";
							$ATM_details.=round($rs1->DISTANCE);
							$ATM_details.="</td></tr>";
							
							
						?>
						showAddress("<?=$ATM_address?>", "<?=$ATM_city?>", "<?=$ATM_state." ".$ATM_zip?>","<?=round($rs1->DISTANCE)?>");
						<? 
						}
						
					}
					else
					{
						//$retailer_details.="<tr><td colspan=\"2\" align=\"center\"><font color=\"#ff0000\">Your Search Request not found</font></td></tr>";
						$_SESSION['msg']="ATM not found";
					}
				}
				else
				{
					//$retailer_details.="<tr><td colspan=\"2\" align=\"center\"><font color=\"#ff0000\">Your Search Request not found</font></td></tr>";
					$_SESSION['msg']="ATM not found";
				}
				$ATM_details.="</table>";
			}
				
			
			 ?>
		 
		
      }
	  //MM_preloadImages('images_new/nav_products_ON.gif','images_new/nav_whatsnew_ON.gif','images_new/nav_professionals_ON.gif','images_new/nav_retail2_ON.gif','images_new/nav_aboutus2_ON.gif','images_new/nav_contactus2_ON.gif','images_new/nav_expert_ON.gif','images_new/arrow_brown_right_a.gif','images_new/arrow_brown_down_a.gif','images_new/arrow_green_right_a.gif','images_new/arrow_green_down_a.gif')
    }

    function showAddress(store, address, city, statezip, distance) {
      if (geocoder) {
        geocoder.getLatLng(
          address+", "+city+", "+statezip,
          function(point) {
            if (!point) {
              //alert(address + " not found");
            } else {
              map.setCenter(point, 9);
              var marker = new GMarker(point);
              map.addOverlay(marker);
            GEvent.addListener(marker, "click", function() {
            marker.openInfoWindowHtml("<font size=2>"+store+"<br>"+address+",<br>"+city+", "+statezip+"<br>Distance: "+distance+" miles</font>");
          });

              //marker.openInfoWindowHtml("hai");
            }
          }
        );
      }
    }
	
	
	
    </script>
<script type="text/javascript">
  var myTabs = new YAHOO.widget.TabView("RetailSearch");
  var tab0 = myTabs.getTab(1);
  function handleClick(e) {
	alert(e.target);
  }
  tab0.addListener('click', handleClick);
</script>   
<script language="javascript" type="text/javascript">
function fnValidate(){
	if(document.thisform.txtzip.value==''){
		alert('Please enter your zip code.');
		document.thisform.txtzip.focus();
		return false;
	}
}

function fnTimer()
{
	window.setTimeout("initialize()",100);
}

function fnShow(divId,expand){
 	var img1 = divId+'_img';
	if(expand==true)
	{
		document.getElementById(divId).style.display="block";
		document.getElementById(img1).src='images_new/down.gif';
	}
	else if(expand==false)
	{
		document.getElementById(divId).style.display="none";
		document.getElementById(img1).src='images_new/arrow_green_right.gif';
	}
	else	
	{
		if(document.getElementById(divId).style.display == "none")
		{
			document.getElementById(divId).style.display="block";
			document.getElementById(img1).src='images_new/down.gif';
		}else{
			document.getElementById(divId).style.display="none";
			document.getElementById(img1).src='images_new/arrow_green_right.gif';
		}
	}
}


</script> 
  </head>

<body onUnload="GUnload()" class="yui-skin-sam">
<form action="atm_finder.php" method="post"  name="thisform" onSubmit="return fnValidate();" >
<table border=0 cellpadding=0  cellspacing=0 class="LocationsTable" width="697">
	<tr >
		<td>Enter your zip code : &nbsp;&nbsp;
            <input type="text" name="txtzip" value="<?=$_REQUEST['txtzip']?>" maxlength="10" />
			&nbsp;&nbsp;
		</td>
	</tr>
	<tr>
		<td>Search ATM around &nbsp;
            <select name="cmbDistance">
				<option value="20" selected="selected">20</option>
				<option value="25">25</option>
				<option value="30">30</option>
				<option value="35">35</option>
				<option value="40">40</option>
				<option value="45">45</option>
				<option value="50">50</option>
				<option value="55">55</option>
				<option value="60">60</option>
				<option value="65">65</option>
				<option value="70">70</option>
				<option value="75">75</option>
				<option value="80">80</option>
			</select><? if($_REQUEST['cmbDistance']!=''){?><script language="javascript" type="text/javascript">document.thisform.cmbDistance.value='<?=$_REQUEST['cmbDistance']?>';</script><? } ?>
&nbsp;Km
		</td>
	</tr>
	 
	 
	<tr> 
		<td>
	        <input name="but_Go"  type="submit"  value="Go" />
	    </td>
	</tr>
	<tr>
		<td><br><br>
			<B  style="color:#FF0000;text-align:center;">
			<? 
				if($_SESSION['msg']!="")
				{
					echo $_SESSION['msg'];
					$_SESSION['msg']="";
					
				}?>
			</B>
		<? if($ATMFound==true)
		    {
		?>		<br><br>
				<div id="RetailSearch" class="yui-navset">   
					<ul class="yui-nav">   
						<li class="selected"><a href="#tab1"><em>ATM Locations</em></a></li>   
						<li onClick="initialize()"><a href="#tab2"><em><span onClick="fnTimer()">Map View</span></em></a></li>   
					</ul>               
					<div class="yui-content" style="width:680px;">   
							 <div id="retailer" style="width:680px;text-valign:top;" ><?=$ATM_details;?></div>
							 <div id="map_canvas" style="width:680px; height: 600px;display:none;"></div>
					</div>   
				</div>  
			<? } ?> 
 		</td>
	</tr>
	</table>
</form>
 

</body>
</html>