<?php echo arcadexls_breadcumb($type = 1); ?>

<header class="title title-play bg bgco1 rnd5">
  <h1><?php the_title(); ?></h1>
  <span class="iconb-prev" data-tooltip="tooltip" data-placement="top" title="<?php _e('Prev game', 'arcadexls'); ?>"><?php previous_post_link('%link', __('Prev game', 'arcadexls')); ?></span>
  <span class="iconb-next" data-tooltip="tooltip" data-placement="top" title="<?php _e('Next game', 'arcadexls'); ?>"><?php next_post_link('%link', __('Next game', 'arcadexls')); ?></span>
</header>

<section class="game-brcn bgdg1 clfl rnd5 shdw1">
  <?php if (function_exists('the_ratings')) { ?>
    <div class="flol">
      <span class="iconb-rate"><?php printf(__('%sRATE%s THIS GAME:', 'arcadexls'), '<strong>', '</strong>'); ?></span>
      <div class="votcnt">
        <?php the_ratings(); ?>
      </div>
    </div>
  <?php } ?>
  <div class="flor">
    <?php if (function_exists('wpfp_link')) {
      echo arcadexls_countfav();
    } ?><?php if (function_exists('the_views')) { ?><span class="iconb-game"><?php the_views(); ?></span><?php } ?>
  </div>
</section>

<section class="game">
  <?php get_template_part('games', 'buttons'); ?>
  <div class="gamecnt">
    <div class="game_play" id="object_juego" <?php if (arcadexls_get_option('progress-bar', 1) == 1) { ?> style="display:none<?php } ?>">
      <?php
      if (function_exists('get_game')) { ?>
        <?php
        $embedcode = get_game($post->ID);
        global $mypostid;
        $mypostid = $post->ID;
        echo myarcade_get_leaderboard_code();
        echo $embedcode;
        ?>
      <?php } ?>
    </div>
    <?php
    if (arcadexls_get_option('progress-bar', 1) == 1) {
    ?>
      <div class="game_load gameload">
        <?php
        if (arcadexls_get_option('mtgameprebanner-switch', 1) == '1') {
          $mtgameprebanner = stripslashes(arcadexls_get_option('mtgameprebanner'));
        ?>
          <div class="bnr300">
            <?php echo $mtgameprebanner; ?>
          </div>
        <?php } ?>
        <div id="progressbar">
          <div class="progress" style="width: 0%;"><span>0 %</span></div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="lgtbxbg-pofi"></div>
</section>

<?php $countscreen = myarcade_count_screenshots(); ?>
<section class="blkcnt bgco2">
  <ul class="bltitl lstabs lstli">
    <?php $str = 'Detailed description of the ' . get_the_title() ?>
    <li class="active"><a href="#gamtab1" data-toggle="tab"><strong>1</strong> <span><?php _e($str, 'arcadexls'); ?></span></a></li>
    <li><a href="#gamtab2" data-toggle="tab"><strong>2</strong> <span><?php _e('INSTRUCTIONS', 'arcadexls'); ?></span></a></li><?php if (function_exists("myarcadecontrols_output")) {
                                                                                                                                  $controls = myarcadecontrols_output(); ?>
      <?php if (!empty($controls)) { ?>
        <li><a href="#myarcadecontrolstab" data-toggle="tab"><strong>3</strong> <span><?php _e('CONTROLS', 'arcadexls'); ?></span></a></li>
      <?php } ?>
    <?php } ?>
    <?php $countcomments = get_comments_number(); ?>
    <li><a href="#commentstab" data-toggle="tab"><strong>4</strong> <span><?php _e('COMMENTS', 'arcadexls'); ?> <strong><?php echo $countcomments; ?></strong></span></a></li>
    <?php if ($countscreen > 0) { ?>
      <li class="screenclk"><a href="#gamtab4" data-toggle="tab"><strong>5</strong> <span><?php _e('SCREENSHOTS', 'arcadexls'); ?> <strong><?php echo $countscreen; ?></strong></span></a></li>
    <?php } ?>
    <?php $video = myarcade_video(); ?>
    <?php if (arcadexls_get_option('display-game-video', 1) == 1 && $video) { ?>
      <li><a href="#videotab" data-toggle="tab"><strong>6</strong> <span><?php _e('Video', 'arcadexls'); ?></span></a></li>
    <?php } ?>
  </ul>
  <div class="lstabcn_cn">
    <ul class="lstabcn tab-content">
      <li class="tab-pane fade in active" id="gamtab1">
        <article class="game-info">
          <section class="blcnbx">
            <figure class="imgcnt"><?php myarcade_thumbnail(array('width' => 130, 'height' => 130, 'lazy_load' => arcadexls_get_option('lazy_load'), 'show_loading' => arcadexls_get_option('lazy_load_animation'))); ?></figure>
            <section>
              <?php
              $get_post_meta = get_post_meta(get_the_ID());
              $date = get_the_modified_date('F j, Y', get_the_ID());
              $dateTime = get_the_modified_date('Y-m-d', get_the_ID());

              ?>
              <style>
                .stats-wrapper {
                  display: flex;
                  flex-wrap: wrap;
                }

                .game-meta {
                  display: table;
                  flex-grow: 1;
                  line-height: 2;
                }

                .meta-row {
                  display: table-row;
                  width: 100%;
                }

                .meta-label {
                  border-top: #ddd solid 1px;
                }

                .meta-value {
                  display: table-cell;
                  border-top: #ddd solid 1px;
                  padding: 0 10px;
                  text-align: left;
                  width: 50%;
                }
              </style>
              <div class="stats-wrapper">
                <ul class="game-meta info">
                  <li class="meta-row">
                    <div class="meta-label subtle">Game Type</div>
                    <div class="meta-value"><?php echo $get_post_meta['mabp_game_type'][0] ?></div>
                  </li>
                  <li class="meta-row">
                    <div class="meta-label subtle">Technology</div>
                    <div class="meta-value"><?php echo $get_post_meta['mabp_technology'][0] ?></div>
                  </li>
                  <li class="meta-row">
                    <div class="meta-label subtle">Supported Devices</div>
                    <div class="meta-value"><?php echo $get_post_meta['mabp_supported'][0] ?></div>
                  </li>
                  <li class="meta-row">
                    <div class="meta-label subtle">Game Resolution</div>
                    <div class="meta-value"><?php echo $get_post_meta['mabp_width'][0] ?> x <?php echo $get_post_meta['mabp_height'][0] ?></div>
                  </li>
                </ul>
                <ul class="game-meta info">
                  <li class="meta-row">
                    <div class="meta-label subtle">Last Updated</div>
                    <div class="meta-value">
                      <time datetime="<?php echo $dateTime ?>"><?php echo $date ?></time>
                    </div>
                  </li>
                  <li class="meta-row">
                    <div class="meta-label subtle">Play Count</div>
                    <div class="meta-value"><?php echo $get_post_meta['myarcade_plays'][0] ?></div>
                  </li>
                  <li class="meta-row">
                    <div class="meta-label subtle">Platform</div>
                    <div class="meta-value"><?php echo $get_post_meta['mabp_platform'][0] ?></div>
                  </li>
                  <li class="meta-row">
                    <div class="meta-label subtle">Rating</div>
                    <div class="meta-value"><?php echo $get_post_meta['mabp_rating'][0] ?>%</div>
                  </li>
                </ul>
              </div>
            </section>
            <section>
              <p><strong><?php _e('Description:', 'arcadexls'); ?></strong></p>
              <p><?php myarcade_description(); ?></p>
            </section>
          </section>
          <footer>
            <span class="iconb-date"><?php _e('Uploaded on:', 'arcadexls'); ?> <strong><?php echo get_the_date('d'); ?> <?php echo get_the_date('M'); ?> , <?php echo get_the_date('Y'); ?></strong></span> <span class="iconb-user"><?php _e('Uploader:', 'arcadexls'); ?> <a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php the_author_meta('display_name', $post->post_author); ?></a></span> <span class="iconb-cate"><?php _e('Categories:', 'arcadexls'); ?> <?php echo get_the_category_list(', '); ?></span> <span class="iconb-comt"><?php printf(__('Comments: <strong>%s</strong>', 'arcadexls'), get_comments_number()); ?></span> <?php echo get_the_tag_list('<span class="iconb-tags">' . __('Tags:', 'arcadexls') . ' ', ', ', '</span>'); ?>
          </footer>
        </article>
      </li>
      <li class="tab-pane fade" id="gamtab2">
        <article class="game-info">
          <section class="blcnbx">
            <section>
              <p><strong><?php _e('Instructions:', 'arcadexls'); ?></strong></p>
              <p><?php myarcade_instructions(); ?></p>
            </section>
          </section>
        </article>
      </li>

      <?php if (function_exists("myarcadecontrols_output")) { ?>
        <?php if (!empty($controls)) { ?>
          <li class="tab-pane fade" id="myarcadecontrolstab">
            <article class="game-info">
              <section class="blcnbx">
                <section>
                  <?php echo $controls; ?>
                </section>
              </section>
            </article>
          </li>
        <?php } ?>
      <?php } ?>

      <li class="tab-pane fade" id="commentstab">
        <?php comments_template(); ?>
      </li>
      <?php if ($countscreen > 0) { ?>
        <li class="tab-pane fade" id="gamtab4">
          <div class="blcnbx scrlbr">
            <ul class="pstgms lstli">
              <?php myarcade_all_screenshots(130, 130, 'screen_thumb'); ?>
            </ul>
          </div>
        </li>
      <?php } ?>
      <?php if (arcadexls_get_option('display-game-video', 1) == 1 && $video) { ?>
        <li class="tab-pane fade" id="videotab">
          <div class="blcnbx scrlbr">
            <?php echo $video; ?>
          </div>
        </li>
      <?php } ?>
    </ul>
  </div>
</section>

<section>
  <div style="display: none;">
    <?php
    $related = get_posts(array('category__in' => wp_get_post_categories(the_ID()), 'numberposts' => 10, 'post__not_in' => array(the_ID())));

    ?>
  </div>

  <p style="font-size: 18px; color: white; font-weight: bold;">Related Game</p>
  <ul id="content" class="pstgms lstli" style="margin-top: 20px;">
    <?php foreach ($related as $record) { ?>
      <?php $check_type = get_post_meta($record->ID, 'mabp_game_type', true); ?>
      <?php if ($check_type != null) { ?>
        <li class="post">
          <article class="pstcnt bgco1 rnd5">
            <figure class="rnd5"><a href="<?php echo get_permalink($record->ID) ?>"><img src="<?php echo get_post_meta($record->ID, 'mabp_thumbnail_url')[0]; ?>" width="100" height="100" alt="<?php echo get_the_title($record->ID) ?>"></a></figure>
            <header>
              <h2><a href="<?php echo get_permalink($record->ID) ?>"><?php echo get_the_title($record->ID) ?></a></h2>
              <a class="iconb-game" href="<?php echo get_permalink($record->ID) ?>" title="Play"><span>Play</span></a>
            </header>
          </article>
        </li>
    <?php }
    } ?>
  </ul>
</section>

<section>
  <?php $categories = get_categories(); ?>
  <p style="font-size: 18px; color: white; font-weight: bold;">Other Category</p>
  <div class="list-top-cate">
    <?php foreach ($categories as $cate) { ?>
      <a href="<?php echo get_category_link($cate->cat_ID) ?>">
        <div class="in-list-top-cate" style="margin:15px"><?php echo $cate->name ?></div>
      </a>
    <?php } ?>
  </div>
</section>