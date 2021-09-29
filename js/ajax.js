$ = jQuery;

var mafs = $("#my-ajax-filter-search");
var mafsForm = mafs.find("form");

mafsForm.submit(function(e){
    e.preventDefault();
    console.log("form submitted");

// we will add codes above this line later
    if(mafsForm.find("#category").val().length !== 0) {
        var category = mafsForm.find("#category").val();
    }
    if(mafsForm.find("#city").val().length !== 0) {
        var city = mafsForm.find("#city").val();
    }
    if(mafsForm.find("#sex").val().length !== 0) {
        var sex = mafsForm.find("#sex").val();
    }

    var data = {
        action : "my_ajax_filter_search",
        category : category,
        city: city,
        sex: sex
    }
});
$.ajax({
    url : ajax_url,
    data : data,
    success : function(response) {
        mafs.find("ul").empty();
        if(response) {
            for(var i = 0 ;  i < response.length ; i++) {
                var html  = "<div id='movie-" + response[i].id + "'>";
                html += "  <a href='" + response[i].permalink + "' title='" + response[i].title + "'>";
                html += "      <img src='" + response[i].poster + "' alt='" + response[i].title + "' />";
                html += "      <div class='movie-info'>";
                html += "          <h4>" + response[i].title + "</h4>";
                html += "          <p>Year: " + response[i].year + "</p>";
                html += "          <p>Rating: " + response[i].rating + "</p>";
                html += "          <p>Language: " + response[i].language + "</p>";
                html += "          <p>Director: " + response[i].director + "</p>";
                html += "          <p>Genre: " + response[i].genre + "</p>";
                html += "      </div>";
                html += "  </a>";
                html += "</li>";
                mafs.find("ul").append(html);
            }
        } else {
            var html  = "<li class='no-result'>No matching movies found. Try a different filter or search keyword</li>";
            mafs.find("ul").append(html);
        }
    }
});