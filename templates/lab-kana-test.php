<?php
/*
Template Name: Lab - Kana test
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
                            span,h1,h2,h4{text-align:center}
                            div#answer{display:none;text-align:center;}
                            #scoreBtn, #playBtn {width:110px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin:15px 5px 0;padding:10px 0;}
                            #list-ar_falCar{margin-bottom:15px;}
                            .boxShadow{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}
                            .flashGreen {
                                box-shadow: 0 0 5px 8px #8BC34A;
                            }
                            .flashRed {
                                box-shadow: 0 0 5px 8px #F44336;
                            }
                            #roma {
                                background: #E0E0E0;
                                padding: 0 30px;
                                border-radius: 15px;
                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                text-align: center;
                                font-size: 80px;
                                width: 180px;
                                height: 130px;
                                margin: 0 auto;
                            }
                            .jumbotron {
                                padding: 1.7vw 0;
                                margin-bottom: 20px;
                            }
                            .jumbotron h1, #nut {
                                text-align: center
                            }
                            #nut {
                                padding: 20px;
                            }
                            h1 {
                                margin-top: 10px
                            }
                            .col-lg-12 {
                                padding: 0;
                                margin: 0 0 20px 0;
                            }
                            div#option-container {
                                text-align: center;
                            }
                            a.option {
                                margin: 4px;
                                font-size: 50px;
                                width: 80px;
                                height: 80px;
                                border-radius: 100%;
                            }
                            a.ar_falCar, a.ar_trueCar {
                                pading:6px 18px;
                                border-radius: 100%;
                                width: 40px;
                                height: 40px;
                                font-size: 17px;
                                margin: 3px;
                                display:inline-block;
                            }

                        </style>
                        <script>
                            /*      ******       **        **   ******
									**    **     ****    ****   **    **
									**    **     ** **  ** **   **    **
									********     **  ****  **   ******
									**      **   **        **   **
									**      **   **        **   **
									********     **  2016  **   **    11 September 2016     feel free to refer */

                            $(document).ready(function(){
                                $("a#playBtn").attr("onClick","showKana('play')");
                                $("a#scoreBtn").attr("onClick","done()");
                            });
                            function random_num(from,to){
                                return Math.floor((Math.random() * to) + from);
                            }

                            /*46 ki tu moi bang
							var fullRom = [
							'a','i','u','e','o',
							'sa','shi','su','se','so',
							'ta','chi','tsu','te','to',
							'na','ni','nu','ne','no',
							'ha','hi','fu','he','ho',
							'ma','mi','mu','me','mo',
							'ra','ri','ru','re','ro',
							'ka','ki','ku','ke','ko',
							'ya','yu','yo',
							'wa','wo','n'

							];
							var fullHir = [
							'あ','い','う','え','お',
							'さ','し','す','せ','そ',
							'た','ち','つ','て','と',
							'な','に','ぬ','ね','の',
							'は','ひ','ふ','へ','ほ',
							'ま','み','む','め','も',
							'ら','り','る','れ','ろ',
							'か','き','く','け','こ',
							'や','ゆ','よ',
							'わ','を','ん',

							];
							var fullKata = [
							'ア','イ','ウ','エ','オ',
							'サ','シ','ス','セ','ソ',
							'タ','チ','ツ','テ','ト',
							'ナ','ニ','ヌ','ネ','ノ',
							'ハ','ヒ','フ','ヘ','ホ',
							'マ','ミ','ム','メ','モ',
							'ラ','リ','ル','レ','ロ',
							'カ','キ','ク','ケ','コ',
							'ヤ','ユ','ヨ',
							'ワ','ヲ','ン'
							];*/

                            var ar_getIndHir;
                            var ar_getIndRom = [
                                'a','i','u','e','o',
                                'sa','shi','su','se','so',
                                'ta','chi','tsu','te','to',
                                'na','ni','nu','ne','no',
                                'ha','hi','fu','he','ho',
                                'ma','mi','mu','me','mo',
                                'ra','ri','ru','re','ro',
                                'ka','ki','ku','ke','ko',
                                'ya','yu','yo',
                                'wa','wo','n'

                            ];
                            var indRom;//index number of true roma
                            var turn = 0;//so luot da choi
                            var hirTruPlace;//where true hira character is in 6 options

                            //var dahien = [];var i = 0;
                            var ar_romLef = [
                                'a','i','u','e','o',
                                'sa','shi','su','se','so',
                                'ta','chi','tsu','te','to',
                                'na','ni','nu','ne','no',
                                'ha','hi','fu','he','ho',
                                'ma','mi','mu','me','mo',
                                'ra','ri','ru','re','ro',
                                'ka','ki','ku','ke','ko',
                                'ya','yu','yo',
                                'wa','wo','n'

                            ];
                            var ar_hirLef;

                            var ar_falCar =[];falAsc=0;
                            var ar_trueCar =[];trueAsc=0;
                            var ar_romFal = [
                                'a','i','u','e','o',
                                'sa','shi','su','se','so',
                                'ta','chi','tsu','te','to',
                                'na','ni','nu','ne','no',
                                'ha','hi','fu','he','ho',
                                'ma','mi','mu','me','mo',
                                'ra','ri','ru','re','ro',
                                'ka','ki','ku','ke','ko',
                                'ya','yu','yo',
                                'wa','wo','n'
                            ];
                            var ar_hirFal;

                            //check mode, hira by default, function whatMode run everytime select was changed, function keydown use to get event whenever F7 was press
                            var mode="hira";setArrMode(mode);
                            function setArrMode(mode){
                                if(mode=='hira'){
                                    ar_getIndHir = [
                                        'あ','い','う','え','お',
                                        'さ','し','す','せ','そ',
                                        'た','ち','つ','て','と',
                                        'な','に','ぬ','ね','の',
                                        'は','ひ','ふ','へ','ほ',
                                        'ま','み','む','め','も',
                                        'ら','り','る','れ','ろ',
                                        'か','き','く','け','こ',
                                        'や','ゆ','よ',
                                        'わ','を','ん'


                                    ];
                                    ar_hirLef = [
                                        'あ','い','う','え','お',
                                        'さ','し','す','せ','そ',
                                        'た','ち','つ','て','と',
                                        'な','に','ぬ','ね','の',
                                        'は','ひ','ふ','へ','ほ',
                                        'ま','み','む','め','も',
                                        'ら','り','る','れ','ろ',
                                        'か','き','く','け','こ',
                                        'や','ゆ','よ',
                                        'わ','を','ん'
                                    ];
                                    ar_hirFal = [

                                        'あ','い','う','え','お',
                                        'さ','し','す','せ','そ',
                                        'た','ち','つ','て','と',
                                        'な','に','ぬ','ね','の',
                                        'は','ひ','ふ','へ','ほ',
                                        'ま','み','む','め','も',
                                        'ら','り','る','れ','ろ',
                                        'か','き','く','け','こ',
                                        'や','ゆ','よ',
                                        'わ','を','ん'


                                    ];
                                }
                                else {
                                    ar_getIndHir = [
                                        'ア','イ','ウ','エ','オ',
                                        'サ','シ','ス','セ','ソ',
                                        'タ','チ','ツ','テ','ト',
                                        'ナ','ニ','ヌ','ネ','ノ',
                                        'ハ','ヒ','フ','ヘ','ホ',
                                        'マ','ミ','ム','メ','モ',
                                        'ラ','リ','ル','レ','ロ',
                                        'カ','キ','ク','ケ','コ',
                                        'ヤ','ユ','ヨ',
                                        'ワ','ヲ','ン'
                                    ];
                                    ar_hirLef = [
                                        'ア','イ','ウ','エ','オ',
                                        'サ','シ','ス','セ','ソ',
                                        'タ','チ','ツ','テ','ト',
                                        'ナ','ニ','ヌ','ネ','ノ',
                                        'ハ','ヒ','フ','ヘ','ホ',
                                        'マ','ミ','ム','メ','モ',
                                        'ラ','リ','ル','レ','ロ',
                                        'カ','キ','ク','ケ','コ',
                                        'ヤ','ユ','ヨ',
                                        'ワ','ヲ','ン'
                                    ];
                                    ar_hirFal = [
                                        'ア','イ','ウ','エ','オ',
                                        'サ','シ','ス','セ','ソ',
                                        'タ','チ','ツ','テ','ト',
                                        'ナ','ニ','ヌ','ネ','ノ',
                                        'ハ','ヒ','フ','ヘ','ホ',
                                        'マ','ミ','ム','メ','モ',
                                        'ラ','リ','ル','レ','ロ',
                                        'カ','キ','ク','ケ','コ',
                                        'ヤ','ユ','ヨ',
                                        'ワ','ヲ','ン'
                                    ];
                                }
                            }
                            function whatMode(){
                                if($("#modeSelect").find(":selected").text()=="Kata Mode"){mode = "kata";setArrMode(mode);}
                                else {mode = "hira";setArrMode(mode);}
                            }
                            $(document).keydown(function(){
                                if(event.which==118){
                                    if(stat=='off'){
                                        if(mode=="hira"){
                                            mode = "kata";
                                            setArrMode(mode);
                                            document.getElementById("katamode").selected = true;
                                        }
                                        else{
                                            mode = "hira";
                                            setArrMode(mode);
                                            document.getElementById("hiramode").selected = true;}
                                    } else {
                                        alert('You can change mode only before the game start.');
                                    }
                                }
                            });

                            var kanaSound = [
                                'a','i','u','e','o',
                                'sa','shi','su','se','so',
                                'ta','chi','tsu','te','to',
                                'na','ni','nu','ne','no',
                                'ha','hi','fu','he','ho',
                                'ma','mi','mu','me','mo',
                                'ra','ri','ru','re','ro',
                                'ka','ki','ku','ke','ko',
                                'ya','yu','yo',
                                'wa','wo','n'
                            ];
                            var score=0;
                            var theme_url = "<?php echo THEME_URL;?>";
                            //de o ngoai (global) de ham load nhanh hon vi duoc load truoc
                            var wrongBeep = new Audio(theme_url+'/labs/sounds/wrong-beep.mp3');
                            var correctBeep = new Audio(theme_url+"/labs/sounds/correct-beep.mp3");
                            var kidCheering = new Audio(theme_url+"/labs/sounds/kids-cheering.mp3");

                            //initial sound array
                            var ar_sou = [];
                            for(var sou = 0;sou<=46;sou++){
                                ar_sou[sou] = new Audio(theme_url+'/labs/sounds/kana-speaking/'+ar_getIndRom[sou]+'.mp3');
                            }

                            //timing
                            var tim_sta;
                            var stat = 'off';

                            function checkAns(optNum){
                                if(stat=='on'){

                                    //lay cau tra loi
                                    ans = $("#op"+optNum).html();

                                    //get score
                                    score = $("span#score").html();

                                    //lay index va so sanh
                                    indHir = ar_getIndHir.indexOf(ans);
                                    if(indHir==indRom) {
                                        //tang diem va chuyen
                                        score++;
                                        ar_trueCar[trueAsc] = $('#op'+hirTruPlace).html();trueAsc++;
                                        if(score<1){score=0;}
                                        $("span#score").html(score);
                                        correctBeep.play();
                                        $('#op'+hirTruPlace).removeClass("boxShadow");
                                        $('#op'+hirTruPlace).addClass("flashGreen");
                                        $('#op'+hirTruPlace).fadeIn(200).fadeOut(100).fadeIn(200);
                                        setTimeout(function(){
                                            $('#op'+hirTruPlace).removeClass("flashGreen");
                                            $('#op'+hirTruPlace).addClass("boxShadow");
                                            showKana('play'); }, 700);
                                    }
                                    else {
                                        //gan wrong vao mang
                                        ar_falCar[falAsc] = $('#op'+hirTruPlace).html();falAsc++;

                                        //nhap nhay chu dung va chuyen
                                        $('#op'+hirTruPlace).removeClass("boxShadow");
                                        $('#op'+hirTruPlace).addClass("flashRed");
                                        $('#op'+hirTruPlace).fadeIn(130).fadeOut(130).fadeIn(130).fadeOut(130).fadeIn(130);
                                        wrongBeep.play();
                                        setTimeout(function(){
                                            $('#op'+hirTruPlace).removeClass("flashRed");
                                            $('#op'+hirTruPlace).addClass("boxShadow");
                                            showKana('play'); }, 1000);
                                    }
                                }
                            }

                            function showKana(playOrStop){
                                if(playOrStop=='play'){
                                    //dung cuoc choi khi da het tat ca ki tu
                                    if(ar_romLef.length==0){ showKana('stop'); }
                                    else {
                                        //force remove color noti label when new character are shown
                                        $('#op'+hirTruPlace).removeClass("flashRed");
                                        $('#op'+hirTruPlace).removeClass("flashGreen");
                                        stat = 'on'; turn++;
                                        if(turn==1){var tim = new Date();tim_sta = tim.getTime();}
                                        $("#turn").html(turn);

                                        //mang ko co ki tu dang chon, khoi tao moi khi ham chay
                                        var ar_tmp;
                                        if(mode=='hira'){ar_tmp = [
                                            'あ','い','う','え','お',
                                            'さ','し','す','せ','そ',
                                            'た','ち','つ','て','と',
                                            'な','に','ぬ','ね','の',
                                            'は','ひ','ふ','へ','ほ',
                                            'ま','み','む','め','も',
                                            'ら','り','る','れ','ろ',
                                            'か','き','く','け','こ',
                                            'や','ゆ','よ',
                                            'わ','を','ん'
                                        ];}
                                        else {ar_tmp = [
                                            'ア','イ','ウ','エ','オ',
                                            'サ','シ','ス','セ','ソ',
                                            'タ','チ','ツ','テ','ト',
                                            'ナ','ニ','ヌ','ネ','ノ',
                                            'ハ','ヒ','フ','ヘ','ホ',
                                            'マ','ミ','ム','メ','モ',
                                            'ラ','リ','ル','レ','ロ',
                                            'カ','キ','ク','ケ','コ',
                                            'ヤ','ユ','ヨ',
                                            'ワ','ヲ','ン'
                                        ];}

                                        //chon random 1 so bat ki tu 0 den chieu dai cua mang roma con lai
                                        var ran = random_num(0,ar_romLef.length);

                                        //gan gia tri da match
                                        roma = ar_romLef[ran];
                                        indRom = ar_getIndRom.indexOf(roma);
                                        ar_sou[indRom].play();
                                        hira = ar_hirLef[ran];

                                        //luu ki tu da xuat hien vao mang
                                        //dahien[i] = roma;i+=1;

                                        //xoa ki tu da xuat hien
                                        ar_tmp.splice(indRom,1);
                                        ar_hirLef.splice(ran,1);
                                        ar_romLef.splice(ran,1);

                                        //gan gia tri vao random option 1 den 6

                                        $("#roma").html(roma);
                                        hirTruPlace = random_num(1,6);
                                        $("#op"+hirTruPlace).html(hira);

                                        //ham nhan mang va gan random ki tu vao tung option trong mang, tru ki tu dang xuat hien
                                        function chia5(arr){
                                            for(var c =0;c<5;c++){
                                                var opt = random_num(0,ar_tmp.length);
                                                $("#op"+arr[c]).html(ar_tmp[opt]);
                                                ar_tmp.splice(opt,1);
                                            }
                                        }

                                        //lay random ki tu hira gan vao 5 option con lai
                                        switch(hirTruPlace){
                                            case 1:var arr = [2,3,4,5,6];chia5(arr);break;
                                            case 2:var arr = [1,3,4,5,6];chia5(arr);break;
                                            case 3:var arr = [1,2,4,5,6];chia5(arr);break;
                                            case 4:var arr = [1,2,3,5,6];chia5(arr);break;
                                            case 5:var arr = [1,2,3,4,6];chia5(arr);break;
                                            case 6:var arr = [1,2,3,4,5];chia5(arr);break;
                                            default:alert('wrong place');
                                        }
                                    }
                                }
                                else if(playOrStop=='stop') {	stat='stop'; done(); }
                                else {	location.reload();	}
                            }

                            //time counting start when play button was pressed
                            function milisecToMinSec(time){
                                var t = new Date(time);
                                var m = t.getMinutes();
                                var s = t.getSeconds();
                                return t = m+':'+s;
                            }
                            var t_tmp;
                            function getTimEnd(st){
                                var en = new Date();
                                var tim_end = en.getTime();
                                if(st=='on') {t = tim_end-tim_sta;t_tmp=t;}
                                else if(st=='stop') {t = t_tmp;}
                                return milisecToMinSec(t);
                            }

                            //control state and function on play button
                            window.setInterval(function(){
                                $("#test").html(stat);
                                if(stat=='off'){
                                    $("#playBtn").html('Play');
                                    $("span#time").html('00:00');
                                }
                                if(stat=='on'){
                                    document.getElementById("modeSelect").disabled = true;
                                    $("#playBtn").html('Stop');
                                    $("#playBtn").attr("onClick","showKana('stop')");
                                    $("span#time").html(getTimEnd('on'));
                                }
                                if(stat=='stop'){
                                    //alert(stat);
                                    document.getElementById("modeSelect").disabled = true;
                                    $("#playBtn").html('Play Again');
                                    $("#playBtn").attr("onClick","showKana('playAgain')");
                                }
                            }, 1000);

                            function done(){

                                if(stat=='stop'){$("span#time").html(getTimEnd('stop'));}
                                turn = parseInt(score) + parseInt(ar_falCar.length);

                                $("span#turn").html(turn);

                                //list of wrong characters if any
                                var str_falLis = '';
                                var str_trueLis = '';
                                if(stat=='off'){$("h1#say").html("<h4>What are you waiting for? Let's press the play button &#128533;</h4>")}
                                if(ar_trueCar.length==46){
                                    kidCheering.play();
                                    $("h1#say").html("<h4>Congrat! Kana charts now are too easy to you &#128530;<i class='fa fa-thumbs-o-up' aria-hidden='true'></i></h4>");
                                }
                                for(var z=0;z<ar_falCar.length;z++){
                                    indHirFal = ar_hirFal.indexOf(ar_falCar[z]);
                                    str_falLis +="<a type='button' class='btn btn-warning ar_falCar' onClick='ar_sou["+indHirFal+"].play()' data-container='.modal-body' data-toggle='popover' data-placement='bottom' data-html='true' data-trigger='hover' data-content="+ar_romFal[indHirFal]+">"+ ar_falCar[z] +"</a>"
                                }
                                for(var z=0;z<ar_trueCar.length;z++){
                                    indHirFal = ar_hirFal.indexOf(ar_trueCar[z]);
                                    str_trueLis +="<a type='button' class='btn btn-info ar_trueCar' onClick='ar_sou["+indHirFal+"].play()' data-container='.modal-body' data-toggle='popover' data-placement='bottom' data-html='true' data-trigger='hover' data-content="+ar_romFal[indHirFal]+">"+ ar_trueCar[z] +"</a>"
                                }

                                $("span#falLen").html(ar_falCar.length);
                                $("span#trueLen").html(ar_trueCar.length);
                                $("div#list-ar_trueCar").html(str_trueLis);
                                $("div#list-ar_falCar").html(str_falLis);
                                if(ar_falCar.length>0 || ar_trueCar.length>0){
                                    $("div#answer").css("display","block");
                                    $("h1#say").html('Your answers');
                                    $("h4#tip").html('Click on character to play voice.');
                                }

                                $('[data-toggle="popover"]').popover();
                                $('#kq').modal();
                            }

                        </script>

                        <div class="main jumbotron">
                            <h1>Kana Test</h1>
                            <div class="form-group">
                                <select class="form-control" id="modeSelect" onChange="whatMode();" style="width:auto;margin:0 auto;background:#F44336;color:white">
                                    <option id="hiramode">Hira Mode</option>
                                    <option id="katamode">Kata Mode</option>
                                </select>
                            </div>

                        </div>
                        <div class="main">
                            <div class="col-lg-12">
                                <div id="roma"> <i class="fa fa-language" aria-hidden="true"></i> </div>
                            </div>
                            <div id="option-container"> <a onclick="checkAns(1);" class="btn btn-info option boxShadow" role="button" id="op1"><i class="fa fa-question-circle" aria-hidden="true"></i></a> <a onclick="checkAns(2);" class="btn btn-info option boxShadow" role="button" id="op2"><i class="fa fa-question-circle" aria-hidden="true"></i></a> <a onclick="checkAns(3);" class="btn btn-info option boxShadow" role="button" id="op3"><i class="fa fa-question-circle" aria-hidden="true"></i></a> <a onclick="checkAns(4);" class="btn btn-info option boxShadow" role="button" id="op4"><i class="fa fa-question-circle" aria-hidden="true"></i></a> <a onclick="checkAns(5);" class="btn btn-info option boxShadow" role="button" id="op5"><i class="fa fa-question-circle" aria-hidden="true"></i></a> <a onclick="checkAns(6);" class="btn btn-info option boxShadow" role="button" id="op6"><i class="fa fa-question-circle" aria-hidden="true"></i></a> </div>
                            <div class="col-lg-12" id="nut">
                                <a onclick="" id="playBtn" class="btn btn-info btn-lg" role="button">Play</a>
                                <a onclick="" id="scoreBtn" class="btn btn-info btn-lg" role="button">Score</a> </div>
                        </div>

                        <div class="modal fade" id="kq">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Score</h4>
                                    </div>
                                    <div class="modal-body" style="border-bottom:1px solid #e5e5e5">

                                        <h1><span id="score">0</span>/<span id="turn">0</span></h1>
                                        <h1><span id="time"></span></h1>
                                        <h1 id="say"></h1>
                                        <div class="col-lg-12">
                                            <div class="col-lg-6" id="answer">
                                                <h2>True: <span id="trueLen"></span></h2>
                                                <div id="list-ar_trueCar"></div>
                                            </div>
                                            <div class="col-lg-6" id="answer">
                                                <h2>False: <span id="falLen"></span></h2>
                                                <div id="list-ar_falCar"></div>
                                            </div>
                                        </div>
                                        <h4 id="tip"></h4>

                                    </div>

                                    <div class="modal-footer" style="border:0">

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                    </div>

                    <div class="post-tags"> <?php echo $tag_container; ?> </div>

	                <?php get_fb_plugin(get_the_permalink());?>

                </div>
            </div>
        </main>

	<?php endwhile; ?>

<?php get_footer(); ?>