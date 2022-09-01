/************************************************************************
 *
 *  (c) Alexander Grein <alexander.grein@gmail.com>, MEDIA::ESSENZ
 *
 ************************************************************************/

(function ($, window, document, undefined) {
    if (!console || !console.log) {
        var console = {};
        console.log = function () {
        }
    }
    $.extend({
        URLEncode: function (c) {
            var o = '',
                x = 0,
                r = /(^[a-zA-Z0-9_.]*)/;
            c = c.toString();
            while (x < c.length) {
                var m = r.exec(c.substr(x));
                if (m !== null && m.length > 1 && m[1] !== '') {
                    o += m[1];
                    x += m[1].length;
                } else {
                    if (c[x] === ' ') {
                        o += '+';
                    } else {
                        var d = c.charCodeAt(x);
                        var h = d.toString(16);
                        o += '%' + (h.length < 2 ? '0' : '') + h.toUpperCase();
                    }
                    x++;
                }
            }
            return o;
        },
        URLDecode: function (s) {
            var o = s,
                t,
                r = /(%[^%]{2})/;
            while ((m = r.exec(o)) !== null && m.length > 1 && m[1] !== '') {
                b = parseInt(m[1].substr(1), 16);
                t = String.fromCharCode(b);
                o = o.replace(m[1], t);
            }
            return o;
        }
    });

    $(function () {
        $('.fc-calendar').each(function () {
            $(this).fullCalendar(window[$(this).attr('id') + '_settings']);
        });
        if ($.fn.button !== undefined && typeof $.fn.button.noConflict === 'function') {
            var btn = $.fn.button.noConflict(); /* reverts $.fn.button to jqueryui btn */
            $.fn.btn = btn; /* assigns bootstrap button functionality to $.fn.btn */
        }
    });
})(jQuery, window, document);
