;(function ($) {
    "use strict";

    $.fn.slugit = function (options) {

        var defaults = {
            event: 'blur',
            separator: '-',
            onLoad: false
        };

        var $options = $.extend(defaults, options);

        return this.each(function () {
            var $this = $(this);
            var $target = $this.data('slugit-target');

            if ($options.onLoad) {
                slugit($this, $target, $options)
            }

            if ($this.data('slugit-event')) {
                $options.event = $this.data('slugit-event');
            }

            $this.on($options.event, function () {
                slugit($this, $target, $options)
            });
        });
    };

    function slugit($this, $target, $options) {
        var trimmed = $.trim($this.val());
        var slug = trimmed.replace(/[^a-z0-9-]/gi, $options.separator).replace(/-+/g, $options.separator).replace(/^-|-$/g, '');
        $($target).val(slug.toLowerCase());
    }
})(jQuery);
