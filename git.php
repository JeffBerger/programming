<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>GIT</h1>
        <h3>We are going to setup GIT, setup GITHUB, and learn to use it a bit.</h3>
               
        <h3>What is GIT?</h3>

        <p>Git is a version control software, and what this does is it allows collaboration on a software project in ernest.  Josh Kat and I have already run into issues with having a single code base that we are all editing, not only can we not edit the same file at the same time but sometimes one of us working on a feature ( me working on the login, and thusly breaking the login for the website) will stop someone else from working on their feature ( such as Kat who needs to be logged in to see the changes to the page she is working on).  This problem only gets tremedously worse as we scale up and becomes impossible once we have the project live and we need to be able to edit code and test it incrementally before making it live.</p>

		<p>What Git does is that it will allow us to have our code saved after each change of the code base (these changes are called commits because it is not saved after every change, it is only saved into the git database when you issue a commit command to the file, saying that your block of changes are done and it should remember this version of the file.  There is no limit to how many times you may commit a file and as space is super cheap don't worry about the overhead on the hard drive of these files).  With these commits we can rewind our changes, and that alone seems useful.  But there is a lot more that we can do.</p>

		<p>Git allows us to branch off from the main code base and work in a detatched parallel manner.  The way you should think of it is that there is one batch of code called 'master', this is what our website runs off of.  We don't want to mess with this until we know things are working.  So Jeff Josh and Kat each make a branch (we'll call them Jeff Josh and Kat) because they are all working on different things.  Jeff can work on his feature, Josh his, and Kat hers.  We can make it so that each of these sub code bases are hosted on 'subdomains' (Such as jeff.rezoundmusic.com would go to the jeff branch but www.rezoundmusic.com would run off of the master branch).  Jeff could work on his feature, and then 'merge' these changes into the master branch.  Josh could merge his feature in then as well.  Even if the same file has been modified Git will merge the changes in the files - if the program cannot tell about the merges then it will issue a conflict and we will deal with it manually but this will be much less of an issue than you think.  If Kat is still working on her features on her branch she can pull from the master to get the features from the master branch into her branch and continue working without losing the code she is working on (It is a good idea to regularly pull from the main development branch).</p>

		<p>Yes it is a bit weird to get your head around but it works very well, and it is very clear to see that we can't all be working on the same code base at the same time.</p>

		<h3>GITHUB</h3>

		<p>First order of business is to go to <a href="www.github.com">github</a> and make an account on github.  Put in your email and verify it, there is a github boot camp which 
		will help you get started.  You need to install your github account locally (yes on your machine, not on your AWS, we'll get to that later.), there are good instructions on there for all operating systems so windows users should not fear.  If you are in linux or mac it will install git so you can access it from the terminal, if you are in windows then it will install a git bash program for you to use.  You also need to follow the instructions to get a ssh key and add it to your account.  Once you have an account we can begin.</p>

		<p>Now we are going to get you some code to work on, open up your terminal / or the git bash depending on your system.  Navigate to the folder that you want to have your code base in.  I put mine in ~/Documents/repos, if you want you can make the folder with mkdir (the bash terminal accepts standard terminal commands like mkdir cd and such).</p>

		PICTURE OF GIT TERMINAL IN THE FOLDER

		<p>Next we are going to download a code base.  We're actually going to use this site as our code base.  To copy a codebase (called a repository, or a repo), we'll want to do what is called a git clone.  The command is "git clone REPO" where our repo will be git@github.com:JeffreyBerger/programming.git .  This will create a folder called "programming" in your current directory and put the code-base in there.</p>

		PICTURE OF GIT CLONE

		<p>Now go into the folder programming and you'll find all the code for our programming site and you can now modify it.  There is a readme.md file in there, why don't you open it and append to the file a line that says "YOURNAME has been here".  Notice how I am using a text editor, not vi or a special program.  GIT has put the files from the programming repo locally on your machine.  Literally they are all text files in a folder on your computer and you should go with your favorite text editor and edit the files where they sit on your hard drive, there is no need to go through GIT to do these edits.  For light files like this (heavy ones might be a large C++ or Java program, for those you often want a larger development suite such as Eclipse provides) I usually go with notepad2 (LINK HERE) or sublime text (LINK HERE).  I've been moving over to using sublime lately it is very good, even if it does bother you about the trial period sometimes.  I won't discuss notepad2 or notepad+ because they are pretty self explanatory, open the file with them.  Sublime has some more machinery so I'm going to go over a quick setup.  Both Eclipse and Sublime are cross platform, so you can use them on whatever system you'd like.</p>
		
		<hr/>
		<p>SIDENOTE : Sublime Setup.</p>
		<hr/>
  
        PICTURE OF ME EDITING THE README.MD FILE

		<p>With the file edited we need to register with GIT that we are done editing the file and it should record the changes.  This action is called a 'commit' as you are commiting the files to the GIT database.  You are only commiting it to your LOCAL GIT database, you are not contacting the server sitting on GITHUB yet.  This means all your changes are recorded locally and that makes them very fast, and accessed without an internet connection.</p>

		<p>add a file and commit a file</p>

		<p>push</p>

		<p>make a branch</p>

		<p>change a file and commit the branch</p>

		<p>go onto github and make a pull request</p>

		<p>put git on AWS</p>

		<p>put another key on your account after generating it on the server</p>

		<p>Clone a repo in your apache folder</p>

		<p>Check site and see a clone of our programming site</p>

		<p>Modify file on your local machine and push it to a new branch</p>

		<p>Pull on AWS and see the update on the site switching to the new branch</p>

		Josh's note after setting things up:
		Github's instructions include steps on how to manually create a readme file in your repository.  If you choose to create your repo with an automatically generated readme, you can skip those steps.  However, it wasn't immediately obvious to me how to clone the repo.  Upon navigating into my repo, I clicked the "Clone in Desktop" button and it took me to a page to download their Windows desktop software.  I wasn't sure if this was the best way to do it, but I couldn't figure out another way so I downloaded it and went from there.  (There's a field above that button to clone using SSH but I didn't understand what to put into the field.)  Everything was pretty self explanatory from there, except one thing: in order to edit the readme starting from the Github software, I had to tell it to open in an external program (tools -> open in explorer -> open with text editor of choice).  Everything else kind of fell into place from there.
      </div>

    </div> <!-- /container -->

  </body>
</html>
