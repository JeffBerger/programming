<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Linux things to know</h1>
        <h3>I'm gonna talk about linux for a bit, this is also good for mac and any real terminal stuff - in no particular order.  All these commands are 
        for the terminal.  The terminal is that black screen with a prompt (like DOS) that you can enter text commands in.  This is the nitty gritty of 
        knowning how to use computers, knowing the terminal.  You can do everything from here and you should know how to if you are going to be in programming, 
        because graphical user interfaces (GUIs) are for BITCHES.</h3>
        
    <h2>Paths</h2>
    <p>A note about system paths.  The root directory is the most basic level of your system and it is designated as "/" , your home directory is your 
    users's default location and it is denoted by "~".  If you specify a path with a slash at the beginning then you are specifying an ABSOLUTE path, as in 
    it is relative to only the system's base folder.  So "/data/db" is always there, because it is absolute as there is a leading slash.  If I typed "data/db" 
    then I am looking for the data folder IN MY CURRENT FOLDER.  This is a RELATIVE path because it is RELATIVE to which directory I am currently in.  You can 
    make an absolute path using your home directory "~/MyFolder/Something.txt" is an absolute path because ~ never changes FOR MY USER, if this is in a script 
    that is being used by another user then this path WILL BE DIFFERENT as their ~ will take them to a different folder.  For example my ~ will take me to 
    /home/jeff and josh's (on the same machine" will take him to /home/josh.  These are all subtle differences that you need to know when navigating around 
    Linux, it makes a big difference.</p>
    
	<h2>tab complete</h2>
	<p>Hiting tab once will have the shell try and autocomplete what you are typing (folder name, file name, command, doesn't matter).  
	If you hit tab twice in quick succession it will list your options (all commands starting with mo for instance).  You guys need to 
	use this always and forever.</p>

	<h2>vi/vim</h2>
	<p>Text editor, type vi FILENAME and it will allow you to edit the file.  If the file does not exist then it will create the file and open it for editing.  
	The quick dirty of vi is that it has two modes, one is "command mode" and one is "edit mode".  Command mode is the default you start in and each keystroke 
	is some hotkey for a command ( for example / means "search", n means "next item", m means "last item").  To begin typing you need to press "i" for insert 
	and the mode will change to insertion mode where you can type like normal.  Escape returns you to command mode.  If you are going to paste into vi make 
	sure you are on edit mode first.  Sometimes it also helps to (in command mode) use :set paste, this will set a special paste mode on insertion and try to 
	preserve the spacing in your original copy.  When you are done use :w to save and :q to quit (in command mode).  You can chain them for :wq to write then 
	quit.  To undo use "u" in command mode.  You can learn a bunch more on vi <a href="http://www.unix-manuals.com/tutorials/vi/vi-in-10-1.html" target="blank">here</a>.</p>

	<h2>yum/apt-get</h2>
	<p>Depending on the linux you are using then you can use one of these commands to download and install something from a code repository, super easy and 
	conveinent.  I'm sure you used it plenty already.</p>

	<h2>ls</h2>
	<p>List what is in the current directory</p>
    <p>flags : -l is list in long form, -a is list all (including hidden files).  You can chain these flag for instance -la shows all files in long format</p>

	<h2>wget</h2>
	<p>Web get, "wget FILE-URL" and it will download the file from the interwebs for you to your current directory.</p>

	<h2>top</h2>
	<p>This will show you the processes using the most resources and a bunch of other system stats, type q to quit the program.
	  Try it you'll see it is useful.</p>

	<h2>ps</h2>
	<p>This lists the current processes with their pids (process id).</p>
  	<p>flags : "ps aux" shows all processes and the commands issues to run them</p>
             <p>-u "username" filters by user name</p>

	<h2>netstat</h2>
	<p>Utility that shows network traffic and open sockets.</p>

	<h2>grep</h2>
	<p>A super-useful program that allows for a regular expression (REGEX) search through files and it will return the line(s) that match 
	your search.  For example if you wanted to find every line that said "mongo" in a file you would use "grep mongo FILENAME".  You can grep any file 
	in the current folder by "grep mongo ." where . stands for "this directory".  You can also do a recursive grep where you look through the contents 
	of folders all the way down the folder chain.  "grep -R mongo ." would search all files in the current directory and crawl down the folder chain of 
	any folders in the current directory.  You can use a REGEX search which is a powerful way of specifying rules for what kind of charachters you are 
	searching for.  I won't describe them but you can look them up <a href="http://www.regular-expressions.info/tutorial.html" target="blank">here</a>, 
	it isn't hard.</p>
	
	<h2>sed</h2>
	<p>Allows you to do a regular expression find and replace throughout a file.  To replace "mongo" with "sql" in a file you could use "sed 's/mongo/sql/g' FILENAME".  
	There is a real lot more to sed but I won't cover it because I never remember it.  You can find a lot of really confusing tutorials on sed out there but 
	when I need something I just find an exmaples page and steal stuff.  <a href="http://www.computerhope.com/unix/used.htm" target="blank">For example</a>.</p>

	<h2>awk</h2>
	<p>Awk is actually a full programming language but often just used to pull a column from something.  Like if I have a list I could separate things out by columns 
	with awk and print the second column by "awk '{print $2}' FILENAME".  More useful than you'd expect - as in I've used it twice when I thought I'd use it never.  
	Again just look up examples when you need to use it but know that it is out there, like <a href="http://www.thegeekstuff.com/2010/01/awk-introduction-tutorial-7-awk-print-examples/" target="blank">here</a>.</p>

	<h2>df</h2>
	<p>Shows how much space is on various mounted drives.</p>
    <p>flags : use the -h flag to put it in 'human readable' form</p>

	<h2>ssh</h2>
	<p>You best know this one, allows you to open a terminal on another computer (Secure Shell).  You use this every time to get into your AWS instance either 
	from the command line or putty will execute this for you (Putty is an SSH program).  There are a lot of SSh programs out there for every platform (I have a 
	SSH program for my phone, so I could log into any linux machine and enter any command.  I have done this to run programs on a computing cluster for my thesis 
	and it is convenient to have if you need to connect to computers from anywhere).  There are several ways to authenticate with SSH, one way is having a username 
	and a password setup on the machine you are SSHing into.  Another way is to have a SSH key.  A SSh key has two parts, a private file and a public key.  A private 
	key is a file with a very long password.  The SSH program uses the private key to request access from the server and the server will check it against its public key.  
	The public key can be given out to as many computers as you would like because you cannot generate the private key from it, so as long as you have the 
	private key any machine with the public key on it can be logged into by you without a password.  This is how your AWS instance is set up, you downloaded a 
	private key when you first setup your instance and your public key was automatically loaded onto the instance.  You can generate more key pairs with ssh-keygen 
	but you can google that if you need to do that.</p>
    <p>flags : use -i to specify an ssh key to be used if it is not in the default location/name (~/.ssh/id_rsa)</p>

	<h2>cp</h2>
	<p>Copy a file from one place to another "cp OLD_FILE NEW_FILE".</p>

	<h2>mv</h2>
	<p>Move a file from one place to another "mv OLD_FILE NEW_FILE", you can use this to rename a file by moving it from the current directory to the current directory.</p>

	<h2>scp</h2>
	<p>Allows you to move files from one machine to another.  You can even move it between two different machine, or the machine you are on and another machine.  
	The syntax is "user@host:FILEPATH" for a destination, the user@host can be left out if it is on your local machine.  So for example to move a file between 
	two different machines "scp jeff@www.westphalianarms.com:~/file1.txt josh@www.rezoundmusic.com:~/file2.txt" would work.  It might ask you for passwords, and if
	 you need to use an SSH key you can specify one with the -i flag just like in the SSH section.</p>

	<h2>rm</h2>
	<p>Remove a file, "rm FILENAME"</p>
    <p>flags : -r is a recursive remove and -f is a force remove (which does not prompt you if you want to remove a file or not due to it being protected 
    or whatever, it just removes it).  These combine to the all powerful rm -rf * which nukes everything recursively in the directory that you are in with 
    no prompts.</p>

	<h2>cd</h2>
	<p>Change current directory, this is vital as this is how you navigate around a machine.  "cd NextFolder".  You can go "up" a folder by using "..".  You 
	can go up multiple folders by "cd ../.." and you can go up a folder and then back down by "cd ../AnotherFolder".  You can go to your home directory by 
	"cd ~" and any path therein "cd ~/MyFolder".  Tab complete is great with this command.</p>

	<h2>pwd</h2>
	<p>Outputs your current directory, full path</p>

	<h2>tail</h2>
	<p>This gets the last lines of a text file and outputs it to the screen, easy to see the end of a file - especially log files. "tail FILENAME"</p>
    <p>flags : -n ### gives you the last ### of the file, otherwise the default is 10.  If you use the -f flag then it will stream the last 
    10 lines of the file (so if the file has something appending to it live then it will update the screen with these changes)</p>

	<h2>head</h2>
	<p>Just like tail, but gets the first lines of a text file, "head FILENAME"</p>
    <p>flags : -n ### same as tail</p>
    
    <h2>cat</h2>
    <p>This will output the entire file to screen, watch out you don't use it on a huge file!  "cat FILENAME"</p>

	<h2>kill</h2>
	<p>The most aptly named command, this kills a program given the proces ID (PID).  You can get the pid from the ps command discussed above.</p>
    <p>flags : -9 is the ultimate in kill technology, stops a process dead with no chance for elegant shutdown.</p>

	<h2>sudo</h2>
	<p>Superuser do, allows you to run a command with elevated permissions.  Basically every time a command says you aren't able to do it because of permissions 
	you can use sudo to override it.  Hence the joke <a href="http://xkcd.com/149/">sudo make me a sandwich</a>.  Be careful you don't sudo something you shouldn't.  
	The syntax is "sudo ANY-COMMAND", so you put anything you would type into the command line after the sudo.</p>

	<h2>su</h2>
	<p>This is the switch user command, so you can use it to switch what user you are logged in as (if you have access).  Such as "su josh" will switch me to be 
	josh's user, pending I have his password.  If you have root access (sudo) then you can use su without a username to go into root, every command the root 
	user executes is a sudo command so he can do anything.  This means if you become root you can su into any other user.  Doppleganger!  Use the "-" argument 
	to assume the bash profile and enviroment of that user as well (so if becoming root you should use "su -" or if you are becoming josh "su - josh", it is 
	optional with other users but you'll want to use the root enviroment if you are becoming root so it should almost always be "su -").</p>
	
	<h2>chmod</h2>
	<p>The modify permissions comand.  This is super important.  You can set 3 levels of permissions : read, write, execute.  You can have any of these (for example 
	it is possible to have write permission but not read).  There are seven combinations of permissions:</p>
	<p>7 = 4+2+1 (read/write/execute)</p>
	<p>6 = 4+2 (read/write)</p>
	<p>5 = 4+1 (read/execute)</p>
	<p>4 = 4 (read)</p>
	<p>3 = 2+1 (write/execute)</p>
	<p>2 = 2 (write)</p>
	<p>1 = 1 (execute)</p>
	<p>There are also three groups of people you can set permissions for.  The first is the owner of the file/folder, the second is the group that owns the file/folder, 
	and the third is for everyone.  So if you wanted the owner to have all access (7) the group to read and execute but not write (5) and everyone else read only (4) 
	you would do "chmod 754 MYFILE.txt".  chmoding a folder does not chmod the contents, you need to use a recursive chmod for that.  chmod 777 is convenient if 
	not secure.  Note that sudo or root can always change the permissions on something even if they are not the owner.</p>
	<p>Flags : the -R flag immediately following "chmod" will make the chmod recursive.</p>
	
	<h2>chown</h2>
	<p>The Change Ownership command.  This is a command where you can set the owner of the file or folder.  You can set both a user and a group (a group is...
	well.. a group of users!).  The command is "chown user_name:group_name FILE_OR_FOLDER".  To only set a user or a group then leave the other option blank.</p>
	<p>Flags : the -R flag immediately following "chown" will make the chown recursive.</p>

	<h2>wc</h2>
	<p>Used to count stuff, I think it stands for "word count".  "wc FLAGS FILE.txt"</p>
	<p>-l print the line count, -c print the byte count, -m print the character count, -L print the length of longest line, -w print the word count</p>
	
	<h2></h2>
	
     <h2>|</h2>
     <p>This is the pipe command allowing you to join (chain) other commands together, so the output for one becomes the input for another.  This opens the potential 
     for mortal-combat style chaining of moves together.  Lemme describe some SPECIAL COMBOS.</p>
      
     <h3>ps aux | grep PROCESS</h3>
     <p>This allows you to search for (say all mongo processes, by typing in mongo for PROCESS) that are running.  Note that this will return the grep command 
     as well as it will contain whatever word you have chosen for PROCESS.</p>
     <h3>ps aux | grep PROCESS | awk '{print $2}'</h3>
     <p>Pulls all the processes that match PROCESS and then prints only the 2nd column of the output (which happens to be the PID).  Useful for scripts, 
     note that the PID of the command you just ran will get picked up as well but that shouldn't matter as the ps aux .... command is done when it returns
      so the PID doesn't match to any process.</p>

     <p>Note that the same method above also works well for other things such as netstat to find out if a process has a lot of open sockets</p>
     
     <p>Here are some examples of things you can do with special combos.</p>

     <p>Count the number of sockets a program is using netstat,grep, and wc</p>
     <p>grep through for filenames of all files which have text that match the criterion</p>
     
     <h2>Other commands</h2>
     <p>Here are some other commands that you might want to look up : </p>
     <p>Unique</p>
     <p>Select</p>
     <p>Count</p>
     <p>Less</p>
     <p>More</p>
     <p>Adduser</p>
     <p>...lots more...</p>
   
      </div>

    </div> <!-- /container -->

  </body>
</html>
