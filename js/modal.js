jQuery(document).ready(function() {
    jQuery('#menu-item-125').find('a').attr('data-toggle', 'modal');
    jQuery('#menu-item-125').find('a').attr('data-target', '#myModal');
});

Share = {
    me : function(el){
        Share.popup(el.href);
        return false;
    },

    popup: function(url) {
        window.open(url,'','toolbar=0,status=0,width=626,height=436');
    }
};
