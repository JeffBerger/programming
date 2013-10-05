<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Javascript pt1</h1>
        <h3>An introduction to javascript and programming in general.</h3>
        <h3>Pre-reqs : <a href="../html1.php">HTML/CSS</a></h3>

        <p>If you've never programmed before, this might be a good start.  If you have, a bunch of this might be boring but it should have some little tidbits inside which will be worthwhile.  Especially if this is new to you I suggest you take the time out and actually type the commands into your test file rather than copying and pasting my code and seeing the outcome.  You'll remember more of it, the subtlties will be more apparent to you if you are typing it, and you won't rely so much on coming back and copying/pasting lines of code later when you want to make your own page.</p>

        <h2>Intro</h2>

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

		<p>Now go to the file and open it in chrome.  First, your life will be a lot easier if you just submit and use chrome.  Second, I want you to consider for a moment that we aren't doing any of this on a webserver.  You don't need a webserver for any of this javascript stuff, javascript is executed 'client side', which means your end user executes the javascript code in their browser.  Your web server will send them the javascript code - all of the javascript code - and they will run it on their machine.  So you are just skipping the step where the webserver sends you the file and you are just keeping it on your machine, totally legitimate.  The web browser is the program that will interpret the javascript and run it as a program, also super easy.  It is really nice, and you don't have to deal with logging into a webserver and configuring it so it can accept requests or compile things.  You should remember always that when you make javascript you send the whole code to your end user, which means they can do anything they want with it - dice it up, steal data inside it, or steal the whole code.  Never put sensitive data in your javascript that you wouldn't want the user to get access to because as you'll see in later tutorials a user can get to ANYTHING you give them.  Never trust the user.</p>
        <p>When you open the file in chrome you'll see a window pop up that will say "hello" and won't let you do shit till you dismiss it.  This is an alert and is the most annoying and easy function call to make.  A function call is a way of executing some other piece of code which will perform a task.  We'll make our own functions a bit later.  Lets talk about variables.</p>

        <h2>Variables, HTML, and JQuery</h2>

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
            <p>&ltscript&gt</p>
        	<p>&nbsp;&nbsp;&nbsp;var i = 10;</p>
        	<p>&nbsp;&nbsp;&nbsp;var j = "josh";</p>
        	<p>&nbsp;&nbsp;&nbsp;var k = "kat";</p>
        	<p>&nbsp;&nbsp;&nbsp;$("#output").prepend("&ltp&gt" + i + "&lt/p&gt");</p>
        	<p>&nbsp;&nbsp;&nbsp;$("#output").prepend("&ltp&gtThe variable j is " + j + "&lt/p&gt");</p>
        	<p>&nbsp;&nbsp;&nbsp;$("#output").prepend("&ltp&gtThe variable k is " + k + "&lt/p&gt");</p>
        	<p>&nbsp;&nbsp;&nbsp;j = j + k;</p>
        	<p>&nbsp;&nbsp;&nbsp;i = i + 1;</p>
        	<p>&nbsp;&nbsp;&nbsp;$("#output").prepend("&ltp&gt" + j + "&ltp&gt");</p>
        	<p>&nbsp;&nbsp;&nbsp;$("#output").prepend("&ltp&gt" + i + "&ltp&gt");</p>
            <p>&ltscript&gt</p>
        </code>

        <p>Notice how I now am putting HTML tags in what is being prepended to the output div.  This is because we are putting it into the HMTL div so we need to have HTML formatting.  Without the p tags the browser would simply paste all the text into one long string (go ahead and try it and you'll see what I mean).</p>

        <h2>The Godlike For Loop</h2>

        <p>The command "i = i + 1;" is called an incrememnt and it is very common to do this to keep counts so there is a shorthand for it, "i++;".  There is also a decrement and I will let you guess what that is, it goes by "i--;".  This is especially useful if you want to do something multiple times, which is most easily accomplished inside a loop.  There are several different loops, the most common ones are the "while" loop, the "do while" loop, and the lord of all - the "for" loop.  Let us do a for loop right now. A for loop will repeat the code inside of the loop and it takes three parameters.  First, an initializer which it sets when the loop starts.  Second, a test, the loop will continue until that test is no longer true.  Third, an incrementer, which is a command that it will execute every time the loop executes a single iteration.  Let's see one in practice.  Replace what is inside the script tags at the end of your program with the following code:</p>

        <code>
            <p>for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + "&lt/p&gt");</p>
            <p>}</p>
        </code>

        <p>Super easy, now you'll see it will add ten lines of code each of them slightly different.  First we are using the append instead of prepend, this just means new lines are put at the top of the HTML and not at the end of it.  What is happening in the for loop is the loop is creating a variable "i" and setting it to 0.  This is our counter for the for loop, and it will tell us what iteration we are on.  If you imagine that we havea  list of things we want to go through that is 100 elements we don't want to manually go through each, so we make a for loop that will go through 100 things and execute some code on each element.  The way the for loop knows when to stop is the second argument, which says that the for loop should keep going as long as i is less than 10.  As long as i is less than 10 that statement is "true" and the loop will keep going.  Now if we don't make i go up with each iteration we could have a loop that goes on forever and that is a very possible scenario.  So the third argument is a command that is execute each time the loop iterates once, whichi in this case we simply increase i by one.  This means that it will go through the loop 10 times (0-9 is ten times, if you want 1-10 then just start i at 1 and do i&lt11).  For loops are god.  Let us do a quick detour and discuss an array and how to use it with a for loop that is specialized for them.</p>

        <h2>Arrays</h2>

        <p>Lets talk about arrays for a minute.  We can have a variable map to multiple items by putting them in a list called an array.  We can access them by defining the number of the entry we want.</p>

        <code>
            <p>var tools = ["hammer","anvil","penis"];</p>
            <p>$("#output").append("&ltp&gtTool 0 " + tools[0] + "&lt/p&gt");</p>
            <p>$("#output").append("&ltp&gtTool 1 " + tools[1] + "&lt/p&gt");</p>  
            <p>$("#output").append("&ltp&gtTool 2 " + tools[2] + "&lt/p&gt");</p>  
        </code>

        <p>Well that works nicely, but it is a bit repetative going through that line over and over.  Notice that we start with element 0, so that the tools array is three elements long and it goes 0 1 2. If we had 50 things it would be ridiculous.  But it sounds like the perfect situation for a for loop right?  Ok here we go.</p>

        <code>
            <p>var tools = ["hammer","anvil","penis"];</p>
            <p>for(var i = 0;i&lt3;i++){</p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtTool " + i + " " + tools[i] + "&lt/p&gt");</p>
            <p>}</p>
        </code>

        <p>Lets modify something in the array now.  This is easy as selecting the element by number and replacing it with an equals operation.</p>

        <code>
            <p>var tools = ["hammer","anvil","penis"];</p>
            <p>tools[2] = "Another Hammer";</p>
            <p>for(var i = 0;i&lt3;i++){</p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtTool " + i + " " + tools[i] + "&lt/p&gt");</p>
            <p>}</p>
        </code>        

        <p>Fine, but what if we want to add something on?  We can do that by specifying a numeric selector that is beyond the scope of our array.  Lets do that.</p>

        <code>
            <p>var tools = ["hammer","anvil","penis"];</p>
            <p>tools[3] = "Another Hammer";</p>
            <p>for(var i = 0;i&lt4;i++){</p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtTool " + i + " " + tools[i] + "&lt/p&gt");</p>
            <p>}</p>
        </code>         

        <p>Notice how we had to extend the reach of our loop as well to keep track of how long the array is.  Less than helpful.  We can automatically get the length of the array by using the "MY_ARRAY.length" property.  We'll replace our for loop with that and see how it works.</p>

        <code>
            <p>var tools = ["hammer","anvil","penis"];</p>
            <p>tools[3] = "Another Hammer";</p>
            <p>for(var i = 0;i&lttools.length;i++){</p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtTool " + i + " " + tools[i] + "&lt/p&gt");</p>
            <p>}</p>
        </code>         

        <p>Now the program figures out how long the array is itself when it gets to the loop, great.  But there is one little catch, we can assign things to memory slots that are not contiguous and we'll be in for a problem.  Watch what I mean.</p>

        <code>
            <p>var tools = ["hammer","anvil","penis"];</p>
            <p>tools[7] = "Another Hammer";</p>
            <p>for(var i = 0;i&lttools.length;i++){</p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtTool " + i + " " + tools[i] + "&lt/p&gt");</p>
            <p>}</p>
        </code>        

        <p>Length is a lot more, now the length is actually 8, but we go through a bunch of elements which are "undefined".  This causes us an issue, luckily there is a special way of calling a for loop which will allow us not to have to worry about that either, it is a for loop that uses the in operator.  This will just pull the elements from the array with each loop and allow us to play with them, in this case we'll just print them out.</p>

        <code>
            <p>var tools = ["hammer","anvil","penis"];</p>
            <p>tools[7] = "another Hammer";</p>
            <p>for(element in tools){</p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtTool " + element + " " + tools[element] + "&lt/p&gt");</p>
            <p>}</p>
        </code>

        <p>Super easy for an array and very conveinent.  Notice that "element" has not been declared before, this variable is created and to it is assigned each subsequent integer valuein the array until we are out of elements in the array.  So element actually gets the values "element 0, 1 , 2 ..." and we can pull the value by using the tools[element] selector to get the element.  Now we do not have to know the position of the elements or their length to iterate through them.  You'll see this usage later in objects in the exact same context.  One last thing, what if we want to add somehting contiguously onto the end of an array but we don't want to have to remember where the array end is.  That is easy, we don't need to specify a memory location just use the 'push' function and javascript will find the end for you.  You can still get some unique behaviors though if you are not careful.  Comtemplate this example.</p>

        <code>
            <p>var tools = ["hammer","anvil","penis"];</p>
            <p>tools.push("Sam's hammer");</p>
            <p>tools[7] = "another Hammer";</p>
            <p>tools.push("Hail to the Hammer!");</p>
            <p>for(element in tools){</p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtTool " + element + " " + tools[element] + "&lt/p&gt");</p>
            <p>}</p>
        </code>

        <p>Notice that the first push adds "Sam's Hammer" to the end of the array, which ends at memory location 2, so it goes to location 3.  Now when we use the second push for "Hail to the Hammer!" we get that we are in memory location 8, because the last element in the array is now in location 7.  The blank brace does not find the next empty memory slot it finds the end of the array and tacks this element onto it.  Arrays have a bunch of other functions other than "length" and "push" but you can look those up yourself.</p>

        <h2>If statements</h2>

        <p>Now let's rewind to before when we were just printing the loop number and get a bit more complicated and just output a line if it is an even number.  For this we need to use an if statement.  If statements are logical gates which take a statement that they will evaluate and see if the statement is true.  If it is true then it will execute a block of code, if it isn't then it will skip it.  Let us do an example using the modulus operator "%".  This gives you the remainder of division, so 9%4 = 1 because if I divide 9 by 4 I get 2 with a remainder of 1, so the modulus operator returns this remainder.  If we are interested in evens or odds then we want to do modulus of 2.  8 % 2 = 0 because there is no remainder but 9 % 2 = 1 because there is a remainder of 1.  So even numbers will have 0 when modulus of two is evaluated and odd numbers will be 1.  Lets put this into our for loop.</p>

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
            <p>&nbsp;&nbsp;&nbsp;if(i%2 != 0 &amp&amp i%3 != 0){</p>
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
            <p>/*&nbsp;&nbsp;&nbsp;if(i%2 != 0 &amp&amp i%3 != 0){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + " is not divisible by 2 or 3&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}*/</p>
            <p>}</p>
        </code>   

        <p>We are using the inline comment and the block comment.  The // comments everything at that point and past in that line (you can have comments at the end of a line to give an explanation to that line of code) and /* comments everything from that point onwards until it reaches */.  Lets talk about functions before we go further.</p>

        <h2>Functions</h2>

        <p>A function is simply a block of code that you separate out from other parts of your code that does a specific purpose.  This makes the code more readable and you can use the function in different places, so if you are doing the same thing in multiple places you don't have to repeat typing the same lines of code, just call the function.  The function does not know about any variables that have been declared outside of it, so you need to give it information by passing it variables (this is known as scope).  Functions are very important and it is important that you are comfortable using them.</p>

        <p>Lets make a function that outputs ten lines to our output div.</p>

        <code>
            <p>printten();</p>
            <p>printten();</p>
            <p></p>
            <p>function printten(){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + "&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>         

        <p>So take a look, you'll now print two 10 line sets and all you have to do is call printten.  This means we can make general functions that do our tasks and we can just call the function.  It is important to realize that I have declared the function after I call it and things worked ok.  This is not like a variable, if I declare a variable after I use it things will not work.  Functions are special and can be declared before or after the point that they are used.</p>
        <p>Notice also I have empty parentheses after the function call.  You need those, if I just write "printten" that is a reference to the function, not a call to execute it.  We'll use references to functions in a moment.  The parentheses there hold what are known as parameters for the function.  The function doesn't know anything about external variables so we have to pass it variables.  Ok so that was a lot to take in, but lets break it down.  First, what do I mean that the function doesn't know about external variables?  If I declare a variable j outside the function and there is a variable j inside the function the function does not know about the variable j outside the function.  Like this.</p>

        <code>
            <p>var i = 30;</p>
            <p>$("#output").append("&ltp&gtThe value of i is " + i + "&lt/p&gt");</p>
            <p>printten();</p>
            <p>$("#output").append("&ltp&gtThe value of i is " + i + "&lt/p&gt");</p>
            <p></p>
            <p>function printten(){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&lt10;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + "&lt/p&gt");</p>
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
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + "&lt/p&gt");</p>
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
            <p>}</p>
            <p>function printn(n){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&ltn;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + "&lt/p&gt");</p>
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
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtLoop number " + i + "&lt/p&gt");</p>
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>});</p>
            <p></p>
            <p>function printpyramid(n,inner_function){</p>
            <p>&nbsp;&nbsp;&nbsp;for(var i = 0;i&ltn;i++){ </p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;inner_function(i);
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
        </code>

        <p>Note how we construct the function in place, this is how we can create an anonymous function for specific events (which we'll see later) and AJAX calls (Javascript lesson 2).  We can declare a function for it and reference it or we can use an anonymous function, both are valid but you should be able to do both and comfortable with seeing either.</p>

        <h2>Input and Events</h2>

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

        <p>Now once again we changed from append to just "html" acting on the output.  What this does is replace all the html inside of our output div with what we give it, so every time we call that it clears the HTML in output and puts new HTML in.  Go ahead and run it, and you'll see that it won't print anything for the input.  This is because the input is blank.  When you put something into the input box, nothing happens.  This is because nothing in the code tells the HTML to update when the input changes.  It prints what is in the input the first time and then never again.  So we need to listen for an event, and when this event occurs we'll trigger an update.  For this we'll need to deal with an event.</p>

        <p>An event is anything that occurs really.  You can have a mouse click event, a mouse over event, a keystroke event, a click event...  Lots of options.  We're going to do a 'change' event on our input box, so when the value changes we'll have an event fire off.  For this we will use the "on" function of jquery which takes the event we are listening for and also it takes the function to execute when this event is triggered.  Replace the javascript at the end of your file with the following:</p>

        <code>
            <p>$("#input").on("change",function(evt){</p>
            <p>&nbsp;&nbsp;&nbsp;var input = $("#input").val();</p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").html("&ltp&gtThe Value of Input is " + input + "&lt/p&gt");</p>
            <p>});</p>
        </code>

        <p>Now go ahead and try it and we should be able to get the input when you put something into the box and hit enter / click off of the box.  Nice.  And if you keep changing it then it wil keep updating the HTML.  Now you see that with all the programming power we have and the ease of getting events and using user input we can get a real lot done very quickly.  Lets try a different trigger, we'll put a button in and output on button click.</p>

        <code>
            <p>&lthtml&gt</p>

            <p>&lthead&gt</p>
            <p>&ltscript src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"&gt&lt/script&gt</p>
            <p>&lt/head&gt</p>

            <p>&ltbody&gt</p>
                <p>&nbsp;&nbsp;&nbsp;&ltinput id="input"/&gt</p>
                <p>&nbsp;&nbsp;&nbsp;&ltdiv id="output"&gt&lt/div&gt</p>
                <p>&nbsp;&nbsp;&nbsp;&ltbutton id="button"&gtUPDATE&lt/button&gt</p>
            <p>&lt/body&gt</p>

            <p>&ltscript&gt</p>
                <p>&nbsp;&nbsp;&nbsp;$("#button").on("click",function(evt){</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var input = $("#input").val();</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").html("&ltp&gtThe Value of Input is " + input + "&lt/p&gt");</p>
                <p>&nbsp;&nbsp;&nbsp;});</p>
            <p>&lt/script&gt</p>

            <p>&lt/html&gt</p>
        </code>       

        <p>Notice that we put this "evt" as the only argument for the function.  This can be called whatever you want, "e", "event", "bushwick", whatever.  The name you put in there becomes the 'event object' that you are assigned from the event firing.  This object can give you information about what fired the event and other properties of the event.  Here we don't need it because the fact that we are triggering off of the id of the HTML element and the id uniquely identifies the element, but we could trigger instead for any click on a class - which could have multiple HTML elements and in that case we might want to use the event object to narrrow things down more (as an example).  You can do more reading at JQuery on the event object if you want.  There are also lot of events to listen to, and a lot of things you can do - and too many subtlties that I don't know to teach you.  This is also something you'll have to look up.  I've given you a start and you can google the rest.  But before we finish up I'm talking about an event object, but we haven't discussed objects in Javascript yet.  Let's do that.</p>

        <h2>Objects</h2>

        <p>Objects in javascript are nothing but key-value pairs.  That is it.  You don't have to worry about anything more complicated than that.  You can access values in an object with the 'dot' notation.  Let's make an object and access the data in it.</p>

        <code>
            <p>var myobject = {</p>
                <p>&nbsp;&nbsp;&nbsp;name : "Bergarius",</p>
                <p>&nbsp;&nbsp;&nbsp;title : "Lord Solar",</p>
                <p>&nbsp;&nbsp;&nbsp;religion : "Human Supremist"</p>
            <p>};</p>
            <p>$("#output").html("&ltp&gtMy name is " + myobject.title + " " + myobject.name + " " + " and my religion is " + myobject.religion + "&lt/p&gt");</p>
        </code>

        <p>See how we access these elements, we use a dot and then the element name.  Easy.  We can add things in an identical way to assigning a variable too.</p>

         <code>
            <p>var myobject = {</p>
                <p>&nbsp;&nbsp;&nbsp;name : "Bergarius",</p>
                <p>&nbsp;&nbsp;&nbsp;title : "Lord Solar",</p>
                <p>&nbsp;&nbsp;&nbsp;religion : "Human Supremist"</p>
            <p>};</p>
            <p>myobject.degree = "PhD";</p>
            <p>$("#output").html("&ltp&gtMy degree is " + myobject.degree + "&lt/p&gt");</p>
        </code>       

        <p>What if we want to iterate through this like an array and get the key-value pairs?  Well we can do that with a for loop using the in operator just like arrays.</p>

         <code>
            <p>var myobject = {</p>
                <p>&nbsp;&nbsp;&nbsp;name : "Bergarius",</p>
                <p>&nbsp;&nbsp;&nbsp;title : "Lord Solar",</p>
                <p>&nbsp;&nbsp;&nbsp;religion : "Human Supremist"</p>
            <p>};</p>
            <p>myobject.degree = "PhD";</p>
            <p>for(key in myobject){</p>
            <p>&nbsp;&nbsp;&nbsp;$("#output").append("&ltp&gtKEY " + key + " VALUE " + myobject[key] + "&lt/p&gt");
            <p>}</p>
        </code>       

        <p>First, the 'key' variable is not special, it is an unused variable that the loop will assign the key values of the key value pairs in the obkect.  Second, notice that we have another way of accessing elements in an object.  In fact this is vital if you are going to use a variable as using the dot notation with a variable will not work.  You can use brackets, exactly as you would an array, but instead of using a number to represent the position of the element you use its key name.  So myobject["name"] could return Bergarius the same as myobject.name can.  You can think of an array like being an object by the keys are automatically assigned as 0,1,2,3...</p>

        <p>Nice, it is really easy to access, add new things to it and iterate through it.  If you want to declare something as a blank object you would use "var myobject = { };".  Now you might be saying this looks like a map (a hash map, an associative array, a dictionary, whatever you want to call it) and in some senses you'd be right, but this is able to extend beyond what we have right now.  Let's extend it and go deeper by having some more in-depth structure.  We'll use array and we'll even have sub-objects in our object.  All legit.</p>

         <code>
            <p>var myobject = {</p>
                <p>&nbsp;&nbsp;&nbsp;name : "Bergarius",</p>
                <p>&nbsp;&nbsp;&nbsp;title : "Lord Solar",</p>
                <p>&nbsp;&nbsp;&nbsp;religion : "Human Supremist",</p>
                <p>&nbsp;&nbsp;&nbsp;tools : ["hammer","flamethrower","hero's grip"],</p>
                <p>&nbsp;&nbsp;&nbsp;skills : {</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lockpicking : 5,</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;forging : 9,</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;spanish : 1,</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;spacetravel : 11</p>
                <p>&nbsp;&nbsp;&nbsp;},</p>
                <p>&nbsp;&nbsp;&nbsp;allies : [</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name : "JD Josephsson",</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;honor : 99</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;},</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;name : "Josh Robertsson",</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;class : "Sage"</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}</p>
                    <p>&nbsp;&nbsp;&nbsp;]</p>
            <p>};</p>
            <p>$("#output").append("&ltp&gtThe level of my lockpicking skill is : " + myobject.skills.lockpicking + "&lt/p&gt");</p>
            <p>$("#output").append("&ltp&gtOne of my tools is : " + myobject.tools[0] + "&lt/p&gt");</p>
            <p>$("#output").append("&ltp&gtOne of my allies is : " + myobject.allies[0].name + "&lt/p&gt");</p>
        </code>           

        <p>Now I don't know about you but this is exactly how I expect all of these objects to behave, I think it is straight forward.  You can nest them as much as you want and the "myobject.tools" array acts exactly like any other array.  The myobject.allies[0] object acts just like any other object.  You can do whatever operations (add properties to them, iterate through them, etc.) that you expect if you made that object on its own.  Really great.  This syntax for constructing the object is known as JSON, which is Javascript Object Notation and it is super portable as every programming language has a way of dealing with it and parsing it in an easy way.  You can express a lot of nested data in the JSON format and indeed all MongoDB does is store JSONs.  When Javascript gets a JSON it automatically converts it to an object for you to use.  It is great.  But there is one more thing with objects we can have, we can put functions as the value instead of data.  This gives us what looks like object-oriented programming.  Watch.</p>
        
        <code>
            <p>var myobject = {</p>
                <p>&nbsp;&nbsp;&nbsp;name : "Bergarius",</p>
                <p>&nbsp;&nbsp;&nbsp;title : "Lord Solar",</p>
                <p>&nbsp;&nbsp;&nbsp;religion : "Human Supremist",</p>
                <p>&nbsp;&nbsp;&nbsp;dominate : function(){</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$("#output").html("&ltp&gtI DO NOT LEAD, I DOMINATE&lt/p&gt");</p>
                <p>&nbsp;&nbsp;&nbsp;},</p>
                <p>&nbsp;&nbsp;&nbsp;tools : ["hammer","flamethrower","hero's grip"]</p>
            <p>};</p>
            <p>myobject.dominate();</p>
        </code>        

        <p>So here instead of accessing a piece of data we are actually just executing a chunk of code that we have put there.  This is super powerful now that we can have objects that do things.  Note that you basically make an anonymous function right there which gets called whenever that key is activated.  You can nest these as much as you want to so myobject.functions.dominate() is valid.  You also can put arguments in the function so you could have myobject.dominate("Asgrim") if I want to direct my domination.  There are a lot of ways to extend this but you've seen the pieces already so I encourage you to play around.  I want to just note that at the end of the function there is a comma just like any other element in the object.  It is all just a set of key-value pairs, nice and simple.</p>

        <p>Now what if you wanted to make many duplicates of the same object?  Like in object oriented programming you can 'instantiate' an object multiple times, so if I made a ship I could then instantiate a bunch of them and have a bunch of ships.  Well in javascript you can't do it just like that, javascript is not an object oriented programming language and you can't instantiate objects in that way and you cannot have object inheritance.  There are 'prototype' functions which objects can almost 'inherit' but I won't discuss that because I really don't know about them!  But you don't need them at this point and you can get very far without prototype functions, but you know what to look up now if you want to know more.  If you want to create duplicate objects what we end up having to do is make a function that will return an object.  Let's make that ship object.</p>

        <code>
            <p>function ship(ship_name,gross_weight,is_submarine){</p>
            <p>&nbsp;&nbsp;&nbsp;this.name = name;</p>
            <p>&nbsp;&nbsp;&nbsp;this.weight = gross_weight;</p>
            <p>&nbsp;&nbsp;&nbsp;this.submarine = is_submarine;</p>
            <p>&nbsp;&nbsp;&nbsp;this.load = function(mass){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this.weight = this.weight + mass;
            <p>&nbsp;&nbsp;&nbsp;},</p>
            <p>&nbsp;&nbsp;&nbsp;this.unload = function(mass){</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this.weight = this.weight - mass;
            <p>&nbsp;&nbsp;&nbsp;}</p>
            <p>}</p>
            <p></p>
            <p>var emperor = new ship("agamemnon",1200000,false);</p>
            <p>var das_boot = new ship("red-october",30000,true);</p>
            <p>$("#output").append("&ltp&gtShip + " + emperor.name + " has weight " + emperor.weight + "&lt/p&gt");</p>
            <p>$("#output").append("&ltp&gtShip + " + das_boot.name + " has weight " + das_boot.weight + "&lt/p&gt");</p>
            <p>emperor.load(550000);</p>
            <p>das_boot.load(100000);</p>
            <p>$("#output").append("&ltp&gtShip + " + emperor.name + " has weight " + emperor.weight + "&lt/p&gt");</p>
            <p>$("#output").append("&ltp&gtShip + " + das_boot.name + " has weight " + das_boot.weight + "&lt/p&gt");</p>
            <p>emperor.unload(50000);</p>
            <p>das_boot.unload(30000);</p>
            <p>$("#output").append("&ltp&gtShip + " + emperor.name + " has weight " + emperor.weight + "&lt/p&gt");</p>
            <p>$("#output").append("&ltp&gtShip + " + das_boot.name + " has weight " + das_boot.weight + "&lt/p&gt");</p>
        </code>

        <p>So you notice that we now can create two distinct ships that are objects with the same structure.  In this way we can almost emulate object instantiation with the 'new' command which instantiates an object.  There is more description at this excellent stack-overflow answer <a href="http://stackoverflow.com/questions/1646698/what-is-the-new-keyword-in-javascript">here</a>.  That also has more description on prototype functions and object creation in general but basically you need to make a function that creates the object, that is our lesson!.</p>

        <p>Now what of the "this" var?  The special var "this" refers to the object that it is currently part of, so you can think of it that in 'emperor','this' gets replaced by 'emperor' and in das_boot 'this' becomes 'das_boot'.  We need to use this because we have no idea what the object will actually be named when it is instantiated.  This way we can reference it and other variables within that object (as we do in the load and unload functions to add and remove from the weight property) without knowing what the actual name of the object is.</p>

        <p>Notice we don't use 'var' when declaring the variables either.  What you want to think of is that the function is executing a bunch of commands that will add to the current object various properties.  If you look at the example just before we added properties by having myobject.NEW_PROPERTY = VALUE; This is what our function is doing.  New will create a blank object and then we will be adding a bunch of properties to that object with that syntax.  As we don't know the name of the object the first thing we use is "this", but in neither of them do we use "var".  A bit confusing I know but you'll get more used to it.</p>

        <p>You might see a variable 'that' later, especially when we get to backbone in section 4 of javascript.  You'll see it in the contect of "var that = this" and that is just a way of holding onto the value of 'this' which may not always return what you expect in more complex nested situations.</p>

        <p>Ok guys that is enough for part 1 of javascript.  We'll do a part 2 where we integrate with a webserver through AJAX which will allow us to deal with user interactions from both the server end (where our data would be) as well as from the javascript end (where all the user interactions occur).  I encourage you to start messing about on your own page and adding more complex functionality into it, you can now make a calculator of any sort or if you go a bit more in depth with events you can make a basic game (tic tac toe for example is a doable task).</p>
               
      </div>

    </div> <!-- /container -->

  </body>
</html>
