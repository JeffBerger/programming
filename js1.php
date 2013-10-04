<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Javascript pt1</h1>
        <h3>Here we'll talk about javascript as a programming language</h3>

        <p>Many approaches to javascript tie it heavily to what it does with HTML elements in a webpage.  I'll discuss this a bit but I'd like to more discuss how to use javascript in a general programming manner, as it is a complete programming language.  For me I used it for little doodads in a webpage before I realized how empowered it is, so I'd like you to start off knowing you can program basically anything in just javascript.</p>

        <p>Lets go ahead and start making a file with javascript.  Go to your favorite folder (or your desktop I don't care) and make a file called "WHATEVER_YOU_WANT.html" with your favorite text editor.  I'm using sublime, I might suggest you do too.  Do not use word or other 'full featured' text editor (called WYSWYG editors), this will ruin your good time.  You can use notepad if you want to be hardcore but I don't recommend it.  We're going to make a very basic HTML page that will give you an annoying popup window (called an alert).  Put this code in your text file.</p>

        <code>
        	<p>&lthtml&gt</p>

			<p>&ltbody&gt</p>
			<p>&lt/body&gt</p>

			<p>&ltscript&gt</p>
				<p>&nbsp;&nbsp;&nbsp;alert("hello");</p>
			<p>&lt/script&gt</p>

			<p>&lt/html&gt</p>
		</code>

		<p>Now go to the file and open it in chrome.  Your life will be a lot easier if you just submit and use chrome.  You'll see a window pop up that will say "hello" and won't let you do shit till you dismiss it.  This is an alert and is the most annoying and easy function call to make.  A function call is a way of executing some other piece of code which will perform a task.  We'll make our own functions a bit later.  Lets talk about variables.</p>

        <p>Javascript is not "strongly typed", which means when you declare a variable then you don't need to tell it if it is a string, an integer, or a decimal number (called floating point numbers).  All variables are declared like this : </p>
        <code>
        	var i = 30;
        </code>

        <p>Let's make a program that assigns a variable and prints it.  Go back to your HTML file and replace everything inside the script tag with the following</p>

        <code>
        	<p>var i = 10;</p>
        	<p>var j = "josh";</p>
        	<p>var k = "kat";</p>
        	<p>alert(i);</p>
        	<p>alert("The variable j is " + j);</p>
        	<p>alert("The variable k is " + k);</p>
        	<p>j = j + k;</p>
        	<p>i = i + 1;</p>
        	<p>alert(j);</p>
        	<p>alert(i);</p>
        </code>

        <p>Ok these alerts are annoying, let's find a way to make it so it just displays this in the text of the page.  For this we will need to tie in the HTML with the javascript.  Right now the HTML on the page is empty, lets put a div in there to hold the output.</p>

        <code>
        	<p>&lthtml&gt</p>

        	<p>&lthead&gt</p>
        	<p>&ltscript src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"&gt&lt/script&gt</p>
        	<p>&lt/head&gt</p>

			<p>&ltbody&gt</p>
				<p>&nbsp;&nbsp;&nbsp;&ltdiv id="output"&gt&lt/div&gt</p>
			<p>&lt/body&gt</p>

			<p>&lt/html&gt</p>
		</code>

		<p>The first block of script is to import a package called jquery.  Jquery is the most widely used package in javascript and it has a lot of functions to select HTML elements in an easy manner.  It is cross browser as well, one of the biggest issues with javascript is that the main browsers (especially IE) all implement javascript slightly different, which means what works in chrome might not work in firefox.  JQuery works in all of the browsers, so lets use it.  In JQuery the $ sign is shorthand for the JQuery library so we'll be calling a lot of functions from JQuery.  The most useful is the JQuery selector which is $("#element_id") to select a single element with an id, if you want to select all elements of a class you can use $(".class_name").  There are others but you can look those up, I'm here to give you a start not to be comprehensive.  Lets change our script (which is after the body but before the closing of the html tag) to put the HTML at the beginning of the output div (we will prepend it) instead of using alerts.</p>

        <code>
        	<p>var i = 10;</p>
        	<p>var j = "josh";</p>
        	<p>var k = "kat";</p>
        	<p>$("#output").prepend("&ltp&gt" + i + "&lt/p&gt");</p>
        	<p>$("#output").prepend(""&ltp&gt"The variable j is " + j + "&lt/p&gt");</p>
        	<p>$("#output").prepend(""&ltp&gt"The variable k is " + k + "&lt/p&gt");</p>
        	<p>j = j + k;</p>
        	<p>i = i + 1;</p>
        	<p>$("#output").prepend("&ltp&gt" + j + "&ltp&gt");</p>
        	<p>$("#output").prepend("&ltp&gt" + i + "&ltp&gt");</p>
        </code>

        <p>Notice how I now am putting HTML tags in what is being prepended to the output div.  This is because we are putting it into the HMTL div so we need to have HTML formatting.  Without the p tags the browser would simply paste all the text into one long string (go ahead and try it and you'll see what I mean).</p>

        <p>Ok now lets make an input box and a trigger.  We'll do this by making an input box in out HTML and we will pull the value from it using the val() function that JQuery has.</p>

        <code>
        	<p>&lthtml&gt</p>

        	<p>&lthead&gt</p>
        	<p>&ltscript src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"&gt&lt/script&gt</p>
        	<p>&lt/head&gt</p>

			<p>&ltbody&gt</p>
				<p>&nbsp;&nbsp;&nbsp;&ltinput id="input"/&gt</p>
				<p>&nbsp;&nbsp;&nbsp;&ltdiv id="output"&gt&lt/div&gt</p>
			<p>&lt/body&gt</p>

			<p>&ltscript&gt</p>
				<p>&nbsp;&nbsp;&nbsp;var input = $("#input").val();</p>
				<p>&nbsp;&nbsp;&nbsp;$("#output").html("&ltp&gtThe Value of Input is " + input + "&lt/p&gt");</p>
			<p>&lt/script&gt</p>

			<p>&lt/html&gt</p>
        </code>

        <p>Go ahead and run it, and you'll see that it won't print anything for the input.  This is because the input is blank.  When you put something into the input box, nothing happens.  This is because nothing in the code tells the HTML to update when the input changes.  It prints what is in the input the first time and then never again.  So we need to listen for an event, and when this event occurs we'll trigger an update.  For this we'll need to deal with two new things, a function and an event.</p>

        <p>A function is simply a block of code that you separate out from other parts of your code that does a specific purpose.  This makes the code more readable and you can use the function in different places, so if you are doing the same thing in multiple places you don't have to repeat typing the same lines of code, just call the function.  The function does not know about any variables that have been declared outside of it, so you need to give it information by passing it variables (this is known as scope).  Functions are very important and we'll discuss them more in depth as we get more comfortable using them.</p>

        <p>An event is ...</p>

        Show various listen-to commands

        show comments

        Show callback functions

        Show objects

        Show objects with functions

        Show how to use a function to create an object template

        Discuss 'this' and 'that'

        Javascript pt3 : AJAX

        Javascript pt2 : Chrome Debugger

        Javascript pt4 : Backbone
               
      </div>

    </div> <!-- /container -->

  </body>
</html>
