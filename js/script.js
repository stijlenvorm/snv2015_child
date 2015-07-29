(function($) {
    var mobileMenu;

    $(document).ready(function() {
        
        // mobile menu
        mobileMenu = new MobileMenu('main_navigation', '.mobile_menuToggle');

        // stellar (if stellar js is activated and parallax is wanted)
        $(window).stellar();
    });

    // all mobile menu functions
    function MobileMenu(menuwrapperID, mobileMenuToggleButtonID) {
        var _this = this
        this.init = function() {
            $(mobileMenuToggleButtonID).click(_this.toggleMobileVisibility);
            $('.sub-menu').click(_this.openSubMenu);
            $('.sub-menu *').click(function(e) {
                e.stopPropagation();
            });
        }
        this.toggleMobileVisibility = function() {
            $('#' + menuwrapperID).toggleClass('hideMenuMobile');
        }
        this.openSubMenu = function() {
            $(this).children('li').toggleClass('show');
            $(this).toggleClass('show');
        }
        this.init();
    }

})(jQuery);