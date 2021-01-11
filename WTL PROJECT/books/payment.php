<?php
session_start();
?>
<html>
<head>
<title>payment</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
p{
visibility:hidden;
}

td{
padding:50;
text-align:center;
}

.zoomin img:hover +p{
  visibility:visible;
}
.zoomin img:hover{
  width: 300px;
  height: 300px;
}
div.container {
    width: 100%;
    border: 1px solid gray;
}

.carousel .item {
  height: 300px;
}

.item img {
    min-height: 300px;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: orange;
    clear: left;
    text-align: center;
}

nav {
    background-color:orange;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}
nav ul li:hover {
    background-color:#424242;
	color:white;
	opacity:04;
}

article {
    overflow: hidden;
}

ul#tab li{
display: inline-block;
align-items: right;
padding: 0% 15px;
}
ul#tab li a{
text-decoration: none;
color:white;
}
.dropdown-menu .sub-menu {
  left: 100%;
  position: absolute;
  top: 0;
  visibility: hidden;
  margin-top: -1px;
}

.dropdown-menu li:hover .sub-menu {
  visibility: visible;
}

.dropdown:hover .dropdown-menu {
  display: block;
}

ul#tab li:hover{
background-color: rgb(89,87,83);
cursor: pointer;
}
ul#tab li{
cursor: pointer;
}

{
  box-sizing: border-box;
}}
</style>
</head>
<body>
<header>
<a href="main.php" target="_top"><img src="BOOKS.JPG" height="50px" width="100px" style="position:absolute; left:350px; top:20px;">
</a>
<font size="35">&nbsp;ANC BOOKSTORE</font>
</header>
<center>
<form action="payy.php" method="POST">
<!-- bottom part with two form -->
    <div class="a-row">
      <div class="a-span6 a-column">
        <div class="a-spacing-double-large a-row on-imb-scroll-here" id="newShippingAddressFormFromIdentity">
          <div class="a-span10 a-column">
              <div class="enter-address-form " data-taxid-opt="0">
  <h2 data-testid="">
    <a name="new-address"></a>
    Enter a new delivery address
  </h2>
  When finished, click the "Continue" button.<br>
<br>
      <!-- new address html-->
    <div id="enterAddressPostalCodeContainer" class="a-row a-spacing-base one-new-address-form-field  identity-protect-from-errant " >
      <div class="a-span12" data-testid="">

        <label for="enterAddressPostalCode" class="">
          <b>Pincode:&nbsp;</b>
            </label><br>
        <input type="text" name="enterAddressPostalCode" id="enterAddressPostalCode" required="required" class="enterAddressFormField" size="50" maxlength=7 />
      </div>
    </div>
    <div id="enterAddressAddressLine1Container" class="a-row a-spacing-base one-new-address-form-field  identity-protect-from-errant " >
      <div class="a-span12" data-testid="">
        <label for="enterAddressAddressLine1" class="">
          <b>Flat / House No. / Floor / Building:&nbsp;</b>
        </label><br>
      <input type="text" name="enterAddressAddressLine1" id="enterAddressAddressLine1"required="required" class="enterAddressFormField" size="50" maxlength=60 />
      </div>
    </div>
    <div id="enterAddressAddressLine2Container" class="a-row a-spacing-base one-new-address-form-field  identity-protect-from-errant " >
      <div class="a-span12" data-testid="">
        <label for="enterAddressAddressLine2" class="">
          <b>Colony / Street / Locality:&nbsp;</b>
        </label><br>
     <input type="text" name="enterAddressAddressLine2" id="enterAddressAddressLine2" required="required" class="enterAddressFormField" size="50" maxlength=60 />
      </div>
    </div>
    <div id="enterAddressLandmarkContainer" class="a-row a-spacing-base one-new-address-form-field   " >
      <div class="a-span12" data-testid="">
        <label for="enterAddressLandmark" class="">
          <b>Landmark:&nbsp;</b><font size="-2">(optional)</font>
        </label><br>
<input type="text" name="enterAddressLandmark" id="enterAddressLandmark" class="enterAddressFormField" size="50" maxlength=60 />
             </div>
    </div>
    <div id="enterAddressCityContainer" class="a-row a-spacing-base one-new-address-form-field  identity-protect-from-errant " >
      <div class="a-span12" data-testid="">
        <label for="enterAddressCity" class="">
          <b>Town/City:&nbsp;</b>
        </label><br>     
<input type="text" name="enterAddressCity" id="enterAddressCity" required="required" class="enterAddressFormField" size="50" maxlength=60 />
      </div>
    </div>
    <div id="enterAddressStateOrRegionContainer" class="a-row a-spacing-base one-new-address-form-field  identity-protect-from-errant " >
      <div class="a-span12" data-testid="">
        <label for="enterAddressStateOrRegion" class="">
          <b>State:&nbsp;</b>
        </label>
<br>        
<input type="text" name="enterAddressStateOrRegion" id="enterAddressStateOrRegion" required="required" class="enterAddressFormField" size="50" maxlength=60 />
      </div>
    </div>
<input type="hidden" id="enterAddressCountryCode" name="enterAddressCountryCode" value="IN"  />
  <input type="hidden" id="enterAddressIsDomestic" name="enterAddressIsDomestic" value="1"  />
  </div>
      <div>
        <h3 class="fl">Additional Address Details</h3>
        &nbsp;
      </div>
      <div class="a-spacing-base" style="clear:both">Preferences are used to plan your delivery. However, shipments can sometimes arrive early or later than planned.</div>
          <div id="" class="a-row a-spacing-base one-new-address-form-field   " >
      <div class="a-span12" data-testid="">

        <label for="AddressType" class="">
          Address Type:
        </label>        
<select name="AddressType" class="enterDeliveryPrefsField" id="AddressType">
<option value="OTH" SELECTED > Select an Address Type </option>
<option value="RES"> Home (7 am – 9 pm delivery) </option>
<option value="COM"> Office/Commercial (10 AM - 5 PM delivery) </option>
</select>
<input type="hidden" name="weekendDeliveryDisplayType" value="dropdown">
      </div>
    </div>
    <div class="a-form-actions">
      <span class="a-button a-button-primary a-padding-none ">
        <span class="a-button-inner">
        <input  type="submit" class="a-button-text submit-button-with-name" style="text-align:center;background-color:orange;color:white;border-radius:8px;shadow:10px 10px white;" name="shipToThisAddress" value="Continue" data-testid=""></a>
        </span>
      </span>
    </div>
  </DIV>
  </DIV>
  </DIV>
  </DIV>
  </DIV>
  <br>
  <br>
  </form>
  </center>
	</HTML>
