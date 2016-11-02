(function() {
    var $ = jQuery;
    var catsPrimary = [];
    var catsSeconday = [];

    $.each($('#menu-top li'), function(_, li) {
        var a = $(li).children('a');
        catsPrimary.push({
            'text': a.text(),
            'url': a.attr('href'),
            'children': [],
        });
    });

    $.each($('#menu-sidebar > li'), function(_, li1) {
        var a1 = $(li1).children('a');
        var cat = {
            'text': a1.text(),
            'url': a1.attr('href'),
            'children': [],
        };
        $.each($(li1).find('ul a'), function(_, a2) {
            var a3 = $(a2);
            cat.children.push({
                'text': a3.text(),
                'url': a3.attr('href'),
            });
        });
        catsSeconday.push(cat);
    });
    console.log(catsSeconday);

    var menu = $('#site-navigation .menu ul');
    menu.html('');
    $.each(catsPrimary, function(_, cat) {
        menu.append('<li><a href="'+cat.url+'">'+cat.text+'</a></li>');
    });
    menu.append('<li><hr style="margin:0;width:50%" /></li>');
    $.each(catsSeconday, function(_, cat) {
        var li1 = $('<li><a href="'+cat.url+'">'+cat.text+'</a></li>');
        var ul1 = $('<ul></ul>');
        li1.append(ul1);
        $.each(cat.children, function(_, child) {
            ul1.append('<li><a href="'+child.url+'">'+child.text+'</a></li>');
        });
        menu.append(li1);
    });
})();
