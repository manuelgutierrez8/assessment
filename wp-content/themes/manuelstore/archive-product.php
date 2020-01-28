<?php get_header() ?>

<?php

$args = array( 
	'numberposts' => '9999', 
	'post_status' => 'publish', 
	'post_type' => 'product' ,
);

$posts = get_posts($args);

$data = [];

foreach ($posts as $post) {
	$post_info = getPostFields($post);
	array_push($data, $post_info);
}

?>

<div id="grid" class="outer">
	<div class="row">
		<?php 
			
		?>		
		<?php
		foreach ($data as $product) {
			echo '<div class="col">';
				echo '<div class="outerfit">';
						echo '<div class="fill_a">';
							echo '<div class="img"><img src="'. wp_get_attachment_url($product['featured_media']) .'" /></div>';
							echo '<div class="title">' . $product['title'] . '</div>';
							echo '<div class="shortdesc"> <b>Rating:</b> ' . $product['rating'] . 'of 5</div>';
							echo '<div class="brand"> <b>By:</b> ' . $product['brand']['title'] . '</div>';
							echo '<div class="detail-link"><a href="'. $product['link'] .'" target="_self">See Details<a/></div>';
						echo '</div>';
				echo '</div>';
			echo '</div>';
		}
?>

	




	</div>
</div>

