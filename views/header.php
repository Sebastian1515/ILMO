<?php
$header = '
<div id="header">
	<div class="side-description">
		<a class="logo" href="./index.php" title="'.$this->oLang->texts['HOME'].'">
			<img src="'.BASE_URL.'images/logo_library.png" border=0 />
		</a>
		<h1>'.$this->oLang->library_info['LIBRARY_NAME'].'</h1>
		<p>'.$this->oLang->library_info['LIBRARY_DESCRIPTION'].'</p>
	</div>';
$header.='<br><br>
	<div class="language">
		<form action="'.$_SERVER["PHP_SELF"].'" method="post">
		<input type = hidden name="ac" value = "language_change">'.
        $this->oLang->texts['LANGUAGE'].':<input type="radio" id="session_english" name="session_language" value="english"';
            if ($_SESSION['language']=='english') {
                $header .= 'checked';
            }
                $header.=  '>
					<label for="session_english">'.$this->oLang->texts['ENGLISH'].' </label>
					<input type="radio" id="session_german" name="session_language" value="german"';
            if (($_SESSION['language']=="german") or (!isset($_SESSION['language']))) {
                $header .= ' checked';
            }
    $header.= '>
		<label for id ="session_german">'.$this->oLang->texts['GERMAN'].'</label><br>
		<input type="submit" value="'.$this->oLang->texts['CHANGE_LANGUAGE'].'">
		</form>
	</div>

</div>
</div>';
echo $header;
