<?php include "header.php";?>


    <div class="container">

      <div class="jumbotron">
        <h1>Linux things to know</h1>
        <h3>I'm gonna talk about linux for a bit, this is also good for mac and any real terminal stuff - in no particular order.  All these commands are 
        for the terminal.  The terminal is that black screen with a prompt (like DOS) that you can enter text commands in.  This is the nitty gritty of 
        knowning how to use computers, knowing the terminal.  You can do everything from here and you should know how to if you are going to be in programming, 
        because graphical user interfaces (GUIs) are for BITCHES.</h3>
    
    <h2>Case sensitivity</h2>
    <p>Note that all commands are case sensitive!  Typing Cd will not work when you want to type cd</p>

    <h2>Key commands</h2>
    <p>In the shell there are special keystrokes that you can use that will do different things.  Let us go through some of them.</p>
    <p>ctrl-c : this will NOT copy something in the terminal, this will actually forcibly quit the program that you are currently running in that terminal.  Some programs 
    will not listen (for example you cannot quit out of vi by typing ctrl-c) but it is the equivalent of ctrl-alt-delete and force stopping a program in windows basically.</p>
    <p>ctrl-u: this clears the line of all text</p>
    <p>highlight : highlighting in the terminal will automatically copy it to the clipboard.  To paste you can just right click in the terminal and it will paste everything 
    into the terminal.  Be careful - if you have a endline (return) at the end of your command when you paste a command into the terminal it will immediately execute it.  
    It is often much safer to type the command yourself.</p>
        
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
	
	<h2>*</h2>
	<p>The asterisk is not really a command, but it is important as the wildcard.  So if you use "*.php" in a command it will act on every file that ends in php. </p>

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

 	<h2>screen</h2>
	<p>Screen is a program that opens a virtual terminal in the terminal.  If you are running a program that takes a very very long time you don't want to SSH into 
	a terminal because after a while the terminal will have a "broken pipe", this is means the connection has been broken somehow - mostly there was just some lag and 
        this dropped the connection.  Unless you run the process with nohup then you disconnect you will end the program you are running forcibly.  To prevent this you open 
	and 'attach' to a virtual terminal (called a screen session).  This way you can disconnect from the screen and the virtual terminal (and the processes it is running) 
	will continue to run.  Then when you log back onto the machine you can reattach the screen session and pick right back up in that terminal.  You should try it out.  To 
	create a screen session you do "screen -R NAME-OF-SESSION" and you will see a fresh terminal screen, you are now in a screen session.  Now do "ctrl-a" and then "d" for 
	detatch.  You are now back in the terminal you were in before.  To see what screen sessions are running do "screen --list" and it will list all screen sessions running 
	on the machine you are on.  Now to reattach a screen session type "screen -r NAME-OF-SESSION", remember things are case sensitive.  Sometimes it is easy to get confused 
	if you are in a screen session or not, so you should do the "screen --list" command and it will tell you if you are attached in a session or not.  That is basically it, if 
	you find yourself unsure if this is in screen or opening up screens inside of screens - enjoy the Inception.</p>

	<h2>nohup</h2>
	<p>Stands for no-hangup (yeah! Old school!).  This means the command you are running will not end if you are disconnected.  "nohup COMMAND".  You can use it to run programs 
	that are going to go for a while and you don't want it to crash when you disconnect, much like a more limited screen.  Screen is in general more reliable and more powerful 
	but nohup will work for your needs lots of the time.</p>

	<h2>&</h2>
	<p>Not actually a command itself but if you append it to the very end of a command it will not output to the screen but instead output to a background file and allow you to go on your merry 
	way.  Useful for chatty shit.  Great to combine with nohup.</p>

	<h2>whoami</h2>
	<p>Display what user you currently are.</p>

	<h2>hostname</h2>
	<p>Displays the name of the machine you are currently on.</p>

	<h2>date</h2>
	<p>Displays the current date in that machine's timezone.  There are a lot of flags and modifiers that modify the date (you can scroll back and forward through time) and will 
	specify the output format.  Look that up if you are in need.</p>

	<h2>du</h2>
	<p>Disk usage, it will tell you the disk usage for your computer and give you a breakdown.</p>
	<p>flags : -h to put the form in human readable format</p>

	<h2>mkdir</h2>
	<p>Make Directory.  Real simple, same as adding a folder "mkdir FOLDERNAME".</p>
	
	<h2>rmdir</h2>
	<p>Remove directory.  The directory has to be empty for rmdir to work, so if there is something in there you might want to use "rm -r" to get rid of it.  "rmdir FOLDERNAME"</p>
	
	<h2>exit</h2>
	<p>Exit will close your terminal session.  The behavior might not be what you expect.  If you are using a local terminal, it will close the window (or tab).  If you are 
	switched to another user with su it will exit back to your original user.  If you are in a screen session it will close (not detatch, close and destroy) that screen session.  		If you have SShed into a machine it will close the SSH and bring you to the computer you made the connection from (often you chain SSH commands and go from one machine 
	to another to another and this will back you out one machine.).</p>


	<h2>useradd</h2>
	<p>Adds a user to the machine.  "useradd NAME".</p>

	<h2>rsync</h2>

	<p>rsync allows you to copy over a lot of files at once. It is similar to scp in that way, but it's more powerful because it allows you to sync up systems recursively and without overwriting new files (with the write options!). So if you want to backup or just copy some files over from one system to another, you can rsync it, and watch the progress as well. And if it gets interrupted, unlike scp, which needs to recopy items it had already copied, rsync checks to see what is already in the area you are copying to, if it matches the ones it is copying over. If any are exactly the same, it skips those (as they are already copied) and continues basically where it left off.  You can always "man rsync" to get the options you want, but  some good options are "artuv".</p>

<p>a for archiving: It  is a quick way of saying you want recursion and want to preserve almost everything </p>

<p>v for verbose</p>

<p>r for recrusive (copying everything in directories, if you are copying directories)</p>

<p>t preserves the time of the file</p>

<p>u update: forces rsync to skip any files which exist on the destination and have a modified time that is newer than  the  source  file. - (so that you don't overwrite things!!!!)</p>

<p>Example usage: "rsync -artuv --progress USERNAME@HOST:FILEPATH . "<p>
<p>Then if you do "ls" in the current folder it will show all the files you just synched with.</p>

	<h2>passwd</h2>
	<p>Resets the password for a user, if they have no password set then  you can set it.  "passwd USERNAME".</p>

	<h2>less</h2>
	<p>Less is a program that lets you move backwards and forwards through a file or screen output (if you do ls in a huge directory it will scroll through the whole thing and 
	you'll have a pain in the ass to go through it, with less it will let you go through the output slowly). Just use "less FILENAME" and then you can scroll.  Use "q" to quit 
	the program.  You can use this to great effect with the pipe operator as discussed later.</p>

	<h2>more</h2>
	<p>Basically the same as less but shittier.  Hence the joke in linux "less is more".</p>
 
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
	
	<h2>find</h2>
	<p>This command finds files with the same filename, and other properties.  "find FILEPATH -name FILENAME" is the most basic example, but there are a lot more.  See 
	<a href="http://www.tecmint.com/35-practical-examples-of-linux-find-command/" target="blank">more here</a>.</p>
	
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
	
	<h3>ls -la | less<h3>
	<p>What this does is if you have a lot of files in your current directory it will list them all in full long form and then pipe the output to less so you can 
	scroll through the output.  Handy.</p>

     <p>Here are some more examples of things you can do with special combos.</p>

     <p>Count the number of sockets a program is using netstat,grep, and wc</p>
     <p>grep through for filenames of all files which have text that match the criterion</p>
     
      </div>

    </div> <!-- /container -->

  </body>
</html>
