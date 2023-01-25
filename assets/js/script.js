    $(document).ready(function () {
        var url = window.location.href;
        $('li.sidebar-item a[href="'+ url +'"]').parent().addClass('active');
        $('li.sidebar-item a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });