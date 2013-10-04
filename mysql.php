<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>MySQL setup and use</h1>
        <h3>Here we'll install and construct a mysql server from scratch on AWS</h3>
        
        <h3>Pre-reqs : AWS</h3>

        <p>Start up and log into your amazon AWS instance.  Lets start by installing mysql and the mysql server</p>
        <p>sudo yum install mysql</p>
        <p>sudo yum install mysql-server</p>
        <p>As you see by the screenshot you can install them both at the same time with a single command if you want.</p>
        
        <img src="img/MYSQL/mysql1.png" width="1050"/>
        
        <p>Now we want to start the mysqld (d stands for daemon, which is a process which runs in the background of a computer).  This is 
         our mysql server and will handle the data.  We will start the mysqld with an init script as the installs handily come with one.  An 
         init script is a script that will start, stop, restart, and do other services to a program running in the background making it easier 
         for you.  Also if you start a program with an init script it is easy to make it so that when the system comes online your service starts 
         as well (you could imagine that is a handy feature with a database server).  Some things don't come with an init script and you have to 
         craft your own, which is a larger endevour than we care in BASH.  For now we'll just take what they give us.  Init scripts are stored in
          /etc/init.d so we'll execute the following:</p>
          <p>sudo bash /etc/init.d/mysqld</p>
          <p>You'll find it returning an error because of your usage, this is because you need to specify what you want to do with the service 
          (start, stop, restart... etc) and you'll see it lists a bunch of options.  We want to start the mysqld script so go for:</p>
          <p>sudo bash /etc/init.d/mysqld start</p>
          
          <img src="img/MYSQL/mysql2.png" width="1050"/>
          
          <p>Now you see that it wants us to set up the root user account, which is fine.  It gives us two commands it suggests we execute, we're 
          going to execute the first one.  The second one has to do with a connection string which won't work as it is an internal IP string from amazon.  
          Execute the following : </p>
          <p>/usr/bin/mysqladmin -u root password '<Your new password here>'</p>
          <p>Don't forget it, that is the root password to our mysql server.</p>
          
          <img src="img/MYSQL/mysql3.png" width="1050"/>
          
          <p>Now we can log onto our server using the command mysql on the command line.  You will see our prompt turn to mysql> which will indicate 
          we are in the sql shell and can now start executing sql commands</p>
          
          <img src="img/MYSQL/mysql4.png" width="1050"/>
          
          <p>We can see what databses are currently available for us to play with with the command</p>
		<p>SHOW databases;</p>
		<p>My syntax shall be using capitalization for specific commands for clarification, we'll see we can use the SHOW command elsewhere so I capitalize it 
		and the arguments shall be lower case.  Now you can see there are two databases.
		
		<img src="img/MYSQL/mysql5.png" width="1050"/>
		
		<p>It comes with information_schema and test, lets switch to test</p>
		<p>USE test;</p>
		<p>A database in MySQL is composed of tables.  Think of tables like a page of a spreadsheet program like Excel.  The table consists of a 'schema' which 
		is defined by the columns.  The columns say what each piece of data is and what data type it is (integer, float, string...).  The rows are each entry in 
		the table and will compose our actual data.  Lets see what tables are there.</p>
		<p>SHOW tables;</p>
		<p>No tables are there, hrmm...</p>
		
		<img src="img/MYSQL/mysql6.png" width="1050"/>
		
		<p>Lets make a table.  We have to define a schema first, which is what columns we will allow in our table, lets make one where we have an integer id for 
		each entry, a name for each entry which we will limit to 255 characters, and a story for the name which we will allow to be any length.  That would look 
		like the following command : </p>
		<p>CREATE TABLE test_table ( id int, name varchar(255), story text);</p>
		<p>Go ahead and execute that in the mysql shell and do another show tables and see our newly created table.</p>
		
		<img src="img/MYSQL/mysql7.png" width="1050"/>
		
		<p>now lets see what the tables schema is (the columns and data types).  This is easy to do with the DESCRIBE function and it is very handy.</p>
		<p>DESCRIBE test_table;</p>
		<p>Now we can see the schema that we have lain out.  Lets look for any rows that might be present in the table.</p>	
		<p>SELECT * FROM test_table;</p>
		<p>This will pull all the columns and all the rows from the table selected.  This can be a very dangerous command on a full database as a database can 
		easily have more than 100 million records in it, and you could imagine it trying to dump that all to your screen going poorly.  Perhaps worse if you set 
		up a program to take the data in and it spends all its time trying to process that.  Either way we see we have... nothing... which makes sense as we just 
		created the table.</p>
		
		<img src="img/MYSQL/mysql8.png" width="1050"/>
		
		<p>Lets add some data.  Here are three records that we will put in.  We specify the table and then the values of the rows.  Execute these three commands 
		into the shell and it will insert the documents</p>		
		<p>INSERT INTO test_table VALUES (0,'jeff','Way too much to tell in the space this database allots, even though a text entry can be arbitrarily long!');</p>
		<p>INSERT INTO test_table VALUES (0,'josh','Dr.Wickmaster needs more vespene gas');</p>
		<p>INSERT INTO test_table VALUES (0,'kat','Kat is the master of the wickmaster');</p>
		<p>Now lets pull these records with our SELECT * statement from earlier and take a look at our three records.</p>
		
		<img src="img/MYSQL/mysql9.png" width="1050"/>
		
		<p>Now what if we just want to pull the first one?  We can use a limit statement on our query:</p>
		<p>SELECT * FROM test_table LIMIT 1;</p>
		<p>Now we notice like idiots we have set the ID to 0 for everyone, lets update them to have different Ids.  We'll be using the WHERE clause which narrows our 
		query.  Only records which satisfy the WHERE condition will be affected by our command.  The SET command will change values in our record.</p>
		<p>UPDATE test_table SET id=1 WHERE name='josh';</p>
		<p>UPDATE test_table SET id=2 WHERE name='kat';</p>
		
		<img src="img/MYSQL/mysql10.png" width="1050"/>
		
		<p>Now let us check all of our records.  However this time let's just have it show us the name and the id of each record.  This will replace the * we have 
		been using which pulls all collumns in the record.</p>
		<p>SELECT id,name FROM test_table;</p>
		<p>Here we see our records are now updated.</p>
		
		<img src="img/MYSQL/mysql11.png" width="1050"/>
		
		<p>What if kat doesn't want to be associated with us anymore? Let's remove her from the table with the DELETE command.  Be sure to include a WHERE clause 
		with it because without one then you will delete all records in the table.</p>
		<p>DELETE FROM test_table WHERE id=2;</p>
		<p>Do a SELECT * for the table to check that it is just me and josh left and boom.</p>
		
		<img src="img/MYSQL/mysql12.png" width="1050"/>
		
		<p>Lets take a minute and talk about the permissions of the SQL server.  It has a user based authentication where users get to have access to some 
		databases and not others.  Lets see what user you are running under with the following command.</p>		
		<p>SELECT CURRENT_USER;</p>		
		<p>You'll see since you didn't input a user at the beginning you have no user, just @localhost.  We'll see that in a minute we will require the 
		elevated user privledges of the root user, which you made an account for earlier.  Hope you didn't forget that password!</p>
		
		<img src="img/MYSQL/mysql13.png" width="1050"/>
		
		<p>Ok so we went through a bunch of basic SQL commands.  Lets get you a more complex database for you to play with with a bunch more data in it.  We're 
		going to use a MySQL dump of another database that I have posted <a href="img/MYSQL/westphal_ReZound.sql">here</a>.  Lets make a rezound database 
		and put the rezound data from the dump into it and play with it.  To get the dump onto your system you'll need to do a wget request but that is easy, first 
		while we are still in the mysql shell lets make the rezound databse.</p>		
		<p>CREATE DATABASE rezound;</p>
		<p>Whoops, look at dem permission errors.  Lets leave the shell and go in as root, type in exit in the mysql shell to exit back to your normal bash shell.  
		Now we'll use the mysql command to go back into the shell but we'll specify our username as root and have it prompt us for a password with the -p flag, 
		when prompted just enter the root password.</p>
		<p>mysql -u root –p</p>
		<p>We're back at the shell, but with elevated permissions.  Use the show database command to see what databases there are and you'll find a bunch of new ones.  
		that were hidden from you before.  That's fine, let's not mess with those.  We're jus there to create a new database.  Try the create database command again, 
		this time we'll be more effective.  Once logged in recreate the database for rezound.</p>
		
		<img src="img/MYSQL/mysql14.png" width="1050"/>
		
		<p>Now with our database created we can import the mysql dump.  We'll need to download the file to our system and the easiet is with the wget command.  
		Exit from the mysql shell and back into the bash shell and type in the following command</p>
		<p>wget http://www.westphalianarms.com/programming/img/MYSQL/westphal_ReZound.sql</p>
		<p>This will automatically download the file from that URL to your current directory.</p>
		
		<img src="img/MYSQL/mysql16.png" width="1050"/>
		
		<p>With the dump file in hand we can execute the import command by </p>
		<p>mysql -u root -p rezound < westphal_ReZound.sql</p>
		<p>Again we need to use the root user because that is the only one with permissions for the rezound database we created.  We coul dhave changed the 
		permissions on that database but we just left them for the root user, which is fine.  The import the database and then log into mysql,  If you don't log 
		into mysql as the root user you will see only the information_schema and the test database (as seen in my screenshot).  To get to the rezound database 
		you need to log into the shell as the root user.  Log in as the root user and show the available databases.</p>
		
		<img src="img/MYSQL/mysql17.png" width="1050"/>
		
		<p>Now switch to using the rezound database and list the tables that are in that database.  There should be a good number of them.  If you feel the desire 
		to know more about any one of them feel free to use the describe command to see their schema.</p>
		
		<img src="img/MYSQL/mysql18.png" width="1050"/>
		
		<p>With this data we are able to do more exotic queries such as joins between tables.  We can try a join right now.  As you notice the data is split up 
		between a bunch of tables.  This is to keep from repeating data in a structure that is known as a normalized schema.  Here is an example of repeate data 
		, if someone makes a transaction should we have their name and account information in every row of a transaction?  That would have a lot of duplicate 
		data.  Worse yet if someone changes their account information then we would need to update every single transaction.  To prevent this we have their account 
		information in a single row in an accounts table and reference their account id number in every transaction.  The account id will never change and we can 
		then keep all the information in one place.  The tricky part is that now we need to pull information from between two tables if we want to know the name 
		of the person who made some transaction.  In our database we have a mock music setup, and here our goal will be that given a track id we want the query 
		to return to us the name of the track, name of the album and the name of the band.  Let's see what this will entail, to do this lets get some info about 
		the tracks table.</p>
		<p>DESCRIBE tracks;</p>
		<p>So we'll passe in the track ID, but there is no band name or album name here.  All we have are ids of albums and bands, presumably the information 
		for each is in its own table.  Handily the person who made this named things sensibly so lets use describe on two other tables that look useful.</p>
		<p>DESCRIBE albums;</p>
		<p>DESCRIBE bands;</p>
		<p>So there are our album names and band names, they also have the album and band id.  So we will join from the tracks table onto those two tables using 
		their id fields.</p>
		
		<img src="img/MYSQL/mysql19a.png" width="1050"/>
		<img src="img/MYSQL/mysql19b.png" width="1050"/>
		
		<p>A join takes two tables and joins them based on a column.  An example is that if we join on an id field and the ids match then it will take the row and 
		combine it into one giant row for us to pull data from.  We can do this multiple times and there are multiple kinds of joins (left joins, outer joins, right 
		joins, inner joins) and they all do slightly different things.  I'm not going to get into them here and you can read up on them on your own (there is some 
		material at the end of this tutorial for further studies).  We're going to be using an inner join here.  When you specify a join you must specify what table 
		you are joining to and then using ON specify what criterion to match to conduct the join on.  We will be using a simple "if the id fields match" criterion for 
		our joins.  The syntax is as follows but don't put it in just yet, you'll notice we are missing a bit of information.</p>
		<p>SELECT albums.album_name,bands.band_name,tracks.track_name</p>
		<p>FROM tracks</p>
		<p>INNER JOIN albums ON tracks.album_id=albums.album_id</p>
		<p>INNER JOIN bands ON tracks.band_id=bands.band_id</p>
		<p>WHERE tracks.track_id='< OUR_TRACK_ID >';</p>
		<p>Note that I am not putting a semicolon till the very end of this command, that is on purpose.  The command has multiple lines but it is a single SQL 
		query.  You can enter multiple lines into your shell and it won't mind and will only execute when you lay on a semicolon.  Also notice that before we simply 
		put in the column names in our select statement to get it to return them.  Here we have multiple tables being involved so we actually need to tell SQL which 
		table the columns are from.  If a column is unique (there are no other columns named that in the join) you don't have to specify but it is a good habit to do 
		so.  To specify you put TABLE.COLUMN_NAME as you can see from the sytnax above.  Before we actually execute this query we need to figure out what the range 
		of track Ids we have to work with is.  Lets use some of the aggregation functions to do this.  Run the following two commands</p>
		<p>SELECT MIN(track_id) FROM tracks;</p>
		<p>SELECT MAX(track_id) FROM tracks;</p>
		<p>These comamnds are very straight forward and give us the maximum and minimum ids from the track_id field in tracks.  This doesn't guarenttee that the 
		ids are contiguous, but as the creator of the table I will tell you they are so you may choose any values between those two numbers for a track to select.  
		We can pick a number between 82905 and 93695, fine.  Pick one and run the previous query.  Boom, it pulled together the data from everywhere for you.  
		This pushes the logic out of the program and onto the database.  You might imagine that if you didn't know about joins you would do a query for the 
		track ID, store in the program the Album ID and the Band ID and then do two more queries on the database to store the information.  This incurs 
		additional I/O overhead and increases lag but is simpler for the database to conduct so it reduces the load on it.  However the joins will be 
		faster overall as the SQL database can optimize this.  Queries and joins may be made faster by views or indexes which are another topic but this 
		should get you nice and far into SQL.</p>
		
		<img src="img/MYSQL/mysql20.png" width="1050"/>
		
		<p>That is gonna be it for our MySQL tutorial.  You can exit out of the shell and shut down your mysql sevrer by using the startup script in the following 
		manner</p>
		<p>sudo /etc/init.d/mysqld stop</p>
		<p>When you start your script back up your data will still be there, it is stored on disk and it will use the same location to find the files and populate 
		the databses.  You'll just need to use the startup script to start it like we did at the beginning of the tutorial.</p>
		
		<p>That is it for your basic MySQL lesson, feel free to play around and destroy the data, worst that happens is you rebuild and reimport the data from the 
		dump file.  If you've had enough you can stop your MySQL server and stop your amazon instance.</p>
		
		<p>There is a bunch of more material in SQL.  We won't be discussing SQL more in our tutorials and we will be focusing more on NoSQL which is more modern.  
		MySQL is the most ubiquitous database out there and it is important to know.  You can go through the <a href="http://www.w3schools.com/sql/default.asp" target="blank">w3schools</a> 
		tutorial on SQL it is very good and you can go through it very quickly.  If you are to go more in depth you can look at the <a href="http://www.westphalianarms.com/programming/img/MYSQL/sql21days.pdf" target="blank">MySQL in 21 days</a> 
		book.  I think I only went throught the first 14 lessons but that was plenty.  Enjoy kids.</p>
      </div>

    </div> <!-- /container -->

  </body>
</html>