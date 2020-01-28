<?php
wp_head();
global $post;

function print_field_value($field) {
    $some = get_field($field);
    
    if($some != '')  { echo $some;} else { echo "0"; } 
}

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $image = wp_get_attachment_url(get_post_meta($post->ID, 'featured_media', true )); ?>

<?php endwhile; ?>
<?php endif; ?>

<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1">
                            <?php echo '<img src="'. $image .'"/>'; ?>
                        </div>
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo the_title()?></h3>
                    <div class="rating">
                        <div class="stars">
                            <?php
                                for($i = 0; $i < get_post_meta($post->ID, 'rating', true ); $i++) {
                                    echo '<span class="fa fa-star checked"></span>';
                                }
                            ?>
                        </div>
                    </div>
                    <p class="product-description" style="display:none;">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                    <h4 class="price">By: <span> <?php echo get_the_title( get_post_meta($post->ID, 'brand', true )); ?> </span></h4>

                    <!-- Nutrition Facts Table-->

                    <section class="performance-facts">
                        <header class="performance-facts__header">
                            <h1 class="performance-facts__title">Nutrition Facts</h1>
                            <p>Serving Size <?php print_field_value('serving_size'); ?>g</p>
                        </header>
                        <table class="performance-facts__table">
                            <thead>
                                <tr>
                                    <th colspan="3" class="small-info">
                                        Amount Per Serving
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="2">
                                        <b>Calories</b> <?php print_field_value('total_calories'); ?>
                                    </th>
                                    <td>
                                        Calories from Fat <?php print_field_value('fat_calories'); ?>
                                    </td>
                                </tr>
                                <tr class="thick-row">
                                    <td colspan="3" class="small-info">
                                        <b>% Daily Value*</b>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <b>Total Fat</b> <?php print_field_value('total_fat');  ?>
                                    </th>
                                    <td>
                                        <b><?php print_field_value('total_fat');  ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="blank-cell">
                                    </td>
                                    <th>
                                        Saturated Fat <?php print_field_value('saturated_fat');?>
                                    </th>
                                    <td>
                                        <b><?php print_field_value('saturated_fat');?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="blank-cell">
                                    </td>
                                    <th>
                                        Trans Fat <?php print_field_value('trans_fat');?>
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <b>Cholesterol</b> <?php print_field_value('total_cholesterol');?>
                                    </th>
                                    <td>
                                        <b><?php print_field_value('total_cholesterol');?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">
                                        <b>Total Carbohydrate</b> <?php print_field_value('total_carbohydrate');?> g
                                    </th>
                                    <td>
                                        <b><?php print_field_value('total_carbohydrate');?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="blank-cell">
                                    </td>
                                    <th>
                                        Dietary Fiber <?php print_field_value('dietary_fiber');?>g
                                    </th>
                                    <td>
                                        <b><?php print_field_value('dietary_fiber');?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="blank-cell">
                                    </td>
                                    <th>
                                        Sugars <?php print_field_value('sugars');?>g
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                                <tr class="thick-end">
                                    <th colspan="2">
                                        <b>Protein</b> <?php print_field_value('total_protein');?>g
                                    </th>
                                    <td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="performance-facts__table--grid">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        Vitamin A <?php print_field_value('vitamin_a');?> %
                                    </td>
                                    <td>
                                        Vitamin C <?php print_field_value('vitamin_c');?> %
                                    </td>
                                </tr>
                                <tr class="thin-end">
                                    <td colspan="2">
                                        Calcium <?php print_field_value('calcium');?> %
                                    </td>
                                    <td>
                                        Iron <?php print_field_value('iron');?> %
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p class="small-info">* Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs:</p>

                    </section>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align:center"> <a href="/" target="_self">Return to Home</a> </div>
</div>



   
