<?php

    locate_template('includes/wp_booster/td_single_template_vars.php', true);

    get_header();

    global $loop_module_id, $loop_sidebar_position, $post, $td_sidebar_position;

    $td_mod_single = new td_module_single($post);
    $td_block_11 = new td_block_11();
    $td_block_14 = new td_block_14();
    $td_block_8 = new td_block_8();

?>

<!-- The below div renders the post from a default template (loop) with one of three sidebar configurations (switch) -->
<div class="td-main-content-wrap">
    <div class="td-container td-post-template-default <?php echo $td_sidebar_position; ?>">
        <div class="td-crumb-container"><?php echo td_page_generator::get_single_breadcrumbs($td_mod_single->title); ?></div>

        <!-- The default template -->
        <div class="td-pb-row">
            <div class="td-pb-span8 td-main-content" role="main">
                <div class="td-ss-main-content">
                    <?php
                        // Couldn't we insert a modified loop template here to have further control over the cust post type body?
                        // Update: doesn't quite work. not sure.
                        locate_template('loop-single.php', true);
                        comments_template('', false);
                    ?>
                </div>
            </div>
            <div class="td-pb-span4 td-main-sidebar" role="complementary">
                <div class="td-ss-main-sidebar">
            <!-- BEGIN Podcast Subscribe Custom Static Sidebar -->
                    <div>
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