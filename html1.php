<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Basic HTML and CSS</h1>
        <h3>We'll make some basic webpage with HTML, CSS, and Bootstrap</h3>
        
        <p>I'm not going to go through a whole lot of HTML and CSS here just a description of what they are and some practices with them.  I'll direct you to the W3 schools <a href="http://www.w3schools.com/html/default.asp" target="blank">html</a> and <a href="http://www.w3schools.com/css/default.asp">CSS</a> tutorials for a more complete coverage.  I also won't be describing a follow-my-lead website with HTML and CSS in this lesson, you've already probably used some in some other lesson and you'll be using it constantly through other lessons so that will be enough practice for you.</p>

        <p>HTML is not a programming language, it is a markup language - this means that when you mess up your syntax things simply don't look the way that you would expect, not that the entire page crashes down.  HTML consists of sets of tags which are opened and closed to deliminate your content.  A paragraph is deliminated by a 'p' tag and it looks like this</p>
        <code>
        	&ltp&gtYour Paragraph Here&lt/p&gt
        </code>
        <p>The block that I put the code in to make it stand out is actually a &ltcode&gt block.  There are some tags which are known as 'inline' elements and some are 'block' elements.  Inline elements do not have a new-line automatically associated with them while block elements do.  The &ltp&gt tag is a block element while the &ltspan&gt tag is an inline element (span is like a p tag just inline).  You use HTML only to give structure to your page, all styline comes from CSS, which we'll discuss more a bit later.</p>

        <p>There are a lot of different types of HTML tags as well as special things such as forms, but I won't disucss them really.  I want to mention how you can give HTML elements properties thought.  There are some special properties for HTML elements, such as id and class.  These are identifiers that allow the Javascript or CSS to identify which HTML element it is refering to.  The id tag must be unique or you'll run into issues when trying to reference it (and since HTML is not a programming language you don't have a compiler to give you warnings of duplicates!).  The class is not unique and may be assigned to many different elements, not even of the same type.  You can also assign other properties such as name, or my_value.  The way you assign these things to an HTML tag is by placing them inside the tag in the following way</p>

        <code>
        	&ltp id="this_p" class="type_A" name="this_p_name" my_value="42"&gtHola&lt/p&gt
        </code>

        <p>And if you are wondering how I put that code in there, things that are in code brackets are still evaluated by the browser as HTML so instead of actually using the bracket &lt you should use the code \&lt.  Same for the right bracket but with gt.</p>

        <p>CSS is a "cascading style sheet", which is again not a programming language.</p>

        <p>Bootstrap</p>
      </div>

    </div> <!-- /container -->

  </body>
</html>
