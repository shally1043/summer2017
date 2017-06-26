function say(something){
    document.write(something);
}

function makeRow(propertyName, value){
    say("<TR><TD>"+propertyName+":</TD><TD>"+ value + "</TD></TR>");
}

var hotel = {
    name: "Marriott Long Wharf",
    rooms: 300,
    booked: 310,
    gym: true,
    roomTypes: ["suite", "single", "king", "waterfall"]
};
