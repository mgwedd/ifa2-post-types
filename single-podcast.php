<?php
/**
* WHAT: IFA Podcast CTP Template
* WHEN: June 2019
* WHY: Because previously we were using a virtualized template based merely on a blog post. 
* WHO (author): Michael Wedd
* NOTES: This post type is registered in the must-use plugin "IFA Custom Post Types," located at: ../mu-plugins/ifa-post-types.php
* This template (a hack) is completely dependant on the Newspaper theme. 
* I've made efforts to reduce this templates dependency on other theme files in order to reduce complexity,
* by pulling the code from previously referenced files into this file.  
* Updates to the Newspaper theme could break this template. Fun right? TBD!
*/
    locate_template('includes/wp_booster/td_single_template_vars.php', true);
    get_header();

    global $loop_module_id, $loop_sidebar_position, $post, $td_sidebar_position;

    $td_mod_single = new td_module_single($post);
    $td_block_11 = new td_block_11();
    $td_block_14 = new td_block_14();
    $td_block_8 = new td_block_8();
    // for trending article filter.
    $promoted_id = get_term_by('slug', 'promoted', 'category');
    $related_promoted_posts = $td_mod_single->related_promoted_posts();
?>
<!-- Styles are placed here a) to limit the scope of these modifications to this template, not all posts, since there are mods to theme-level elements, 
and b) to decouple the template as much as possible from the theme. There is some cost to load speed but nothing major.
Some tyles are declared inline to wrestle control from the theme.-->
<style>
.wp_ulike_general_class, .sidebar-share-text, .wp-caption-text, .td-category, .td-social-sidebar, .td-crumb-container {
  display: none !important;
}
.entry-thumb, .wp-caption-text {
  margin: 0 !important;
}
.td-module-meta-info {
  position: relative ;
}
.podcast-background-image {
    height: 100%; 
    width: 100%; 
    position: absolute;
    background-image: url('https://staging-iotforall.kinsta.cloud/wp-content/uploads/2019/06/IFA-Podcast_Background_Yellow-3.png');
    background-size: cover;
    background-repeat: no-repeat;
}
.td-post-image {
  opacity: 0.2;
}
.wp-caption-text {
  padding-left: 5px; 
}
.podcast-background-image .entry-thumb {
  height: 400px;
}
.podcast-title-section-container {
    display: flex; 
    justify-content: space-between; 
    align-items: center;
}
.podcast-title-background {
    width: 100%; 
    height: 400px; 
    position: relative; 
    display: flex; 
    flex-direction: column; 
}
.podcast-title-container {
  max-width: 40%;
  z-index: 1;
}
.td-post-header {
  max-width: 1065px;
  padding-top: 50px; 
  bottom: 0;
  align-self : center;
}
.entry-title {
  font-family: 'Open Sans', sans-serif; 
  color: #000; 
  font-size: 30px; 
  line-height: 30px; 
  font-weight: 800;
  top: 50%;
}
.podcast-featured-image-container {
  height: auto; 
}
.podcast-featured-image-container img {
  border-radius: 5px;
  box-shadow: 2px 2px 20px 0 rgba(0, 0, 0, 0.2);
  height: 300px;
  width: auto;
} 
@media only screen and (max-width: 1025px) {
  .podcast-title-section-container {
      flex-direction: column-reverse;
      align-items: center;
      max-width: 500px;
  }
  .podcast-title-container {
      max-width: 100%;
      padding-left: 0;
      padding-right: 0;
      max-width: 100%;
  }
  .entry-title {
      font-size: 16px;
  }
  .td-post-header {
      top: 10px;
      height: 100%;
      bottom: initial;
  }
  .podcast-featured-image-container img {
      height: 250px;
  }
  .td-module-meta-info {
      display: flex;
      padding-top: 5px;
      justify-content: center;
  }
  .td-post-date {
      margin-left: 0px !important;
  }
}
@media only screen and (max-width: 875px) {
  .podcastsubscribe {
      display: none;
  }
}
</style>
<?php
    if (have_posts()) {
        the_post();
        $td_mod_single = new td_module_single($post);
        global $loop_sidebar_position;
        echo $td_mod_single->get_social_sharing_side();
?>
        <div class="td-main-content-wrap">
            <!-- Zaz's podcast title block here -->
            <div class="podcast-title-background">
                <div class="podcast-background-image">
                </div>
                <div class="td-post-header">
                    <header class="td-post-title">
                        <div class="podcast-title-section-container">
                            <div class="podcast-title-container">
                                <?php echo $td_mod_single->get_title();?> 
                            </div>
                            <div class="podcast-featured-image-container">
                                <?php echo $td_mod_single->get_image(td_global::$load_featured_img_from_template); ?>
                            </div>
                        </div>
                        <div class="td-module-meta-info" style="max-width: 150px;">
                            <?php echo $td_mod_single->get_date(false);?>
                            <?php echo $td_mod_single->get_views();?>
                        </div>
                    </header>
                </div>
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
        // this else is for when there's no podcast post to render. See the if() above of which this block is the else.
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
                </div> <!-- /.td-pb-row -->
                <div class="wpb_wrapper td-block-title-wrap td_block_14 td_block_inner">
                    <!-- This is a custom title "More Podcasts" for the filter/block immediately below. -->
                    <!-- The crazy inline bordering with the spans is to replicate Zaz's two-tone bottom border for the filter section titles -->
                    <h4 class="td-block-title">
                        <span class="td-pulldown-size more-podcasts-block" style="font-weight: 550; display: flex;">
                            <span style="border-bottom: 2px solid #2ec9b9;">More</span>
                            <span style="border-bottom: 2px solid #F5F5F5; width: 100%; padding-left: 5px;"> Podcasts</span>
                        </span>
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
                        <span class="td-pulldown-size trending-block-title" style="font-weight: 550; display: flex; padding-left: 22px;">
                            <span style="border-bottom: 2px solid #2ec9b9;">Tren</span>
                            <span style="border-bottom: 2px solid #F5F5F5; width: 100%; margin-right: 22px;">ding</span>
                        </span>
                    </h4>
                    <div class="wpb_column vc_column_container td-pb-span4">
                        <?php echo $td_block_8->render(array('limit' => 4, 'category_ids' => -21898, -1 * $promoted_id->term_id));?>
                    </div>
                </div>
            </div> <!-- /.td-container -->
        </div> <!-- /.td-main-content-wrap -->
<?php
    get_footer();
?>