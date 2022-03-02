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
                                'ー',

                                'ッカ','ッキ','ック','ッケ','ッコ','ッキャ','ッキュ','ッキョ',
                                'ッサ','ッシ','ッス','ッセ','ッソ','ッシャ','ッシュ','ッショ',
                                'ッタ','ッチ','ッツ','ッテ','ット','ッチャ','ッチュ','ッチョ',
                                'ッパ','ッピ','ップ','ッペ','ッポ','ッピャ','ッピュ','ッピョ',

                                'キャ','キュ','キョ','ニャ','ニュ','ニョ','シャ','シュ','ショ',
                                'チャ','チュ','チョ','ヒャ','ヒュ','ヒョ','ミャ','ミュ','ミョ',
                                'リャ','リュ','リョ','ギャ','ギュ','ギョ','ビャ','ビュ','ビョ',
                                'ピャ','ピュ','ピョ','ジャ','ジャ','ジョ',

                                "ァ","ァ","ィ","ィ","ゥ","ゥ","ェ","ェ","ォ","ォ",
                                "ヵ","ヵ","カ","ガ","キ","ギ","ク","グ","ヶ","ヶ","ケ","ゲ","コ","ゴ",
                                "サ","ザ","シ","ジ","ジ","ッ","ッ","ツ","ス","ズ","セ","ゼ","ソ","ゾ",
                                "タ","ダ","チ","チ","ヂ","ヅ","テ","デ","ト","ド",
                                "ナ","ニ","ヌ","ネ","ノ",
                                "ハ","バ","パ","ヒ","ビ","ピ","フ","フ","ブ","プ","ヘ","ベ","ペ","ホ","ボ","ポ",
                                "マ","ミ","ム","メ","モ",
                                "ャ","ャ","ヤ","ュ","ュ","ユ","ョ","ョ","ヨ",
                                "ラ","リ","ル","レ","ロ",
                                "ヮ","ヮ","ワ","ウィ","ウェ","ヲ","ン",
                                "ヴ","ヴァ","ヴィ","ヴェ","ヴォ",
                                "ア","イ","ウ","エ","オ"
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
                                roma= roma.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
                                roma= roma.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
                                roma= roma.replace(/ì|í|ị|ỉ|ĩ/g,"i");
                                roma= roma.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
                                roma= roma.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
                                roma= roma.replace(/uy|ùy|úy|ụy|ủy|ũy/g,"ui");
                                roma= roma.replace(/y|ỳ|ý|ỵ|ỷ|ỹ/g,"i");
                                roma= roma.replace(/đ/g,"d");
                                roma= roma.replace(/12/g,"ch");
                                roma= roma.replace(/chen/g,"chien");
                                roma= roma.replace(/niuien/g,"nyuen");
                                roma= roma.replace(/s/g,"sh");

                                roma= roma.replace(/xa|xá|xà|xã|xả|xạ/g,"sa");
                                roma= roma.replace(/xu|xú|xù|xủ|xũ|xụ|xư|xứ|xừ|xủ|xữ|xự/g,"su");
                                roma= roma.replace(/xo|xò|xó|xọ|xỏ|xõ|xô|xồ|xố|xộ|xổ|xỗ|xơ|xờ|xớ|xợ|xở|xỡ/g,"so");
                                roma= roma.replace(/kho|khò|khó|khọ|khỏ|khõ|khô|khồ|khố|khộ|khổ|khỗ|khơ|khờ|khớ|khợ|khở|khỡ/g,"kyo");
                                roma= roma.replace(/kha|khá|khà|khã|khả|khạ/g,"kya");
                                roma= roma.replace(/khu|khú|khù|khũ|khủ|khụ|khư|khứ|khừ|khữ|khử|khự/g,"kyu");
                                roma= roma.replace(/nho|nhò|nhó|nhọ|nhỏ|nhõ|nhô|nhồ|nhố|nhộ|nhổ|nhỗ|nhơ|nhờ|nhớ|nhợ|nhở|nhỡ/g,"nyo");
                                roma= roma.replace(/nha|nhá|nhà|nhã|nhả|nhạ/g,"nya");
                                roma= roma.replace(/nhu|nhú|nhù|nhũ|nhủ|nhụ|như|nhứ|nhừ|nhữ|nhử|nhự/g,"nyu");
                                roma= roma.replace(/hu|hú|hù|hủ|hũ|hụ/g,"fu");
                                roma= roma.replace(/sfu/g,"su");

                                roma= roma.replace(/nh/g,"n");
                                roma= roma.replace(/kh/g,"k");
                                roma= roma.replace(/shen/g,"shien");
                                roma= roma.replace(/tu|tú|tù|tủ|tũ|tụ/g,"tsu");
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
                                            $("#aler").html('Không giống tên tiếng Việt lắm!');break;
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
                                roFixed= roFixed.replace(/u-/g,"ū");
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
                                            <input class="form-control" placeholder="Gõ ở đây" onKeyUp="namae()" id="vi" name="vi">
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