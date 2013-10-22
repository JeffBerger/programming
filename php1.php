<?php include "header.php";?>

    <div class="container">

      <div class="jumbotron">
        <h1>Intro to PHP and Server side programming</h1>
        <h3>We'll discuss what it means to program server-side versus client side</h3>

        <h3>Pre-Reqs:  <a href="aws1.php">AWS</a>, <a href="apache1.php">Apache</a>, and a C-like programming language.</h3>

        <p>I won't be discussing how to program in PHP here, you can look at some other sources such as <a href="http://www.w3schools.com/php/default.asp">W3schools</a> and the best resource for PHP is the <a href="http://www.php.net/">PHP site itself</a>.  I want to discuss what it means to program on the server and the implications of it versus client side programming.  I'm going to use PHP for the demonstration here but you could use any number of languages (python, perl, java, ruby, or even javascript using node.js).  PHP is a c-like typeless scripting language where variables are all denoted by a leading $.  PHP files are started with &lt?php and end with ?&gt, however if your file is completely made of PHP you don't need (and it is best practice) to include the ending ?&gt. But let us talk about server side versus client side.</p>

        <p>When you are dealing with a website or a web-app you have two places where your program lives.  The first is on the server, for us that is in the cloud with amazon's aws.  The second is on the client machine, that is your user's computer.  If you have done any of the javascript tutorials you'll notice we don't need to use the aws server for any of it.  The user's browser runs all the code that you write in javascript, the server does not run it (neglecting node.js).  Because of this javascript is a client side programming language, and as such we can never trust anything to be secure in javascript because we give the code to the user.  If we want to do something secure that we know we control then we'll need to execute the code on our system.  This will include any of our proprietary code, accessing the database, handling passwords and more.  It is important to know the difference between a server side program and a client side program.</p>

        <p>We're going to make a quick php program to just print a line of text.</p>

        <code>
        	<p>&lt?php</p>
        	<p>echo "A line from a server";</p>
        </code>

        <p>Go ahead and put that in a text file and open it with chrome, you'll see that it won't do anything and you'll just see the code displayed.  To get it to run you need to use vi to put it on your server.  Go into your document root on your AWS instance and create a file with those lines of code (name it something other than index.php).  Now use your browser and the public DNS to go to the php page and you'll see just "A line from a server".  This is because what is happening is that your server is getting a request for the php page and it executes the php script and it takes everything the php outputs and passes it to the browser.  Lets see what it means by executing the script.  You can execute the script directly on the server.  By using </p>

        <code>php SCRIPTNAME.php</code>

        <p>from the command line you can execute the script.</p>

        IMAGE OF SCRIPT RUNNING

        <p>So you can see that it outputs the line of text to the command line, and this is what the browser gets and interprets.  Lets examine what this means a bit more.  If instead of having normal text we have HTML then we will see something different in the browser.  Add some HTML tags to the echo.</p>

        <code>
        	<p>&lt?php</p>
        	<p>echo "&lth1&gtA headline from a server&lt/h1&gt";</p>
        </code>

        <p>Run it from the command line and you'll find the HTML tags in there, now go to it in your browser and you'll see the headline text but large and bold, a heading.  What is happening when we visit the php with the browser is that the php outputs the line of text, including the HMTL tags to the browser, and the browser then interprets the HTML string and displays it properly.  We can go farther than that.</p>

        <code>
        	<p>&lt?php</p>
        	<p>echo "&ltsropt&gtalert("An alert from the server");&lt/script&gt";</p>
        </code>        

        <p>Now again run it in the terminal and then go to your browser.  You'll see that again in the terminal it puts the string out to the terminal but in the browser you recieve a pop-up window with the text.  This is because the javascript we have written is executed client side, so when we execute the php script on the server it just sees it as another line of text to send out, no different than the last.  What makes the difference is the browser executing the code on the client's machine.</p>

        <p>So now you should have at least a distinction of what is executed on the client and what is executed on the server, and why what we echo in PHP is often HTML or Javascript, because the intended target is a browser and these things will be executed in that browser.  You can imagine that we may want to log someone in or to access a database and we can do that all from the server side.  You can also notice that unlike with javascript you can't access the source code from the user-side, this means we can program things knowing that it is safe from tampering by users and we can trust things that are executed on the server side.</p>

        <p>This was all very basic but it is important to know the difference between server side and client side.  Feel free to do some more reading into PHP and play around making scripts yourself, there is some more php that was done in the <a href="apache1.php">apache tutorial</a> which you may want to revisit.  The next step is to build a proper interface between a javascript program running on the client's machine and your data and algorithms that are running on your server's machine.</p>
               
      </div>

    </div> <!-- /container -->

  </body>
</html>
