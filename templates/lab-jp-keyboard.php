<?php
/*
Template Name: Lab - JP Keyboard
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
                            var roma = [
                                "-",'ā','ī','ū','ē','ō',

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
                                "lwa","xwa","wa","wi","we","wo","nn",
                                "vu","va","vi","ve","vo",
                                "a","i","u","e","o"
                            ];
                            var hira = [
                                "-","ぁ","ぃ","ぅ","ぇ","ぉ",

                                'っか','っき','っく','っけ','っこ','っきゃ','っきゅ','っきょ',
                                'っさ','っし','っす','っせ','っそ','っしゃ','っしゅ','っしょ',
                                'った','っち','っつ','って','っと','っちゃ','っちゅ','っちょ',
                                'っぱ','っぴ','っぷ','っぺ','っぽ','っぴゃ','っぴゅ','っぴょ',

                                'きゃ','きゅ','きょ','にゃ','にゅ','にょ','しゃ','しゅ','しょ',
                                'ちゃ','ちゅ','ちょ','ひゃ','ひゅ','ひょ','みゃ','みゅ','みょ',
                                'りゃ','りゅ','りょ','ぎゃ','ぎゅ','ぎょ','びゃ','びゅ','びょ',
                                'ぴゃ','ぴゅ','ぴょ','じゃ','じゅ','じょ',

                                "ぁ","ぁ","ぃ","ぃ","ぅ","ぅ","ぇ","ぇ","ぉ","ぉ",
                                "ヵ","ヵ","か","が","き","ぎ","く","ぐ","ヶ","ヶ","け","げ","こ","ご",
                                "さ","ざ","し","じ","じ","っ","っ","つ","す","ず","せ","ぜ","そ","ぞ",
                                "た","だ","ち","ち","ぢ","づ","て","で","と","ど",
                                "な","に","ぬ","ね","の",
                                "は","ば","ぱ","ひ","び","ぺ","ふ","ふ","ぶ","ぷ","へ","べ","ぺ","ほ","ぼ","ぽ",
                                "ま","み","む","め","も",
                                "ゃ","ゃ","や","ゃ","ゅ","ゆ","ょ","ょ","よ",
                                "ら","り","る","れ","ろ",
                                "ゎ","ゎ","わ","うぃ","うぇ","を","ん",
                                "ヴ","ヴぁ","ヴぃ","ヴぇ","ヴぉ",
                                "あ","い","う","え","お"
                            ];
                            var kata = [
                                "-",'ā','ī','ū','ē','ō',

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

                            //check mode, hira by default, function whatMode run everytime select was changed, function keydown use to get event whenever F7 was press
                            mode="hira";
                            function whatMode(){
                                if(document.getElementById("modeSelect").value=="Kata Mode"){mode = "kata";}
                                else {mode = "hira";}
                            }
                            $(document).keydown(function(){
                                if(event.which==118){
                                    if(mode=="hira"){mode = "kata";document.getElementById("katamode").selected = true;}
                                    else{mode = "hira";document.getElementById("hiramode").selected = true;}
                                }
                            });

                            //fix sign and some exception
                            function fixSign(){
                                jpSign = kib.jp.value;
                                jpSign = jpSign.replace(/\./g,'。');
                                jpSign = jpSign.replace(/\,/g,'、');
                                jpSign = jpSign.replace(/\?/g,'？ ');
                                jpSign = jpSign.replace(/\!/g,'！ ');
                                jpSign = jpSign.replace(/\[/g,' 「 ');
                                jpSign = jpSign.replace(/\]/g,' 」 ');
                                jpSign = jpSign.replace(/\>/g,'＞');
                                jpSign = jpSign.replace(/\</g,'＜');
                                jpSign = jpSign.replace(/\(/g,'（');
                                jpSign = jpSign.replace(/\)/g,'）');
                                kib.jp.value = jpSign;
                                romaSign = kib.roma.value;
                                romaSign = romaSign.replace(/\。/g,'.');
                                romaSign = romaSign.replace(/\、/g,',');
                                romaSign = romaSign.replace(/\？ /g,'?');
                                romaSign = romaSign.replace(/\！ /g,'!');
                                romaSign = romaSign.replace(/\ 「 /g,'"');
                                romaSign = romaSign.replace(/\ 」 /g,'"');
                                romaSign = romaSign.replace(/\＞/g,'>');
                                romaSign = romaSign.replace(/\＜/g,'<');
                                romaSign = romaSign.replace(/\（/g,'(');
                                romaSign = romaSign.replace(/\）/g,')');
                                kib.roma.value = romaSign;
                            }
                            function fixRoma(){
                                var romaF =[
                                    "la","xa","li","xi","lu","xu","le","xe","lo","xo","lka","xka","lke","xke","ltsu","xtsu","lya","xya","lyu","xyu","lyo","xyo","lwa","xwa","nn"
                                ];
                                var romaT =[
                                    "a","a","i","i","u","u","e","e","o","o","ka","ka","ke","ke","tsu","tsu","ya","ya","yu","yu","yo","yo","wa","wa","n"
                                ];
                                car = kib.roma.value;
                                for(var i=0;i<romaF.length;i++){
                                    var re = new RegExp(romaF[i], "g");
                                    car = car.replace(re,romaT[i]);
                                }
                                kib.roma.value = car;
                            }

                            //this function use for typing hira/kata directly on JP box
                            function jpType() {
                                if(mode=="kata"){
                                    car = kib.jp.value;
                                    for(var i=0;i<kata.length;i++){
                                        var re = new RegExp(roma[i], "g");
                                        car = car.replace(re,kata[i]);
                                    }
                                    kib.jp.value = car;
                                }
                                else if(mode=="hira"){
                                    car = kib.jp.value;
                                    for(var i=0;i<kata.length;i++){
                                        var re = new RegExp(roma[i], "g");
                                        car = car.replace(re,hira[i]);
                                    }
                                    kib.jp.value = car;
                                }
                            }

                            //this function use for converting from romaji to jp and vice versa
                            function jpToRoma(){
                                car = kib.jp.value;
                                for(var i=0;i<kata.length;i++){
                                    var re = new RegExp(hira[i], "g");
                                    car = car.replace(re,roma[i]);
                                    var re2 = new RegExp(kata[i], "g");
                                    car = car.replace(re2,roma[i]);
                                }
                                kib.roma.value = car;
                            }
                            function romaToJp(){
                                if(mode=="kata"){
                                    car = kib.roma.value;
                                    for(var i=0;i<kata.length;i++){
                                        var re = new RegExp(roma[i], "g");
                                        car = car.replace(re,kata[i]);
                                    }
                                    kib.jp.value = car;
                                }
                                else if(mode=="hira"){
                                    car = kib.roma.value;
                                    for(var i=0;i<kata.length;i++){
                                        var re = new RegExp(roma[i], "g");
                                        car = car.replace(re,hira[i]);
                                    }
                                    kib.jp.value = car;
                                }
                            }

                            //set length and clear
                            function Kount(){
                                //get value
                                jpval = kib.jp.value;
                                romaval = kib.roma.value;

                                //set length
                                switch(jpval.length){
                                    case 0: kib.jplen.value ='';break;
                                    case 1: kib.jplen.value = "1 character";break;
                                    default: kib.jplen.value = jpval.length + ' characters';
                                }
                                switch(romaval.length){
                                    case 0: kib.romalen.value ='';break;
                                    case 1: kib.romalen.value = "1 character";break;
                                    default: kib.romalen.value = romaval.length + ' characters';
                                }
                            }
                            function xoa(){
                                kib.jp.value = "";
                                kib.roma.value="";
                                Kount();
                                //focus on JP box after clear
                                document.getElementById('jp').focus();
                            }

                        </script>
                        <style>
                            .jumbotron {
                                padding: 0.7vw 0;
                            }
                            textarea {
                                resize: none;
                            }
                            input#len {
                                border: 0;
                                background: rgba(0,0,0,0.00)
                            }
                            p {
                                text-align: center
                            }
                            .dropup:hover .dropdown-menu {
                                display: block;
                            }
                        </style>
                        <div class="main jumbotron">
                            <h1 style="text-align:center">Japanese Keyboard <a role="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-keyboard-o" aria-hidden="true"></i></a> </h1>
                            <div class="form-group">
                                <select class="form-control" id="modeSelect" onChange="whatMode();" style="width:auto;margin:0 auto;background:#F44336;color:white">
                                    <option id="hiramode">Hira Mode</option>
                                    <option id="katamode">Kata Mode</option>
                                </select>
                            </div>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-info-circle" aria-hidden="true"></i> How to type Japanese with standard IME!</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Press <kbd>F7</kbd> to toggle between Hira mode and Kata mode</p>
                                            <p>Press 'nn' for 'ん'</p>
                                            <p>Latin character (use uppercase character): OZAWAdesu = OZAWAです</p>
                                            <p>Small character (add 'x' or 'l' before character): jishilyo/jishixyo = じしょ</p>
                                            <p>Small 'tsu': zasshi = ざっし</p>
                                            <p>Prolonged vowels in Kata (use hyphen): ku-ra- = クーラー</p>
                                            <p>Prolonged vowels in Hira: obaasan = おばあさん</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main">
                            <form name="kib">
                                <div class="row">

                                    <!-- jp -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="num">Japanese:
                                                <input id="len" type="text" name="jplen" disabled/>
                                            </label>
                                            <textarea class="form-control" onKeyUp="jpType();jpToRoma();Kount();fixSign();fixRoma();" rows="6" name="jp" id="jp" placeholder="Click the keyboard icon &#9000; on banner to open Tips" autofocus></textarea>
                                        </div>
                                    </div>

                                    <!-- romaji -->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="num">Romaji:
                                                <input id="len" type="text" name="romalen" disabled/>
                                            </label>
                                            <textarea class="form-control" onKeyUp="romaToJp();Kount();fixSign();" id="roma" rows="5" name="roma" placeholder="Type or paste Romaji here.."></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="btn-group btn-group-justified">
                                            <!-- copy jp-->
                                            <div class="btn-group">
                                                <button class="btn btn-info" type="button" id="jp_copy" data-clipboard-target="#jp">Copy Japanese</button>
                                                <script>(function(){new Clipboard('#jp_copy');})();</script>
                                            </div>

                                            <!-- copy roma-->
                                            <div class="btn-group">
                                                <button class="btn btn-info" type="button" id="roma_copy" data-clipboard-target="#roma">Copy Romaji</button>
                                                <script>(function(){new Clipboard('#roma_copy');})();</script>
                                            </div>

                                            <!-- clear -->
                                            <div class="btn-group">
                                                <button class="btn btn-danger" type="button" onClick="xoa()">Clear All</button>
                                            </div>
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