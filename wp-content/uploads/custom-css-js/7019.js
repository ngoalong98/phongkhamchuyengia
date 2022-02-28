<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
/* Default comment here */ 
   jQuery(document).ready(function( $ ){
         var $filter = $('.nav-menu-in');
            var $filterSpacer = $('<div />', {
                "class": "vnkings-spacer",
                "height": $filter.outerHeight()
            });
            if ($filter.size())
            {
                $(window).scroll(function ()
                {                        

                    if (!$filter.hasClass('fixed-menu') && $(window).scrollTop() > $filter.offset().top)
                    {
                        $filter.before($filterSpacer);
                        $filter.addClass("fixed-menu");
                    }
                    else if ($filter.hasClass('fixed-menu')  && $(window).scrollTop() < $filterSpacer.offset().top)
                    {
                        $filter.removeClass("fixed-menu");
                        $filterSpacer.remove();
                    }
                });
            }
 
        });
</script>
<!-- end Simple Custom CSS and JS -->
