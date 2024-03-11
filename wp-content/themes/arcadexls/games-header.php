<style>
  #content-header {
    font-size: 14px;
    padding: 1%;
    overflow: auto;
    margin-bottom: 10px;
    background: #fff;
  }

  #content-header h1 {
    color: black;
    margin: 0;
    padding: 0;
    font-size: 20px;
    font-weight: bold;
  }

  #content-header p {
    margin: 0;
    color: black;
    font-weight: bold;
    float: left;
    padding-top: 1%;
  }
</style>



<?php if (arcadexls_get_option('mtheaderbanner') != '' && !(arcadexls_get_option('mobile_header_slider', 0) && wp_is_mobile())  or arcadexls_get_option('slider-header') != '' && !(arcadexls_get_option('mobile_header_slider', 0) && wp_is_mobile())) { ?>

  <?php if (is_category() and !is_category(array(1))) { ?>
    <?php
    $table_category = $wpdb->prefix . 'category_custom';
    $category = get_category(get_query_var('cat'));
    $result = $wpdb->get_results("SELECT * FROM $table_category WHERE `category_id` = $category->term_id ");
    if ($result) {
      $title = $result[0]->title;
    } else {
      $title = '';
    }

    ?>
    <?php if ($title) { ?>
      <div id="content-header" class="rounded bg-white">
        <h1><?php echo $title ?></h1>
      </div>
    <?php } ?>
  <?php } ?>

  <?php if (is_front_page() && is_home()) { ?>
    <?php $h1Homepage = get_option('h1_homepage');  ?>
    <?php if ($h1Homepage) { ?>
      <div id="content-header" class="rounded bg-white">
        <h1><?php echo $h1Homepage ?></h1>
      </div>
    <?php } ?>
  <?php } ?>

  <?php
  $topCategory = get_option('top_category_homepage');


  ?>
  <h2 style="font-size: 20px; font-weight: bold; color: #fff">Top categories</h2>
  <?php
  if ($topCategory) {
    $arrTopCategory = json_decode(json_encode(json_decode($topCategory)), true); ?>

    <div class="top-cate-homepage">

      <div class="list-top-cate">
        <?php foreach ($arrTopCategory as $category => $status) {
          if ($status == 'true') { ?>
            <a href="<?php echo get_category_link(get_cat_ID($category)) ?>">
              <div class="in-list-top-cate"><?php echo ucfirst(str_replace('-', ' ', $category)) ?></div>
            </a>
        <?php }
        } ?>
      </div>
    </div>
  <?php }
  ?>

  <?php if (is_category() and !is_category(array(1))) { ?>

    <?php
    $category = get_category(get_query_var('cat'));
    $queryGet = "SELECT * FROM " . $wpdb->prefix . 'top_game_category WHERE category_id = "' . $category->term_id . '"';
    $resultTopGame = $wpdb->get_results($queryGet);

    if (empty($resultTopGame)) {
      $listTopGame = array();
    } else {
      if (empty($resultTopGame[0]->game)) {
        $listTopGame = array();
      } else {
        $listTopGame = explode(',', $resultTopGame[0]->game);
      }
    }

    ?>
    <div class="top-cate-homepage">
      <h2 style="font-size: 20px; font-weight: bold; color: #fff">Top games</h2>
      <div class="list-top-cate">
        <?php foreach ($listTopGame as $post_id) {
          $img_url = get_post_meta($post_id, 'mabp_thumbnail_url');
        ?>

          <article class="games" style="margin-left: 30px">
            <a href="<?php get_permalink($post_id) ?>" data-hasqtip="27" oldtitle="<?php echo get_the_title($post_id) ?>" title="">
              <div class="thumb">
                <div class="play">
                  <span class="icon icon-link"></span>
                </div>

                <img src="<?php echo $img_url[0] ?>" width="100" height="100" alt="<?php echo get_the_title($post_id) ?>">
              </div>
            </a>
          </article>
        <?php } ?>
      </div>
    </div>
  <?php } else { ?>
    <?php $args = array(
      'posts_per_page'   => -1,
      'post_type'        => 'post',
      'meta_key'         => 'top_game_homepage',
      'meta_value'       => '1'
    );

    $query = new WP_Query($args);

    ?>
    <div class="top-cate-homepage">
      <h2 style="font-size: 20px; font-weight: bold; color: #fff">Top games</h2>
      <div class="list-top-cate">
        <?php foreach ($query->posts as $post) {
          $img_url = get_post_meta($post->ID, 'mabp_thumbnail_url');
        ?>

          <article class="games" style="margin-left: 30px">
            <a href="<?php get_permalink($post->ID) ?>" data-hasqtip="27" oldtitle="<?php echo $post->post_title ?>" title="">
              <div class="thumb">
                <div class="play">
                  <span class="icon icon-link"></span>
                </div>

                <img src="<?php echo $img_url[0] ?>" width="100" height="100" alt="<?php echo $post->post_title ?>">
              </div>
            </a>
          </article>
        <?php } ?>
      </div>
    </div>
  <?php } ?>

  <section class="bnrsld bgco1 clfl rnd5">
    <?php if (arcadexls_get_option('mtheaderbanner-switch', 1) == '1') { ?>
      <?php
      $mtheaderbanner = stripslashes(arcadexls_get_option('mtheaderbanner'));
      ?>
      <!--<bnr728>-->
      <section class="bnr728 flol">
        <?php echo $mtheaderbanner; ?>
      </section>
      <!--</bnr728>-->
    <?php } ?>
    <?php if (arcadexls_get_option('slider-header', 1) == 1) { ?>
      <!--<sldrcnt>-->
      <section class="sldrgmcnt flor pore">
        <div class="sldr-title iconb-hert"><?php printf(__('MOST %sPOPULAR%s', 'arcadexls'), '<strong>', '</strong>'); ?></div>
        <ul class="sldrgm">
          <?php
          $games = new WP_Query(array('posts_per_page' => arcadexls_get_option('sortable-sliderhd', 20), 'r_sortby' => 'most_rated', 'r_orderby' => 'desc', 'category__in' => arcadexls_get_option('categories-sliderhd'), 'tag' => (wp_is_mobile() && arcadexls_get_option('mobile')) ? 'mobile' : ''));
          while ($games->have_posts()) : $games->the_post();
          ?>
            <!--<game>-->
            <li style="opacity:0.0">
              <article class="pstcnt rnd5">
                <figure class="rnd5"><a href="<?php the_permalink(); ?>"><?php myarcade_thumbnail(array('width' => 90, 'height' => 90, 'lazy_load' => arcadexls_get_option('lazy_load'), 'show_loading' => arcadexls_get_option('lazy_load_animation'))); ?><span class="iconb-game rgba1" title="<?php _e('Play', 'arcadexls'); ?>"><span><?php _e('Play', 'arcadexls'); ?></span></span></a></figure>
              </article>
            </li>
            <!--</game>-->
          <?php
          endwhile;
          wp_reset_postdata();
          ?>
        </ul>
      </section>
      <!--</sldrcnt>-->
    <?php } ?>
  </section>
  <!--</bnrsld>-->
<?php } ?>
<?php if (is_category() and !is_category(array(1))) { ?>
  <?php echo arcadexls_breadcumb(); ?>

  <div class="title bg bgco1 rnd5">
    <h1><?php echo single_cat_title("", false); ?></h1>
  </div>
<?php } ?>