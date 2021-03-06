<?php
/*
Template Name: Lab - Your JP name
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

                        <script>
                            /*      ******       **        **   ******
									**    **     ****    ****   **    **
									**    **     ** **  ** **   **    **
									********     **  ****  **   ******
									**      **   **        **   **
									**      **   **        **   **
									********     **  2016  **   **  10 september 2016       feel free to refer */

                            //character array
                            var ar_roma = [
                                '-',
                                'kka','kki','kku','kke','kko','kkya','kkyu','kkyo',
                                'ssa','sshi','ssu','sse','sso','ssha','sshu','ssho',
                                'tta','cchi','ttsu','tte','tto','ccha','cchu','ccho',
                                'ppa','ppi','ppu','ppe','ppo','ppya','ppyu','ppyo',

                                'kya','kyu','kyo','nya','nyu','nyo','sha','shu','sho',
                                'cha','chu','cho','hya','hyu','hyo','mya','myu','myo',
                                'rya','ryu','ryo','gya','gyu','gyo','bya','byu','byo',
                                'pya','pyu','pyo','ja','ju','jo',

                                "la","xa","li","xi","lu","xu","le","xe","lo","xo",
                                "lka","xka","ka","ga","ki","gi","ku","gu","lke","xke","ke","ge","ko","go",
                                "sa","za","shi","ji","zi","ltsu","xtsu","tsu","su","zu","se","ze","so","zo",
                                "ta","da","chi","ti","di","du","te","de","to","do",
                                "na","ni","nu","ne","no",
                                "ha","ba","pa","hi","bi","pi","fu","hu","bu","pu","he","be","pe","ho","bo","po",
                                "ma","mi","mu","me","mo",
                                "lya","xya","ya","lyu","xyu","yu","lyo","xyo","yo",
                                "ra","ri","ru","re","ro",
                                "lwa","xwa","wa","wi","we","wo","n",
                                "vu","va","vi","ve","vo",
                                "a","i","u","e","o"
                            ];
                            var ar_kata = [
                                '???',

                                '??????','??????','??????','??????','??????','?????????','?????????','?????????',
                                '??????','??????','??????','??????','??????','?????????','?????????','?????????',
                                '??????','??????','??????','??????','??????','?????????','?????????','?????????',
                                '??????','??????','??????','??????','??????','?????????','?????????','?????????',

                                '??????','??????','??????','??????','??????','??????','??????','??????','??????',
                                '??????','??????','??????','??????','??????','??????','??????','??????','??????',
                                '??????','??????','??????','??????','??????','??????','??????','??????','??????',
                                '??????','??????','??????','??????','??????','??????',

                                "???","???","???","???","???","???","???","???","???","???",
                                "???","???","???","???","???","???","???","???","???","???","???","???","???","???",
                                "???","???","???","???","???","???","???","???","???","???","???","???","???","???",
                                "???","???","???","???","???","???","???","???","???","???",
                                "???","???","???","???","???",
                                "???","???","???","???","???","???","???","???","???","???","???","???","???","???","???","???",
                                "???","???","???","???","???",
                                "???","???","???","???","???","???","???","???","???",
                                "???","???","???","???","???",
                                "???","???","???","??????","??????","???","???",
                                "???","??????","??????","??????","??????",
                                "???","???","???","???","???"
                            ];

                            function vi2Ro(str){
                                var roma = str;
                                roma= roma.toLowerCase();

                                //loc ki tu cuoi cung
                                if(roma[roma.length-1]=='c' || roma[roma.length-1]=='h' && roma[roma.length-2]=='c'){roma=roma.split('');roma[roma.length-1]='ku';roma=roma.join('');}
                                if(roma[roma.length-1]=='g'){roma=roma.split('');roma[roma.length-1]='1gu';roma=roma.join('');}

                                //loc phu am
                                var ar_phuam = [
                                    'ph','f',
                                    'th','t',
                                    'tr','j',
                                    'l','r',
                                    'v','b',
                                    'gi','z',
                                    'ng','ni',
                                    'qu','w',
                                    'ch','12',
                                    'c','k',
                                    'f','fu',
                                    '1gu','gu',
                                ];
                                for(var i=0;i<ar_phuam.length;i+=2){
                                    var re = new RegExp(ar_phuam[i], "g");
                                    roma = roma.replace(re,ar_phuam[i+1]);
                                }

                                //loc nguyen am
                                roma= roma.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g,"a");
                                roma= roma.replace(/??|??|???|???|???|??|???|???|???|???|???/g,"e");
                                roma= roma.replace(/??|??|???|???|??/g,"i");
                                roma= roma.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g,"o");
                                roma= roma.replace(/??|??|???|???|??|??|???|???|???|???|???/g,"u");
                                roma= roma.replace(/uy|??y|??y|???y|???y|??y/g,"ui");
                                roma= roma.replace(/y|???|??|???|???|???/g,"i");
                                roma= roma.replace(/??/g,"d");
                                roma= roma.replace(/12/g,"ch");
                                roma= roma.replace(/chen/g,"chien");
                                roma= roma.replace(/niuien/g,"nyuen");
                                roma= roma.replace(/s/g,"sh");

                                roma= roma.replace(/xa|x??|x??|x??|x???|x???/g,"sa");
                                roma= roma.replace(/xu|x??|x??|x???|x??|x???|x??|x???|x???|x???|x???|x???/g,"su");
                                roma= roma.replace(/xo|x??|x??|x???|x???|x??|x??|x???|x???|x???|x???|x???|x??|x???|x???|x???|x???|x???/g,"so");
                                roma= roma.replace(/kho|kh??|kh??|kh???|kh???|kh??|kh??|kh???|kh???|kh???|kh???|kh???|kh??|kh???|kh???|kh???|kh???|kh???/g,"kyo");
                                roma= roma.replace(/kha|kh??|kh??|kh??|kh???|kh???/g,"kya");
                                roma= roma.replace(/khu|kh??|kh??|kh??|kh???|kh???|kh??|kh???|kh???|kh???|kh???|kh???/g,"kyu");
                                roma= roma.replace(/nho|nh??|nh??|nh???|nh???|nh??|nh??|nh???|nh???|nh???|nh???|nh???|nh??|nh???|nh???|nh???|nh???|nh???/g,"nyo");
                                roma= roma.replace(/nha|nh??|nh??|nh??|nh???|nh???/g,"nya");
                                roma= roma.replace(/nhu|nh??|nh??|nh??|nh???|nh???|nh??|nh???|nh???|nh???|nh???|nh???/g,"nyu");
                                roma= roma.replace(/hu|h??|h??|h???|h??|h???/g,"fu");
                                roma= roma.replace(/sfu/g,"su");

                                roma= roma.replace(/nh/g,"n");
                                roma= roma.replace(/kh/g,"k");
                                roma= roma.replace(/shen/g,"shien");
                                roma= roma.replace(/tu|t??|t??|t???|t??|t???/g,"tsu");
                                roma= roma.replace(/uu/g,"u-");

                                //loc ki tu cuoi cung
                                if(roma[roma.length-1]=='t'){roma=roma.split('');roma[roma.length-1]='xtsu';roma=roma.join('');}
                                if(roma[roma.length-1]=='m'){roma=roma.split('');roma[roma.length-1]='mu';roma=roma.join('');}

                                //loc tu dac biet
                                roma= roma.replace(/niuiextsu/g,"niextsu");

                                return roma;
                            }

                            function namae(){
                                var na = ten.vi.value;

                                //tach chuoi thanh tung tu va gan vao mang
                                var ar_name = na.split(" ");

                                //loc tung chu thanh romaji
                                var ro ='';
                                for(var i=0;i<ar_name.length;i++){

                                    //thong bao neu tu khong thuan Viet
                                    var ar_deny = ['z','w','j','sh','yo','ye','yi','yu','dz','kw','hw'];
                                    for(var j=0;j<ar_deny.length;j++){

                                        //search trong tu do, neu ki tu dau tien co trong ar_deny thi thong bao
                                        if(ar_name[i].search(ar_deny[j])==0){
                                            $("#aler").html('Kh??ng gi???ng t??n ti???ng Vi???t l???m!');break;
                                        }
                                        else {$("#aler").html('');}
                                    }

                                    //loc va ghep chuoi
                                    ro += vi2Ro(ar_name[i])+" ";
                                }

                                var roFixed = ro;

                                //chuyen romaji sang kata
                                for(var i=0;i<ar_kata.length;i++){
                                    var re = new RegExp(ar_roma[i], "g");
                                    ro = ro.replace(re,ar_kata[i]);
                                    $("h1#kata").html(ro);
                                }

                                //sua ki tu kieu go sang ki tu de doc
                                roFixed= roFixed.replace(/xtsu/g,"tsu");
                                roFixed= roFixed.replace(/u-/g,"??");
                                roFixed= roFixed.replace(/di/g,"ji");
                                roFixed= roFixed.replace(/du/g,"ju");
                                roFixed= roFixed.replace(/ti/g,"chi");
                                $("h1#roma").html(roFixed);

                                if(ro.length>=10){
                                    $("#kata").css('font-size','800%');
                                }
                                else {$("#kata").css('font-size','60px');}
                                if(na==''){
                                    $("h1#kata").html('<i class="fa fa-circle" aria-hidden="true"></i>');
                                    $("h1#roma").html('<span style="color:#FAFAFA">O</span>');
                                }
                            }

                            //always focus
                            /*window.setInterval(function(){
                                if($('#report').hasClass('in')){}
                                else{
                                    //document.getElementById("vi").focus();
                                }
                            }, 500);*/

                        </script>
                        <style>
                            i.fa-circle, #aler{ color:#F44336;}
                            input#vi{
                                text-align:center;
                                border:0;
                            }
                            h1,#aler {
                                margin:25px;
                                text-align: center;
                            }
                            /*body{background:#FAFAFA;padding-top:7%}*/
                        </style>
                        <div class="main">
                            <form name="ten" autocomplete="off">
                                <div class="row">

                                    <!-- jp -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h1 id="kata" style="font-size:1200%"><i class="fa fa-circle" aria-hidden="true"></i></h1>

                                        <h1 id="roma"><span style="color:#FAFAFA">O</span></h1>
                                    </div>

                                    <!-- viet -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="G?? ??? ????y" onKeyUp="namae()" id="vi" name="vi">
                                            <h5 id="aler"></h5>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="post-tags"> <?php echo $tag_container; ?> </div>

	                <?php get_fb_plugin(get_the_permalink());?>

                </div>
            </div>
        </main>

	<?php endwhile; ?>

<?php get_footer(); ?>