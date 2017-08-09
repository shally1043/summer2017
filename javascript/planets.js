/**
 * Created by emarrero on 7/17/2017.
 */

/*
 "Mercury" 0.38
 "Venus"   0.91
 "Earth"   1.00
 "Mars"    0.38
 "Jupiter" 2.54
 "Saturn"  1.08
 "Uranus"  0.91
 "Neptune" 1.19
 "Pluto"   0.06
 */

function Planet(name, multiplier){
    this.name = name;
    this.multiplier = multiplier;
    this.translateEarthWeight = function(earthWeight){
        return earthWeight * this.multiplier;
    }
}

var planets = [
    new Planet("Mercury", 0.38),
    new Planet("Venus"  , 0.91),
    new Planet("Earth"  , 1.00),
    new Planet("Mars"   , 0.38),
    new Planet("Jupiter", 2.54),
    new Planet("Saturn" , 1.08),
    new Planet("Uranus" , 0.91),
    new Planet("Neptune", 1.19),
    new Planet("Pluto"  , 0.06)
];

function translateWeights(earthWeight){
    var outputDiv = document.getElementById("output");

    outputDiv.innerHTML = "";

    for(var i = 0; i < planets.length; i++){
        var somePlanet = planets[i];
        outputDiv.innerHTML +=
            somePlanet.name + ": " + somePlanet.translateEarthWeight(earthWeight) + "<br/>";
    }
}

function setup(){
    var theGoButton = document.getElementById('goButton');
    var earthWeightInput = document.getElementById("earthWeight");

    earthWeightInput.addEventListener('focus',
        function(){
            document.getElementById("helpText").style.display = "block";
        }
    );

    earthWeightInput.addEventListener('blur',
        function(){
            document.getElementById("helpText").style.display = "none";
        }
    );

    theGoButton.addEventListener('click',
        function(){
            var earthWeightInput = document.getElementById("earthWeight");
            translateWeights(earthWeightInput.value);
        }
    );

    window.addEventListener('beforeunload',
        function(evt){
            var message = "Don't leave me!";
            (evt || window.event).returnValue = message;
            return message;
        }
    );
}

window.addEventListener('load', setup);










