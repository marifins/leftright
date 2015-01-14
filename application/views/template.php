<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>{title}</title>
        <!-- Meta Tags -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <!-- External CSS -->
        <?php //foreach($styles as $style) echo HTML::style($style), "\n";?>
        <?php
        $base = base_url();
        $css = $base . 'assets/css/';
        $js = $base . 'assets/js/';
        $i = $base . 'assets/images/';
        ?>
        <link rel="shorcut icon" href="<?php echo $i; ?>favicon.png" />
        <link rel="stylesheet" href="<?php echo $css; ?>style.css" type="text/css" />
        <!-- External Javascripts -->
        <?php //foreach($scripts as $script) echo HTML::script($script), "\n";?>

        <script type="text/javascript" src="<?php echo $js; ?>jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $js; ?>cufon-yui.js"></script>
        <script type="text/javascript" src="<?php echo $js; ?>Quicksand_Book_400.font.js"></script>
        <script type="text/javascript">
            Cufon.replace('span,p,h1',{
                textShadow: '0px 0px 1px #ffffff'
            });
        </script>
        <style>
            span.reference{
                font-family:Arial;
                position:fixed;
                left:10px;
                bottom:10px;
                font-size:11px;
            }
            span.reference a{
                color:#aaa;
                text-decoration:none;
                margin-right:20px;
            }
            span.reference a:hover{
                color:#ddd;
            }
        </style>
    </head>
    <body>
        <?php $base = base_url().'page/index/';?>
        <ul id="nav">
            <li class="home"><a href="<?php echo $base; ?>prawedding"><span>Praweding</span></a></li>
            <li class="about"><a href="<?php echo $base; ?>wedding"><span>Wedding</span></a></li>
            <li class="search"><a href="<?php echo $base; ?>birthday"><span>Birthday</span></a></li>
            <li class="photos"><a href="<?php echo $base; ?>foodnbaverage"><span>F&B</span></a></li>
            <li class="rssfeed"><a href="<?php echo $base; ?>concert"><span>Concert</span></a></li>
            <li class="contact"><a href="<?php echo $base; ?>landscape"><span>Landscape</span></a></li>
            <li class="contact"><a href="<?php echo $base; ?>portrait"><span>Potrait</span></a></li>
            <li class="contact"><a href="<?php echo $base; ?>familynfriends"><span>Friends</span></a></li>
            <li class="podcasts"><a href="<?php echo $base; ?>crew"><span>Crew</span></a></li>
        </ul>
        <div id="st_main" class="st_main">
            <img src="<?php echo $i; ?>album/foodnbaverage/cake/f&b003.jpg" alt="" class="st_preview" style="display:none;"/>
            <div class="st_overlay"></div>
            <h1>LeftRight</h1>		
            <div id="st_loading" class="st_loading"></div>
            {content}
        </div>
        <div>
            <span class="reference">
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
            </span>
        </div>

        <!-- The JavaScript -->
        <script type="text/javascript">
            var site = "<?php echo site_url(); ?>";
            $(function() {
                //the loading image
                var $loader		= $('#st_loading');
                //the ul element 
                var $list		= $('#st_nav');
                //the current image being shown
                var $currImage 	= $('#st_main').children('img:first');
				
                //let's load the current image 
                //and just then display the navigation menu
                $('<img>').load(function(){
                    $loader.hide();
                    $currImage.fadeIn(3000);
                    //slide out the menu
                    setTimeout(function(){
                        $list.animate({'left':'0px'},500);
                    },
                    1000);
                }).attr('src',$currImage.attr('src'));
				
                //calculates the width of the div element 
                //where the thumbs are going to be displayed
                buildThumbs();
				
                function buildThumbs(){
                    $list.children('li.album').each(function(){
                        var $elem 			= $(this);
                        var $thumbs_wrapper = $elem.find('.st_thumbs_wrapper');
                        var $thumbs 		= $thumbs_wrapper.children(':first');
                        //each thumb has 180px and we add 3 of margin
                        var finalW 			= $thumbs.find('img').length * 183;
                        $thumbs.css('width',finalW + 'px');
                        //make this element scrollable
                        makeScrollable($thumbs_wrapper,$thumbs);
                    });
                }
				
                //clicking on the menu items (up and down arrow)
                //makes the thumbs div appear, and hides the current 
                //opened menu (if any)
                $list.find('.st_arrow_down').live('click',function(){
                    var $this = $(this);
                    hideThumbs();
                    $this.addClass('st_arrow_up').removeClass('st_arrow_down');
                    var $elem = $this.closest('li');
                    $elem.addClass('current').animate({'height':'170px'},200);
                    var $thumbs_wrapper = $this.parent().next();
                    $thumbs_wrapper.show(200);
                });
                $list.find('.st_arrow_up').live('click',function(){
                    var $this = $(this);
                    $this.addClass('st_arrow_down').removeClass('st_arrow_up');
                    hideThumbs();
                });
				
                //clicking on a thumb, replaces the large image
                $list.find('.st_thumbs img').bind('click',function(){
                    var $this = $(this);
                    $loader.show();
                    $('<img class="st_preview"/>').load(function(){
                        var $this = $(this);
                        var $currImage = $('#st_main').children('img:first');
                        $this.insertBefore($currImage);
                        $loader.hide();
                        $currImage.fadeOut(2000,function(){
                            $(this).remove();
                        });
                    }).attr('src',$this.attr('alt'));
                }).bind('mouseenter',function(){
                    $(this).stop().animate({'opacity':'1'});
                }).bind('mouseleave',function(){
                    $(this).stop().animate({'opacity':'0.7'});
                });
				
                //function to hide the current opened menu
                function hideThumbs(){
                    $list.find('li.current')
                    .animate({'height':'50px'},400,function(){
                        $(this).removeClass('current');
                    })
                    .find('.st_thumbs_wrapper')
                    .hide(200)
                    .andSelf()
                    .find('.st_link span')
                    .addClass('st_arrow_down')
                    .removeClass('st_arrow_up');
                }

                //makes the thumbs div scrollable
                //on mouse move the div scrolls automatically
                function makeScrollable($outer, $inner){
                    var extra 			= 800;
                    //Get menu width
                    var divWidth = $outer.width();
                    //Remove scrollbars
                    $outer.css({
                        overflow: 'hidden'
                    });
                    //Find last image in container
                    var lastElem = $inner.find('img:last');
                    $outer.scrollLeft(0);
                    //When user move mouse over menu
                    $outer.unbind('mousemove').bind('mousemove',function(e){
                        var containerWidth = lastElem[0].offsetLeft + lastElem.outerWidth() + 2*extra;
                        var left = (e.pageX - $outer.offset().left) * (containerWidth-divWidth) / divWidth - extra;
                        $outer.scrollLeft(left);
                    });
                }
				
                $("#coba").live('click',function(){
                    $.ajax({
                        type: "GET",
                        url : site+'def/i',
                        success: function(response){
                            $('#show').html(response);
                            var $list = $('#st_nav');
                            setTimeout(function(){
                                $list.animate({'left':'0px'},500);
                            },10);
                        }
                    });
                });
				
                $("#coba2").live('click',function(){
                    setTimeout(function(){
                        $list.hide({'left':'0px'},500, function(){
                            $(this).removeClass('st_navigation');
                        });
						
                    },
                    10);
                });
				
                /************* Navigation **************/
                var d=300;
                $('#nav a').each(function(){
                    $(this).stop().animate({
                        'marginTop':'-80px'
                    },d+=150);
                });

                $('#nav > li').hover(
                function () {
                    $('a',$(this)).stop().animate({
                        'marginTop':'-2px'
                    },200);
                },
                function () {
                    $('a',$(this)).stop().animate({
                        'marginTop':'-80px'
                    },200);
                }
            );
            });
        </script>
    </body>
</html>
