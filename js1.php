<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Javascript pt1</h1>
        <h3>Here we'll talk about javascript as a programming language</h3>

        <h3>Pre-reqs : HTML/CSS</h3>

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

        <p>The command "i = i + 1;" is called an incrememnt and it is very common to do this to keep counts so there is a shorthand for it, "i++;".  There is also a decrement and I will let you guess what that is, it goes by "i--;".  This is especially useful if you want to do something multiple times, which is most easily accomplished inside a loop.  There are several different loops, the most common ones are the "while" loop, the "do while" loop, and the lord of all - the "for" loop.  Let us do a for loop right now. A for loop will repeat the code inside of the loop and it takes three parameters.  First, an initializer which it sets when the loop starts.  Second, a test, the loop will continue until that test is no longer true.  Third, an incrementer, which is a command that it will execute every time the loop executes a single iteration.  Let's see one in practice.  Replace what is inside the script tags at the end of your program with the following code:</p>

        <code>
            <p>for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + "&lt/p&gt");</p>
            <p>}</p>
        </code>

        <p>Super easy, now you'll see it will add ten lines of code each of them slightly different.  First we are using the append instead of prepend, this just means new lines are put at the top of the HTML and not at the end of it.  What is happening in the for loop is the loop is creating a variable "i" and setting it to 0.  This is our counter for the for loop, and it will tell us what iteration we are on.  If you imagine that we havea  list of things we want to go through that is 100 elements we don't want to manually go through each, so we make a for loop that will go through 100 things and execute some code on each element.  The way the for loop knows when to stop is the second argument, which says that the for loop should keep going as long as i is less than 10.  As long as i is less than 10 that statement is "true" and the loop will keep going.  Now if we don't make i go up with each iteration we could have a loop that goes on forever and that is a very possible scenario.  So the third argument is a command that is execute each time the loop iterates once, whichi in this case we simply increase i by one.  This means that it will go through the loop 10 times (0-9 is ten times, if you want 1-10 then just start i at 1 and do i&lt11).  For loops are god.  Now let's be a bit more complicated, just output stuff if it is an even number.  For this we need to use an if statement.</p>

        <p>If statements are logical gates which take a statement that they will evaluate and see if the statement is true.  If it is true then it will execute a block of code, if it isn't then it will skip it.  Let us do an example using the modulus operator "%".  This gives you the remainder of division, so 9%4 = 1 because if I divide 9 by 4 I get 2 with a remainder of 1, so the modulus operator returns this remainder.  If we are interested in evens or odds then we want to do modulus of 2.  8 % 2 = 0 because there is no remainder but 9 % 2 = 1 because there is a remainder of 1.  So even numbers will have 0 when modulus of two is evaluated and odd numbers will be 1.  Lets put this into our for loop.</p>

         <code>
            <p>for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>       

        <p>This will now only output even lines to our div.  Notice how we put a double-equals sign in there, this means "test equality" because the single equals sign means "assign the variable this value".  To keep this straight a double equals is used for equality tests and a single equals sign is used for assignment.  So the for loop says "if the remainder of dividing the variable i by 2 is zero, execute the following block of code".  Straight forward.  You can make things more complicated.  Let's make things more complicated.</p>

         <code>
            <p>for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;else if(i%3 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is divisible by 3 but not by 2&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;else{</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is not divisible by 2 or 3&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>    

        <p>So this will check if i is divisible by 2, and then if it is not it will check if it is divisible by 3, and if it is not then it will execute the last statement.  The else statement only executes if the previous if statement passes the buck, if it satisfies the first if statement then it won't get to the second one even thought it might satisfy the second one.  Go ahead and run it and you will see that six will only fire on the first if statement and say that it is even but it will not tell you anything about if it is divisible by three.  Because the first if statement is triggered and it ignores the rest of the else statements.  Now 9 on the other hand says it is divisible by 3 because it fails the first if statement but passes the second one.  If you want it to catch both of then you need to separate the two if statements and not use an else.  Like this.</p>

         <code>
            <p>for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;if(i%3 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is divisible by 3&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;else{</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is not divisible by 2 or 3&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>          

        <p>Ok now run it, you may have already seen a logical flaw in it.  Notice how I removed the else in the second if statement.  Now that the two if statements are decoupled the first if statement can be triggered and the second one can be triggered as well.  Now the last else statement no longer knows anything about the first if statement.  So for the number four it will say that it is not divisible by 2 or 3, because it passes the first if statement and we get that 4 is even.  Then it fails the second one and that if statement passes onto the else which we then get.  If we want this to work we need to take the last else and turn it into its own if statement.</p>

        <code>
            <p>for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;if(i%3 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is divisible by 3&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;if(i%2 != 0 &amp&amp i%3 != 0{</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is not divisible by 2 or 3&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>                

        <p>Getting more complicated.  We've turned the last statement into its own if statement and the condition is more complicated, we've basically joined two statements.  First we are using "!=" which means "not equal to", so we are saying if i is not divisible by 2 AND (which is what the &amp&amp means, it means that we must have BOTH conditions be true) i is not divisible my three, then execute this block of code.  There is also an OR statement which will execute if either of your two conditions are true ( "||" ) but I think that is enough logic for now.  One last thing, lets say we want to get rid of these conditionals and not delete the code.  We'd use a comment.  A comment is something that the program will ignore but we can keep in there, which is useful for explaining what you are doing if it isn't obvious as well as removing code from execution.  There are two types of comments and I'll show you both.</p>

        <code>
            <p>for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>//&nbsp;&nbsp;&nbsp;if(i%3 == 0){</p>
            <p>//&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is divisible by 3&lt/p&gt");</p>
            <p>//&nbsp;&nbsp;&nbsp;}</p>
            <p>/*&nbsp;&nbsp;&nbsp;if(i%2 != 0 &amp&amp i%3 != 0{</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is not divisible by 2 or 3&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}*/</p>
        </code>   

        <p>We are using the inline comment and the block comment.  The // comments everything at that point and past in that line (you can have comments at the end of a line to give an explanation to that line of code) and /* comments everything from that point onwards until it reaches */.  Lets talk about functions before we go further.</p>

        <p>A function is simply a block of code that you separate out from other parts of your code that does a specific purpose.  This makes the code more readable and you can use the function in different places, so if you are doing the same thing in multiple places you don't have to repeat typing the same lines of code, just call the function.  The function does not know about any variables that have been declared outside of it, so you need to give it information by passing it variables (this is known as scope).  Functions are very important and it is important that you are comfortable using them.</p>

        <p>Lets make a function that outputs ten lines to our output div.</p>

        <code>
            <p>printten();</p>
            <p>printten();</p>
            <p></p>
            <p>function printten(){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>         

        <p>So take a look, you'll now print two 10 line sets and all you have to do is call printten.  This means we can make general functions that do our tasks and we can just call the function.  Notice I have empty parentheses after the function call.  You need those, if I just write "printten" that is a reference to the function, not a call to execute it.  We'll use references to functions in a moment.  The parentheses there hold what are known as parameters for the function.  The function doesn't know anything about external variables so we have to pass it variables.  Ok so that was a lot to take in, but lets break it down.  First, what do I mean that the function doesn't know about external variables?  If I declare a variable j outside the function and there is a variable j inside the function the function does not know about the variable j outside the function.  Like this.</p>

        <code>
            <p>var i = 30;</p>
            <p>$("#output").append("&ltp&gtThe value of i is " + i + "&lt/p&gt");</p>
            <p>printten();</p>
            <p>$("#output").append("&ltp&gtThe value of i is " + i + "&lt/p&gt");</p>
            <p></p>
            <p>function printten(){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number i is " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>          

        <p>You'll see that the values that we put out at the beginning and end of i are not affected by the fact that we use i inside the function.  This is called scope.  Things outside the function and inside the function are separated.  So how do you pass information to the function about the state of your program when  you call it?  What you do is pass a variable.  Lets change the function to print only so many lines as we ask it to.</p>

         <code>
            <p>var i = 30;</p>
            <p>printn(i);</p>
            <p></p>
            <p>function printn(n){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&ltn;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number i is " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>       

        <p>Now you see we are printing 30 lines, and if I wanted to change it all I would do is change the number in the function call.  Easy.  It could be a variable or a hard-coded number inside the function call.  We can also have as many arguments (parameters) as we want, so we could have a function take five variables if we want, doesn't matter.  We can also get really crazy and pass functions to our function - yes inception style.</p>

         <code>
            <p>var i = 5;</p>
            <p>printpyramid(i,printn);</p>
            <p></p>
            <p>function printpyramid(n,inner_function){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&ltn;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;inner_function(i);
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p></p>
            <p>function printn(n){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&ltn;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number i is " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>    

        <p>This will end up calling our printn function over and over and each time for an increasing size, so it will call it once and print one line, then it will call it twice and print two lines, and so on.  Notice how I refer to the printn function in the call to printpyramid, I just use its name.  I don't do printn().  Actually, lets do that.  Change the print pyramid line to this : </p>

        <code>printpyramid(i,printn());</code>

        <p>Oh, that didn't work.  What happens when you put the parenthesis is that the program will try and execute that function as soon as it reads it.  It doesn't actually pass it to the inner printpyramid function, it just tries to run the function right there.  This is an important difference and it is quite tricky!  Ok now what we've done, passing a function, is often used in the context of a 'callback' or 'success' function.  So that when that function ends it will call another function (as a callback function), or if it successfully accomplishes something it will all the function you pass to it (a success function).  Many times these callback or success functions are constructed as anonymous functions, which is a function without a name so you can't call it more than once.  Lets see how this would be written if we replaced our printn(n) function with an anonymous function.</p>

         <code>
            <p>var i = 5;</p>
            <p>printpyramid(i,function(n){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&ltn;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(i%2 == 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number i is " + i + " is even&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>});</p>
            <p></p>
            <p>function printpyramid(n,inner_function){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&ltn;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;inner_function(i);
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p></p>
        </code>

        <p>Note how 

        <p>Ok enough of the general programming let's get some user input on this bitch.</p>        

        <p>Let's make an input box and a trigger.  We'll do this by making an input box in out HTML and we will pull the value from it using the val() function that JQuery has.</p>

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

        <p>Go ahead and run it, and you'll see that it won't print anything for the input.  This is because the input is blank.  When you put something into the input box, nothing happens.  This is because nothing in the code tells the HTML to update when the input changes.  It prints what is in the input the first time and then never again.  So we need to listen for an event, and when this event occurs we'll trigger an update.  For this we'll need to deal with an event.</p>

        <p>An event is anything that occurs really.  You can have a mouse click event, a mouse over event, a keystroke event, a click event...  Lots of options.  We're going to do a 'change' event on our input box, so when the value changes we'll have an event fire off.</p>

        Show various listen-to commands

        Show objects

        Show objects with functions

        Show how to use a function to create an object template

        Discuss 'this' and 'that'
               
      </div>

    </div> <!-- /container -->

  </body>
</html>
