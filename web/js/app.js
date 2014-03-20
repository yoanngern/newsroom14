$(document).ready(function() {
    search("vagin");

    $('#search').keyup(function(){
        search($("#search").val());
    });

    $(window).load(function() {
        Pizza.init();
        $(document).foundation();
    });

    function search(motclef){
        $("#results").empty();
        if(motclef!=="vagin"){
            var search = "http://localhost/newsroom14/web/app_dev.php/annuaire.json?search="+motclef;
        }
        else{
            var search = "http://localhost/newsroom14/web/app_dev.php/annuaire.json";
        }

        $.get(search, function(data){
            var results=$("<div>");
            $.each( data, function( key, val ) {
                var title=val.title;
                var id=val.id;
                var description=val.description;
                var link=$("<a>").attr("href",val.link).html(val.link);
                var phone=$("<p>").html(val.phone);
                var adress=val.adress;
                var place=val.place;
                var grade=val.grade;
                var result=$("<div>").addClass("result").attr("data-id",id).append("<h1>"+title+"</h1>").append("<p>"+description+"</p>").append(link).append(phone);
                results.append(result);
            });
            $("#results").empty();
            $("#results").append(results);
        })
    }

});