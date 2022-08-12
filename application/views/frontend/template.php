<!doctype html>
<html>
<head>

<script data-ad-client="ca-pub-3010639523728587" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171500459-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171500459-1');
</script> -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D8473T0FPM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D8473T0FPM');
</script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->template->title; ?></title>

    <meta name="description" content="<?php echo $this->template->description; ?>">
    <meta property="og:image" content="<?php echo $this->template->image; ?>" />
    
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@Redaksi09" />
    <meta name="twitter:creator" content="@Redaksi09" />
    <meta name="twitter:title" content="<?php echo $this->template->twitter_title; ?>" />
    <meta name="twitter:description" content="<?php echo $this->template->twitter_description; ?>" />
    <meta name="twitter:image" content="<?php echo $this->template->twitter_image; ?>"/>
    
    <meta name="Rumah Media" content="">
    <?php echo $this->template->meta; ?>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/public/images/icon.png"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/sm-core-css.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/sm-simple.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/sm-blue.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/css/jquery.bxslider.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <?php echo $this->template->stylesheet; ?>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/jquery.bxslider.js"></script>
    <script src="<?php echo base_url();?>/public/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>/public/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>/public/js/koepoekoepoelike.js"></script>
    <script src="<?php echo base_url();?>/public/js/jquery.smartmenus.min.js"></script>

    <!-- or -->
    <?php echo $this->template->javascript; ?>
    <script>
        function changeArrow(elm) {
            if ($(".panel-title span").not($(elm).find("span")).is(".glyphicon-chevron-down")) {
                $(".panel-title span").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-right");
            }
            $(elm).find("span").toggleClass("glyphicon-chevron-down glyphicon-chevron-right");
        }
    </script>
</head>
<body style="background-color: #efefef;">
            
<?php
// This is the main content partial
echo $this->template->header;

?>
    <div class="container">
        <div class="row" style="background-color: white;">

<?php

echo $this->template->content;

echo $this->template->sidebar;

echo $this->template->bottom;

?>
        </div>
        
    </div>

<?php

echo $this->template->footer;

?>
<button id="likeModalToggle" data-toggle="modal" data-target="#likeModal" class="hidden"></button>
<div id="likeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Notification</h4>
            </div>
            <div class="modal-body text-center" id="likeNotification">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
            </div>
        </div>

    </div>
</div>
<div id="SEARCHMODAL" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search Dialog</h4>
            </div>
            <div class="modal-body text-center">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
            </div>
        </div>

    </div>
</div>

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- iklan display -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3010639523728587"
     data-ad-slot="8814501932"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

</body>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12976973-25"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-12976973-25');
</script>

<script>
    $(document).ready(function() {
        $('.sosmed-share').click(function(e) {
            e.preventDefault();
            window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
            return false;
        });
        $('#main-menu').smartmenus();
    });
</script>
</html>