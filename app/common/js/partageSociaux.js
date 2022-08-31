


document.querySelector('.share_twitter').addEventListener('click', function(e){
    e.preventDefault();
    var url = this.getAttribute('data-url');
    var shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) + 
    "$url=" + encodeURIComponent(url);

   

    // centre popup 
    var top = window.screenTop || window.screenY;
    var left = window.screenLeft || window.screenX;
    var width = window.innerWidth || document.documentElement.clientWidth;
    var height = window.innerheight || document.documentElement.clientHeight;
    var popupWidth=640;
    var popupHeight = 640;
    var popupLeft = left + width /2 - popupWidth /2;
    var popupTop = top + height /2 - popupHeight /2;

    window.open(shareUrl, "Partage", 'scrollbars=yes, width=' + popupWidth + ', height =' + popupHeight + ',top = ' + popupTop + ', left=' + popupLeft );


});


document.querySelector('.share_facebook').addEventListener('click', function(e){
    e.preventDefault();
    var url = this.getAttribute('data-url');
    var shareUrl = "https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(url);

   

    // centre popup 
    var top = window.screenTop || window.screenY;
    var left = window.screenLeft || window.screenX;
    var width = window.innerWidth || document.documentElement.clientWidth;
    var height = window.innerheight || document.documentElement.clientHeight;
    var popupWidth=640;
    var popupHeight = 640;
    var popupLeft = left + width /2 - popupWidth /2;
    var popupTop = top + height /2 - popupHeight /2;

    window.open(shareUrl, "Partage", 'scrollbars=yes, width=' + popupWidth + ', height =' + popupHeight + ',top = ' + popupTop + ', left=' + popupLeft );


});
