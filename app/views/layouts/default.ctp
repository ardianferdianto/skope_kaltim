<!DOCTYPE html>
<html lang="en" id="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?php echo $this->webroot; ?>favicon.ico"/>

    <title>SKOPE</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->webroot;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo $this->webroot;?>css/cover.css" >
    <link rel="stylesheet" href="<?php echo $this->webroot;?>css/animsition.min.css" >
    
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/tooltipster.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/themes/tooltipster-light.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/themes/tooltipster-noir.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/themes/tooltipster-punk.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/themes/tooltipster-shadow.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/videojs.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/videojs.record.css" />
    <style>
     .takeSnapshot,
        .takeSnapshot:hover,
        .takeSnapshot:active {
            background-color: transparent;
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAYdEVYdFNvZnR3YXJlAHBhaW50Lm5ldCA0LjAuM4zml1AAAAO1SURBVHhe7VpNixNBEN17focevewP3IMIgiDeBT2IoIgoIoJ40IMigoh48CQLwiZZkaCbZLNfCfG93pqme6Yyk5mepbPTPnhUp7pnmHrd1R8z2Voul0lTdaZE1ZkSVWdKVJ0pUXWmRNWZElVnSlSdKVF1rsEeeEW4syavbm9vb7VN3DeIqrOCvfF4/BG2FnDNV5jWRcA9g6g6K8heb4odLYgQ4p5BVJ0VTEYAN88tF4vFA9imuAdq80MIC8+4goynEGfBAfZOTk5uHh4e/kW5M5jNZlN03nUUPSHcwMnewcHBd9jOQkSwMXvBTyaTD7AWmLn3jo+Pn8vPTmA6nY5g7ChwBWCeWJydnT2CyeaBroExrRYA+f8GJlOpsQDIu1cwO7Cvzz3tQCbiykkQI/gzrAbWrxYAsA2kXBtIp/cwZuND27IIdjlFuYy9FSl88QJwsskeUh6UvdUW1hWA1J7/4gXAavINxo4ADMcfpqIdbL4ABILeRSrcgf0prlYgE3QmbhXjCXCRgKg8kK2zE7wG5kG/iS8LMh+obSDlruG/AKCJLwsyH2gUATCsfw2Hw6f7+/uPaQeDwTPsSSZS3SY2SwBZq5nPhRcm9LEuv00PxGYIgB7/AqMGnifbsC2uGcKGIr4Ask22gbMMUgyNXjuIwNdrIYgrgCxhXlA4pb01lQpQ9w7Ga4+UGJjKZognAF9MwOSD+W0qSwAR/sC413FkNEU8AU5PT2+4wWMCnJ3XVEPO8kYEWhkZTRBHAAnWBoDzwidTUQNyqszu0XQUxBGAa7vT+yFD2ByGYDkKOCrqIo4AueEfLADZ7/dfiK8O4ggA2AdHz90WXxPY+4xGo7viq4P4AvDVu/ia4HIK4L4lws9WUgDzyhPx1UEcAXjICRVADkd2JWm4NY4jgLsJom3yohTX3AoVEYgjgMAOX5TZg3vn7mrIVysrYMBHm3gCSMAmCEeEXVNZAjd4uS5kDoknAHF0dPQSxhOBy6KkiAfk/FiWTK99k12kg7gCEPP5/CGMDSoLDGTPuiy0gVA8SocgvgCE5LAXYBnZVo7SodgMAQgExG8GhZ52g2a9/GdhjHIbKBdAcjT442gdMP+xq7uPopcCECj07Y+GcgEIWaOT+jzOP0h4r5l4fhchOgOkEf/6o/5Bguxib3so+4sMaYb8OhuTywb2PN9HoGh7n3SDd5nl/jr0Jq0I1J5Joxd4xoIjNarOlKg6U6LqTImqMyWqzpSoOlOi6kyJqjMlqs6UqDrT4XLrH5iAs+/bwo6TAAAAAElFTkSuQmCC') !important;
            background-position: center center !important;
            background-repeat: no-repeat !important;
            height: 44px;
            margin: .2em;
            position: absolute;
            width: 63px;
            z-index: 200;
            border: 0;
            cursor: pointer;
        }
    </style>

    <?php echo $html->css('jquery.fancybox'); ?>

    <?php echo $html->css('helpers/jquery.fancybox-buttons.css?v=1.0.5'); ?>
    <?php echo $html->css('helpers/jquery.fancybox-thumbs.css?v=1.0.7'); ?>


    <!-- Custom basic template -->
    <?php

      //echo $html->css('normalize.css');
      //echo $html->css('book1.css');
      echo $html->css('app.css');
      echo $html->css('bootstrap-colorselector.css');

      echo $javascript->link('modernizr.custom.js'); 
      echo $javascript->link('jquery-2.1.4.min.js');
      echo $javascript->link('jquery.tooltipster.min.js');
      echo $javascript->link('bootstrap-colorselector.js');
      echo $javascript->link('ckeditor/ckeditor.js');
      echo $javascript->link('jquery.form.min.js');
      echo $javascript->link('jquery-ui.min.js');
    ?>
    <?php echo $javascript->link('jquery.fancybox.pack.js'); ?>
    <?php echo $javascript->link('/css/helpers/jquery.fancybox-buttons.js?v=1.0.5'); ?>
    <?php echo $javascript->link('/css/helpers/jquery.fancybox-media.js?v=1.0.6'); ?>
    <?php echo $javascript->link('/css/helpers/jquery.fancybox-thumbs.js?v=1.0.7'); ?>

    <!--<script src="<?php echo $this->webroot;?>js/jquery.1.11.3.js"></script>-->
    <script type="text/javascript">
      window.urlscriptCam = '<?php echo $this->webroot;?>js/ScriptCam-master/';

    </script>
    <script src="<?php echo $this->webroot;?>js/jquery.animsition.min.js"></script>
    <script src="<?php echo $this->webroot;?>js/jquery.transit.min.js"></script>
    <script src="<?php echo $this->webroot;?>js/notify.min.js"></script>

    <!-- socket.io for signaling -->
<script src="<?php echo $this->webroot;?>node/notify.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
  
  $(".animsition").animsition({
  
    inClass               :   'fade-in',
    outClass              :   'fade-out',
    inDuration            :    1500,
    outDuration           :    800,
    linkElement           :   '.animsition-link',
    // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
    loading               :    true,
    loadingParentElement  :   'body', //animsition wrapper element
    loadingClass          :   'animsition-loading',
    unSupportCss          : [ 'animation-duration',
                              '-webkit-animation-duration',
                              '-o-animation-duration'
                            ],
    //"unSupportCss" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    //The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    
    overlay               :   false,
    
    overlayClass          :   'animsition-overlay-slide',
    overlayParentElement  :   'body'
  });
});
    </script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><![endif]-->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
  </head>

  <body id="<?php echo $positionnav;?>">

    <div class="site-wrapper animsition">

      <!--<span><p><a href="http://localhost:8888/client.html">Skope Conference</a></p></span>-->
      <div class="site-wrapper-inner container-fluid">

        <!--<button id="connectnode" type="button" class="btn btn-warning btn-lg connectserver" >
            <span class="glyphicon glyphicon glyphicon-facetime-video" aria-hidden="true"></span> <br/>Connect Server
        </button>-->
        <div class="cover-container ">
          
          <?php echo $content_for_layout;?>
            <?php if($positionnav!='editordisplay'):?>
            <div class="mastfoot">
              
              <p> Hak cipta dan seluruh konten dilindungi undang undang atas nama
                <br/>PT. Ide Hasama Indonesia &#169; 2015 made with love in Indonesia
              </p>
              <img src="<?php echo $this->webroot?>art/smicro_new/hasama_logo.png">
              
            <!-- <div class="inner">
              <p>SKOPE dibuat di Indonesia dengan agsfsfgsgasafgsagf.</p>
            </div> -->
          </div>
          <?php endif;?>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    
    <script src="<?php echo $this->webroot;?>js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $( document ).on( "click", ".buttonmikroskop", function(e) {
      //removing js sementara
      function removejscssfile(filename, filetype){
        var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none" //determine element type to create nodelist from
        var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none" //determine corresponding attribute to test for
        var allsuspects=document.getElementsByTagName(targetelement)
        for (var i=allsuspects.length; i>=0; i--){ //search backwards within nodelist for matching elements to remove
        if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(filename)!=-1)
            allsuspects[i].parentNode.removeChild(allsuspects[i]) //remove element by calling parentNode.removeChild()
        }
      } 
      $.fancybox({
        type: 'ajax',
        width:350,
        height:350,
        autoSize: false,
        title   : 'CONNECT MIKROSKOP',
        content: '<div id="mikroskoppage"></div>',
        beforeShow : function(){

            removejscssfile("<?php echo $this->webroot;?>skope_node/RTCMultiConnection.js", "js");
            $.ajax({
              type: "GET",
              dataType: "html",
              cache: false,
              url: "<?php echo $this->webroot;?>halamen/showlandingmikroskop", // preview.php
              //data: $("#postp").serializeArray(), // all form fields
              success: function (data) {
                $('#mikroskoppage').append(data);
                
              } // success
            }); // ajax
        },
        beforeClose : function(){
          $('#mikroskoppage').remove();
          $(window).trigger('fancyboxBeforeClose');
          //$('#mikroskoppage').html('');
        }
        
      }); //fancybox
    });
    </script>
    <script type="text/javascript">
    //window.appurlname = '<?php echo $urlappname;?>';
    </script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
  </body>
</html>