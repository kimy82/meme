<?php setlocale(LC_ALL,'ca_ES.UTF-8'); ?>
<?php $this->output->set_header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <link href="<?php echo base_url();?>css/reset.css" rel="stylesheet" type="text/css" />
    
    <!--ESTILS-->
    <style type="text/css">
	
	h4.adress {font: 12px/13px 'ColaborateLightRegular', Arial, sans-serif;padding-top:5px;}
	ul#idiomes { font: 14px/16px 'ColaborateThinRegular', Arial, color:#888;}
	ul#menu { font: 12px/12px 'ColaborateThinRegular', Arial, color:#888;}
	h1.interior_design {color: #000000;font-family: 'Josefin Sans',sans-serif;font-size: 26px;font-weight: 200;}
	td.projectes_b {font: 13px/14px 'ColaborateLightRegular', Arial,sans-serif; color:#444;}
	td.projectes_fecha, td.projectes_fecha a {font: 13px/14px 'ColaborateMediumRegular', Arial, sans-serif; color:#222; text-decoration: none; }
	td.projectes_titol {font: 13px/14px 'ColaborateLightRegular', Arial,sans-serif; color:#111;}
	td.projectes {font: 12px/13px 'ColaborateLightRegular', Arial, sans-serif; color:#777;}
	td.projectes_t {font: 18px/27px 'ColaborateLightRegular', Arial, sans-serif; font-size:13px;color:#777;padding-top:5px;line-height:1;}
	td.projectes_e {padding:10px;}
	
	ul#idiomes {color: #888888;font: 14px/15px 'ColaborateLightRegular', Arial,sans-serif;}
	ul#menu {color: #888888;font: 12px/13px 'ColaborateRegular', Arial,sans-serif;}
	
	
	
	h1.fontface {font: 60px/68px 'ColaborateThinRegular', Arial, sans-serif;letter-spacing: 0;}

	p.style1 {font: 18px/27px 'ColaborateThinRegular', Arial, sans-serif;}
	p.style2 {font: 18px/27px 'ColaborateLightRegular', Arial, sans-serif;}
	p.style3 {font: 18px/27px 'ColaborateRegular', Arial, sans-serif;}
	p.style4 {font: 18px/27px 'ColaborateMediumRegular', Arial, sans-serif;}
	p.style5 {font: 18px/27px 'ColaborateBoldRegular', Arial, sans-serif;}
    </style>    
    
    <link href="<?php echo base_url();?>css/estils.css?v=104" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/stylesheet.css" type="text/css" charset="utf-8">    
    <!--FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:200,400,600,700' rel='stylesheet' type='text/css'>    
    
    
    <link href="<?php echo base_url();?>css/fancybox.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    
    <!--[if lt IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/IE6.css" />
    <![endif]-->
    
    <!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/IE7.css" />
    <![endif]-->
    
    <link rel="alternate" type="application/rss+xml" title="RSS blog" href="<?php echo get_news_url('rss'); ?>" />  
    
    <?php if(defined('BLOG_TEMPLATE')) : ?>
    <link href="<?php echo base_url();?>css/blog.css" rel="stylesheet" type="text/css" />    
    <?php endif; ?>
    
    <title><?php echo $page_title; ?></title>
    <?php echo isset($meta_keywords) ? $meta_keywords : ''; ?>
    <?php echo isset($meta_description) ? $meta_description : ''; ?>
    
    <?php if(isset($opengraph_data)) : ?>
    <meta property="og:title" content="<?php echo htmlentities(strip_tags($opengraph_data['title']));?>"/>
    <meta property="og:type" content="<?php echo $opengraph_data['type'];?>"/>
    <meta property="og:url" content="<?php echo $opengraph_data['url'];?>"/>
    <meta property="og:image" content="<?php echo $opengraph_data['image'];?>"/>
    <meta property="og:description" content="<?php echo htmlentities(strip_tags($opengraph_data['description']));?>"/>
    <meta property="og:site_name" content="meme"/>
    <meta property="fb:admins" content="<?php echo config_item('facebook_admins');?>"/>
    <meta property="fb:app_id" content="<?php echo config_item('facebook_app_id');?>"/>
    <?php else : ?>
    <link rel="image_src" href="<?php echo base_url();?>images/logoatelier.jpg" />
    <?php endif; ?>    
    
    <!--SCRIPTS-->
    <script type="Text/Javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/functions.js"></script>

<script type="text/javascript" charset="utf-8">
	$(function(){
		$('#menu li a').click(function(event){
			var elem = $(this).next();
			if(elem.is('ul')){
				event.preventDefault();
				$('#menu ul:visible').not(elem).slideUp();
				elem.slideToggle();
			}                        
		});
	});
</script>    
<!--FONTS-->
<script type="text/javascript">
    WebFontConfig = {
        google: { families: [ 'Josefin+Sans:400,600,700:latin' ] }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>    
       
</head>

<body>
    
<div id="content">

    <div id="content_left">

        <div id="header">
            <div id="header-left">
                <a href="<?php echo homepage_link(); ?>" title="<?php echo label('site_name'); ?>">
                    <?php if(defined('BLOG_TEMPLATE')) : ?>
                    <img src="<?php echo base_url();?>images/logomeme_blog.jpg" width="301" height="45" alt="<?php echo label('site_name'); ?>" />                    
                    <?php else : ?>
                    <img src="<?php echo base_url();?>images/logomeme.jpg" width="301" height="45"alt="<?php echo label('site_name'); ?>"/>
                    <?php endif; ?>
                </a>

                <?php echo editable_element('footer_details', TRUE)?>                        

            </div><!--end header-left-->

            <div id="header-right">
                <h1 class="interior_design">
                    INTERIOR DESIGN<br />
                    <span class="grey">&</span>ARCH
                </h1>
            </div><!--end header-right-->
        </div><!--end header-->                

        <!-- contingut -->
        <?php echo $content; ?>


    </div><!--end content_left-->
    <div id="content_right">
        <ul id="idiomes">
        <?php echo list_languages('li', 'images'); ?>
        </ul>
        <div class="clear"></div>

        <!-- /////////////  menu ///////////////////////////// -->
        <ul id="menu">
        <?php echo tree_menu('main',0); ?>
        </ul>
        <!-- //////////// End menu ////////////////////////////-->
        
        <!-- //////////// blog menu //////////////////////////-->
        <?php blog_menu(); ?>
        <!-- /////////// End blog menu ///////////////////////-->

    </div><!--end content right-->
    <div class="clear"></div>
    <div class="footer"></div>

</div>
      
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo label('google_analytics_UA');?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
