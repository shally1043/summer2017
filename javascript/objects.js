function say(something){
    document.write(something);
}

function makeRow(propertyName, value){
    if(Array.isArray(value)){
        say("<TR><TD>" + propertyName + ":</TD><TD>" + value.toString().replace(/,/g, ", ") + "</TD></TR>");
    }else {
        say("<TR><TD>" + propertyName + ":</TD><TD>" + value + "</TD></TR>");
    }
}

function getMonthName(monthNumber){
    var months = ["January", "February", "March", "April", "May",
    "June", "July", "August", "September", "October", "November",
    "December"];

    return months[monthNumber];
}

function Hotel(name, rooms, booked, gym, roomTypes){
   this.name = name;
   this.rooms = rooms;
   this.booked = booked;
   this.gym = gym;
   this.roomTypes = roomTypes;
   this.hasOpenings = function(){
       return (this.booked < this.rooms);
   }
}

var hotel4 = new Hotel(
    "Fountainbleu Hilton",
    800,
    20,
    true,
    ["suite", "double", "single", "oceanview"]
);

var hotel1 = new Hotel(
    "Marriott Long Wharf",
    300,
    310,
    true,
    ["suite", "single", "king", "waterfall"]
);

var hotel2 = new Hotel(
    "Mohonk Mountain House",
    200,
    1,
    true,
    ["tower", "single"]
);

var hotel3 = new Hotel(
    "Fairmont Mont Tremblant",
    300,
    30,
    true,
    ["suite", "high floor", "presidential suite", "royal suite"]
);

var allHotels = [hotel1, hotel2, hotel3, hotel4];




















