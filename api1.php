<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Building an API</h1>
        <h3>We're going to use PHP to build an API.  I'm assuming you've had programming experience before and I won't teach you PHP.  It is a C-like syntax programming language so if you know another C-like programming language you'll be fine.</h3>

        <h3>Pre-Reqs : <a href="aws1.php">AWS</a>, <a href="apache1.php">Apache</a>, <a href="mysql.php">MySQL</a>, <a href="mongo1.php">Mongo</a>, and <a href="php1.php">PHP</a></h3>

        <p>An API is an Application Programming Interface and what it does is allow the communication between two programs, or two parts of a single program, in a standardized and compartmentalized fashion.  The best kind of an API is one that is RESTful where REST means Representational State Transfer, it comes with a bunch of requirements but the meat of it is that each call should care only about what is passed to it and not on any previous state that the server has been set up into or that the client has been set up into.  This stateless behavior suits the internet very well as each page is essentially stateless on the web.  It is a very scalable design as well.  Now you don't need to understand it all right now we're going to go through building an API with all the basic features right here.</p>

        <p>As a backend developer much of your efforts may be building APIs to communicate your information with a frontend development team's program which would run on the client's machine.  Here we will communicate information and updates about a user account between the frontend client and the database through your API.  There will be four basic functions, corresponding to the four basic CRUD (Creating Reading Updating Deleting) functions in a database.  What we will do is construct an API layer in PHP that will allow a frontend program (which we'll make in the javascript tutorials) to interact with the database to manage a user account.  The interface will be simplistic but hopefully illustrative.</p>
        
        <p>There are several different HTTP request methods that can be used when dealing with a web server.  The most common one is a GET request, and this is what is issued when you visit a normal web page.  You can also issue a POST, PUT, or DELETE request, all of which can be routed by apache in the same way and interpreted in a slightly different way on the server.</p>

        <p>Lets first connect to your MySQL server with a PHP script, and then we'll add in handlers for the Get, Post, and other requests for the API.  So you have to start up your MySQL server and you might as well load up TODO(this dataset) of some simple users for us to play with.  Each user has an id and some data associated with him.  We'll make a PHP script to read some of this data.</p>

        Make a PHP script to read a random user out of the 100 users I gave them

        Make a PHP script to update a user

        Make a PHP script to create a user

        Make a PHP script to add a user

        
               
      </div>

    </div> <!-- /container -->

  </body>
</html>