try {
    var omCookieGroups = JSON.parse(document.getElementById('om-cookie-consent').innerHTML);
    var omGtmEvents = [];
}
catch(err) {
    console.log('OM Cookie Manager: No Cookie Groups found! Maybe you have forgot to set the page id inside the constants of the extension')
}

document.addEventListener('DOMContentLoaded', function(){
    var panelButtons = document.querySelectorAll('[data-omcookie-panel-save]');
    var openButtons = document.querySelectorAll('[data-omcookie-panel-show]');
    var i;

    //Enable stuff by Cookie
    var cookieConsentData = omCookieUtility.getCookie('omCookieConsent');
    if(cookieConsentData !== null && cookieConsentData.length > 0){
        var checkboxes = document.querySelectorAll('[data-omcookie-panel-grp]');
        var cookieConsentActiveGrps = cookieConsentData.split(',');
        for(i = 0; i < cookieConsentActiveGrps.length; i++){
            omCookieEnableCookieGrp(cookieConsentActiveGrps[i]);
        }
        for(i = 0; i < checkboxes.length; i++){
            if(cookieConsentData.indexOf(checkboxes[i].value)  !== -1){
                checkboxes[i].checked = true;
            }
        }
        //push stored events(sored by omCookieEnableCookieGrp) to gtm. We push this last so we are sure that gtm is loaded
        pushGtmEvents(omGtmEvents);
    }else{
        //timeout, so the user can see the page before he get the nice cookie panel
        setTimeout(function () {
            document.querySelectorAll('[data-omcookie-panel]')[0].classList.toggle('active');
        },1000)
    }

    //check for button click
    for (i = 0; i < panelButtons.length; i++) {
        panelButtons[i].addEventListener('click', omCookieSaveAction, false);
    }
    for (i = 0; i < openButtons.length; i++) {
        openButtons[i].addEventListener('click', function () {
            document.querySelectorAll('[data-omcookie-panel]')[0].classList.toggle('active');
        }, false);
    }

});

//activates the groups
var omCookieSaveAction = function() {
    action = this.getAttribute('data-omcookie-panel-save');
    var checkboxes = document.querySelectorAll('[data-omcookie-panel-grp]');
    var i;
    var cookie = '';
    switch (action) {
        case 'all':
            for (i = 0; i < checkboxes.length; i++) {
                omCookieEnableCookieGrp(checkboxes[i].value);
                cookie += checkboxes[i].value + ',';
                checkboxes[i].checked = true;
            }
        break;
        case 'save':
            for (i = 0; i < checkboxes.length; i++) {
                if(checkboxes[i].checked === true){
                    omCookieEnableCookieGrp(checkboxes[i].value);
                    cookie += checkboxes[i].value + ',';
                }
            }
        break;
        case 'min':
            for (i = 0; i < checkboxes.length; i++) {
                if(checkboxes[i].getAttribute('data-omcookie-panel-essential') !== null){
                    omCookieEnableCookieGrp(checkboxes[i].value);
                    cookie += checkboxes[i].value + ',';
                }else{
                    checkboxes[i].checked = false;
                }
            }
        break;
    }
    cookie = cookie.slice(0, -1);
    omCookieUtility.setCookie('omCookieConsent',cookie,364);
    //push stored events to gtm. We push this last so we are sure that gtm is loaded
    pushGtmEvents(omGtmEvents);

    setTimeout(function () {
        document.querySelectorAll('[data-omcookie-panel]')[0].classList.toggle('active');
    },350)

};
var pushGtmEvents = function (events) {
    window.dataLayer = window.dataLayer || [];
    events.forEach(function (event) {
        window.dataLayer.push({
            'event': event,
        });
    });
};
var omCookieEnableCookieGrp = function (groupKey){
    if(omCookieGroups[groupKey] !== undefined){
        for (var key in omCookieGroups[groupKey]) {
            // skip loop if the property is from prototype
            if (!omCookieGroups[groupKey].hasOwnProperty(key)) continue;
            var obj = omCookieGroups[groupKey][key];
            //save gtm event for pushing
            if(key === 'gtm'){
                if(omCookieGroups[groupKey][key]){
                    omGtmEvents.push(omCookieGroups[groupKey][key]);
                }
                continue;
            }
            //set the cookie html
            for (var prop in obj) {
                // skip loop if the property is from prototype
                if (!obj.hasOwnProperty(prop)) continue;

                if(Array.isArray(obj[prop])){
                    var content = '';
                    //get the html content
                    obj[prop].forEach(function (htmlContent) {
                        content += htmlContent
                    });
                    var range = document.createRange();
                    if(prop === 'header'){
                        // add the html to header
                        range.selectNode(document.getElementsByTagName('head')[0]);
                        var documentFragHead = range.createContextualFragment(content);
                        document.getElementsByTagName('head')[0].appendChild(documentFragHead);
                    }else{
                        //add the html to body
                        range.selectNode(document.getElementsByTagName('body')[0]);
                        var documentFragBody = range.createContextualFragment(content);
                        document.getElementsByTagName('body')[0].appendChild(documentFragBody);
                    }
                }
            }
        }
        //remove the group so we don't set it again
        delete omCookieGroups[groupKey];
    }
};
var omCookieUtility = {
    getCookie: function(name) {
            var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
            return v ? v[2] : null;
        },
    setCookie: function(name, value, days) {
            var d = new Date;
            d.setTime(d.getTime() + 24*60*60*1000*days);
            document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
        },
    deleteCookie: function(name){ setCookie(name, '', -1); }
};

