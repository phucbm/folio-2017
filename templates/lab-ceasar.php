<?php
/*
Template Name: Lab - Ceasar
Template Post Type: post
 */
get_header();
get_bootstrap();


//---------------------code for ceasar
//source:https://sites.google.com/site/thanhtungtran81/home/bao-mat-thong-tin/thuat-toan-ceasar
global $k;
$k = isset($_POST['dist']) ? $_POST['dist'] : 3;
$plain = isset($_POST['plain']) ? $_POST['plain'] : "Bui Minh Phuc";
$cipher = isset($_POST['cipher']) ? $_POST['cipher'] : "";
$len = isset($_POST['plain']) ? strlen($_POST['plain']) : strlen($plain);

//chuyen chu thanh so
function charToNum($char){
	switch($char){
		case 'a': $num=0; break;
		case 'b': $num=1; break;
		case 'c': $num=2; break;
		case 'd': $num=3; break;
		case 'e': $num=4; break;
		case 'f': $num=5; break;
		case 'g': $num=6; break;
		case 'h': $num=7; break;
		case 'i': $num=8; break;
		case 'k': $num=9; break;
		case 'l': $num=10; break;
		case 'm': $num=11; break;
		case 'n': $num=12; break;
		case 'o': $num=13; break;
		case 'p': $num=14; break;
		case 'q': $num=15; break;
		case 'r': $num=16; break;
		case 's': $num=17; break;
		case 't': $num=18; break;
		case 'u': $num=19; break;
		case 'v': $num=20; break;
		case 'x': $num=21; break;
		case 'y': $num=22; break;
		case 'w': $num=23; break;
		case 'j': $num=24; break;
		case 'z': $num=25; break;
		case 'A': $num=26; break;
		case 'B': $num=27; break;
		case 'C': $num=28; break;
		case 'D': $num=29; break;
		case 'E': $num=30; break;
		case 'F': $num=31; break;
		case 'G': $num=32; break;
		case 'H': $num=33; break;
		case 'I': $num=34; break;
		case 'J': $num=35; break;
		case 'K': $num=36; break;
		case 'L': $num=37; break;
		case 'M': $num=38; break;
		case 'N': $num=39; break;
		case 'O': $num=40; break;
		case 'P': $num=41; break;
		case 'Q': $num=42; break;
		case 'R': $num=43; break;
		case 'S': $num=44; break;
		case 'T': $num=45; break;
		case 'U': $num=46; break;
		case 'V': $num=47; break;
		case 'X': $num=48; break;
		case 'Y': $num=49; break;
		case 'Z': $num=50; break;
		case 'W': $num=51; break;
		case '0': $num=52; break;
		case '1': $num=53; break;
		case '2': $num=54; break;
		case '3': $num=55; break;
		case '4': $num=56; break;
		case '5': $num=57; break;
		case '6': $num=58; break;
		case '7': $num=59; break;
		case '8': $num=60; break;
		case '9': $num=61; break;
		case ' ': $num=62; break;
		default: echo "This character is not supported: $char";
	}
	return $num;
}

//chuyen so thanh chu
function numToChar($num){
	switch($num){
		case 0: $char = 'a'; break;
		case 1: $char = 'b'; break;
		case 2: $char = 'c'; break;
		case 3: $char = 'd'; break;
		case 4: $char = 'e'; break;
		case 5: $char = 'f'; break;
		case 6: $char = 'g'; break;
		case 7: $char = 'h'; break;
		case 8: $char = 'i'; break;
		case 9: $char = 'k'; break;
		case 10: $char = 'l'; break;
		case 11: $char = 'm'; break;
		case 12: $char = 'n'; break;
		case 13: $char = 'o'; break;
		case 14: $char = 'p'; break;
		case 15: $char = 'q'; break;
		case 16: $char = 'r'; break;
		case 17: $char = 's'; break;
		case 18: $char = 't'; break;
		case 19: $char = 'u'; break;
		case 20: $char = 'v'; break;
		case 21: $char = 'x'; break;
		case 22: $char = 'y'; break;
		case 23: $char = 'w'; break;
		case 24: $char = 'j'; break;
		case 25: $char = 'z'; break;
		case 26: $char = 'A'; break;
		case 27: $char = 'B'; break;
		case 28: $char = 'C'; break;
		case 29: $char = 'D'; break;
		case 30: $char = 'E'; break;
		case 31: $char = 'F'; break;
		case 32: $char = 'G'; break;
		case 33: $char = 'H'; break;
		case 34: $char = 'I'; break;
		case 35: $char = 'J'; break;
		case 36: $char = 'K'; break;
		case 37: $char = 'L'; break;
		case 38: $char = 'M'; break;
		case 39: $char = 'N'; break;
		case 40: $char = 'O'; break;
		case 41: $char = 'P'; break;
		case 42: $char = 'Q'; break;
		case 43: $char = 'R'; break;
		case 44: $char = 'S'; break;
		case 45: $char = 'T'; break;
		case 46: $char = 'U'; break;
		case 47: $char = 'V'; break;
		case 48: $char = 'X'; break;
		case 49: $char = 'Y'; break;
		case 50: $char = 'Z'; break;
		case 51: $char = 'W'; break;
		case 52: $char = '0'; break;
		case 53: $char = '1'; break;
		case 54: $char = '2'; break;
		case 55: $char = '3'; break;
		case 56: $char = '4'; break;
		case 57: $char = '5'; break;
		case 58: $char = '6'; break;
		case 59: $char = '7'; break;
		case 60: $char = '8'; break;
		case 61: $char = '9'; break;
		case 62: $char = ' '; break;
		default: echo "This character is not supported: $num";
	}
	return $char;
}

//chuoi thanh mang so
function strToArrNum($str){
	$arrNum = array();
	for($i = 0; $i < strlen($str); $i++){
		$arrNum[$i] = charToNum(substr($str, $i, 1));
	}
	return $arrNum;
}

//mang so thanh chuoi
function arrNumtoStr(array $arrNumOfStr){
	$str = "";
	for($i = 0; $i < count($arrNumOfStr); $i++){
		$str = $str.numToChar($arrNumOfStr[$i]);
	}
	return $str;
}

//ma hoa
if(!empty($_POST['encrypt'])){
	function encrypt($plain){
		global $k;
		$arrNum = strToArrNum($plain);//chuyen chuoi vua nhap thanh mang so va gan vao $arrNum
		$arrNumOfStr = array();
		//tung so trong mang arrNum + do doi % 63 => so da duoc ma hoa, va gan vao mang arrNumOfStr
		for($i = 0; $i < count($arrNum); $i++){
			$arrNumOfStr[$i] = ($arrNum[$i] + $k) % 63;
		}
		$strEncrypted = arrNumToStr($arrNumOfStr);
		return $strEncrypted;
	}
	$cipher = encrypt($plain);
}

//giai ma
if(!empty($_POST['decrypt'])){
	function decrypt($cipher){
		global $k;
		$arrNum = strToArrNum($cipher);//chuyen chuoi vua nhap thanh mang so va gan vao $arrNum
		$arrNumOfStr = array();
		//tung so trong mang arrNum + do doi % 63 => so da duoc ma hoa, va gan vao mang arrNumOfStr
		for($i = 0; $i < count($arrNum); $i++){
			$arrNumOfStr[$i] = ($arrNum[$i] + (63 - $k)) % 63;
		}
		$strDecrypted = arrNumToStr($arrNumOfStr);
		return $strDecrypted;
	}
	$plain = decrypt($cipher);
}
//---------------------end code for ceasar

//xoa chuoi
if(!empty($_POST['clearStr'])){
	$plain = "";
	$cipher = "";
}

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
                        <form method="post">
                            <!-- distance -->
                            <div class="form-group">
                                <label for="sel1">Độ dời (0-62):</label>
                                <input class="form-control" type="number" name="dist" value="<?php echo $k;?>"min="0" max="62">
                            </div>
                            <!-- Text length -->
                            <div class="form-group">
                                <label class="control-label" for="email">Độ dài chuỗi:</label>
                                <input class="form-control" value="<?php echo $len;?>" disabled>
                            </div>

                            <!-- Normal message -->
                            <div class="form-group">
                                <label class="control-label" for="email">Chuỗi bình thường:</label>
                                <textarea class="form-control" name="plain" rows="4" cols="50" autofocus><?php echo $plain;?></textarea>
                            </div>
                            <input class="btn btn-primary btn-block" type="submit" name="encrypt" value="Mã hóa">
                            <!--<button class="btn btn-primary btn-block" type="submit" name="encrypt">Mã hóa</button>

							<!-- Encrypted message -->
                            <div class="form-group">
                                <label class="control-label" for="email">Chuỗi đã mã hóa:</label>
                                <textarea class="form-control" name="cipher" rows="4" cols="50"><?php echo $cipher;?></textarea>
                            </div>
                            <input class="btn btn-primary btn-block" type="submit" name="decrypt" value="Giải mã">

                            <!-- clear message -->
                            <button class="btn btn-warning btn-block" type="submit" name="clearStr" value="Clear messages">Xóa chuỗi</button>
                        </form>
                    </div>

                    <div class="post-tags"> <?php echo $tag_container; ?> </div>

	                <?php get_fb_plugin(get_the_permalink());?>

                </div>
            </div>
        </main>

	<?php endwhile; ?>


<?php get_footer(); ?>