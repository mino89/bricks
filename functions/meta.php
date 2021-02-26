<?php

// --- Set metadata ---

function brk_head_meta() {

    $analyticsID = get_field('meta_google_analytics_id', 'option');
    $gtagID = get_field('meta_gtag_id', 'option');
    $fbpixelID = get_field('meta_fb_pixel_id', 'option');
    $themecolor = get_field('meta_theme_color', 'option');

    // --- Google Analytics ---

    if ( $analyticsID ) {
    
        echo
        "
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src='https://www.googletagmanager.com/gtag/js?id=" . $analyticsID . "'></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '" . $analyticsID . "');
        </script>
        ";
    
    }

    // --- Google Tag Manager ---

    if ( $gtagID ) {
    
        echo
        "
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','" . $gtagID . "');</script>
        <!-- End Google Tag Manager -->
        ";
    
    }

    // --- Facebook Pixel ---

    if ( $fbpixelID ) {
    
        echo
        "
        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '" . $fbpixelID . "'); 
        fbq('track', 'PageView');
        </script>
        <noscript>
        <img height=\"1\" width=\"1\" 
        src=\"https://www.facebook.com/tr?id=" . $fbpixelID . "&ev=PageView&noscript=1\"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
        ";
    
    }

    // --- Chrome theme ---
   
    if( $themecolor ) {          
        echo '<meta name="theme-color" content="', $themecolor, '">';
    }

}
add_action('wp_head', 'brk_head_meta');

function brk_body_open() { 

    $gtagID = get_field('meta_gtag_id', 'option');  
    
    // --- Google Tag Manager noscript ---

    if ( $gtagID ) {

        echo
        '
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . $gtagID . '"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        ';  
    
    }

};
add_action('wp_body_open', 'brk_body_open');
