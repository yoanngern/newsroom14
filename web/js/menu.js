$(function () {
    if ($('li.prob').hasClass('actif')) {
        $('ul.prob').show();
    }
    if ($('li.report').hasClass('actif')) {
        $('ul.report').show();
    }


    $('li.prob').mouseenter(function () {
        $('ul.report').hide()
        $('ul.prob').show()
    })

    $('li').mouseenter(function () {
        if (!$(this).parent().hasClass('prob') && !$(this).parent().hasClass('report')) {
            if (!$(this).hasClass('prob')) {
                $('ul.report').hide()
                $('ul.prob').hide()
            }
        }
    })

    $('li.report').mouseenter(function () {
        $('ul.prob').hide()
        $('ul.report').show()
    })

    /*$('ul.prob, ul.report').mouseleave(function () {
        if ($('li.prob').hasClass('actif')) {
            $('ul.report').hide()
            $('ul.prob').show()
        } else {
            $('ul.report').hide()
        }
        if ($('li.report').hasClass('actif')) {
            $('ul.prob').hide()
            $('ul.report').show()
        } else {
            $('ul.prob').hide()
        }
    })
*/

})