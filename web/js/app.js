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
            var search = "/web/annuaire.json?search="+motclef;
        }
        else{
            var search = "/web/annuaire.json";
        }

        $.get(search, function(data){
            var results=$("<div>");
            $.each( data, function( key, val ) {
                var title=$("<h2>");
                title.html(val.title);
                var id=val.id;
                var description=$("<p>").html(val.description);
                var linkDetail=$("<a>").attr("href",val.link).html(val.link);
                var link=$("<p>").append("Site: ").append(linkDetail);
                var phone=$("<p>").html("Tel: "+val.phone);
                var adress=$("<p>").html(val.address);
                var place=val.place;
                var grade=val.grade;
                var detail=$("<div>").addClass("detail").attr("style","display:none;");

                if(description.text().length>10) detail.append(description);
                if(link.text().length>10) detail.append(link);
                if(adress.text().length>10)detail.append(adress);
                if(phone.text().length>15) detail.append(phone);


                var result=$("<div>").addClass("result").attr("data-id",id).append(title).append(detail);
                results.append(result);
            });
            $("#results").empty();
            $("#results").append(results);
        })
    }

});