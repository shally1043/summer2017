
function doSearch(){
    $("#resultsdiv").html('');

    var query = {};
    query.$limit = 5000;
    query.$$app_token = "fwdnocvaJEOQXwhW1M21OkSrm";
    query.grade = $("#grade").val();
    query.boro  = $("#boro").val();

    if($("#cuisine").val().length > 0) {
        query.cuisine_description = $("#cuisine").val();
    }

    console.log(query);

    $.ajax({
        url: "https://data.cityofnewyork.us/resource/9w7m-hzhe.json",
        type: "GET",
        data: query
    }).done(function(data) {
        var newDiv = $("<div>", {"class": "count-div"});
        newDiv.text("Found " + data.length + " results");
        $("#resultsdiv").append(newDiv);

        for(var x=0; x < data.length; x++){
            var className;
            var grade;
            switch(data[x].grade){
                case 'A':
                    className = 'a';
                    grade = '(A)';
                    break;
                case 'B':
                    className = 'b';
                    grade = '(B)';
                    break;
                case 'C':
                    className = 'c';
                    grade = '(C)';
                    break;
                default:
                    className = 'no-grade';
                    grade = "(GRADE PENDING)";
            }



            var newDiv = $("<div>", {"class": className});
            newDiv.text(data[x].boro + "  " + data[x].dba + "  " + grade);
            $("#resultsdiv").append(newDiv);

        }
    });
}