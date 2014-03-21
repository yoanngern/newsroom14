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
                var title=$("<h2>");
                title.html(val.title);
                var id=val.id;
                var description=$("<p>");
                description.html(val.description);
                var linkDetail=$("<a>").attr("href",val.link).html(val.link);
                var link=$("<p>").append("Site: ").append(linkDetail);
                var phone=$("<p>").html("Tel: "+val.phone);
                var adress=val.adress;
                var place=val.place;
                var grade=val.grade;
                var result=$("<div>").addClass("result").attr("data-id",id).append(title).append(description).append(link).append(phone);
                results.append(result);
            });
            $("#results").empty();
            $("#results").append(results);
        })
    }

});