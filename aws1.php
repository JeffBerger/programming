<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Setting up an AWS instance for the first time</h1>
        <h3>Here we'll initialize and log into an AWS instance</h3>
        
        <p>First you need to go to <a href="http://aws.amazon.com" target="blank">aws.amazon.com</a> and make an account.  I'll leave this up to you
        	and I am sure you can handle it.  We'll be using the free tier for all of this so don't worry about it costing anything.  They'll
        	 still want billing info in case you do something that they can charge you for, but just fill it out.  Then go to the console and 
        	 you should see the following.  We're interested in the EC2 (elastic cloud computing) system so that is what we want to click on.</p>
        <img src="img/AWS1/AWS1.jpg" width="1050"/>
        <p>You'll see some summary stats for your account.  Now you can see I've been using things so I have running instances already and volumes 
        	and such.  You will probably have zeroes for this but that is fine.  We want to go to the instances screen, there is a link on the left 
        	and the running instances link should bring us there as well.</p>
        <img src="img/AWS1/AWS2.jpg" width="1050"/>
        <p>Now you shouldn't have anything in the table here, but I do, don't worry about it.  You want to start a new amazon instance so go to the 
        	New Instances button and push it.</p>
        <img src="img/AWS1/AWS3.jpg" width="1050"/>
        <p>A lot of options appear about what instance you want.  We're going to go with the 64 bit amazon AMI linux option.  We're going to do 
        	a micro instance so it is free.  Now you'll have to name it (here I've named it tutorial).  You'll also need to generate a set of 
        	ssh keys.  If it does not already select "Create New" for you then you should choose it and name your keys and download them.  The key 
        	should be just a regular text file, we'll deal with that soon enough.  After you named the instance and downloaded the keys hit next.</p>
        <img src="img/AWS1/AWS4.jpg" width="1050"/>
        <p>That is basically it for creating the instance.  It should automatically populate the list here with a bunch of other options we don't 
        	have to concern ourselves with.  Now if it sits there loading forever hit edit details and then come right back and it might be ready 
        	to launch (mine hangs sometimes, I don't know about other people....).</p>
        <img src="img/AWS1/AWS5.jpg" width="1050"/>
        <p>After you launch some windows that are unneccesary will come up, close out the bigger one and hit escape to get rid of the smaller one.</p>
        <img src="img/AWS1/AWS6.jpg" width="1050"/>
        <p>You'll now see your instance launching in the main screen we started at.  Wait a few minutes and if it doesn't refresh itself then refresh 
        	the page for it.  When it is ready to go the Initializng will be a green light.</p>
        <img src="img/AWS1/AWS7.jpg" width="1050"/>
        <p>When it is ready you want to click on it and you will find a bottom panel populated with information about the instance.  We want to scroll 
        	down till we find the public DNS entry.  This will be the address that we will use to connect to this instance.  I'm going to assume you 
        	are on windows and we'll be using putty to connect.  If you are on linux or mac you should open a terminal and use the public DNS to ssh into 
        	the system with the key you downloaded earlier as the ssh key (the -i flag might be useful, google it if you need more help).  Putty is a bit 
        	more involved and since I think most of you are using windows that is what we are going to use.  Now I want you to download putty and puttyGen.  
        	As of this writing <a href="http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html" target="blank">this link</a> is to the putty download page and you 
        	can download a zip or exe of all the putty programs in one, which is most efficient.  Downlaod them and then open PuttyGen.</p>
        <img src="img/AWS1/AWS8.jpg" width="1050"/>
        <p>Putty gen will load a ssh key (specifically the one we downloaded) and translate it into a putty file for us to use.  Press Load and choose the 
        	file that you downloaded when you made the instance.</p>
        <img src="img/AWS1/AWS9.jpg" width="1050"/>
        <p>Hit save private key and say yes when it reminds you that you have no passphrase on it, thats ok.  Now we have a .ppk file for us to use with putty.  
        	Close puttygen and open putty itself.</p>
        <img src="img/AWS1/AWS10.jpg" width="1050"/>
        <p>In putty paste the public DNS in the name or IP section then click on the auth option on the left.</p>
        <img src="img/AWS1/AWS11.jpg" width="1050"/>
        <p>There is a spot for your private key, this is the file that puttygen output.  Find that file and put it in there and then hit open to open a connection 
        	to the instance.</p>
        <img src="img/AWS1/AWS12.jpg" width="1050"/>
        <p>You will be greeted by a command prompt asking you for your user name.  Using this key you should choose your user name to be 'ec2-user' and hit enter.</p>
        <img src="img/AWS1/AWS13.jpg" width="1050"/>
        <p>Boom you are now in if everything went smoothly.  It'll tell you there are files to update now so lets do that.  Enter 'sudo yum update' and it will 
        	list all the files to update and how much space it will take.  Say yes and let it run.</p>
        <img src="img/AWS1/AWS14.jpg" width="1050"/>
        <p>Thats it, your instance is ready to go and you know how to connect to it.  Now lets type exit in putty and watch it close out.  Then we'll go back to our 
        	AWS panel and find our instance.  If you click it and go to actions at the top (or if you just right click the instance) you will get a list of options.  
        	The options I want to talk about are the Instance Lifecycle options.  There are four, start stop reboot and terminate.  Think of your instance like a real 
        	computer.  You can turn your computer on and off and reboot it and things will still be there.  The programs you were running will close but all the things 
        	you saved and installed will still be there.  That is what start stop and reboot are.  You don't get charged for a stopped instance, 
        	much like how your computer doesn't cost you money if it is off.  Now Terminate is different.  Terminating an instance you can't come back from, it is dead.  
        	Terminate at your own peril.  For now just stop your instance if you are done with it and you can start it up when you want to play with it some more later.  
        	Note that if you stop and start your instance the public DNS will change, so if you saved something in putty you will have to change the host name when your 
        	instance restarts.</p>
        <img src="img/AWS1/AWS15.jpg" width="1050"/>
        
        <h2>Errata</h2>
        
        <p>Ali (Aley) found that she got an option in her setup to get a public IP or not, if you don't get a public DNS you might have run into the same issue 
        	and need to edit your settings before launching to have a public IP.  Here is an example screenshot where you can see the assign public IP option in the 
        	bottom right, if you find this option it seems you must make sure it says yes.</p>
        	
        	<img src="img/AWS1/Screen Shot 2013-09-03 at 11.50.54 AM.png" width="1050"/>
               
      </div>

    </div> <!-- /container -->

  </body>
</html>