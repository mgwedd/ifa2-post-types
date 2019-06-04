<?php

    locate_template('includes/wp_booster/td_single_template_vars.php', true);

    get_header();

    global $loop_module_id, $loop_sidebar_position, $post, $td_sidebar_position;

    $td_mod_single = new td_module_single($post);
    $td_block_11 = new td_block_11();
    $td_block_14 = new td_block_14();
    $td_block_8 = new td_block_8();
?>

<?php

    if (have_posts()) {
        the_post();
        $td_mod_single = new td_module_single($post);
        global $loop_sidebar_position;
        echo $td_mod_single->get_social_sharing_side();
?>
        <!-- The below div renders the post from a default template (loop) with one of three sidebar configurations (switch) -->
        <div class="td-main-content-wrap">
            <!-- Zaz's podcast title block here -->
            <div style="background-color: lightyellow; width: 100%; height: 350px;">
                <div class="td-post-header" style="padding-left: 75px; padding-right: 75px; padding-top: 25px;">
                    <?php echo $td_mod_single->get_category(); ?>
                    <!-- POST TITLE. In this <header> below, you can insert Zaz's podcast template block, 
                    in a conditional PHP section for that post type -->
                    <header class="td-post-title">
                        <div class="podcast-title-section-container" style="display: flex; justify-content: space-between; padding-right: 100px; padding-left: 45px;">
                            <!-- flex the title / image container. give it a background. make it look like zaz's thing -->
                            <div class="podcast-title-container" style="max-width: 40%;">
                                <?php echo $td_mod_single->get_title();?> 
                                <!-- <hr style="width: 150px;"> FIX-->
                            </div>
                            <!-- The featured image is stacked on top of the sidebar simply so that it has the correct alignment automatically, 
                            given the design from Zaz. Regardless, it's considered semantically part of the "podcast-title-section-container" area-->
                            <div class="podcast-featured-image-container" style="max-width: 30%; height: auto; display: inline-block;">
                                <!-- TODO: Remove the extra margin at the bottom that's being added in figacption, td-featured-img img, etc, in the style.css later -->
                                <?php echo $td_mod_single->get_image(td_global::$load_featured_img_from_template); ?>
                            </div>
                        </div>
                        <?php 
                            if (!empty($td_mod_single->td_post_theme_settings['td_subtitle'])) { ?>
                                <p class="td-post-sub-title"><?php echo $td_mod_single->td_post_theme_settings['td_subtitle'];?></p>
                        <?php 
                            } 
                        ?>
                        <div class="td-module-meta-info" style="display: flex; padding-left: 45px;">
                            <?php echo $td_mod_single->get_date(false);?>
                            <div style="margin-left: 20px;">
                                <?php echo $td_mod_single->get_views();?>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
            <div class="td-container td-post-template-default <?php echo $td_sidebar_position; ?>">
                <div class="td-crumb-container"><?php echo td_page_generator::get_single_breadcrumbs($td_mod_single->title); ?></div>

                <!-- BEGIN MAIN PODCAST TEMPLATE -->
                <div class="td-pb-row">
                    <div class="td-pb-span8 td-main-content" role="main">
                        <div class="td-ss-main-content">

                                <article id="post-<?php echo $td_mod_single->post->ID;?>" class="<?php echo join(' ', get_post_class());?>" <?php echo $td_mod_single->get_item_scope();?>>
                                    
                                    <?php echo $td_mod_single->get_social_sharing_top();?>

                                    <div class="td-post-content">

                                    <?php echo $td_mod_single->get_content();?>
                                    </div>

                                    <footer>
                                        <?php echo $td_mod_single->get_post_pagination();?>
                                        <?php echo $td_mod_single->get_review();?>

                                        <div class="td-post-source-tags">
                                            <?php echo $td_mod_single->get_source_and_via();?>
                                            <?php echo $td_mod_single->get_the_tags();?>
                                        </div>
                                    </footer>

                                </article> 
                                <!-- END PODCAST MAIN POST TEMPLATE -->
                                <?php
                                    } else {
                                        // this else is for when there's no podcast post to render
                                        echo td_page_generator::no_posts();
                                    }
                                    comments_template('', false);
                                ?>
                        </div>
                    </div>
                    <div class="td-pb-span4 td-main-sidebar" role="complementary">
                        <div class="td-ss-main-sidebar">
                        <!-- BEGIN Podcast Subscribe Custom Static Sidebar -->
                            <div style="margin-top: 140px;">
                                <div class="podcastsubscribe">
                                    <div class="podcastheaderholder">
                                        <h1 class="podcastheader podcast">SUBSCRIBE TO OUR PODCAST</h1>
                                    </div>
                                    <div class="parentgreybox">
                                        <a href="https://itunes.apple.com/us/podcast/iot-for-all/id1450973480" target="_blank" class="podcastlink w-inline-block">
                                            <div class="greybackgrounddiv">
                                            <div class="podcastimagediv itunes"></div>
                                            <div class="podcastplatformtext">Apple Podcasts</div>
                                            </div>
                                        </a>
                                        <a href="https://soundcloud.com/iotforall" target="_blank" class="podcastlink w-inline-block">
                                            <div class="greybackgrounddiv">
                                            <div class="podcastimagediv soundcloud2"></div>
                                            <div class="podcastplatformtext">SoundCloud</div>
                                            </div>
                                        </a>
                                        <a href="https://www.google.com/podcasts?feed=aHR0cHM6Ly9yc3Muc2ltcGxlY2FzdC5jb20vcG9kY2FzdHMvNzY2MS9yc3M" target="_blank" class="podcastlink w-inline-block">
                                            <div class="greybackgrounddiv">
                                            <div class="podcastimagediv"></div>
                                            <div class="podcastplatformtext">Google Podcasts</div>
                                            </div>
                                        </a>
                                        <a href="https://www.stitcher.com/s?fid=364223&amp;refid=stpr" target="_blank" class="podcastlink w-inline-block">
                                            <div class="greybackgrounddiv">
                                            <div class="podcastimagediv stitcher"></div>
                                            <div class="podcastplatformtext">Stitcher</div>
                                            </div>
                                        </a>
                                        <a href="https://open.spotify.com/show/0jYLPvfCrBZVCwM5a7aldP?si=wfRmCM8oSLW2ffeAx-LTuw" target="_blank" class="podcastlink w-inline-block">
                                            <div class="greybackgrounddiv">
                                            <div class="podcastimagediv spotify"></div>
                                            <div class="podcastplatformtext">Spotify</div>
                                            </div>
                                        </a>
                                        <a href="https://iotforallpodcast.simplecast.fm/" target="_blank" class="podcastlink w-inline-block">
                                            <div class="greybackgrounddiv">
                                            <div class="podcastimagediv simplecast"></div>
                                            <div class="podcastplatformtext">Simplecast</div>
                                            </div>
                                        </a>
                                        <a href="http://tun.in/pjiuK" target="_blank" class="podcastlink w-inline-block">
                                            <div class="greybackgrounddiv">
                                            <div class="podcastimagediv tunein"></div>
                                            <div class="podcastplatformtext">Tunein</div>
                                            </div>
                                        </a>
                                        <a href="https://overcast.fm/itunes1450973480/iot-for-all-podcast" target="_blank" class="podcastlink w-inline-block">
                                            <div class="greybackgrounddiv">
                                            <div class="podcastimagediv overcast"></div>
                                            <div class="podcastplatformtext">Overcast</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!-- END Podcast Subscribe Custom Static Sidebar -->
                    </div>
                </div> 
                <!-- /.td-pb-row -->

                <div class="wpb_wrapper td-block-title-wrap td_block_14 td_block_inner">
                    <!-- This is a custom title "More Podcasts" for the filter/block immediately below. -->
                    <h4 class="td-block-title">
                        <span class="td-pulldown-size" style="font-weight: 550; "><span style="border-bottom: 2px solid #2ec9b9;">More</span> Podcasts</span>
                    </h4>
                    <!-- The td-column-3 div below renders the row of related podcasts immediately below the body of the post/podcast  -->
                    <div class="td-column-3 td-pb-span4 width100p">
                        <?php echo $td_block_14->render(array('limit' => 3,'category_ids' => 45));?>
                    </div>
                </div>
                <div class="vc_row wpb_row td-pb-row td-sidebar-guide">
                    <div class="wpb_column vc_column_container td-pb-span8">
                        <?php echo $td_block_11->render(array('ajax_pagination' => 'load_more', 'offset' => 3, 'category_ids' => 45));?>
                    </div>
                    <!-- This is a custom title "Trending" for the filter/block immediately below. -->
                    <h4 class="td-block-title">
                        <span class="td-pulldown-size" style="font-weight: 550; "><span style="border-bottom: 2px solid #2ec9b9;">Trend</span>ing</span>
                    </h4>
                    <div class="wpb_column vc_column_container td-pb-span4">
                        <?php echo $td_block_8->render(array('limit' => 4, 'category_ids' => 45, 'sort' => 'random_posts'));?>
                    </div>
                </div>
            </div> <!-- /.td-container -->
        </div> <!-- /.td-main-content-wrap -->
<?php
    get_footer();
?>

<!-- This hides James' like fire button. Is there a better way to do this? Can we actually exclude it from this post type deeper in the theme? -->
<style>
.wp_ulike_general_class, .sidebar-share-text {
    display: none;
}

.entry-thumb, .wp-caption-text {
    /* can you just stop this from applying in the first place in style.css? */
    margin: 0 !important;
}

.wp-caption-text {
    padding-left: 5px; 
}

.entry-thumb {
    box-shadow: 0 16px 32px 0 rgba(0,0,0,0.2);
}

</style>