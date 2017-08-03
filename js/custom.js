/**
 * Created by fritz on 2/3/17.
 */
$(document).ready(function(){
    /*
     *
     *	Current Page Active
     *
     ------------------------------------*/
    (function(){
        $("[href]").each(function () {
            if (this.href == window.location.href) {
                $(this).addClass("active");
            }
        });
    })();
    (function(){
        $('#design-info li.sub a.active').each(function(){
            $this = $(this);
            $this.parents('li.top').addClass('active');
        });
        $('#design-info ul.top-menu li.top').click(function(e){
            if(!$(e.target).is('a')){
                $this = $(this);
                if($this.hasClass('active')){
                    $this.removeClass('active');
                } else {
                    $this.addClass('active');
                }
            }
        })
    })();
});