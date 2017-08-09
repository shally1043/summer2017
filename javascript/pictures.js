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

/*
We just followed the stuff on this site:
https://developers.google.com/web/updates/2014/01/Web-apps-that-talk-Introduction-to-the-Speech-Synthesis-API#browser_support
*/
function sayOutLoud(someText){
    window.speechSynthesis.cancel();
    var msg = new SpeechSynthesisUtterance(someText);
    window.speechSynthesis.speak(msg);
}

function processResponse(data){
    console.log(data);

    $('#resultCount').text("Found " + data.results.length + " pictures for you.");
    window.agent.play('Announce');
    sayOutLoud("Found " + data.results.length + " pictures for you.");
    window.agent.speak("Found " + data.results.length + " pictures for you.");

    if(data.results.length == 0){
        return;
    }

    $('.outputClass').slick('unslick');

    document.getElementById("output").innerHTML = "";

    for(var i = 0; i < data.results.length; i++) {
        if(!data.results[i].image.alt.includes("not digitized")) {
            addImage(data.results[i].title, data.results[i].image.full, data.results[i].image.alt);
        }
    }

    $('.outputClass').slick(
        {
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            variableWidth: true
        }
    );
}

function loadAgent(agentName){
    if(window.agent){
        window.agent.stop();
        window.agent.hide();
    }

    clippy.load(agentName, function(clippysAgent){
        window.agent = clippysAgent;
        window.agent.show();
        window.agent.moveTo( 200, 200 );
    });
}

loadAgent('Peedy');













