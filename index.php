<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Basic Programming Stuff</h1>
        <h3>Here we'll go over some basic programming things you will likely need to know.  I won't teach you programming languages because there is already a lot of material out there but I'll show you where to go for a lot of it and what things you will need to know.</h3>
        <hr/>
        <h2>New Tutorials</h2>
        <p>More a discussion than a tutorial there is something on HTML/CSS and Bootstrap up<a href="html1.php">here</a></p>
        <p>And another new one on  <a href="emacs1.php"></a>Emacs editor, which is one option to use for editing and making your programs!</p>
        <p>Newest is the tutorial on <a href="git.php">GIT and GITHUB</a> which should be all the tools we need and we can get into actually programming stuff next</p>
        <p>How to make your server host a website with <a href="apache1.php">apache</a> and some <a href="linux1.php">basic linux commands</a></p>
        <hr/>
        <h2>For people starting</h2>
        <p>You'll probably need to do almost all of the tutorials in some order as they will all interdepend on themselves but there is an order to doing some of these things</p>
        <p>FIRST : you must set up your <a href="aws1.php">AWS server</a> as every tutorial will require you to log into it and use that as your enviroment.</p>
        <p>Before you can do any website programming you will want to go through the <a href="apache1.php">apache tutorial</a> to make your machine into a web server.  You will also need to have <a href="git.php">GIT and GITHUB</a> setup to get any code from me, this is essential if you will work together with people on code projects.</p>
        <p>If you aren't that comfortable with linux then you can go over some <a href="linux1.php">linux commands</a>, but don't worry we go through all the commands we use along the way.</p>
        <p>If you are doing the data tutorials please to the <a href="mysql.php">MySQL</a> one before you do the first <a href="mongo1.php">MongoDB</a> tutorial.</p>
        <hr/>
        <p><b>Frontend Programmer</b> : A frontend programmer will deal with the user interface and all the interactions that the user has with the program, anything programmed to run on a clients machine in a web-app is frontend (so one can think of frontend to also mean 'client side').  A website is basically all frontend work as it can be constructed without any backend programming at its most basic level.  The entire interaction of the frontend programmer with the backend (server) programmer is through an Application Programming Interface (API).  The ideal is for it to be a REST API where REST stands for Representational State Transfer, which basically means that each request to the API is independent of the last one.  The frontend makes a call to the server using a common structure and the frontend passes some data that informs the server what it needs and the server responds in kind.  It is the backend programmer's job to construct this API, the frontend programmer needs only use it.  The frontend programmer will be heavily using HTML/CSS/Javascript.</p>
		<p><b>Backend Programmer</b> : A backend programmer constructs the support structure of the program and deals with pulling data from a database and sorting/analyzing/sending it.  Also the backend programmer deals with server side details such as encryption, sessions (how to know if a user is logged in or not), as well as interactions through an API.  Much of the backend programmer's job is to construct a robust and easy to use API for the frontend programmers to pull from.  The backend programmer may use server scripting languages (BASH/PHP) or even call upon compiled programs (JAVA/C/C++) to get these jobs done.  An example might be to construct a program that runs daily that aggregates data from a database and makes it avaialble for the user through the API for that day (So they can see the daily totals of something).</p>
		<p><b>Database Administrator</b> : While a backend programmer needs to know how to query the databases the exact structure and organization of the databases need not be known.  The task of optimizing indexes, data structure, ensuring scalability and uptime of the database itself is the realm of the database administrator.  The database administrator doesn't write many programs and often times it is a lot of scripting to check the status of the database and maintain it.  The two bread-and-butter database standards are SQL and NoSQL, characherized by my favorite the MySQL server and MongoDB.</p>

      </div>

    </div> <!-- /container -->

  </body>
</html>