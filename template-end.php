}) // document ready

var themes = {
//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/lumen/bootstrap.min.css
"default": "//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css",
"amelia": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/amelia/bootstrap.min.css",
"cerulean": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/cerulean/bootstrap.min.css",
"cosmo": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/cosmo/bootstrap.min.css",
"cyborg": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/cyborg/bootstrap.min.css",
"darkly": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/darkly/bootstrap.min.css",
"flatly": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/flatly/bootstrap.min.css",
"journal": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/journal/bootstrap.min.css",
"lumen": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/lumen/bootstrap.min.css",
"paper": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/paper/bootstrap.min.css",
"readable": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/readable/bootstrap.min.css",
"sandstone": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/sandstone/bootstrap.min.css",
"simplex":"//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/simplex/bootstrap.min.css",
"slate": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/slate/bootstrap.min.css",
"spacelab": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/spacelab/bootstrap.min.css",
"superhero": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/superhero/bootstrap.min.css",
"united": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/united/bootstrap.min.css",
"yeti": "//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/yeti/bootstrap.min.css"
};
$(function () {
var themesheet = $('<link href="' + themes['default'] + '" rel="stylesheet" />');
themesheet.appendTo('head');
$('.theme-link').click(function () {
var themeurl = themes[$(this).attr('data-theme')];
themesheet.attr('href', themeurl);
});
});
</script>

</body>
</html>