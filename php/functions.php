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

    <input type="submit" name="action" value="formatdate" /></form>

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
    <h4>Strings</h4>
    <p>Return part of a string:
        <?php $mystr = "The quick brown fox jumps over the lazy dog"; ?>
        <strong><?=$mystr?></strong><br/>
        <ul>
        <li>substr($mystr, 0, 3) = <?=substr($mystr, 0, 3)?></li>
        <li>substr($mystr, 4) = <?=substr($mystr, 4)?></li>
        <li>substr($mystr, -3) = <?=substr($mystr, -3)?></li>
        </ul>
    </p>
    <hr/>
    <p>Replace part of a string:
        <?php
            $mystr2 = "The quick brown fox jumps over the lazy dog";
            $mystr3 = "The quick brown fox jumps over the LAZY dog";
            $replacements1 = 0;
            $replacements2 = 0;
            $mystr2 = str_replace("lazy", "cute", $mystr2, $replacements1);
            $mystr3 = str_ireplace("lazy", "cute", $mystr3, $replacements2);
        ?>
        <strong><?=$mystr2?></strong><br/>
        <ul>
            <li>
                str_replace("lazy", "cute", $mystr2) = <?=$mystr2?>
                (made <?=$replacements1?> replacements)
            </li>

            <li>str_ireplace("lazy", "cute", $mystr3) = <?=$mystr3?>
                (made <?=$replacements2?> replacements)</li>
        </ul>
    </p>
    <p>ASCII Codes:
        <form action="functions.php" method="get">
            <label for="code">Enter a character code:</label>
            <input type="text" id="code" name="code" />
            <label for="char">Enter a character</label>
            <input type="text" id="char" name="char" />
            <input type="submit" name="action" value="ascii" />
        </form>
        <?php
            if(isset($_GET['action']) && $_GET['action'] == 'ascii') {
                if(isset($_GET['code'])){
                    print "Character code ". $_GET['code']." is: ".chr($_GET['code'])."<br />";
                }

                if(isset($_GET['char'])){
                    print "The code for character ". $_GET['char']." is: ".ord($_GET['char'])."<br />";
                }
            }
        ?>

        <hr/>
    </p>
    <p>Length of a string in characters
        <strong>"this is our test string"</strong><br/>
        <?=strlen("this is our test string")?>
    </p><hr/>
<p>
    Length of a string in words:
    <strong>"This is another test string"</strong><br />
    <?=str_word_count("This is another test string")?>
</p><hr>
<p>Character count by char:
    <strong>"This is yet another test string"</strong><br/>
    <?=print_r(count_chars("This is yet another test string"))?>
</p><hr />
<p>Search a string:
    <strong>Looking for the word "long" in "this is a very long string to search"</strong><br />
    It is at position <?=strpos("this is a very long string to search", "long")?><br/>
    <strong>Looking for the word "short" in "this is a very long string to search"</strong><br />
    It is at position <?=strpos("this is a very long string to search", "short")?><br/>
</p><hr />
<p>Trim whitespace from a string:<br/>
    <strong>"    this string contains leading and trailing whitespace    "</strong><br/>
    "<?=trim("    this string contains leading and trailing whitespace    ")?>"

</p><hr/>
<p>Wrap your words...
    <?php $theStory = "this is my short story and it is probably longer than I would like."; ?>
    <strong>input: "<?=$theStory?>"</strong><br/>
    <?=wordwrap($theStory, 3, "<br />")?><hr/>
    <?=wordwrap($theStory, 3, "<br />", true)?>
</p><hr />
<p>Playing with case:
    <strong>Input: <?=theStory?></strong>
    <ul>
        <li>strtoupper($theStory) = <?=strtoupper($theStory)?></li>
        <li>strtolower($theStory) = <?=strtolower($theStory)?></li>
        <li>ucfirst($theStory) = <?=ucfirst($theStory)?></li>
        <li>ucwords($theStory) = <?=ucwords($theStory)?></li>
        <li>str_replace(" ", "", ucwords($theStory)) = <?=str_replace(" ", "", ucwords($theStory))?></li>
</ul>
</p><hr/>
<p>Hashing!<br/>
    <?php $inputString = "this is the original input string on which we will calculate a sha1 hash";?>
    <strong>Input: <?=$inputString?></strong><br />
    The hash is: <?=sha1($inputString)?><br/>
    <strong>Now we will add a period to the end...</strong>
    <?php $inputString = $inputString."." ?>
    <strong>The input is now: <?=$inputString?></strong><br />
    ...and the hash is: <?=sha1($inputString)?>
</p><br/><hr />
<p>Automatically escaping a string:<br/>
<pre>
    <?php
        $originalString = "I'm a lumberjack and I'm okay!";
        $a = addslashes($originalString);
        $b = addslashes($a);
        $c = addslashes($b);
        print "\$originalString = $originalString \n";
        print "\$a = $a \n";
        print "\$b = $b \n";
        print "\$c = $c \n";
    ?>

</pre>

</p>
<p>Format some numbers:<br/>
<ul>
    <li>number_format(<?=pi()?>, 3) = <?=number_format(pi(), 3)?></li>
    <li>number_format(<?=pi()?>, 3, ",", ".") = <?=number_format(pi(), 3, ",", ".")?></li>
    <li>number_format(92960000.12345, 3) = <?=number_format(92960000.12345, 3)?></li>

</ul></p>
<hr/>
<p>Strip tags:<br/>
    <?php
        $userinput = "<p>this is my paragraph <script src='badscript.js'></script></p><?php ?>";
    ?>
    <strong>Original input:</strong>
    <pre>
        <?=htmlspecialchars($userinput)?>
    </pre><br />
    <strong>After strippage:</strong>
    <pre>
        <?=htmlspecialchars(strip_tags($userinput, "<p><strong><br><hr>"))?>
    </pre>


</p><hr/>
<p>One word after another:<br/>
    <ul>
        <li>Does &quot;bravo&quot; come before &quot;alpha&quot;? <?=strcmp("bravo", "alpha")?></li>
        <li>Does &quot;alpha&quot; come before &quot;bravo&quot;? <?=strcmp("alpha", "bravo")?></li>
        <li>Does &quot;alpha&quot; come before &quot;alpha&quot;? <?=strcmp("alpha", "alpha")?></li>
        <li>Does &quot;Alpha&quot; come before &quot;alpha&quot;? <?=strcmp("Alpha", "alpha")?></li>
</ul>


</p><hr>
<p>Padding a string:<br>
<pre>
    <?=str_pad("a", 21, ".", STR_PAD_BOTH)?> 1
    <?=str_pad("aaa", 21, ".", STR_PAD_BOTH)?> 2
    <?=str_pad("aaaaa", 21, ".", STR_PAD_BOTH)?> 3
    <?=str_pad("aaaaaaa", 21, ".", STR_PAD_BOTH)?> 4
    <?=str_pad("aaaaaaaaa", 21, ".", STR_PAD_BOTH)?> 5
    <?=str_pad("aaaaaaaaaaa", 21, ".", STR_PAD_BOTH)?> 6
    <?=str_pad("aaaaaaaaaaaaa", 21, ".", STR_PAD_BOTH)?> 7
    <?=str_pad("aaaaaaaaaaaaaaa", 21, ".", STR_PAD_BOTH)?> 8
    <?=str_pad("aaa", 21, ".", STR_PAD_BOTH)?> 2
    <?=str_pad("aaa", 21, ".", STR_PAD_BOTH)?> 2

</pre>
</p><br />
<p>Format a string:
<?=printf("The Sun is %e miles away from %s", 92960000, "Earth")?>
</p><br />
<p>Parse a URL string:<br/>
    <?php
        $stringToBeParsed = "thing1=first&thing2=second&thing3=third";
        parse_str($stringToBeParsed);
    ?>
    $stringToBeParsed = <?=$stringToBeParsed?><br/>
    $thing1=<?=$thing1?><br/>
    $thing2=<?=$thing2?><br />
    $thing3=<?=$thing3?>
</p><br />






















</body>
</html>









































</body>
</html>
