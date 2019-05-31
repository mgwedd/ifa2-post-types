<?php

locate_template('includes/wp_booster/td_single_template_vars.php', true);

get_header();

global $loop_module_id, $loop_sidebar_position, $post, $td_sidebar_position;

$td_mod_single = new td_module_single($post);
$td_block_11 = new td_block_11();
$td_block_14 = new td_block_14();
$td_block_8 = new td_block_8();
$promoted_id = get_term_by('slug', 'promoted', 'category');
$related_promoted_posts = $td_mod_single->related_promoted_posts();

//begin theft
global $post;
if ($post->post_type != 'solution') {
    return '';
}
if (td_util::get_option('tds_similar_articles') == 'hide') {
    return '';
}
if (td_util::get_option('tds_similar_articles_type') == 'by_tag') {
    $td_related_ajax_filter_type = 'cur_post_same_tags';
} else {
    $td_related_ajax_filter_type = 'cur_post_same_categories';
}
$tds_similar_articles_rows = td_util::get_option('tds_similar_articles_rows');
if (empty($tds_similar_articles_rows)) {
    $tds_similar_articles_rows = 1;
}
if (td_global::$cur_single_template_sidebar_pos == 'no_sidebar' or $force_sidebar_position === 'no_sidebar') {
    $td_related_limit = 5 * $tds_similar_articles_rows;
    $td_related_class = 'td-related-full-width';
    $td_column_number = 5;
} else {
    $td_related_limit = 3 * $tds_similar_articles_rows;
    $td_related_class = '';
    $td_column_number = 3;
}
$td_related_limit = 3;
$td_column_number = 3;
$td_block_args = array (
    'limit' => $td_related_limit,
    'ajax_pagination' => 'next_prev',
    'class' => $td_related_class,
    'td_column_number' => $td_column_number
);
//end theft
?>
<div class="td-main-content-wrap">
    <!-- ===== REMOVE THE H1 WHEN READY ==== -->
    <h1>THIS IS SAMPLE TEXT TO SHOW THAT THIS TYPE IS USING single-solution.php AS ITS TEMPLATE</h1>
    <div class="td-container td-post-template-default <?php echo $td_sidebar_position; ?>">
        <div class="td-crumb-container"><?php echo td_page_generator::get_single_breadcrumbs($td_mod_single->title); ?></div>

        <div class="td-pb-row">
            <?php

            //the default template
            switch ($loop_sidebar_position) {
                default: //sidebar right
					?>
                        <div class="td-pb-span8 td-main-content" role="main">
                            <div class="td-ss-main-content">
                                <?php
                                locate_template('loop-single.php', true);
                                comments_template('', true);
                                ?>
                            </div>
                        </div>
                        <div class="td-pb-span4 td-main-sidebar" role="complementary">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    <?php
                    break;

                case 'sidebar_left':
                    ?>
                        <div class="td-pb-span8 td-main-content <?php echo $td_sidebar_position; ?>-content" role="main">
                            <div class="td-ss-main-content">
                                <?php
                                locate_template('loop-single.php', true);
                                comments_template('', true);
                                ?>
                            </div>
                        </div>
		                <div class="td-pb-span4 td-main-sidebar" role="complementary">
			                <div class="td-ss-main-sidebar">
				                <?php get_sidebar(); ?>
			                </div>
		                </div>
                    <?php
                    break;

                case 'no_sidebar':
                    td_global::$load_featured_img_from_template = 'td_1068x0';
                    ?>
                        <div class="td-pb-span12 td-main-content" role="main">
                            <div class="td-ss-main-content">
                                <?php
                                locate_template('loop-single.php', true);
                                comments_template('', true);
                                ?>

                            </div>
                        </div>
                    <?php
                    break;

            }
            ?>
        </div> <!-- /.td-pb-row -->
        <div class="vc_row wpb_row td-pb-row td-sidebar-guide">
            <div class="wpb_column vc_column_container td-pb-span12">
                <?php 
                    echo $related_promoted_posts->render($td_block_args);
                    $exclude = '';
                    foreach($related_promoted_posts->td_query->posts as $value) {
                        $exclude .= (-1 * $value->ID);
                        $exclude .= ',';
                    }
                    $exclude = substr($exclude, 0, -1);
                ?>
            </div>
        </div>
		<div class="wpb_wrapper td-block-title-wrap td_block_14 td_block_inner">
            <div class="td-column-3 td-pb-span4 width100p">
                <?php echo $td_block_14->render(array('limit' => 3,'category_ids' => -21898, -1 * $promoted_id->term_id, 'post_ids' => $exclude));?>
            </div>
        </div>
        <div class="vc_row wpb_row td-pb-row td-sidebar-guide">
            <div class="wpb_column vc_column_container td-pb-span8">
                <?php echo $td_block_11->render(array('ajax_pagination' => 'load_more', 'offset' => 3, 'category_ids' => -21898, -1 * $promoted_id->term_id, 'post_ids' => $exclude));?>
            </div>
            <div class="wpb_column vc_column_container td-pb-span4">
                <?php echo $td_block_8->render(array('limit' => 4, 'category_ids' => -21898, -1 * $promoted_id->term_id, 'sort' => 'random_posts'));?>
            </div>
        </div>
    </div> <!-- /.td-container -->
</div> <!-- /.td-main-content-wrap -->

<?php

get_footer();