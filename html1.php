<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Basic HTML and CSS</h1>
        
        <p>I'm not going to go through a whole lot of HTML and CSS here just a description of what they are and some practices with them.  I'll direct you to the W3 schools <a href="http://www.w3schools.com/html/default.asp" target="blank">html</a> and <a href="http://www.w3schools.com/css/default.asp">CSS</a> tutorials for a more complete coverage.  I also won't be building this tutorial like the others, a follow-my-lead website with HTML and CSS, you've already probably used some in some other lesson and you'll be using it constantly through other lessons so that will be enough practice for you.</p>

        <p>HTML is not a programming language, it is a markup language - this means that when you mess up your syntax things simply don't look the way that you would expect, it does not crash the entire page.  HTML consists of sets of tags which are opened and closed to deliminate your content.  A paragraph is deliminated by a 'p' tag and it looks like this</p>
        <code>
        	&ltp&gtYour Paragraph Here&lt/p&gt
        </code>

        <p>The block that I put the code in to make it stand out is actually a &ltcode&gt block.  There are some tags which are known as 'inline' elements and some are 'block' elements.  Inline elements do not have a new-line automatically associated with them while block elements do.  The &ltp&gt tag is a block element while the &ltspan&gt tag is an inline element (span is like a p tag just inline).  You use HTML only to give structure to your page, all styline comes from CSS, which we'll discuss more a bit later.</p>

        <p>There are a lot of different types of HTML tags as well as special things such as forms, but I won't disucss them really.  I want to mention how you can give HTML elements properties thought.  There are some special properties for HTML elements, such as id and class.  These are identifiers that allow the Javascript or CSS to identify which HTML element it is refering to.  The id tag must be unique or you'll run into issues when trying to reference it (and since HTML is not a programming language you don't have a compiler to give you warnings of duplicates!).  The class is not unique and may be assigned to many different elements, not even of the same type.  You can also assign other properties such as name, or my_value.  The way you assign these things to an HTML tag is by placing them inside the tag in the following way</p>

        <code>
        	&ltp id="this_p" class="type_A" name="this_p_name" my_value="42"&gtHola&lt/p&gt
        </code>

        <p>And if you are wondering how I put that code in there, things that are in code brackets are still evaluated by the browser as HTML so instead of actually using the bracket &lt you should use the code &amplt.  Same for the right bracket but with &ampgt, and to type those out you should use &ampamp so &amplt is actually coded as &ampamplt (and &ampamp is written &ampampamp... I know it is a bit much...).</p>

        <p>CSS is a "cascading style sheet", which is again not a programming language.  CSS is what styles the document in all respects.  This includes colors, fonts, sizes, and positioning of all elements.  If you just write a standard HTML file with no CSS you will have a list of text and pictures because everything will be in a single column left aligned.  You can try it out, and it is instructive to see what HTML without CSS is, it is only the barebones structure of the document.  CSS does not have that many rules but getting what you want out of CSS and having all the rules play well with each other is a different matter and is non-trivial.  I hate CSS.  There are three different places where you can place the CSS to an HTML file.  The first place is in a separate file and to refrence it at the beginning of your HTML file.</p>

        <code>
        	&ltlink rel="stylesheet" href="myfile.css" type="text/css" media="screen" /&gt
        </code>

        <p>This is the best way to do it, now all your CSS is in one place and you know where to modify it.  This is also the most easily overridden.  The second method overrides this and that is to put your CSS directly in the HTML but at the beginning.</p>

        <code>
        	<p>&lthead&gt</p>
        	<p>&ltstyle&gt</p>
        	<p>&ltstyle type="text/css"&gt</p>
			<p>body { </p>
			<p?	background-color: #fff;</p>
			<p>	margin: 40px;</p>
			<p>}</p>
        	<p>&lt/head&gt</p>
        	<p>&lt/style&gt</p>
        </code>

        <p>This is better as all the CSS is in one place but not as good because if you want to use the same CSS for multiple HTML files, as one is wont to do on a website where you are having a uniform style, you would need to copy and paste your header into every file.  Then when you want to change, say, your background color you need to go into each file and change it there.  Also if you have a CSS file you are including, this block at the top will override it, so combining both of them could be obnoxious because if you changed your background color in the file it might not change in the page because it was overridden in this style block.  The third way of including CSS is inline, which is the worst for everyone.</p>

        <code>
        	&ltp style="margin:10px;color:blue;"&gtText&lt/p&gt
        </code>

        <p>This overrides all the other methods of putting CSS in, it is the least universal (it applies to only that one element), and it is the hardest to track down and change, especially as it overrides all the other methods mentioned.  Don't do this.  I'm not going to discuss CSS more because I'm not qualified to.  I'm bad at it, and that makes me want to use it less reinforcing my shittiness.  You guys do it.</p>

        <p>Bootstrap is a package by twitter (hence it is called <a href="http://getbootstrap.com/">twitter bootstrap</a>) that was built to help websites attain a uniform and professional look quickly and without pain, and for me it is my CSS savior.  Bootstrap takes care of most of the CSS for you and leaves only the little stylistic tweeks for you to manage - glory.  This site is using bootstrap.  In its essence bootstrap has two components, javascript and CSS.  We'll discuss just the CSS now.  All you need to do is include the twitter bootstrap css file in the head of your HTML document (You can use a CDN to do this, which is a content-delivery-network, a method of hosting files with low latency.  There are ones which allow you to upload your own files and others which have files hosted that you can use, we'll use CDNJS which is public).</p>

        <code>
        	&ltlink href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet"/&gt
        </code>

        <p>Now you can begin using custom classes such as "container" which creates a centered contained, "jumbotron" which creates a centered area that is shaded a different color for text, and the glorious scalable columns that the grid framework has on bootstrap.  Literally all there is to bootstrap is including the CSS and then using a bunch of premade CSS classes which, for the most part, do the annoying work for you (making columns that are proportional and scale with the browser window, getting nice looking buttons, in conjunction with <a href="http://fortawesome.github.io/Font-Awesome/">font awesome</a> a lot of icons for you, and did I mention rescalable columns?).  We'll talk more about the javascript in another lesson, for now just play around with the classes that you find on the bootstrap page in both the <a href="http://getbootstrap.com/css/">css</a> and the <a href="http://getbootstrap.com/components/">components</a> section.  They have example code for all of it so you can copy, paste, and then modify.  It is phenominal.</a>

      </div>

    </div> <!-- /container -->

  </body>
</html>
