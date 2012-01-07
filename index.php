<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Comment for Grabcad</title>
        <style>

            #leftresponse {

                position: absolute;
                float: left;
                width:510px;
                height: 235px;
                background:#dddddd;
                padding:10px;
                border: 1px solid gray;
            }

            #rightresponse {
                position: absolute;
                float:right;
                margin-left: 520px;
                width:290px;
                height: 235px;
                padding:10px;
                border: 1px solid gray;
                background:#dddddd;
            }

            #response{
                position: absolute;
                top: 50px;
                

            }

            #commentbox{
                position: relative;
                top: 300px;
            }

            #container{
                position:relative;
                height: 500px;
                width: 900px;
                background-color: gray;
                margin-left: auto;
                margin-right: auto;
                padding: 25px;
                
            }




        </style>

    </head>
    <body>
        <div id="container">


            <form id="commentbox"  method="post">



                <textarea id="comment" name="comment" value="comment" placeholder="Please type your message" required="required" cols="80" rows="10" maxlength="10000"></textarea> 

                <div id="submitComment">

                    <button id="submit" name="submit">Save</button>


                </div>


            </form>




            <?php
            $video = '';
            $noUrlcomment = $_POST['comment'];
            if ($_POST) {

                // The Regular Expression filter
                $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

                // The Text you want to filter for urls
                $text = $_POST['comment'];
                
                // Check if there is a url in the text
                 
                if(preg_match($reg_exUrl,$text,$url)){
                    $noUrlcomment = preg_replace($reg_exUrl,'', $text);
                    
                }



                $res = parse_url($_POST['comment']);
                $vidid = substr($res['query'], 2, 11);
                if (isset($vidid)) {
                    $video = "<object width=\"290\" height=\"235\"><param name=\"movie\" value=\"http://www.youtube.com/v/" . $vidid . "&hl=en&fs=1&rel=0\">
            </param><param name=\"allowFullScreen\" value=\"true\"></param>
            <embed src=\"http://www.youtube.com/v/" . $vidid . "&hl=en&fs=1&rel=0\" type=\"application/x-shockwave-flash\" allowfullscreen=\"true\" width=\"290\" height=\"235\">
                </embed></object>";
                } else {
                    $content = '';
                }
            }
            ?>
            <div id="response">
                <div id="leftresponse"><?php echo htmlspecialchars($noUrlcomment, ENT_NOQUOTES); ?></div>
                <div id="rightresponse"><?php echo $video; ?></div>
            </div>
        </div>
    </body>
</html>
