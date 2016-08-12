<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo SITEURL; ?></title>
	<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php echo BOOT; ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo BOOT; ?>/css/bootstrap-theme.min.css" >
		<link rel="stylesheet" href="<?php echo BOOT; ?>/css/mystyle.css" >
		<script src="<?php echo BOOT; ?>/js/jquery.min.js"></script>
		<script src="<?php echo BOOT; ?>/js/bootstrap.js"></script>
		<script src="<?php echo BOOT; ?>/js/bootstrap.min.js"></script>
		<script src="<?php echo BOOT; ?>/js/bootstrap-datepicker.js"></script>

		<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;key=AIzaSyDvKtPPJ54YWx_CtqDj_T16g2IHSq3IeGc "></script>

		<script type="text/javascript">
		    function initialize() {
		        var input = document.getElementById('searchTextField');
		        var autocomplete = new google.maps.places.Autocomplete(input);
		        google.maps.event.addListener(autocomplete, 'place_changed', function () {
		            var place = autocomplete.getPlace();

		            console.log(place);
		            document.getElementById('city2').value = place.name;
		            document.getElementById('cityLat').value = place.geometry.location.lat();
		            document.getElementById('cityLng').value = place.geometry.location.lng();
		        });
		    }
		    google.maps.event.addDomListener(window, 'load', initialize); 
		</script>

</head>
<body>
<?php






	if (!is_page('sertone-log-in') AND !is_page('sertone-add-registration')) {?>
		<div class="container application">
		<div class="row">
		<div class="col-md-3 nopadding dash-main-header"></div>
		<div class="col-md-9 nopadding dash-rigth dash-main-header ">

			<a href="<?php echo $_SESSION['url']['dashboard']; ?>"><img src="<?php echo IMG; ?>/home.png"> </a>/ Icons  2&nbsp;&nbsp;&nbsp;


		<div class="logout"><a  href="<?php echo $_SESSION['url']['logout']; ?>">logout</a></div> </div>
<?php 
	}
 ?>

