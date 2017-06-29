<!DOCTYPE html>
<html>
<head>
    <title>Functions</title>
</head>
<body>
<h1>Functions!</h1><hr />
<h4>Scope</h4>
<p>When you pass a variable to a PHP function, you are usually passing a
    <strong>copy</strong></p>
    <?php
        function ourFunction($input){
            $input = $input." changed by the function";
            print $input;
            print "<br />";
        }

        $thing1 = "some value";
        print "\$thing1 is: '$thing1' before the function call.<br/>";
        ourFunction($thing1);
        print "\$thing1 is: '$thing1' after the function call.<br/>";
    ?>
    <hr />

    <p>You can write a function such that it will <strong>NOT</strong> take
    a copy but operate on the original variable leaving it changed afterwards.</p>
    <?php
    function ourFunction2(&$input){
        $input = $input." changed by the function";
        print $input;
        print "<br />";
    }

    $thing1 = "some value";
    print "\$thing1 is: '$thing1' before the function call.<br/>";
    ourFunction2($thing1);
    print "\$thing1 is: '$thing1' after the function call.<br/>";
    ?>
    <hr />
    <h4>Working With Variables</h4>
    <p>PHP provides some functions for checking if a variable is set or not and
    whether or not it is empty. In the example below, $thing2 is not set, $thing3 is
    just '' (empty), and $thing4 is 'hello';</p>
    <?php
        // We're not going to mention $thing2
        $thing3 = '';
        $thing4 = 'hello';
    ?>
    <ul>
        <li>isset($thing2) = <?=isset($thing2)?></li>
        <li>empty($thing2) = <?=empty($thing2)?></li>
        <li>isset($thing3) = <?=isset($thing3)?></li>
        <li>empty($thing3) = <?=empty($thing3)?></li>
        <li>isset($thing4) = <?=isset($thing4)?></li>
        <li>empty($thing4) = <?=empty($thing4)?></li>
    </ul>
    <p>To un-set a variable that had already contained something, call unset.</p>
    <?php unset($thing4); ?>
    <p>After calling unset($thing4):
        <ul>
            <li>isset($thing4) = <?=isset($thing4)?></li>
            <li>empty($thing4) = <?=empty($thing4)?></li>
        </ul>
    </p><hr/>
    <h4>Exit and Die</h4>
    <p>Both of these functions end the PHP script as soon as they are
     executed</p>
    <form action="functions.php" method="get">
        <?php
            if(isset($_GET['action']) && $_GET['action'] == "die"){
                print "The 'Die' button was pressed. <a href='functions.php'>Reload</a>";
                die();
            }
        ?>
        <input type="submit" name="action" value="die"/>

        <?php
            if(isset($_GET['action']) && $_GET['action'] == "exit"){
            print "The 'Exit' button was pressed. <a href='functions.php'>Reload</a>";
            exit();
        }
        ?>
        <input type="submit" name="action" value="exit"/>

    </form><hr/>
    <h4>Eval</h4>
    <p>The Eval function allows you to run arbitrary PHP code.  Pretty
    dangerous, eh?</p>
    <form action="functions.php" method="get">
        <label for="someCode">Type PHP here:</label>
        <input type="text" id="someCode" name="someCode" />
        <input type="submit" name="action" value="eval" />
    </form>
    <?php if(isset($_GET['action']) && $_GET['action'] == "eval"){ ?>
        <h5>Result</h5>
        <div style="border: 2px solid black">
            <?php print "Evaluating: <strong>".$_GET['someCode']."</strong><br />";?>
            <?=eval($_GET['someCode'])?>
        </div>
    <?php } ?>
<hr/><h4>Date And Time</h4>
<p>PHP has a basic function to get the current time in &quot;epoch&quot; format which
    is the number of seconds since 01/01/1970 00:00:00.<br />
time() = <?=time()?></p><br/>
<p>PHP can also include microseconds. The microtime() function returns microseconds
first, then seconds:<br />
microtime() = <?=microtime()?><br/>
Microtime has one optional boolean parameter that will tell it to return the seconds
and microseconds as a floating point number instead of that strange string:<br />
    microtime(true) = <?=microtime(true)?><br/></p><hr/>
<h4>String to time</h4>
<p>PHP can translate human-readable dates and times into epoch time.  It usually
does a pretty good job but sometimes not so good.</p>
<form action="functions.php" method="get">
    <label for="someDateTime">Enter a date or time or date and time:</label>
    <input type="text" id="someDateTime" name="someDateTime" />
    <input type="submit" name="action" value="strtotime" />

    <?php if(isset($_GET['action']) && $_GET['action'] == 'strtotime') { ?>
        You typed: <?=$_GET['someDateTime']?> which is
        <?=strtotime($_GET['someDateTime'])?> since January 1, 1970 at 00:00:00.
    <?php } ?>
</form>
<h4>Time to string</h4>
<p>PHP can translate epoch time into human-readable dates and times.</p>
<form action="functions.php" method="get">
    <label for="someDateTime">Enter a date or time or date and time:</label>
    <input type="text" id="someDateTime" name="someDateTime" /><br />

    <label for="aFormat">Enter a PHP format string:</label>
    <input type="text" id="aFormat" name="aFormat" />

    <input type="submit" name="action" value="formatdate" />

    <?php if(isset($_GET['action']) && $_GET['action'] == 'formatdate') { ?>
        You typed: <?=$_GET['someDateTime']?> and the format: <?=$_GET['aFormat']?>
        which translates to: <?=date($_GET['aFormat'], strtotime($_GET['someDateTime']))?>
    <?php } ?><hr/>
    <h4>Rounding</h4>
    <p>PHP can round up using ceil(), round down using floor(), or just round using round().<br/>
        In this example we'll use Pi (<?=pi()?>) as an input:
        <ul>
            <li>ceil(<?=pi()?>) = <?=ceil(pi())?></li>
            <li>floor(<?=pi()?>) = <?=floor(pi())?></li>
            <li>round(<?=pi()?>, 2) = <?=round(pi(), 2)?></li>
        </ul>
    </p><br/>
    <h4>Random Numbers</h4>
    <p>PHP has a bunch of random number functions but mostly you'll use rand().<br/>
        <form action="functions.php" method="get">
            Pick a number between
                <input type="number" name="from" />
                and
                <input type="number" name="to" />
                <input type="submit" name="action" value="rand"/>
        </form><br/>
        <?php if(isset($_GET['action']) && $_GET['action'] == 'rand') { ?>
        <strong> I choose: <?=mt_rand($_GET['from'], $_GET['to'])?> !</strong>
        <?php } ?><hr/>
    </p>
    <h4>Other Maths Stuff</h4>
    <p>PHP has a lot of math functions.  Here are a few:
        <ul>
        <li> Absolute value - abs(<?=pi() * -1?>) = <?=abs(pi() * -1)?></li>
        <li> Square root - sqrt(<?=pi()?>) = <?=sqrt(pi())?></li>
        <li> Raise to a power - pow(<?=pi()?>, 3) = <?=pow(pi(), 3)?></li>
        <li> Hypotenuse of a triangle given 2 legs - hypot(3,4) = <?=hypot(3,4)?></li>
    </ul>
</p>








































</body>
</html>
