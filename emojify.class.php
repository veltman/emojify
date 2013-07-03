<?php

/*

  Replaces variables in a PHP script with random emojis.  You could easily extend this to apply to function and class names
  by adding T_STRING to the $types array, but I wouldn't advise it.  That generic type encompasses other things and can create
  problems.  Even just processing variable names can potentially break a lot of stuff, depending on how your code is structured.
  It will do the job on a simple script with variable names and no classes defined within the same text.
  However, something like this would cause problems:

    public class jaquith {
      public $waldo = true;
    }

    $waldo = 1;

    $wj = new jaquith();

    echo $wj->waldo;

  Be careful.

  Also probably just don't use this at all, what a bad idea!

  Thanks to TinyPHP for lighting the way: https://github.com/mattgaidica/TinyPHP/
*/
class emojify {

  //The source to be find/replaced
  public $source = '';

  //It would be easier to read this in from a file or use one long string, but weird multibyte issues arise.  This gets the job done.
  //Customize as needed (using the word "needed" loosely)
  public $emoji_list = array('😁','😂','😃','😄','😅','😆','😉','😊','😋','😌','😍','😏','😒','😓','😔','😖','😘','😚','😜','😝','😞','😠','😡','😢','😣','😤','😥','😨','😩','😪','😫','😭','😰','😱','😲','😳','😵','😷','😸','😹','😺','😻','😼','😽','😾','😿','🙀','🙅','🙆','🙇','🙈','🙉','🙊','🙋','🙌','🙍','🙎','🙏','🚀','🚃','🚄','🚅','🚇','🚉','🚌','🚏','🚑','🚒','🚓','🚕','🚗','🚙','🚚','🚢','🚤','🚥','🚧','🚨','🚩','🚪','🚫','🚬','🚭','🚲','🚶','🚹','🚺','🚻','🚼','🚽','🚾','🛀','🅰','🅱','🅾','🅿','🆎','🆑','🆒','🆓','🆔','🆕','🆖','🆗','🆘','🆙','🆚','🈁','🈂','🈚','🈯','🈲','🈳','🈴','🈵','🈶','🈷','🈸','🈹','🈺','🉐','🉑','🀄','🃏','🌀','🌁','🌂','🌃','🌄','🌅','🌆','🌇','🌈','🌉','🌊','🌋','🌌','🌏','🌑','🌓','🌔','🌕','🌙','🌛','🌟','🌠','🌰','🌱','🌴','🌵','🌷','🌸','🌹','🌺','🌻','🌼','🌽','🌾','🌿','🍀','🍁','🍂','🍃','🍄','🍅','🍆','🍇','🍈','🍉','🍊','🍌','🍍','🍎','🍏','🍑','🍒','🍓','🍔','🍕','🍖','🍗','🍘','🍙','🍚','🍛','🍜','🍝','🍞','🍟','🍠','🍡','🍢','🍣','🍤','🍥','🍦','🍧','🍨','🍩','🍪','🍫','🍬','🍭','🍮','🍯','🍰','🍱','🍲','🍳','🍴','🍵','🍶','🍷','🍸','🍹','🍺','🍻','🎀','🎁','🎂','🎃','🎄','🎅','🎆','🎇','🎈','🎉','🎊','🎋','🎌','🎍','🎎','🎏','🎐','🎑','🎒','🎓','🎠','🎡','🎢','🎣','🎤','🎥','🎦','🎧','🎨','🎩','🎪','🎫','🎬','🎭','🎮','🎯','🎰','🎱','🎲','🎳','🎴','🎵','🎶','🎷','🎸','🎹','🎺','🎻','🎼','🎽','🎾','🎿','🏀','🏁','🏂','🏃','🏄','🏆','🏈','🏊','🏠','🏡','🏢','🏣','🏥','🏦','🏧','🏨','🏩','🏪','🏫','🏬','🏭','🏮','🏯','🏰','🐌','🐍','🐎','🐑','🐒','🐔','🐗','🐘','🐙','🐚','🐛','🐜','🐝','🐞','🐟','🐠','🐡','🐢','🐣','🐤','🐥','🐦','🐧','🐨','🐩','🐫','🐬','🐭','🐮','🐯','🐰','🐱','🐲','🐳','🐴','🐵','🐶','🐷','🐸','🐹','🐺','🐻','🐼','🐽','🐾','👀','👂','👃','👄','👅','👆','👇','👈','👉','👊','👋','👌','👍','👎','👏','👐','👑','👒','👓','👔','👕','👖','👗','👘','👙','👚','👛','👜','👝','👞','👟','👠','👡','👢','👣','👤','👦','👧','👨','👩','👪','👫','👮','👯','👰','👱','👲','👳','👴','👵','👶','👷','👸','👹','👺','👻','👼','👽','👾','👿','💀','💁','💂','💃','💄','💅','💆','💇','💈','💉','💊','💋','💌','💍','💎','💏','💐','💑','💒','💓','💔','💕','💖','💗','💘','💙','💚','💛','💜','💝','💞','💟','💠','💡','💢','💣','💤','💥','💦','💧','💨','💩','💪','💫','💬','💮','💯','💰','💱','💲','💳','💴','💵','💸','💹','💺','💻','💼','💽','💾','💿','📀','📁','📂','📃','📄','📅','📆','📇','📈','📉','📊','📋','📌','📍','📎','📏','📐','📑','📒','📓','📔','📕','📖','📗','📘','📙','📚','📛','📜','📝','📞','📟','📠','📡','📢','📣','📤','📥','📦','📧','📨','📩','📪','📫','📮','📰','📱','📲','📳','📴','📶','📷','📹','📺','📻','📼','🔃','🔊','🔋','🔌','🔍','🔎','🔏','🔐','🔑','🔒','🔓','🔔','🔖','🔗','🔘','🔙','🔚','🔛','🔜','🔝','🔞','🔟','🔠','🔡','🔢','🔣','🔤','🔥','🔦','🔧','🔨','🔩','🔪','🔫','🔮','🔯','🔰','🔱','🔲','🔳','🔴','🔵','🔶','🔷','🔸','🔹','🔺','🔻','🔼','🔽','🕐','🕑','🕒','🕓','🕔','🕕','🕖','🕗','🕘','🕙','🕚','🕛','🗻','🗼','🗽','🗾','🗿','😀','😇','😈','😎','😐','😑','😕','😗','😙','😛','😟','😦','😧','😬','😮','😯','😴','😶','🚁','🚂','🚆','🚈','🚊','🚍','🚎','🚐','🚔','🚖','🚘','🚛','🚜','🚝','🚞','🚟','🚠','🚡','🚣','🚦','🚮','🚯','🚰','🚱','🚳','🚴','🚵','🚷','🚸','🚿','🛁','🛂','🛃','🛄','🛅','🌍','🌎','🌐','🌒','🌖','🌗','🌘','🌚','🌜','🌝','🌞','🌲','🌳','🍋','🍐','🍼','🏇','🏉','🏤','🐀','🐁','🐂','🐃','🐄','🐅','🐆','🐇','🐈','🐉','🐊','🐋','🐏','🐐','🐓','🐕','🐖','🐪','👥','👬','👭','💭','💶','💷','📬','📭','📯','📵','🔀','🔁','🔂','🔄','🔅','🔆','🔇','🔉','🔕','🔬','🔭','🕜','🕝','🕞','🕟','🕠','🕡','🕢','🕣','🕤','🕥','🕦','🕧');

  public $exclude_list = array(  
    '$GLOBALS',
    '$_SERVER',
    '$_GET',
    '$_POST',
    '$_FILES',
    '$_REQUEST',
    '$_SESSION',
    '$_ENV',
    '$_COOKIE',
    '$php_errormsg',
    '$HTTP_RAW_POST_DATA',
    '$http_response_header',
    '$argc',
    '$argv'
  );

  //Types to emojify.  Variables are easy, but function names and class names are more complicated,
  //because they use the generic T_STRING.  Be careful.
  public $types = array(T_VARIABLE);

  public $found = array();

  public $num_found = 0;

  //Constructor, include source code and optional extra exclusions (can be array or single exclusion)
  function emojify($user_source = '',$user_exclude = array()) {    

    $this->source = strval($user_source);

    $this->exclude($user_exclude);

    $this->clear_found();

  }  

  //Set the source code to be find/replaced
  function source($user_source = '') {

    $this->source = strval($user_source);

  }

  //Add user-provided exclusions to list
  function exclude($user_exclude = array()) {
    
    if (is_array($user_exclude)) {

      foreach ($user_exclude as $user_exclusion) {
        $this->exclude($user_exclusion);
      }

    } else {

      $type = gettype($user_exclude);

      if (in_array($type,array('boolean','integer','double','string')) && !in_array($user_exclude,$this->exclude_list)) {
        $this->exclude_list[] = strval($user_exclude);
      }
    }

  }

  //Starting a new run
  protected function clear_found() {

    foreach ($this->types as $type) {

      $this->found[$type] = array();

    }
    
    $this->num_found = 0;

  }

  protected function replace($token) {

    //Just-in-case error checks
    if (!is_array($token)) {

      return strval($token);

    }

    if (in_array($token[1],$this->exclude_list) || !in_array($token[0],$this->types)) {

      return strval($token[1]);

    }    

    //Does it already have a replacement?
    if (!isset($this->found[$token[0]][$token[1]])) {

      $prepend = '';   

      if ($token[0] == T_VARIABLE) {
        $prepend = '$';
      }


      $this->found[$token[0]][$token[1]] = $prepend . $this->random_emoji();

      $this->num_found++;

    }

    return strval($this->found[$token[0]][$token[1]]);    

  }

  //Construct a new random emoji string
  protected function random_emoji() {    

    $new = '';    
    
    $positions = $this->convert_decimal_to_base_emoji($this->num_found,count($this->emoji_list));      

    foreach ($positions as $key => $pos) {

      //Ones digit is count-from-zero, the rest need to be decremented.  NUMBER BASES!!!!!
      if ($key < count($positions) - 1) {
        $pos--;
      }

      $new .= $this->emoji_list[$pos];
    }
    
    return $new;    

  }

  //Recurse through a number and return an array of positions based on how many emojis there are to choose from.
  //Ex: if it's the 37th variable found and there are 30 emojis, it will return positions for [Emoji #1][Emoji #7]
  protected function convert_decimal_to_base_emoji($num,$base) {
    $array = array();

    if ($num >= $base) {
      $array = $this->convert_decimal_to_base_emoji(floor($num/$base),$base);
    } else {
      $array = array();
    }

    $array[] = $num % $base;

    return $array;

  }

  //Return emojified version of source, applying exclusions
  function run() {

    shuffle($this->emoji_list);

    $output = '';

    $this->clear_found();
    
    //Split source into tokens
    $tokens = token_get_all($this->source);
    
    //Loop through all tokens
    foreach ($tokens as $token) {      

      //If it's an array...
      if (is_array($token)) {

        //If it's a replaceable type and not excluded, add the emoji equivalent to the output
        if (in_array($token[0],$this->types) && !in_array($token[1],$this->exclude_list)) {

              $output .= $this->replace($token);
              continue;

        }
      
        //Otherwise just add it to the output
        $output .= strval($token[1]);

      //Otherwise just add it to output
      } else {
      
        $output .= strval($token);
      
      }
      
    }

    return $output;

  }

}

?>