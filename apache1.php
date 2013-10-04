<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Turning your AWS server into a website with Apache</h1>
        <h3>Using Apache (httpd) we will turn our AWS server into a webserver to host a basic website.</h3>

        <h3>Pre-reqs : AWS</h3>

    
    <p>The way we are going to turn our AWS server into a website is by installing Apache, which is a HTTP server program.  
    What this means is that when someone uses a browser to go to the address (the DNS which points to the machine's IP address) 
    the browser makes an HTTP request to the machine.  Normally the machine will shrug and not know what to do with that 
    kind of request, but if Apache is running on it then Apache will listen for these HTTP requests and respond with the appropriate 
    HTML page.  This is in essence how a website works, so all we have to do is load Apache (also called httpd for http daemon) onto 
    our AWS box and configure it.  We'll also set up a static IP for the instance and I'll show you how to connect a DNS to this IP</p>
    
	<p>First we need to install Apache, which is called httpd on our systems.  You should be used to this by now</p>
	<code>
	<p>sudo yum install httpd</p>
	</code>
	<img src="img/APACHE1/apache1.png" width="1050"/>
	
	<p>Now we need to start httpd, there is a lovely control script that it comes with so we are going to use it.  Again this is 
	found in /etc/init.d and we have to follow it by the options 'start' 'stop' 'restart' etc.  We want to start it here so the command is</p>
	<code>
	<p>sudo bash /etc/init.d/httpd start</p>
	</code>
	<img src="img/APACHE1/apache3.png" width="1050"/>
	
	<p>Now we need to create a basic html file in the directory that is the public html directory.  Anything in this public html (also 
	called the document root).  The default is /var/www/html which is where we will put our index.html file.  Navigate to that folder and 
	use vi to create the file</p>
	<code>
	<p>cd /var/www/html</p>
	<p>sudo vi index.html</p>
	</code>
	<img src="img/APACHE1/apache7.png" width="1050"/>
	
	<p>After you use the sudo vi index.html command you will have created the file index.html in the /var/www/html directory and be editing it 
	in vi.  The editor vi has quite a learning curve to it, but the long and short of it is that there are two modes "Command" and "Insert", Insert 
	is what you are used to in an editor, command will not insert anything into the document and all keystrokes are mapped to commands such as search.  
	To switch from command mode (which you start in) to insert press "i", you will then be able to type the following into the screen</p>
	<code>
	<p>&lthtml&gt</p>
	<p>&ltbody&gt</p>
	<p>&ltp&gtFIRST HTML PAGE&lt/p&gt</p>
	<p>&lt/body&gt</p>
	<p>&lt/html&gt</p>
	</code>
	<p>When you are done editing the file press esc to return to command mode and type ":wq" into the command mode.  w stands for write and q stands 
	for quit.  This will return you to the command prompt.</p> 
	
	<img src="img/APACHE1/apache8.png" width="1050"/>
	
	<p>You can't access that page yet though, because amazon puts a firewall around all instances.  We need to tell them to allow HTTP requests through 
	to our server.  To do this go to your AWS instance panel and find your instance.  You'll notice a security group associated with it.  Note it and 
	click on the "security groups" option in the lower left.</p>
	<img src="img/APACHE1/apache4.png" width="1050"/>
	
	<p>Here click on the security group associated with your instance and you will find some tabs at the bottom.  Go to the inbound tab and a list of options 
	will pop up.  We want to add a new rule.  HTTP with port of 80 and a source of 0.0.0.0/0 (which means any IP can come to our site).  Fill those in and hit 
	add rule and you should find your screen corresponding to mine.  Once you are satisfied your rule is correct hit the Apply changes button and we're good to 
	go.</p>
	<img src="img/APACHE1/apache5.png" width="1050"/>
	
	<p>Note down your public DNS address (what you used to SSH into the instance) and copy it into the browser of your choice.  You should find that you are 
	served with a single line of text which should look nice and familiar.</p>
	<img src="img/APACHE1/apache6.png" width="1050"/>
	
	<p>So now we can serve a website from our machine.  I could stop the tutorial there and fly a banner that says "mission accomplished" but lets press onward 
	with some more topics.  First lets say you want to have your website hosted not in that folder.  We'll apply a 'virtual host' to the apache config file.  Now 
	these are also good because you can serve different websites on a single machine because apache can tell what was typed into the browser's address bar, so 
	even if two websites point at the same machine they can be distinguished.  But let us hold on a minute and ask what I mean by "point at" a machine with an address</p>
	
	<p>A web address like "www.westphalianarms.com" becomes translated into an IP which is like "54.423.32.43", and this IP is the actuall internet address of 
	your computer.  If you type an IP address into your browser address bar it will take you to that machine, but noone wants to remember the IP address, people 
	want human readable addresses.  This is where DNS or Domain Name Service (Server?) comes in.  It assigns a human readable Domain Name to your IP of choice.  
	So if you wanted www.wearesbs.com to point to a specific IP you need to buy the domain name wearesbs.com (the www is not needed, and you'll see we can assign 
	that as we please).  To do this you go to any number of companies (godaddy, enom, hostmonster, etc...) and buy your domain.  Then we will set it to point to 
	the IP of our server.  But our server does not have a constant IP, it is a virtual machine so it can have a changing IP and we don't want to update our DNS 
	to different IPs all the time (it is annoying and it takes 24 hrs for the entire web to propogate with the DNS change).  So we need to have a fixed IP address, 
	amazon offers this in the "Elastic IP section".  Go to your instance terminal and find the Elastic Ips on the lower left and click on it.</p>
	
	<img src="img/APACHE1/apache9.png" width="1050"/>
	
	<p>Now you probably won't have an address to associate.  Now hit "Allocate new address" and then select it and choose "associate address" and choose your 
	instance (you might only have one).  This will give the instance an IP address (listed in the address collumn).  You can use that in the browser bar instead 
	of your public DNS entry as well as using it to direct a DNS entry to it.</p>
	
	<img src="img/APACHE1/apache10.png" width="1050"/>
	
	<p>Lets go and look at a DNS entry right now.  Here is an example DNS entry (hostmonster) for rezoundmusic.com.   After purchasing a domain name you would 
	need to change your A (Host) record.  The @ entry points to the elastic IP address.  Note that when you buy a domain you buy 'rezoundmusic.com' not 
	'www.rezoundmusic.com'.  You can change what the prefix is (this is a subdomian).  So if you notice there are subdomains associated with my DNS and they 
	all also point to rezoundmusic.com which itself points to the IP I have designated.  You can have all subdomains point to the same place with a wildcard (*) 
	or you can have a subdomain point to a different IP.  Here we are using the same IP and we will see how we can have each subdomain be distinguished by Apache 
	and give us unique websites for each subdomain.</p>
	
	<img src="img/APACHE1/apache10a.png" width="1050"/>
	
	<p>Now if we are going to host multiple sites on a single machine we need to be able to move the directory our website is hosted from.  All of these configurations
	 are found in the httpd.conf file in /etc/httpd/conf/ , but before we edit the file lets create the directory we want to use.  I'm going to put my website in 
	 /home/website , so I use the mkdir command on /home/website to make the direcotry.  Then I use vi to edit the /etc/httpd/conf/httpd.conf file.
	 
	<img src="img/APACHE1/apache11.png" width="1050"/>
	
	<p>We could simply edit the document root entry in the httpd.conf file, but we want to prepare for hosting multiple websites with this apache instance.  So 
	we'll be using virtual hosts.  Scroll to the end of the file and you'll find a virtual host example that has been commented out (Lines starting with # are 
	not read by apache and are treated as comments for the user).  We'll uncomment (remove the # at the front of the line) the NameVirtualHost line (which will 
	set apache to use the name in the address bar of people's browser to route the virtual host) and then we will insert a few lines of code at the end of 
	the configuration file</p>
	<code>
	<p>&ltVirtualHost *:80&gt</p>
	<p>DocumentRoot /home/website</p>
	<p>#ServerName westphalianarms.com</p>
	<p>&lt/VirtualHost&gt</p>
	</code>
	
	<p>The entry in the top of the virtual host "*:80" says that for any IP address being connected to on port 80 use this entry.  Then we may specify a server 
	name (if you bought a domain name you will want to put that here, I've commented it out in mine as I have not bought another domain name for use with this 
	tutorial set but if you did then put the name here.)  Make sure to close the VirtualHost entry.  Write the file and then quit vi.</p>
		
	<img src="img/APACHE1/apache12.png" width="1050"/>
	
	<p>For the configuration changes to take effect you will need to restart apache.  To do this use the init.d script for httpd and use the restart command.  
	If it is running it will shut it down and then start it back up.  If it isn't running then the first part will fail (as you see on mine....).  If there was 
	a syntax error in your httpd.conf file then apache will fail to start and you should use vi to check it again.  Once apache starts back up we should be 
	good to go, but before we visit the site we'll need to put another html file in our new document root so that apache has something to give to a visitor.  
	So use vi to create an index.html file in /home/website (or wherever you put your document root).</p>
			
	<img src="img/APACHE1/apache13.png" width="1050"/>
	
	<p>Go ahead and make another HTML page here, do whatever you want as long as the text is different than your last one (so we can verify that apache is 
	serving files from /home/website and not /var/www/html)</p>
	
	<img src="img/APACHE1/apache14.png" width="1050"/>
	
	<p>You should now go to your Elastic IP/Public DNS/Purchased domain name and you'll see the new page.  Boom!  Ok so how do we apply this to multiple sites or 
	subdomains?  Well here is an example of a httpd.conf that is being used to serve a main website and three different subdomains to all different folders.  This 
	allows us to keep slightly different versions of the same site online for testing while having another version for the 'live' site.  You can also see that a 
	totally different website is also being hosted off another virtual host at the bottom.  Nice right?</p>
	
	<img src="img/APACHE1/apache15.png" width="1050"/>

	<p>Now that you can host whatever pages you would like I bet you think the tutorial is done.  Fuk dat.  You can't make a modern site with your knowledge right 
	now, so lets blast ahead with setting up more stuff.  We're gonna take the page you have and include CSS, PHP, and Javascript.  We'll discuss each one in depth 
	as we go into it.  PHP first.</p>
	
	<p>PHP is a programming language that is interpreted (not compiled) so you do not need to compile the code to execute it.  This comes with performance 
	penalties but it does make it super convienent.  PHP is used on the server side (which is your AWS instance) to execute code and return HTML to the client 
	(whoever is looking at your website).  Basically anything that is output by the PHP file will be sent to the client, and the client's browser will then 
	interpret what is returned as HTML.  What is returned could include CSS as well as Javascript and their browser will correctly deal with that as well.  PHP 
	is the only server-side language we're going through right now, the other three (HTML, CSS, and JS) are all client side (they run in the browser of whoever 
	is connecting to your site).  This does mean that the client never has access to the PHP code, they only have access to its output, making it more secure for 
	us as we have control over it.  This is in contrast to HTML, CSS, and JS as the client will be able to see all the code that you are using, this makes it
	 vunerable.  We'll see how to obfuscate our JS code at some point to make it harder but you should always remember whatever you give to the user should no 
	 longer be trusted.</p>
	 
	<p>We first need to install PHP onto our box as it does not come with it.  You guys should be used to this by now.</p>
	<code>
	<p>sudo yum install php</p>
	</code>
	
	<img src="img/APACHE1/apache16.png" width="1050"/>
	
	<p>Now we are going to make an index.php in the folder that is serving out website, so use vi to make /home/website/index.php and begin editing it.</p>
	
	<p>Every PHP file starts with <\?php and it usually ends with ?? but it doesn't have to.  We're not going to include the ?> because if your file is completely 
	php then it is best not to include it (because you could end up putting things after the ?> accidentally.   Now a quick lesson in writing PHP code.  I'm not 
	going to teach you the language (there are some good tutorials <a href="http://www.w3schools.com/php/" target="blank">here</a>) but if you have written any 
	language with c-like sytnax you won't be thrown for a loop.  One thing you'll quickly notice is all the $ signs everywhere, that is because all variables are 
	prefaced by $ signs in PHP.  Another thing to know is that the "echo" function will output what follows it to the screen (if you are running it from the command 
	line then it outputs to the console, and if you are running it as a web request it outputs it to the client's browser).  So what we will do is write a simple 
	program to echo HTML to the user.</p>
	
	<code>
        <p>&lt?php</p>
        <p>$header = "&lthtml&gt&ltbody&gt";</p>
        <p>$tail = "&lt/body&gt&lt/html&gt";</p>
        <p>echo $header;</p>
        <p>for($i = 0; $i<10; $i++){</p>
        <p>  echo "&ltp&gtThis is line $i&lt/p&gt";</p>
        <p>}</p>
        <p>echo $tail; </p>
        </code>
	
	<p>All we are doing is making two variables to hold the top and bottom of our file (the HTML and BODY open and close tags) so that it is easy to echo them 
	at the start and finish of our page.  In the center we create a basic for loop that will iterate 10 times and give us a new line every time it goes through 
	the loop.  This will create a list of lines on our page instead of us having to create it with HTML ourselves.  Write and quit vi.</p>
	
	<img src="img/APACHE1/apache17.png" width="1050"/>
	
	<p>Before we can view it, since we installed php apache has not been restarted.  The PHP module in apache is not being used because of that, so we need to 
	restart apache.  Use the init script and restart httpd so we can use our PHP module.  Anytime we modify the basic php config files we will also have to restart 
	apache (there is a php.ini file associated with the settings for PHP, but we won't get into that now).</p>
	
	<img src="img/APACHE1/apache18.png" width="1050"/>
	
	<p>Now go to your website and you'll see the page is now a list of 10 lines, nice.  PHP is not confined to serving webpages for people, we can have it do 
	completely backend processes for us.  Just like how you might make a C++ program that will take care of something on the server for us we can do something 
	like that for us.  Lets make a php program that will do something simple like factorize a number passed to it on the command line.</p>
	
	<p>What we'll do to do this is take the number from the command line and then slowly work our way up from two and keep trying to divide the number, if it divides 
	we'll store that number and if it doesn't then we'll move on.  Go ahead and create the file factor.php with vi and put the following code in.</p>
	
	<code>
	<p>&lt?php</p>
	
	<p>if($argc != 2){		//If the arguments do not have a number after the filename then we'll output an error and exit</p>
	<p>	echo "You must choose a number to factor";</p>
	<p>	exit;</p>
	<p>}</p>
	
	<p>$number = $argv[1];	//Take the argument after the filename and put it into the number variable (the 0th argument is always the filename)</p>
	<p>$factors = array();	//Create a blank array of which to fill our factors</p>
	<p>$max = $number;		//We'll save the number we're going to as the max iterations of our loop, it has to divide itself!</p>
	
	<p>for($i=2;$i<$max;$i++){			//We'll start our for loop at 2 as 1 is useless and 0 is stupid</p>
	<p>	if($number % $i == 0){		//See if the remained (modulus) of our number divided by i is 0, if it is then it divides it</p>
	<p>		$number = $number/$i;	//So we divide i out of our number and get the remainder of the unfactored number</p>
	<p>		$factors[] = $i;		//Save our factor in our array.  By not including an index in our array php will automatically put it at the end for us</p>
	<p>		$i--;					//Step back so that we can test the same number again next loop, otherwise numbers like 9 will not divide properly.</p>
	<p>}</p>
	<p>	if($number == 1)			//If we have divided all the factors out of the number we'll have 1 leftover, means we're done</p>
	<p>		break;					//Break out of our for loop</p>
	<p>}</p>
	
	<p>foreach ($factors as $value) {			//This is a special for loop for going through arrays, we put the array we iterate through first and a dummy variable to hold the value second</p>
	<p>	echo "One factor is : $value \n";	//We'll just output the values on each line</p>
	<p>}</p>
	
	</code>
	
	<p>You don't have to exactly understand what the code is doing for the example, but I've included comments for those who want to ponder it  (this is a pretty 
	good programming interview quesiton).  Now execute the program with</p>
	
	<code><p>php factor.php 935891</p></code>
	
	<p>Well I didn't even know that 85081 is a prime, but it is.  So this is just some example where you can use php for a server side program so that you know 
	php need not be confined to echoing HTML to a user making a page request.</p>
	
	<img src="img/APACHE1/apache19.png" width="1050"/>
	
	<p>Now for the last part we are going to put some javascript into our page.  There is an introduction to javascript <a href="http://www.w3schools.com/js/default.asp" target="blank">at w3schools</a> and 
	it might very well be that javascript will be the most useful thing you'll learn programming wise...  We're going to have to up our HTML game but that isn't an issue.  What I want 
	to do is we'll make a line of text that changes depending on which one of the iterations the user is mousing over.  Go to our index.php page and prepare for a 
	rewrite.  We'll be using the JQuery library, which is a library of functions that helps us select, manipulate, and animate html and css elements in our 
	page.  JQuery is not needed to do this stuff but it is uniquitous, almost every page that uses javascript uses JQuery so you'll need to use it.  The main 
	page for JQuery is <a href="" target="blank">here</a> while the w3schools tutorials on jquery can be found <a href="http://www.w3schools.com/jquery/" target="blank">here</a>.</p>
	
	<code>
	
	<p>&lt?php</p>
	
	<p>$header = '&lthtml&gt</p>
	<p>     &ltbody&gt</p>
	<p>     &lthead&gt</p>
	<p>     &ltscript src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"&gt&lt/script&gt</p>
	<p>     &lt/head&gt'; //This now includes the JQUERY library</p>
	
	<p>$tail = '&lt/body&gt&lt/html&gt';</p>
	
	<p>echo $header;</p>
	
	<p>echo "&ltp&gtThe value you clicked on is &ltspan id='output'&gt&lt/span&gt&lt/p&gt"; //This is the line that will be filled </p>
	<p>//with the result of our javascript</p>
	
	<p>for($i = 0; $i<10; $i++){//This is our for loop that goes through 10 lines</p>
	<p>  echo "&ltp class='clickable'&gtLine $i&lt/p&gt"; //We've shortened the text </p>
	<p>//and we've made the class something called 'clickable'</p>
	<p>}</p>
	
	<p>$javascript = '$(".clickable").click(function(){//This is a single javascript</p>
	</p>//command that says for any class that is clickable, when it is clicked, execute the next line</p>
	<p>        $("#output").html($(this).html());//This line says that for the object with the id output</p>
	<p>//replace the html in it with the html from this object that was clicked</p>
	<p>});';
	
	<p>echo "&ltscript&gt" . $javascript . "&lt/script&gt";//echo out the javascript</p>
	<p>echo $tail;</p>
	</code>
	
	<p>Try going to your page now and you'll find that clicking on the text causes the top line to change its HTML, this is only possible with javascript as it 
	allows us to make the webpage interactive without requiring the page to refresh or contact the server.  Do note though that the entire javascript source code 
	has to be echoed to the user, so they have access to the whole thing.  Dangerous!  Also note that we didn't need to install anything on our server to get javascript 
	to work, which is unlike PHP where we needed to install it.  The reason is our server is not running the javascript, the code is being sent to the user and their 
	browser is executing the code.  Servers cannot run javascript (we shall be ignoring Node.js for now...), it is a client-side (user-side) programming language.  
	Now let's use some CSS styles to clean the page up a bit.  We'll use bootstrap to make the items look like proper buttons. Change the following lines of code </p>
	
	<code>
	<p>$header = '&lthtml&gt</p>
	<p>     &ltbody&gt</p>
	<p>     &lthead&gt</p>
	<p>     &ltscript src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"&gt&lt/script&gt</p>
	<p>		&ltlink href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet"/&gt</p>
	<p>     &lt/head&gt'; //This now includes the JQUERY library and bootstrap CSS</p>
	<p></p>
	<p> 	 echo "&ltp class='clickable btn btn-primary'&gtButton $i&lt/p&gt"; //We've shortened the text and we've made</p>
	<p>// the class something called 'clickable' as well as the bootstrap btn and btn-primary classes</p>
	</code>
	
	<p>Now go back to your page and you'll see that it changed the lines to buttons and they look nicer.  What, we didn't do any CSS, we just used bootstrap and 
	that is cheating?  Well you can go fuk yourself.</p>
	
	<p>Actually bootstrap is one of the best things for both basic CSS and Javascript, it will automate a lot of very pain-in-the-ass basic things such as 
	styling your buttons or arranging scalable columns on the page (I am using bootstrap to make this site and the navigation page).  Bootstrap is just a library of 
	that has a bunch of premade CSS styles and Javascript functions.  The site is <a href="http://getbootstrap.com/" target="blank">here</a> and it will pay to be familiar 
	with what it has to offer.  Maybe someone else can write some tutorial on bootstrap if we need it.</p>

      </div>

    </div> <!-- /container -->

  </body>
</html>
