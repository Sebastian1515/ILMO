<?php

/*
Outputs button that redirects to the "Add User" Page
*/
if ($this->check_permission("SAVE_USER", $_SESSION['role'])) {
    $aUser = $this->aUser[$_SESSION['user_ID']];
    $text_fields_to_show = array("forename", "surname", "email");
    $checkbox_fields_to_show = ["role"=> ["2" => "ADMIN",
                "1" => "USER"],
            "language" => ["english" => "ENGLISH",
                    "german" => "GERMAN"]
                ];
    $output = "";
    $output.='
		<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
		<input type = hidden name="ac" value = "user_save">
		<input type = hidden name="user_ID" value = "'.$aUser['user_ID'].'"';
    /* The user has certain properties that shoud be displayed
     * These properties are listed in text_field_to_show and checkbox_fields_to_show
     */
    foreach ($aUser as $key=>$val) {
        if (in_array($key, $text_fields_to_show)) {
            // Show a text field with th values filled in
            $label = "<label for='$key'>".$this->oLang->texts[strtoupper($key)]."</label>";
            $input_box = "<input type='text' name=$key id=$key value=$val>";
            $output .= $label.$input_box;
        }
        if (in_array($key, array_keys($checkbox_fields_to_show))) {
            // Show checkboxes for all options
            $div = "<div class=radio_container>";
            foreach ($checkbox_fields_to_show[$key] as $option => $label) {
                $box = "<label for='$option'>".$this->oLang->texts[$label];
                $box  .= "<input type='radio' name='$key' id='$option' value='$option'";
                if ($val == $option) {
                    $box .= " checked";
                }
                $box .= "><span class=checkmark></span></label>";
                $div .= $box;
            }
            $div .= "</div>";
            $output .= $div;
        }
    }
    $output .= '<input type="submit" value="'.$this->oLang->texts['BUTTON_SAVE_CHANGES'].'"></form>';
    echo $output;
}
if ($this->check_permission("CHANGE_PASSWORD_SELF", $_SESSION['role'])) {
    $form ='
		<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
		<input type = hidden name="ac" value = "self_pw_change">
		<input type="submit" value="'.$this->oLang->texts['BUTTON_CHANGE_PASSWORD'].'">
		</form>';
    echo $form;
}

?>

