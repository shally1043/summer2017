/**
 * Created by emarrero on 7/24/2017.
 */

function createImage(captionText, url, altText){

    // Create a HTML FIGURE element
    var fig = document.createElement("FIGURE");

    // Create a HTML IMG element
    var img = document.createElement("IMG");
    img.src = url;
    img.alt = altText;

    // Create a HTML FIGCAPTION element
    var cap = document.createElement("FIGCAPTION");
    cap.innerText = captionText;

    fig.appendChild(img);
    fig.appendChild(cap);

    return fig;

}

function startSearch(){
    var theSearchTerm = document.getElementById("searchTerm").value;
    doSearch(theSearchTerm);
}

function doSearch(searchTerm){
    if(searchTerm.toLowerCase() == "trump"){
        searchTerm = "Satan";
    }

    var myScript = document.createElement("script");
    myScript.src = "http://www.loc.gov/pictures/search/?fo=json&callback=processResponse&q=" + searchTerm;
    document.body.appendChild(myScript);
}

function addImage(captionText, url, altText){
    var aFigure = createImage(captionText, url, altText);
    //document.getElementById("output").appendChild(aFigure);
    $('#output').append(aFigure);
}

function processResponse(data){
    console.log(data);

    $('.outputClass').slick('unslick');

    document.getElementById("output").innerHTML = "";

    for(var i = 0; i < data.results.length; i++) {
        if(!data.results[i].image.alt.includes("not digitized")) {
            addImage(data.results[i].title, data.results[i].image.full, data.results[i].image.alt);
        }
    }

    $('.outputClass').slick();
}















