<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>MongoDB setup and use 1 : the basics</h1>
        <h3>Here we'll install and construct a mongo server from scratch on AWS and play around a bit with it</h3>
        
        <h3>Pre-reqs : <a href="../mysql.php">MySQL</a></h3>

        <p>Ok so fire up and log into your amazon instance and we'll put mongo on it.  First we need to create a repository file so that linux
 knows where to look for the files when we call yum to install.  To do this we'll create a mongo repo file with vi using the command </p>
 <code>
 <p>sudo vi /etc/yum.repos.d/mongodb.repo</p>
 </code>
 <p>This will open a mongodb.repo file in the /etc/yum.repos.d/ folder and we can edit it.</p>
<img src="img/MONGO1/mongo1.png" width="1050"/>
<p>Put this text into the file (press i to begin inserting text into your file) : </p>

<code>
<p>[mongodb]</p>
<p>name=MongoDB Repository</p>
<p>baseurl=http://downloads-distro.mongodb.org/repo/redhat/os/x86_64/</p>
<p>gpgcheck=0</p>
<p>enabled=1</p>
</code>

<p>When you are done then hit escape to go back into command mode and type ":wq" and hit enter.  The w says write the file and the q 
says quit the editor.</p>
<img src="img/MONGO1/mongo2.png" width="1050"/>
<p>Now we are back at our command line and we can now have yum install both the shell and the server.  Run "sudo yum install mongo-10gen".</p>
<img src="img/MONGO1/mongo3.png" width="1050"/>
<p>And "sudo yum install mongo-10gen-server".</p>
<img src="img/MONGO1/mongo4.png" width="1050"/>
<p>Before we can start a mongo server we need to have the data and log path made, so execute the following mkdir commands : </p>
<code>
<p>sudo mkdir /data</p>
<p>sudo mkdir /data/db</p>
<p>sudo mkdir /data/log</p>
</code>
<p>Now we can start the mongo server.  This is called mongod (d for daemon).  We'll specify some flags when we start it so we want to use the command</p>
<code>
<p>sudo mongod --dbpath /data/db --logpath /data/log/mongodb.log --fork</p>
</code>

<p>You can see the permissions error that I am getting when I try and run this 
command without sudo (because we made the data directory as sudo, the root user owns it.  We could change the permissions on those directories but 
I'm just going to run the process with sudo).  The dbpath and the logpath are pretty clear, it tells us where the data for the database will be stored 
and the log path tells us where the server log will be stored (notice that the logpath is a file location but the dbpath is a folder).  The last thing is 
the fork command which tells us we want the process to run in the background, which is how we want a daemon to run.</p>
<img src="img/MONGO1/mongo6.png" width="1050"/>
<p>Now we are ready to log into the mongo shell and start playing around.  All you have to do is type "mongo" from the command line to bring up the 
mongo shell. </p>
<img src="img/MONGO1/mongo7.png" width="1050"/>
<p>Now lets play around with mongo.  Lets show the database by </p>
<code>
<p>show dbs</p>
</code>
<p>You'll see that I sometimes put semicolons and sometimes don't.  For a single command in the shell it doesn't matter if you have a semicolon or not.  
If you are executing multiple commands in a single line then the semicolons separate the two commands from each other and are useful.  The shell uses 
javascript, but not a pure form of javascript.  It has a lot of useful wrapper functions that make accessing data in mongo easier, but the syntax and 
execution is all javascript.  We'll see how to use pure javascript with mongo a bit later.  Now you see that there is only a single database "local" which 
will have a lot of the setup info and stuff.  We don't want to play with that.  Lets make a new database to play with.
<code>
<p>use test</p>
</code>
<p>Now notice that if we tried that with MySQL we would have gotten an error because we have not created the database.  In mongo just the act of trying to use 
a database will create it.  So we just switched to the 'test' database and created it at the same time.  This is often sweet but sometimes annoying as if you mistype 
a database's name instead of giving you an error it will just make that new database and put all your data and shit into there.  There are no tables in 
mongo, they call them 'collections', which is reasonable.  We're gonna get away from the thinking of rows and columns from MySQL and think of it more as 
a group of objects which may or may not be related in the least.  Lets see if there are any collections here (we know there aren't).
<code>
<p>show collections</p>
</code>
<p>So there are no collections, we'll make one by inserting into it.  Again if the collection doesn't exist when we try and insert a document into the collection 
it will generate the collection whether we want it to or not.  Consider everything like an object, so now that we are using the test database we will be able to 
use the 'db' shortcut to refer to it.  Then we will access the 'testcoll' sub-object and then the function 'insert'.</p>
<code>
<p>db.testcoll.insert({name:"Test Object"})</p>
</code>
<p>The object that we insert is a json (Javascript object notation, check the w3schools description of this <a href="http://www.w3schools.com/json/default.asp" target="blank">here</a>), so we can have any nested structure we want.  Here we just inserted a basic key-value pair.  Now lets find it.</p>
<code>
<p>db.testcoll.find()</p>
</code>
<p>With no arguments we are finding all documents in that collection.  The equivalent of a SELECT * statement in MySQL.  If the documents are large you can append 
"pretty()" to the end (Which is synonmous with forEach(printjson)) to output the documents in a more human readable form.  Our documents are so small that you can see 
the pretty function has no effect.  You'll notice that we have an additional _id field in every document.  Every mongo document must have a unique _id field, and if you 
do not make one then mongo will make one for you.  It isn't entirely random, for example in the object Id is embedded when the document was inserted.  We'll go over the 
object id in more depth another time.</p>

<p>We can insert a larger document to see what the effect is.  Try putting in the following : </p>
<code>
<p>db.testcoll.insert({name:"Bigger Test",description:"This is a larger object to see the formatting", views: 8, time : new Date()})</p>
</code>
<p>Now do a find statement with pretty() at the end and you'll see that the larger documents are displayed in a much more readable format.  The date field has been translated 
into a binary UTC formatted ISODate, you should be able to figure out just by looking at it what time it is referring to (note that it is UTC time so the time zone is different).  
This is all fine but lets put in a huge amount of documents and see some stuff.</p>

<img src="img/MONGO1/mongo9.png" width="1050"/>
<p>To insert a lot of documents we want to automate the insertion.  I could have written something directly in the mongo shell but let me show you how to use a javascript file to 
execute mongo commands as scripts.  Type "exit" to leave the mongo shell and go back to the command line.  Then type "sudo vi test_insert.js" to create a file in the folder you are 
in called test_insert.js and begin editing it.</p>
<img src="img/MONGO1/mongo11.png" width="1050"/>
<p>Now lets put this program into the file.</p>
<code>
<p>db = db.getSiblingDB('test'); //This is equivalent to 'use test' in the shell</p>
<p></p>
<p>for(var i =0;i<1000000;i++){ //standard for loop, we'll put a million documents in </p>
<p>          var doc = {name : "Document Name " + i , doc_number : i}; //Our document we will insert</p>
<p>          db.testcoll.insert(doc); //Just like what we executed into the shell</p>
<p>}</p>
</code>
<p>Ignore the fact that my screenshot has an error in it.  Go ahead and save the file with :wq and go back to the shell</p>

<img src="img/MONGO1/mongo12.png" width="1050"/>
<p>To get your mongo shell to execute it then you just need to type the following : </p>
<p>mongo test_insert.js</p>
<p>It will hang for maybe a minute, it is inserting the million records so you'll need to give it a bit.  It'll go back to the bash shell when it is done and we can play 
with the million records</p>
<img src="img/MONGO1/mongo13.png" width="1050"/>
<p>So we'll again go in and show dbs, and switch to using our test tb.  Then we'll show cour collections and see our testcoll there.  Last lets see how many records we have 
in there using the count.</p>
<code>
<p>db.testcoll.count()</p>
</code>
<p>So there are several ways to use the count function, you can put a query into the count brackets or you can do the following to count how many are returned from a find</p>
<code>
<p>db.testcoll.find().count()</p>
</code>
<p>They are all the same.  So we have a million new records and the 2 we manually made before, good.  Now lets pull like 10 records and see what they look like.  We'll 
just pull the first 10.</p>
<code>
<p>db.testcoll.find().limit(10).pretty()</p>
</code>
<p>You'll see our original 2 records and then a bunch of the ones we generated.  Excellent.  Lets ponder some other things we can do.</p>
<img src="img/MONGO1/mongo14.png" width="1050"/>
<p>We can use the findone command to quickly grab a record from the collection an output it.  findOne() is shorthand for find().limit(1).pretty() so it is useful.  If we do 
findOne on our collection</p>
<code>
<p>db.testcoll.findOne()</p>
</code>
<p>We'll find one of our records we generated by hand.  Fine but not very representative of the million records that we know are in there.  We can grab a doc from further in by </p>
<code>
<p>db.testcoll.find().skip(5).limit(1).pretty()</p>
</code>
<p>Order matters as if you skip after you limit then well it isn't very useful now is it?.  This will go and grab 1 record after discarding the first 5 and we can see that this is 
a lot more like what we expect from all of our docs.</p>
<p>Lets find a specific record.  We'll pick some random number, say 674322.  Fine, now we'll do a find on that record</p>
<code>
<p>db.testcoll.find({doc_number : 674322}).pretty()</p>
</code>
<p>Notice that we wrap it all in curly braces.  This is because the find query must be a json as well.  You'll also notice that this query takes about a second.  Which isn't a problem 
for us because we don't have 10k requests coming in at once.  Say we want to make the queries on the doc_number field very fast.  To do this we will index the field, which 
will create a binary tree sorting of the documents and allow lookups to take log(n) instead of n time where n is the number of documents in our collection.  This is basic 
data structures and you might care to read some of this book <a href="http://people.cs.vt.edu/~shaffer/Book/C++3e20100119.pdf" target="blank">here</a>.  I didn't read the entire 
book but I think chapters 1-5 and 7, that was really the basics and it helped me converse with the computer science people on their own terms.  A pretty easy read.</p>
<p>To create an index we will use the following command</p>
<code>
<p>db.testcoll.ensureIndex({doc_number:1})</p>
</code>
<p>Now if you try the query we had before it will execute basically instantly, which is much better.  The tradeoff is that indexes take up space and memory.  Classic 
time-space tradeoff in computing.</p>
<p>Finally lets remove the documents that do not have a doc_number.  To do that we'll use the remove command with a query inside (if you don't have a query in your remove command 
then you will delete everything from that collection).</p>
<code>
<p>db.testcoll.remove({doc_number : {$exists : false}})</p>
</code>
<p>This should take away anything that wasn't generated with a doc_number in it.  Note that we used a special $exists command, there are a lot of these for mongo 
(such as $gt and $lt for greater than and less than) and it came into the query in a nested object.  This is again all JSON syntax and it will make a lot of sense the 
more you work with it.  To test that only those 2 documents we manually inserted are gone we'll do a count.</p>
<code>
<p>db.testcoll.count()</p>
</code>
<p>We see that only the million automatically inserted records are left, excellent.  We can do a find one and we should have a document with a doc number instead of what we got 
last time</p>
<code>
<p>db.testcoll.findOne()</p>
</code>
<p>Good!  Now you can start playing around with this mongo instance, and we'll do more in depth things later.</p>
<img src="img/MONGO1/mongo18.png" width="1050"/>
<p>There is a bunch of material, we'll go more into depth with mongo but the best place to start right now is looking through the comprehensive documentation 
and materials on <a href="http://www.mongodb.com" target="blank">mongodb</a> website itself.  It has a lot of useful stuff and now with a mongo instance you can 
play with it'll make things easier.  You don't have to get into replica sets and sharding yet as we'll be doing that in mongo2 and mongo3 tutorials later.  You should 
right now just get used to the shell and you can check out the cheat sheet they have between <a href="http://docs.mongodb.org/manual/reference/sql-comparison/" target="blank">SQL and mongoDB</a>.  You'll notice quick that in our MySQL tutorial we 
did a join between tables and there is no such thing as a join between collections.  That is because it can't reliably have a schema which means no columns (or fields) 
to match up.  Something we lose when we move to the flexibility of the documents mongoDB gives us.  We can do joins more manually at the application level, and in 
many ways this makes it easier to tailor to our application and it moves the logic off of the database so it is free to do as many reads and writes as possible.  
MongoDB also offers courses regularly <a href="https://education.mongodb.com/" target="blank">here</a> which are free and give you a certificate if you pass.  More 
to come soon guys.</p>
      </div>

    </div> <!-- /container -->

  </body>
</html>
