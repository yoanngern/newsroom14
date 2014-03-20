$(document).ready(function() {
    $('#search').keyup(function(){
        var search = "http://localhost/newsroom14/web/app_dev.php/annuaire.json?search="+$("#search").val();
        $.get(search, function(data){
            $("#results").append(data);
            console.log(data);
        })
    });
    $(window).load(function() {
        Pizza.init();
        $(document).foundation();
    });
});