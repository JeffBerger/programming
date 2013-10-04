<?php include "header.php";?>


<div class="container">
  
<div class="jumbotron">
  <h1>EMACS tutorial</h1>
  <h3>Emacs is one of the more popular text editors used in programming. I like it because commands are pretty straight forward. Vim is also a very popular one and it is native to linux, thus you don't need to install it, no matter what linux machine you are on! However, emacs is not, so it needs to be installed. Log onto your preferred machine (MAC, AWS, Ubuntu...etc) and issue the command:</h3>

  <h3>Pre-reqs : AWS</h3>

  <code>sudo yum install emacs</code>

  <h3><p>To open a file named firstfile.txt, you do the following:</p></h3>

  <code>emacs firstfile.txt</code>

  <img src="img/EMACS/emacs1.png" width="1050"/>

  <h3><p>This opens up a new file called, firstfile.txt, in the terminal. Normally if you do this in a terminal locally the emacs window would pop up outside and be completely separate, and in this case the ampersand (&), would allow you to continue to work in the terminal while you edit your file. (If you do not use the ampersand, then you cannot work in the terminal until you close your file). However, it seems that the AWS from amazon doesn't have xterm, which allows the window pop-up, so it will open within the terminal, which is fine also.</p>

   <p>So to open an emacs file within the terminal, on a mac or a linux-based machine, normally one has to execute <code>emacs -nw filename</code>, where -nw, means no window), but here we can just use <code>emacs filename</code>.</p>
  
  <p>Now that we have opened our file called, firstfile.txt, we can edit it immediately, without doing anything but typing! This file ends in txt, so it's just a text file. The ending changes the type of file it is. This may seem obvious, but I'll show you an example. </p>
																			 <img src="img/EMACS/emacs2.png" width="1050"/>			  

  <p>In your text file, type (or copy) the following:</p></h3>

  <code style="white-space: pre;" > for i in range(0,10):
     print i</code>
  
       <img src="img/EMACS/emacs3.png" width="1050"/>			  
       
  <h3>and notice that it just looks like text, one color, boring. So
       let's save the file by doing ctrl-x ctrl-s. You do this by holding the control button down and hitting the x button then hitting the s button with ctrl still held down (at the bottom of the terminal/editor, you'll see a colored bar and on the left hand side of this bar, the commands you are typing show up there, if you do them slowly enough!). Also at the bottom, as soon as it has saved, it will say "Wrote /dir/firstfile.txt" to tell you that it saved and wrote the file out to the specified filename. If you make a change in the file, you will see asterisks in this specific area denoting that changes have been made. Remember the ctrl-x or ctrl-any command!! It is helpful for A LOT of commands in emacs.</h3>

  <p><h3>Then let's close the file by doing ctrl-x ctrl-c, same thing as before but instead of s for save, hit c for close. </p>

<p>Now let's change the ending of the file from txt to python by doing </h3></p>
  <code>
  <p>mv firstfile.txt firstfile.py</p>
  </code>

       <img src="img/EMACS/emacs6.png" width="1050"/>		

  <p><h3>and then let's open it again:</h3></p>
<code>
<p>emacs firstfile.py</p>
</code>
       <img src="img/EMACS/emacs7.png" width="1050"/>

<h3>You will see that the text has changed colors! This is because
emacs is opened now in python mode (by default, you don't need to do
anything special for this to happen), which allows the user to easily
understand the code written. Fabulous!

<p>So let's take a look at this little program we've made. You loop
over i in the range 0 to 10, including 0 and excluding 10, yes? Right!
In python the condition in the for loop must be <b>tabbed</b> in to be
included, otherwise this program will print out ONLY the last number (for the
mongoDB class people, this should be familiar). Try it out!

  <img src="img/EMACS/emacs8.png" width="1050"/>

<p>The excellent thing about emacs is that if you place the cursor at any point on the line
"print i" and press tab, it tabs it to the exactly correct place!
Awesome! It's powerful, but also be aware when you use it, it can
change your code easily to be something you do not want it to do!</p>

<p>Let's say you want to edit the file some more. So go ahead and add something, like:</h3></p>

<code style="white-space: pre;" >for i in range(0,10):
     print i
     print "I love the number "+repr(i)</code>

	  <img src="img/EMACS/emacs9.png" width="1050"/>

	  <h3><p>and be sure to tab it in. For non-python people, the piece "repr()" just takes the number, i, and represents it as a string, so that you can make a string saying "I love the number 5", for example. </p>

<p>Now you realize you don't want the line "print i", because
it is repetitive. So an easy way to navigate inside the window (since
a mouse won't work inside the damn terminal - haaaaate this) is to
ctrl-a, which will move the cursor to the begnning of the line, and
then you can ctrl-k to delete the entire line in front of the
cursor. Go ahead, try it out! BOOM, the line is gone!</p>
 <img src="img/EMACS/emacs10.png" width="1050"/>

<p>If you want to undo what you just did then ctrl-x u should do the trick! Voila! You got it back. If you want to go to the end of the line, hit ctrl-e. The delete button works just the same as usual, deleting backwords and the ctrl-d works to delete forwards with respect to the cursor.</p>
 <img src="img/EMACS/emacs11.png" width="1050"/>
<p>Let's say you are in the middle of typing and you hit the ctrl button and it starts to execute a command (which you will see happening at the bottom of the file, along the gray strip on the left hand side), to kill/stop a command, type ctrl-g (like ctrl-c in the terminal command line), and you will see it say something like "Quit", which means you successfully killed it.</p>
 <img src="img/EMACS/emacs12.png" width="1050"/>

<p>There are a lot of these commands to help navigate, making your coding
fast and efficient. I know you can do the same in Vim for sure and
become really efficient in navigation, but it all takes time to learn
these things.</p>

<p>A helpful place is...you guessed it, google. This pdf is a good place to start: <a href="http://refcards.com/docs/gildeas/gnu-emacs/emacs-refcard-a4.pdf">linky dink</a>. I keep this in a local directory always on my computer so I can open it when I am not sure. I also have it printed and pinned to my wall in my office. Verrrry helpful if you should forget how to do something, or if it's some elusive command you don't know and don't need to memorize!</p>

<p>This looks good too:
<a href="http://www2.lib.uchicago.edu/keith/tcl-course/emacs-tutorial.html">
http://www2.lib.uchicago.edu/keith/tcl-course/emacs-tutorial.html</a></p>
  
<p>If there are any questions, send me an email and I'd be glad to share any knowledge with you. </p>

</div>

</div> <!-- /container -->

</body>
</html>