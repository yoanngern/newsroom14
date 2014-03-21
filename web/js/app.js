$(document).ready(function() {
    search("");

    $(".annuaire").on("click", ".result h2",function(){
        $(this).next("div").toggle();
    })

    $('#search').keyup(function(){
        search($("#search").val());
    });

    $(window).load(function() {
        Pizza.init();
        $(document).foundation();
    });

    function search(motclef){
        $("#results").empty();
        if(motclef!==""){
            var search = "/web/app_dev.php/annuaire.json?search="+motclef;
        }
        else{
            var search = "/web/app_dev.php/annuaire.json";
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
                var detail=$("<div>").addClass("detail").attr("style","display:none;");
                if(link.length>0) detail.append(link)
                if(description.length>0) detail.append(description)
                if(phone.length>0) detail.append(phone)
                if(link.length>0) detail.append(link)
                if(adress.length>0) detail.append(adress)
                var result=$("<div>").addClass("result").attr("data-id",id).append(title).append(detail);
                results.append(result);
            });
            $("#results").empty();
            $("#results").append(results);
        })
    }

});