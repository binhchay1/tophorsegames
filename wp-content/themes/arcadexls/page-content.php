                <!--<article>-->
            	<article>
                    <header class="title bg bgco1 rnd5">
                        <h1><?php the_title(); ?></h1>
                    </header>
                    <div class="blkcnt bgco2 game-info post-blog post-blog-single">
                        <section class="blcnbx">
                            <section>
                                <?php the_content(); ?>
                            </section>
                        </section>
                        <footer>                    	
                        <span class="iconb-date"><?php _e('Uploaded on:', 'arcadexls'); ?> <strong><?php echo get_the_date('d'); ?> <?php echo get_the_date('M'); ?> , <?php echo get_the_date('Y'); ?></strong></span> <span class="iconb-user"><?php _e('Uploader:', 'arcadexls'); ?> <a href="<?php echo get_author_posts_url($post->post_author); ?>"><?php the_author_meta('display_name',$post->post_author); ?></a></span> <span class="iconb-comt"><?php printf( _n( 'Comments: <strong>%2$s</strong>', 'Comments: <strong>%1$s</strong>', get_comments_number(), 'arcadexls'),number_format_i18n( get_comments_number() )); ?></span> <?php echo get_the_tag_list('<span class="iconb-tags">'.__('Tags:', 'arcadexls').' ', ', ','</span>'); ?>
                        </footer>
                    </div>
                </article>
                <!--</article>-->