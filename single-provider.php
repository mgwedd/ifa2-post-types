<?php
/**
* WHAT: IFA PROVIDER CTP Template
* WHEN: June 2019
* WHY: Because we need one for IFA 2.
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
.wp_ulike_general_class, 
.sidebar-share-text, 
.wp-caption-text, 
.td-category, 
.td-social-sidebar, 
.td-crumb-container, 
.swp_social_panel {
  display: none !important;
}
.entry-title {
  font-family: 'Open Sans', sans-serif; 
  text-align: center;
  color: #000; 
  font-size: 30px; 
  line-height: 30px; 
  font-weight: 800;
}
.provider-practices-container {
    display: flex;
}
.provider-practices {
    background-color: #ecf0f3; 
    color: #9b9cac; 
    display: flex; 
    border-radius: 4px; 
    font-weight: 400; 
    font-size: 14px;
    cursor: pointer; 
    margin-right: 8px;
    padding: 2px 15px;
}
.see-solutions-button {
    background-color: #22af96; 
    color: white; 
    height: 38px; 
    border: 0; 
    border-radius: 4px; 
    cursor: pointer;
}
.see-solutions-link {
    text-decoration: none; 
    color: white; 
    font-size: 14px; 
    padding: 9px 15px; 
}
.gray-divider-above-top-bar {
    background-color: #edf0f3; 
    width: 100%; 
    height: 102px;
}
.provider-top-bar {
    background-color: #fff; 
    width: 100%; 
    height: 64px; 
    display: flex; 
    align-items: center;
    justify-content: space-around; 
    box-shadow: 1px 1px 3px 0 rgba(0, 0, 0, 0.1); 
}
.top-bar-content-container {
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    height: 100%; 
    width: 100%; 
    max-width: 1000px;
}
.logo-and-practices-container {
    display: flex; 
    align-items: center;
}
.provider-logo {
    border-radius: 100px; 
    width: 100px; 
    height: 100px; 
    background-color: #fff; 
    box-shadow: 1px 1px 3px 0 rgba(0, 0, 0, 0.25); 
    margin-right: 32px;
}
</style>
<?php
    if (have_posts()) {
        the_post();
        $td_mod_single = new td_module_single($post);
        global $loop_sidebar_position;
        echo $td_mod_single->get_social_sharing_side(); // potentially cut this out
?>
        <!-- BEGIN TOP SECTION (ABOVE BODY) -->
        <section class="td-main-content-wrap">
            <div class="gray-divider-above-top-bar"></div>
                <div class="provider-top-bar">
                    <div class="top-bar-content-container">
                    <div class="logo-and-practices-container">
                        <div class="provider-logo">
                            <?php echo $td_mod_single->get_image(td_global::$load_featured_img_from_template); ?>
                        </div>
                        <!-- hardcoded categories for now. figure this out later dynamically. -->
                        <div class="provider-practices-container" >
                            <div class="provider-practices">Software Platform</div>
                            <div class="provider-practices">System Integrator</div>
                        </div>
                    </div>
                    <button class="see-solutions-button">
                        <!-- the link here will need to dynamically map author name to their solutions page, and then fetch that url. Yikes. -->
                        <a href="#" class="see-solutions-link">
                            See Our Solutions
                        </a>
                    </button>
                </div>
            </div>
        </section>
            <div class="td-post-header">
                <header class="td-post-title provider-title-section-container">
                    <div class="provider-title-container">
                        <?php echo $td_mod_single->get_title(); ?> 
                    </div>
                </header>
            </div>
        <!-- END TOP SECTION || BELOW IS THE MAIN POST BODY -->
        <div class="td-container td-post-template-default <?php echo $td_sidebar_position; ?>">
            <div class="td-crumb-container"><?php echo td_page_generator::get_single_breadcrumbs($td_mod_single->title); ?></div>
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
                                    <div class="td-post-source-tags">
                                        <?php echo $td_mod_single->get_source_and_via();?>
                                        <?php echo $td_mod_single->get_the_tags();?>
                                    </div>
                                </footer>
                            </article> 
                            <!-- END provider MAIN POST TEMPLATE -->
<?php
    } else {
        // this else is for when there's no provider post to render. See the if() above of which this block is the else.
        echo td_page_generator::no_posts();
    }
    comments_template('', false);
?>
                    </div>
                </div>
                <div class="td-pb-span4 td-main-sidebar" role="complementary">
                    <div class="td-ss-main-sidebar">
                    <!-- BEGIN provider Subscribe Custom Static Sidebar -->
                    <!-- CHANGE THIS TO THE QUICK LINKS SIDEBAR -->
                    </div>
                </div> <!-- /.td-pb-row -->
            <div class="wpb_wrapper td-block-title-wrap td_block_14 td_block_inner">
                <!-- This is a custom title "More providers" for the filter/block immediately below. -->
                <!-- The crazy inline bordering with the spans is to replicate Zaz's two-tone bottom border for the filter section titles -->
                <h4 class="td-block-title">
                    <span class="td-pulldown-size more-providers-block" style="font-weight: 550; display: flex;">
                        <span style="border-bottom: 2px solid #2ec9b9;">More</span>
                        <span style="border-bottom: 2px solid #F5F5F5; width: 100%; padding-left: 5px;"> providers</span>
                    </span>
                </h4>
                <!-- The td-column-3 div below renders the row of related providers immediately below the body of the post/provider  -->
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