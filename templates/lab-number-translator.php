<?php
/*
Template Name: Lab - Number translator
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
									********     **  2016  **   **    11 September 2016     feel free to refer */

                            //conver to Japanese via number
                            function numToRoma(){
                                var jpOf = ["zero", "ichi ", "ni ", "san ", "yon ", "go ", "roku ", "nana ", "hachi ", "kyuu ", ""];
                                juu = "juu "; hyaku = "hyaku "; sen = "sen "; man = "man "; oku = 'oku '; chou = 'chou ';kei='kei ';

                                num = read.num.value;if(num<0){num=num*(-1);}num = parseInt(num);
                                //var x equals 10 mean x =''
                                function dv2(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n = jpOf[n];}
                                    hChuc=parseInt(n/10);hDv=n%10;
                                    if(hChuc==1){hChuc=10;}
                                    if(hDv==0){hDv=10;}
                                    return n = jpOf[hChuc] + juu + jpOf[hDv];
                                }
                                function dv3(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n = jpOf[n];}
                                    if(n.toString().length==2){return n = dv2(n);}
                                    hTram=parseInt(n/100);n2=n%100;
                                    if(hTram==1){hTram=10;}
                                    return n = jpOf[hTram] + hyaku + dv2(n2);
                                }
                                function dv4(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n = jpOf[n];}
                                    if(n.toString().length==2){return n = dv2(n);}
                                    if(n.toString().length==3){return n = dv3(n);}
                                    hNgan=parseInt(n/1000);n3=n%1000;
                                    if(hNgan==1){hNgan=10;}
                                    return n = jpOf[hNgan] + sen + dv3(n3);//1010 n3=10
                                }
                                function dv8(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n = jpOf[n];}
                                    if(n.toString().length==2){return n = dv2(n);}
                                    if(n.toString().length==3){return n = dv3(n);}
                                    n4a=parseInt(n/10000);n4b=n%10000;
                                    if(n4a==0){man='';}
                                    return n = dv4(n4a) + man + dv4(n4b);
                                }
                                function dv12(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n = jpOf[n];}
                                    if(n.toString().length==2){return n = dv2(n);}
                                    if(n.toString().length==3){return n = dv3(n);}
                                    n4=parseInt(n/100000000);n8=n%100000000;
                                    if(n4==0){oku='';}
                                    return n = dv4(n4) + oku + dv8(n8);
                                }
                                function dv16(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n = jpOf[n];}
                                    if(n.toString().length==2){return n = dv2(n);}
                                    if(n.toString().length==3){return n = dv3(n);}
                                    n4=parseInt(n/1000000000000);n12=n%1000000000000;
                                    if(n4==0){chou='';}
                                    return n = dv4(n4) + chou + dv12(n12);
                                }

                                switch(num.toString().length){
                                    case 1: read.roma.value = jpOf[num];break;
                                    case 2:	read.roma.value = dv2(num);break;
                                    case 3:	read.roma.value = dv3(num);break;
                                    case 4:	read.roma.value = dv4(num);break;
                                    case 5:
                                        n1=parseInt(num/10000);n4=num%10000;
                                        read.roma.value = jpOf[n1] + man + dv4(n4);break;
                                    case 6:
                                        n2=parseInt(num/10000);n4=num%10000;
                                        read.roma.value = dv2(n2) + man + dv4(n4);break;
                                    case 7:
                                        n3=parseInt(num/10000);n4=num%10000;
                                        read.roma.value = dv3(n3) + man + dv4(n4);break;
                                    case 8:	read.roma.value = dv8(num);break;
                                    case 9:
                                        n1=parseInt(num/100000000);n8=num%100000000;
                                        read.roma.value = jpOf[n1] + oku + dv8(n8);break;
                                    case 10:
                                        n2=parseInt(num/100000000);n8=num%100000000;
                                        read.roma.value = dv2(n2) + oku + dv8(n8);break;
                                    case 11:
                                        n3=parseInt(num/100000000);n8=num%100000000;
                                        read.roma.value = dv3(n3) + oku + dv8(n8);break;
                                    case 12: read.roma.value = dv12(num);break;
                                    case 13://1.0000.0000.0000 - chou
                                        n1=parseInt(num/1000000000000);n12=num%1000000000000;
                                        read.roma.value = jpOf[n1] + chou + dv12(n12);break;
                                    case 14:
                                        n2=parseInt(num/1000000000000);n12=num%1000000000000;
                                        read.roma.value = dv2(n2) + chou + dv12(n12);break;
                                    case 15:
                                        n3=parseInt(num/1000000000000);n12=num%1000000000000;
                                        read.roma.value = dv3(n3) + chou + dv12(n12);break;
                                    case 16://1000.0000.0000.0000
                                        read.roma.value = dv16(num);break;
                                    /*case 17://1.0000.0000.0000.0000 - kei
										n1=parseInt(num/10000000000000000);n16=num%10000000000000000;
										read.roma.value = jpOf[n1] + kei + dv16(n16);break;*/
                                    default:read.roma.value ="";
                                }
                            }
                            function romaToHira(){
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
                                    "a","i","u","e","o","n"
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
                                    "あ","い","う","え","お","ん"
                                ];
                                car = read.roma.value;
                                //fix exception first
                                car = car.replace(/san hyaku/g,'sanbyaku');
                                car = car.replace(/roku hyaku/g,'roppyaku');
                                car = car.replace(/hachi hyaku/g,'happyaku');
                                car = car.replace(/san sen/g,'sanzen');
                                car = car.replace(/hachi sen/g,'hassen');
                                read.roma.value = car;//return fixed string back to roma
                                //then convert to hira
                                for(var i=0;i<roma.length;i++){
                                    var re = new RegExp(roma[i], "g");
                                    car = car.replace(re,hira[i]);
                                }
                                //zero must be in kata
                                car = car.replace(/ぜろ/g,'ゼロ');
                                read.hira.value = car;
                            }

                            //conver to English via number
                            function numToEn(){
                                var enOf = [
                                    'zero ','one ','two ','three ','four ','five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen ','twenty ',''];
                                var enTy = [
                                    '','ten','twenty ','thirty ','forty ','fifty ','sixty ','seventy ','eighty ','ninety '
                                ];
                                num = read.num.value;
                                if(num<0){num=num*(-1);}//number must be > 0
                                //The maximum number of decimals is 17, parseInt will return wrong result if number >= 17
                                num = parseInt(num);//filter number
                                hundred='hundred ';thousand='thousand ';million='million ';billion='billion ';trillion='trillion ';quadrillion='quadrillion ';
                                function dv2(n){
                                    if(n==0){return n=enOf[21];}
                                    if(n>0 && n<=20){
                                        if(n.toString().length==1) {return n = 'and '+enOf[n]}
                                        else {return n = enOf[n];}
                                    }
                                    if(n>20 && n<=99){
                                        hChuc=parseInt(n/10);hDv=n%10;
                                        if(hDv==0)hDv=21;
                                        return n = enTy[hChuc] + enOf[hDv];
                                    }
                                }
                                function dv3(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n='and '+ enOf[n];}
                                    if(n.toString().length==2){return n='and '+ dv2(n);}
                                    n1=parseInt(n/100);if(n1==0){n1=21;hundred="";}
                                    return n=enOf[n1] +hundred+ dv2(n%100);
                                }
                                function dv6(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n='and '+ enOf[n];}
                                    if(n.toString().length==2){return n='and '+ dv2(n);}
                                    n3a=parseInt(n/1000);n3b=n%1000;if(n3a==0){thousand='and ';}
                                    return n = dv3(n3a) + thousand + dv3(n3b);
                                }
                                function dv9(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n='and '+ enOf[n];}
                                    if(n.toString().length==2){return n='and '+ dv2(n);}
                                    n3=parseInt(n/1000000);n6=n%1000000;if(n3==0){million='';}
                                    return n = dv3(n3) + million + dv6(n6);
                                }
                                function dv12(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n=enOf[n];}
                                    if(n.toString().length==2){return n=dv2(n);}
                                    n3=parseInt(n/1000000000);n9=n%1000000000;if(n3==0){billion='';};
                                    if(n3==1){n3=0;billion='';}//check cho nay!!!! - da check - co ve dung
                                    return n = dv3(n3) + billion + dv9(n9);
                                }
                                function dv15(n){
                                    if(n==0){return n='';}
                                    if(n.toString().length==1){return n=enOf[n];}
                                    if(n.toString().length==2){return n=dv2(n);}
                                    n3=parseInt(n/1000000000000);n12=n%1000000000000;if(n3==0){trillion='';};
                                    //if(n3==1){n3=0;trillion='';} - neu cai nay chay, khi n3 =001 =1 thi bi sai
                                    return n = dv3(n3) + trillion + dv12(n12);
                                }
                                //read by length of number
                                switch(num.toString().length){
                                    case 1:read.en.value = enOf[num];break;
                                    case 2:read.en.value = dv2(num);break;
                                    case 3:read.en.value = dv3(num);break;
                                    case 4:
                                        n1=parseInt(num/1000);
                                        read.en.value = enOf[n1] + thousand + dv3(num%1000);break;
                                    case 5:
                                        n2=parseInt(num/1000);n3=num%1000;
                                        read.en.value = dv2(n2) + thousand + dv3(n3);break;
                                    case 6:read.en.value = dv6(num);break;
                                    case 7:
                                        n1=parseInt(num/1000000);n6=num%1000000;
                                        read.en.value = enOf[n1] + million + dv6(n6);break;
                                    case 8:
                                        n2=parseInt(num/1000000);n6=num%1000000;
                                        read.en.value = dv2(n2) + million + dv6(n6);break;
                                    case 9:read.en.value = dv9(num);break;//100.000.000
                                    case 10://1.000.000.000 - billion
                                        n1=parseInt(num/1000000000);n9=num%1000000000;
                                        read.en.value = enOf[n1] + billion + dv9(n9);break;
                                    case 11://10.000.000.000 - ten billion
                                        n2=parseInt(num/1000000000);n9=num%1000000000;
                                        read.en.value = dv2(n2) + billion + dv9(n9);break;
                                    case 12://100.000.000.000 - hundred billion
                                        read.en.value = dv12(num);break;

                                    case 13://1.000.000.000.000 - trillion
                                        n1=parseInt(num/1000000000000);n12=num%1000000000000;
                                        read.en.value = enOf[n1] + trillion + dv12(n12);break;
                                    case 14://10.000.000.000.000 - ten trillion
                                        n2=parseInt(num/1000000000000);n12=num%1000000000000;
                                        read.en.value = dv2(n2) + trillion + dv12(n12);break;
                                    case 15://100.000.000.000.000 - hundred trillion
                                        read.en.value = dv15(num);break;

                                    case 16://1.000.000.000.000.000 - quadrillion
                                        n1=parseInt(num/1000000000000000);n15=num%1000000000000000;
                                        read.en.value = enOf[n1] + quadrillion + dv15(n15);break;
                                    /*case 17://10.000.000.000.000.000 - ten quadrillion
										//num nhan vao da sai -> n15 sai
										n2=parseInt(num/1000000000000000);n15=num%1000000000000000;
										read.en.value = dv2(n2) + quadrillion + dv15(n15);break;
									case 18://100.000.000.000.000.000 - hundred quadrillion
										n3=parseInt(num/1000000000000000);n15=num%1000000000000000;
										read.en.value = dv3(n3) + quadrillion + dv15(n15);break;*/
                                    default:read.en.value ="Because of interger's limitation, 16 is the maximum decimals of number that this app support.";
                                }
                            }

                            //convert to Vietnamese via English (depending on English)
                            function enToVi(){
                                //data array for translating
                                var enCar = [	'and','quadrillion','trillion','eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen','twenty','thirty','forty','fifty','sixty','seventy','eighty','ninety','hundred','thousand','million','billion','zero','one','two','three','four','five','six','seven','eight','nine','ten'];
                                var viCar = ['lẻ','triệu tỷ','nghìn tỷ','mười một','mười hai','mười ba','mười bốn','mười lăm','mười sáu','mười bảy','mười tám','mười chín','hai mươi','ba mươi','bốn mươi','năm mươi','sáu mươi','bảy mươi','tám mươi','chín mươi','trăm','1nghìn','triệu','tỷ','không','một','hai','ba','bốn','năm','sáu','bảy','tám','chín','mười'];
                                //get en
                                car = read.en.value;
                                //translate from eng to vi
                                for(var i=0;i<enCar.length;i++){
                                    var re = new RegExp(enCar[i], "g");
                                    car = car.replace(re,viCar[i]);
                                }
                                //now we got vi, then fix some exception
                                car = car.replace(/mươi năm/g,'mươi lăm');
                                car = car.replace(/mươi một/g,'mươi mốt');
                                car = car.replace(/Because of interger\'s limitation, 16 is the maximum decimals of number that this app support./g,'Vì giới hạn của kiểu dữ liệu số thực nên ứng dụng này chỉ hỗ trợ số có tối đa 16 kí tự.');
                                car = car.replace(/thouslẻ/g,'nghìn');//something wrong so i have to use this to fix
                                //set vi
                                read.vi.value = car;
                            }

                            //count character on every field
                            function Kount(){
                                //get value
                                numval = read.num.value;
                                romaval = read.roma.value;
                                hiraval = read.hira.value;
                                enval = read.en.value;
                                vival = read.vi.value;

                                //set length
                                numvallen=numval.length;
                                if(numval<0){numvallen-=1;}//subtract 1 for number <0
                                switch(numvallen){
                                    case 0: read.numlen.value ='';break;
                                    case 1: read.numlen.value = "1 character";break;
                                    default: read.numlen.value = numvallen + ' characters';
                                }
                                switch(romaval.length){
                                    case 0: read.romalen.value ='';break;
                                    case 1: read.romalen.value = "1 character";break;
                                    default: read.romalen.value = romaval.length-1 + ' characters';
                                }
                                switch(hiraval.length){
                                    case 0: read.hiralen.value ='';break;
                                    case 1: read.hiralen.value = "1 character";break;
                                    default: read.hiralen.value = hiraval.length-1 + ' characters';
                                }
                                switch(enval.length){
                                    case 0: read.enlen.value ='';break;
                                    case 1: read.enlen.value = "1 character";break;
                                    default: read.enlen.value = enval.length-1 + ' characters';
                                }
                                switch(vival.length){
                                    case 0: read.vilen.value ='';break;
                                    case 1: read.vilen.value = "1 character";break;
                                    default: read.vilen.value = vival.length-1 + ' characters';
                                }
                            }

                            //add decimal points to number
                            function addDecimalPoints(str,dot) {
                                str=str.replace(/\D/g, '');
                                var inputValue = str.replace('.', '').split("").reverse().join(""); //xoa dau cham dang co va reverse
                                var newValue = '';
                                for (var i = 0; i < inputValue.length; i++) {
                                    if (i % dot == 0) { newValue += '.'; }
                                    newValue += inputValue[i];
                                }
                                str = newValue.split("").reverse().join("");
                                str = str.slice(0,str.length-1);//xóa dấu chấm bị dư
                                return str;
                            }

                            //clear, set decimal point
                            function xoa(){
                                read.num.value='';
                                read.en.value='';
                                read.vi.value='';
                                read.hira.value='';
                                read.roma.value='';
                                $("option#fixEnNum").html('English Number');$("option#fixJpNum").html('Japanese Number');
                                document.getElementById('num').focus();
                                Kount();
                            }
                            function noti(){
                                read.en.value='';
                                read.vi.value='';
                                read.hira.value='';
                                read.roma.value='';
                                $("option#fixEnNum").html('English Number');$("option#fixJpNum").html('Japanese Number');
                                Kount();
                            }
                            function fixNum(){
                                num=read.num.value;
                                isMinus='';
                                //add minus for number that less than zero
                                if(num<0){
                                    read.en.value = 'minus ' + read.en.value;
                                    read.vi.value = 'âm ' + read.vi.value;
                                    read.roma.value = 'mainasu ' + read.roma.value;
                                    read.hira.value = 'マイナス ' + read.hira.value;
                                    isMinus="-";
                                }
                                if(num.length==0){noti();}
                                else {numEn = addDecimalPoints(parseInt(num).toString(),3);numJp = addDecimalPoints(parseInt(num).toString(),4);}
                                $("option#fixEnNum").html(isMinus+numEn);$("option#fixJpNum").html(isMinus+numJp);
                            }

                        </script>
                        <style>

                            select#modeSelect{width:auto;height:auto;margin:0 auto;padding:0 6px;background:#00796B;color:white;font-size:30px;}
                            .jumbotron {

                                padding: 0.5vw 0
                            }
                            .jumbotron h1 {
                                text-align: center
                            }
                            input.form-control{background:#F8D3E1;}
                            input#len {
                                border: 0;
                                background: rgba(0,0,0,0.00)
                            }
                            p {
                                text-align: center
                            }
                        </style>
                        <div class="main jumbotron">
                            <h1>Number Translator</h1>
                            <div class="form-group">
                                <select class="form-control" id="modeSelect">
                                    <option id="fixEnNum">English Number</option>
                                    <option id="fixJpNum">Japanese Number</option>
                                </select>
                            </div>
                        </div>
                        <div class="main">
                            <form name="read">
                                <div class="form-group">
                                    <label for="num">Enter number:
                                        <input id="len" type="text" name="numlen" disabled/>
                                    </label>
                                    <input class="form-control" type="number" id='num' name="num" autocomplete="off" autofocus  placeholder="We accept interger number from -∞ to +∞"
                                           onClick="numToRoma();romaToHira();numToEn();enToVi();Kount();fixNum()"
                                           onKeyUp="numToRoma();romaToHira();numToEn();enToVi();Kount();fixNum()"/>
                                </div>
                                <div class="form-group">
                                    <label for="num">in Vietnamese:
                                        <input id="len" type="text" name="vilen" disabled/>
                                    </label>
                                    <input class="form-control" type="text" name="vi" id="vi" placeholder="Read up to 16 numbers."/>
                                </div>
                                <div class="form-group">
                                    <label for="num">in English:
                                        <input id="len" type="text" name="enlen" disabled/>
                                    </label>
                                    <input class="form-control" type="text" name="en" id="en" placeholder="Read up to 16 numbers."/>
                                </div>
                                <div class="form-group">
                                    <label for="num">in Hiragana:
                                        <input id="len" type="text" name="hiralen" disabled/>
                                    </label>
                                    <input class="form-control" type="text" name="hira" id="hira" placeholder="Read up to 16 numbers."/>
                                </div>
                                <div class="form-group">
                                    <label for="num">in Romaji:
                                        <input id="len" type="text" name="romalen" disabled/>
                                    </label>
                                    <input class="form-control" type="text" name="roma" id="roma" placeholder="Read up to 16 numbers."/>
                                </div>
                                <!-- copy jp-->
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-left:0;padding-right:0;">
                                    <div class="btn-group btn-group-justified">
                                        <!-- copy vi-->
                                        <div class="btn-group">
                                            <button class="btn btn-info" type="button" id="vi_copy" data-clipboard-target="#vi">Copy Vietnamese</button></div>
                                        <script>(function(){new Clipboard('#vi_copy');})();</script>
                                        <!-- copy en-->
                                        <div class="btn-group">
                                            <button class="btn btn-info" type="button" id="en_copy" data-clipboard-target="#en">Copy English</button></div>
                                        <script>(function(){new Clipboard('#en_copy');})();</script>
                                        <!-- copy hira-->
                                        <div class="btn-group">
                                            <button class="btn btn-info" type="button" id="hira_copy" data-clipboard-target="#hira">Copy Hiragana</button></div>
                                        <script>(function(){new Clipboard('#hira_copy');})();</script>
                                        <!-- copy roma-->
                                        <div class="btn-group">
                                            <button class="btn btn-info" type="button" id="roma_copy" data-clipboard-target="#roma">Copy Romaji</button></div>
                                        <script>(function(){new Clipboard('#roma_copy');})();</script>
                                        <!-- clear all-->
                                        <div class="btn-group">
                                            <button class="btn btn-danger" type="button" onClick="xoa()">Clear All</button>
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