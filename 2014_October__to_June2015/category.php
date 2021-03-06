
    <?php get_header(); ?>
 
    <?php 
        $Maincategory = get_the_category();
        $MaincategoryID = $Maincategory[0]->cat_id;
        $MaincategoryName = $Maincategory[0]->cat_name;
    ?>

    <?php function PostSlide($id, $imageSize) {
        echo ''?> 
        <?php 
            $category = get_the_category(); 
            $category_id = get_cat_ID( $category[0]->cat_name );
            $category_link = get_category_link( $category_id );
            $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            $url = $thumb[0];
        ?> 

        <li class="fading" style="background-image:url(<?php echo $url; ?>);">
            <div class="sliderDiaposInfo">
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <h2><?php echo $category[0]->cat_name; ?></h2>
                <!-- <p><a href="#" onclick="event.preventDefault(); $('#playlist_list #playlist2').prepend($('.BoxSongUrl')); api_loadPlaylist(hap_players[0],{hidden: true, id: '#playlist2'}); api_playAudio(hap_players[0]); return false;">Listen song</a></p> -->
            </div>
            <div class="sliderDiaposLink">
                <a href="<?php the_permalink(); ?>"></a>
            </div>
        </li> 
      <?php ;
    }
    ?>
 
    <?php function Post($id, $imageSize) {
        echo ''?> 
        <?php 
            $category = get_the_category(); 
            $category_id = get_cat_ID( $category[0]->cat_name );
            $category_link = get_category_link( $category_id );
            $featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            
            if ($imageSize == "thumbnail")
            {
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
                $url = $thumb[0];
            }
            else
            {
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );
                $url = $thumb[0];
            }
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
            $url = $thumb[0];
        ?> 
        <article class="Box" id="<?php echo $id; ?>">

            <div class="BoxLineVertical"></div>
            <div class="BoxLineHorizontal"></div> 
            <div class="BoxBackgroundOptions"></div> 
            <div class="BoxSongUrl" style="display:none;">
                <?php if(get_field('soundcloudURL')): ?>
                        <li class= 'playlistItem' data-type='soundcloud' data-path='<?php the_field('soundcloudURL'); ?>' data-thumb='<?php echo $url; ?>'/>
                <?php else: ?>
                        
                <?php endif; ?>
            </div>

            <div class="BoxLeft">

                <div class="BoxPlay">
                    <a href="#" onclick="event.preventDefault(); $('#playlist_list #playlist2').prepend( $('#<?php echo $id; ?> .BoxSongUrl') ); api_loadPlaylist(hap_players[0],{hidden: true, id: '#playlist2'}); api_playAudio(hap_players[0]); return false;">
                        <span class="icon-playsong"></span>
                    </a>
                </div> 

                <div class="BoxAvatar" style="background-image:url(<?php echo $url; ?>);">
                    <a href="<?php the_permalink(); ?>"></a>
                </div>

            </div>
            <div class="BoxRight">

                <?php if ($category[0]->cat_name == 'Mixes') :?>
                <?php endif; ?>

                <p class="BoxCategory">
                    <a href="<?php echo $category_link; ?>">
                        <?php 
                            echo $category[0]->cat_name;
                        ?>
                    </a>
                </p>

                <h2 class="BoxTitle">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <div class="BoxOptions">

                    <ul>
                        <li class="comments">
                            <a href="<?php the_permalink(); ?>">
                                <span class="icon-comment"></span>
                                <span class="text">Comment</span>
                            </a>
                        </li>
                        <li class="share">
                            <a href="#" onclick="event.preventDefault();">
                                <span class="icon-share"></span>
                                <span class="text">Share song</span>
                            </a>
                            <div class="BoxShareMenu">
                                <div class="facebookLink" id="<?php echo 'facebook'.$id; ?>" style="display:none;">
                                    <span>https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?></span>
                                </div>
                                <div class="twitterLink" id="<?php echo 'twitter'.$id; ?>" style="display:none;">
                                    <span>https://twitter.com/home?status=Now listeting to <?php echo wp_get_shortlink(); ?> via @music4deejays</span>
                                </div>
                                <a href="#" class="icon-twitter shareTwitter">Twitter</a> 
                                <a href="#" class="icon-facebook shareFacebook">Facebook</a> 
                            </div>
                        </li>
                        <li class="like_dislike">
                            <a href="#">
                                <span class="icon-like"></span>
                                <span class="text">I like it</span>
                            </a>
                            <a href="#">
                                <span class="icon-dislike"></span>
                                <span class="text">I dislike it</span>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </article><!-- Fin Box -->

      <?php ;
    }
    ?>

        <div class="ContainerLeft">

            <div class="slider">
                <div class="sliderVerticalLine"></div>

                <div class="sliderButtonPrev icon-prev"></div>
                <div class="sliderButtonNext icon-next"></div>
                <ul class="sliderSelector"></ul>
                <ul class="sliderDiapos" id="sliderDiapos">
                    <?php 
                        $i = 0;
                        if (have_posts()) : while (have_posts()) : the_post(); 
                    ?>  
                        <?php if($i < 3): ?>
                            <?php PostSlide($i, "thumbnail"); ?> 
                            <?php $i++; ?>
                        <?php endif; ?>
                    <? endwhile; endif; ?>
                </ul>
            </div><!-- End of the slider -->

        <?php if(is_category('mixes')): ?>
            </div> <!-- Cerrar el bloque medio -->
        <?php endif; ?>

            <section class="all_posts">
                 
                <style type="text/css">

                @media all and (min-width: 800px) { 
                    .leftTitle {
                       display: none;
                    }
                }
                </style>

                <h1 class="leftTitle">
                    New <?php echo $MaincategoryName; ?> tracks <span>on music4deejays</span>
                </h1>
            <? 
                $i = 0;
                if (have_posts()) : while (have_posts()) : the_post(); 
            ?>  
                <?php if($i < 3): ?>
                    <?php $i++; ?>
                <?php else: ?>
                    <?php Post($i, "thumbnail"); ?> 
                    <?php $i++; ?>
                <?php endif; ?>

            <? endwhile; endif; ?>
            </section>

            <div class="load_more" style="display:none;">
                <a href="/electro" class="button">
                    Load more songs
                </a>
            </div>

            <?php get_template_part('pagination'); ?>

            <!-- analytics -->
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

              ga('create', 'UA-51299955-1', 'auto');
              ga('send', 'pageview');

            </script>

        </div><!-- Fin container Left -->

        
    </div>
    </div><!-- Fin ajax left -->


        <div class="ContainerRight"> 

            <div class="uploadTracks">
                <h3>Do you have a track<h3>
                <a href="/send_tracks" class="button button_color">Upload to m4d.com</a>
                <span class="short icon-upload"></span>
                <span class="medium icon-upload"></span>
                <span class="big icon-upload"></span>
            </div>

            <div class="followUs">
                <h3>Follow us!<h3>
                <ul>
                    <li><a href="http://twitter.com/music4deejays" target="_blank" class="icon-twitter"></a></li>
                    <li><a href="http://facebook.com/music4deejays"  target="_blank" class="icon-facebook"></a></li>
                </ul> 
            </div>

            <div class="SectionToptracks">
                <h2>
                    Top tracks
                </h2>
                <ul class="classifyRelated">
                    <li class="selected"><a href="#" onclick=" $('.SectionToptracks div').hide(); $('.classifyRelated li').removeClass('selected'); $('.classifyRelated li:nth-child(1)').addClass('selected'); $('#all_featured').show(); return false; " id="openAll">All time</a></li>
                    <li style="display:none;"><a href="#" onclick=" $('.SectionToptracks div').hide(); $('.classifyRelated li').removeClass('selected'); $('.classifyRelated li:nth-child(2)').addClass('selected'); $('#week_featured').show(); return false; " id="openMonth">This week</a></li>
                    <li style="display:none;"><a href="#" onclick=" $('.SectionToptracks div').hide(); $('.classifyRelated li').removeClass('selected'); $('.classifyRelated li:nth-child(3)').addClass('selected'); $('#month_featured').show(); return false; " id="openMonth">Month</a></li>
                </ul>
                <ul class="songsRelated">
                    <div id="week_featured" style="display:none;">
                    <?php
                        $categories = get_the_category();
                        $category_id = $categories[0]->cat_ID;
                        wpp_get_mostpopular( "range=weekly&limit=5&post_type=post&freshness=1&order_by=views&title_length=8&title_by_words=1&thumbnail_width=40&thumbnail_height=40&stats_views=0&post_html=\"<li><span class='songsRelatedCover'>{thumb}</span><span class='songsRelatedInfo'><h2><a href='{url}'>{text_title}</a></h2></span></a></li>\"" );
                    ?>
                    </div>
                    <div id="month_featured" style="display:none;">
                    <?php 
                        $categories = get_the_category();
                        $category_id = $categories[0]->cat_ID;
                        wpp_get_mostpopular( "range=monthly&limit=5&post_type=post&freshness=1&order_by=views&title_length=8&title_by_words=1&thumbnail_width=40&thumbnail_height=40&stats_views=0&post_html=\"<li><span class='songsRelatedCover'>{thumb}</span><span class='songsRelatedInfo'><h2><a href='{url}'>{text_title}</a></h2></span></a></li>\"" );
                    ?>
                    </div>
                    <div id="all_featured">
                    <?php
                        $categories = get_the_category();
                        $category_id = $categories[0]->cat_ID;
                        wpp_get_mostpopular( "range=all&limit=5&post_type=post&freshness=1&order_by=views&title_length=8&title_by_words=1&thumbnail_width=40&thumbnail_height=40&stats_views=0&post_html=\"<li><span class='songsRelatedCover'>{thumb}</span><span class='songsRelatedInfo'><h2><a href='{url}'>{text_title}</a></h2></span></a></li>\"" );
                    ?>
                    </div>
                </ul>
            </div><!-- Fin SectionToptracks -->

            <?php get_footer(); ?>

