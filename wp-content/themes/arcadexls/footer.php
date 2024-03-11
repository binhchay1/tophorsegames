<?php get_template_part('games', 'footer'); ?>
</section>
<!--</bdcn>-->
<?php
// Do some actions before the footer
do_action('arcadexls_before_footer');
?>
<!--<ftcn>-->
<footer class="ft" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
  <section class="ftcn bgdg1-shdw1-rnd5">
    <section class="ftcn1 flol-pore">
      <?php $logo = arcadexls_get_option('logohd'); ?>
      <div class="logo flol-pore"><a href="<?php echo home_url();?>" title="<?php bloginfo('name');?>"><img src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('blogname');?>"></a></div>
      <nav class="navcnt flol-pore" itemscope="itemscope" itemtype="http://www.schema.org/SiteNavigationElement">
        <button type="button" class="btn-collapse" data-toggle="collapse" data-target=".menucn-ft" data-tooltip="tooltip" data-placement="top" title="<?php _e('Menu', 'arcadexls'); ?>"><span class="iconb-menu rgba1 rnd5"><?php _e('Menu', 'arcadexls'); ?></span></button>
        <div class="menucn menucn-ft collapse">
          <ul>
              <div class="menucn menucn-ft collapse">
                  <ul>
                      <li><a class="iconb-home" href="http://topgamehorse.test">HOME</a></li>
                  
                      </li>
                      <li class="cat-item cat-item-25"><a href="https://tophorsegames.com/about/">About</a>
                      </li>
                      <li class="cat-item cat-item-23"><a href="https://tophorsegames.com/cookie-policy/">Cookie Policy</a>
                      </li>
                      <li class="cat-item cat-item-1"><a href="https://tophorsegames.com/user-terms/">User Term</a>
                      </li>
                      <li class="cat-item cat-item-27"><a href="https://tophorsegames.com/privacy-policy/">Privacy Policy</a>
                      </li>
                  </ul>
              </div>
          
          </ul>
        </div>
      </nav>
    </section>
  </section>

</footer>
<!--</ftcn>-->
<?php
// Do some actions after the footer
do_action('arcadexls_after_footer');
?>
</section>
<!--</wrpp>-->

<?php wp_footer(); ?>
<!--[if lt IE 9]><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/css3mq.js"></script><![endif]-->
<!--[if lte IE 9]><script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/ie.js"></script><![endif]-->

</body>
</html>
