<?php if (!is_single() and !is_page()) { ?>
  <style>
    .bg-white {
      background: white;
      color: black;
      border-radius: 10px;
    }

    .p-8 {
      padding: 2rem;
    }

    .my-16 {
      margin-top: 4rem;
      margin-bottom: 4rem;
    }

    .body-content h1,
    .body-content h2:first-child {
      margin-top: 0;
    }

    .body-content h1,
    .body-content h2 {
      margin-top: 1.25rem;
      margin-bottom: 0.25rem;
      font-size: 1.5rem;
      line-height: 2rem;
      font-weight: 700;
      --tw-text-opacity: 1;
      color: rgb(0 0 0 / var(--tw-text-opacity));
    }

    .body-content p {
      padding-top: 0.25rem;
      padding-bottom: 0.25rem;
    }

    .body-content a {
      --tw-text-opacity: 1;
      color: rgb(59 130 246 / var(--tw-text-opacity));
      text-decoration-line: none;
    }
  </style>
  <?php if (arcadexls_get_option('mtfooterbanner') != '' && !(arcadexls_get_option('mobile_header_slider', 0) && wp_is_mobile()) or arcadexls_get_option('slider-footer') != '' && !(arcadexls_get_option('mobile_header_slider', 0) && wp_is_mobile())) { ?>
    <section class="bnrsld bgco1 clfl rnd5">
      <?php
      if (arcadexls_get_option('mtfooterbanner-switch', 1) == '1') {
        $mtfooterbanner = stripslashes(arcadexls_get_option('mtfooterbanner'));
      ?>
        <section class="bnr728 flol">
          <?php echo $mtfooterbanner; ?>
        </section>
      <?php
      }
      ?>
      <?php if (arcadexls_get_option('slider-footer', 1) == 1) { ?>
        <section class="sldrgmcnt flor pore">
          <div class="sldr-title iconb-hert"><?php printf(__('MOST %sPLAYED%s', 'arcadexls'), '<strong>', '</strong>'); ?></div>
          <ul class="sldrgm">
            <?php
            $games = new WP_Query(array('posts_per_page' => arcadexls_get_option('sortable-sliderft', 20), 'v_sortby' => 'views', 'v_orderby' => 'desc', 'category__in' => arcadexls_get_option('categories-sliderft'), 'tag' => (wp_is_mobile() && arcadexls_get_option('mobile')) ? 'mobile' : ''));

            while ($games->have_posts()) : $games->the_post();
            ?>
              <li style="opacity:0.0">
                <article class="pstcnt rnd5">
                  <figure class="rnd5"><a href="<?php the_permalink(); ?>"><?php myarcade_thumbnail(array('width' => 90, 'height' => 90, 'lazy_load' => arcadexls_get_option('lazy_load'), 'show_loading' => arcadexls_get_option('lazy_load_animation'))); ?><span class="iconb-game rgba1" title="<?php _e('Play', 'arcadexls'); ?>"><span><?php _e('Play', 'arcadexls'); ?></span></span></a></figure>
                </article>
              </li>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
          </ul>
        </section>
      <?php } ?>
    </section>
    <?php if (is_category() and !is_category(array(1))) { ?>
      <?php
      global $wpdb;
      $category = get_category(get_query_var('cat'));
      $cat_id = $category->cat_ID;
      $result = $wpdb->get_results("SELECT * FROM wp_category_custom WHERE category_id = '" . $cat_id . "'");
      ?>

      <?php if (!empty($result[0]->content)) { ?>
        <section>
          <div class="body-content bg-white rounded-2xl p-8 mx-4 my-16">
            <?php echo htmlspecialchars_decode($result[0]->content); ?>
          </div>
        </section>
      <?php } ?>

    <?php
    } ?>

    <?php if (is_front_page() && is_home()) { ?>
      <?php $description_homepage = get_option('description_homepage') ?>
      <?php if ($description_homepage) { ?>
        <section>
          <div class="body-content bg-white rounded-2xl p-8 mx-4 my-16">
            <?php echo html_entity_decode($description_homepage) ?>
          </div>
        </section>
      <?php } ?>
    <?php } ?>

  <?php } ?>
<?php } ?>