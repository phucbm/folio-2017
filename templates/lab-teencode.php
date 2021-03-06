<?php
/*
Template Name: Lab - Teencode
Template Post Type: post
 */
get_header();
get_bootstrap();
?>
	<?php
	while ( have_posts() ) : the_post();
		$date = get_the_date( 'd' ) . ' Thg ' . get_the_date( 'm Y' ) . ' - ' . get_the_time( 'h:m:s a' );

		$tags = array();
		foreach ( get_the_tags() as $tag ) {
			$tags[ $tag->name ] = get_tag_link( $tag->term_id );
		}

		$tag_container = '';
		if ( count( $tags ) > 0 ) {
			$tag_label     = count( $tags ) > 1 ? 'Tags:' : 'Tag:';

			$tag_container .= '<ul class="tag-list">';
			$tag_container .= '<li class="tag-label">' . $tag_label . '</li>';

			foreach ( $tags as $name => $url ) {
				$tag_container .= '<li class="tag-item"><a href="' . $url . '">' . $name . '</a></li>';
			}

			$tag_container .= '</ul>';

		}

		?>

        <main class="the-lab-content">
            <div class="container">
                <div class="lab-inner content-padding">

                    <div class="lab-header">
                        <div class="post-title"><h2><?php echo get_the_title(); ?></h2></div>
                        <div class="post-info"><span class="publish-time"><?php echo $date; ?></span></div>
                        <div class="lab-intro"><?php the_content(); ?></div>
                    </div>

                    <div class="lab-content">

                        <style>
                            input#len {
                                border: 0;
                                background: rgba(0,0,0,0.00)
                            }
                        </style>
                        <script>
                            /*      ******       **        **   ******
									**    **     ****    ****   **    **
									**    **     ** **  ** **   **    **
									********     **  ****  **   ******
									**      **   **        **   **
									**      **   **        **   **
									********     **  2016  **   **         feel free to copy*/

                            var noti=0;
                            function play_now(){
                                //l???y chu???i
                                var val_ea = code.ea.value;
                                var val_sky = code.sky.value;
                                var val_tr = code.trau.value;
                                var val_s = code.stime.value;

                                //gan so chu s va thay vao chuoi goc
                                var s='';
                                for(var i=0;i<val_s;i++){s+='s';}
                                s = "\'"+s+" ";
                                var str_e = val_ea.replace(/ /g,s);

                                var eaLang =['ch','ck','nh','nk','b','p',
                                    'a','4','??','A\'','??','a`','??','a~','???','A~','???','???',
                                    '??','a^','???','a^`','???','A^\'','???','a^~','???','???^',
                                    '???','??\'','???','??`','???','??~','???','??~','???','???','??','??',
                                    'o','0','??','0\'','??','0`','??','0~','???','0','???','O~',
                                    '???','0^~','???','0^\'','??','0^','???','0^`','???','0^~','???','???^',
                                    '??','??','???','??\'','???','??`','???','??~','???','??~','???','???',
                                    '???','u~','???','???','??','U`','??','U\'','??','U~','u','U',
                                    '??','??','???','??\'','???','??`','???','??~','???','???','???','???',
                                    'i','1','??','1\'','??','I`','??','I~','???','!',
                                    '??','e^','???','3^`','???','??~','???','???','???','e^~','???','3^\'',
                                    'e','3','??','3\'','??','3`','???','E~','???','3~','???','???',
                                    'gi','z','g??','j`','y','i',
                                    'y??u','i??u','th??ch','th??k','kh??ng','k0','???????c','dk','v???y','vaj'];

                                var str_tr = val_ea.toLowerCase();
                                for(var i=0;i<eaLang.length;i+=2){
                                    var re = new RegExp(eaLang[i], "g");
                                    str_tr = str_tr.replace(re,eaLang[i+1]);
                                }


                                //gan
                                code.sky.value = str_e;
                                code.trau.value = str_tr;

                                //set length
                                val_sky = code.sky.value;
                                val_tr = code.trau.value;
                                switch(val_ea.length){
                                    case 0: code.elen.value ='';break;
                                    default: code.elen.value = val_ea.length + ' k?? t???';
                                }
                                switch(val_sky.length){
                                    case 0: code.slen.value ='';break;
                                    default: code.slen.value = val_sky.length + ' k?? t???';
                                }
                                switch(val_tr.length){
                                    case 0: code.tlen.value ='';break;
                                    default: code.tlen.value = val_tr.length + ' k?? t???';
                                }
                            }

                            function xoa(){
                                code.ea.value='';code.sky.value='';code.trau.value='';
                            }
                        </script>
                        <form method="post" name="code" autocomplete="off">

                            <div class="form-group">
                                <label for="sel1">S??? ch??? 's':</label>
                                <input type="number" onChange="play_now()" class="form-control" name='stime' min="1" max="10" value="1">
                            </div>

                            <!-- Ti???ng Sky -->
                            <div class="form-group">
                                <label class="control-label" for="dai">Ti???ng Sky:
                                    <input id="len" type="text" name="slen" disabled/>
                                </label>
                                <textarea class="form-control" name="sky" id="sky"></textarea>
                            </div>

                            <!-- Ti???ng Tr???u -->
                            <div class="form-group">
                                <label class="control-label" for="dai">Ti???ng Tr???u:
                                    <input id="len" type="text" name="tlen" disabled/>
                                </label>
                                <textarea class="form-control" name="trau" id="trau"></textarea>
                            </div>

                            <!-- nhap chuoi -->
                            <div class="form-group">
                                <label for="num">Ti???ng m???t ?????t:
                                    <input id="len" type="text" name="elen" disabled/>
                                </label>
                                <textarea onkeyup="play_now()" class="form-control" type="text" name="ea" id="ea" placeholder="G?? ti???ng Vi???t c?? d???u..." autofocus></textarea>
                            </div>

                            <!-- clear message -->
                            <div class="btn-group btn-group-justified">
                                <!-- clear all-->
                                <div class="btn-group">
                                    <button class="btn btn-danger" type="button" onClick="xoa()">X??a t???t c???</button></div>
                            </div>
                        </form>

                    </div>

                    <div class="post-tags"> <?php echo $tag_container; ?> </div>

	                <?php get_fb_plugin(get_the_permalink());?>

                </div>
            </div>
        </main>

	<?php endwhile; ?>

<?php get_footer(); ?>