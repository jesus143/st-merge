



<?php



	$serton_menu = [
		'user'=>['Dashboard', 'Add Application', 'Add Gateway', 'Add Sensor'],
		'admin'=>['']
	];

?>


<div class="col-md-3 nopadding">
	<br>
	<ul>
	 <?php $postids = get_option('sertone_post_ids');


	 foreach($serton_menu['user'] as $key => $menuName) {
		  foreach ($postids as $value) {
			  if($menuName == get_the_title($value)) { ?>

				   <li class="page_item <?php if($value==$post->ID){ echo "active"; } ?>">
						<a href="<?php echo get_the_permalink($value); ?>">
							<?php echo get_the_title($value); ?>
						</a>
				   </li><?php
			  }
		  }
	 }


	 ?>
	</ul>

</div>