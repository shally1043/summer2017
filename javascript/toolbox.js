/* This file contains little tools for me to use */

function makeRangeSelect(from, to, name){
    var retVal = "<select name='" + name + "'>";
    for(i = from; i < to; i++){
        retVal = retVal + "<option value='" + i + "'>" + i + "</option>";
    }
    retVal = retVal + "</select>";

    return retVal;
}