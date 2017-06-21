<?php

    $number = 17;
    print $number;

    print '<br />';

    $letters = 'abcdefg';
    print $letters;

    print '<br />';

    print $number + $letters;

    print '<br/>$anotherNumber is 3, printing $anotherNumber';

    $anotherNumber = '3';
    print $anotherNumber;

    print '<br/>$number = 7, $anotherNumber = 3, printing $number + $anotherNumber';
    print $number + $anotherNumber;

    print '<br />$truth is true, printing $true:';
    $truth = true;

    print $truth;

    print '<br />$lie is false, printing $lie:';
    $lie = false;

    print $lie;

    print '<br /> isset($truth)';

    print (isset($truth));

    print '<br />';
    if(isset($nothing)){
        print '$nothing is set.';
    }else{
        print '$nothing is not set.';
    }
    print 'Ternary operator:<br />';
    $nothing = "anything";
    print (isset($nothing)) ? '$nothing is set.' : '$nothing is not set.';

    print '<br />';
    $name = "Daisy Marrero";
    print 'The string "Daisy Marrero" is '.strlen($name).' characters long';
    print $name{1};
    print '<br/><br/>';
    $myList['firstName'] = "Daisy";
    $myList['lastName'] = "Marrero";
    print_r($myList);
    print '<br/><br/>';
    $myOtherList[0] = "apples";
    $myOtherList[1] = "oranges";
    $myOtherList[2] = "almonds";
    var_dump($myOtherList);
?>