<h1>Development Stack for web servers</h1>

The folder containing this readme can set up a development stack environment to develop web servers easily both to code and test.

<h2>Structure of the folder</h2>

In this folder you will find different files and folders : 
<ul>
<li><strong>apache/</strong> : contains the Dockerfile to setup the apache server .</li>
<li><strong>browser/</strong> : contains the Dockerfile to setup the browser, here we have a firefox.</li>
<li><strong>sublime</strong> : contains the Dockerfile to setup sublime and a html folder with a simple php site template. Everything in this folder will be copied in the sublime container (/home/).</li>
<li><strong>docker-compose.yml</strong> : file which allowed to setup the all environment specifying some configuration for each container.</li>
<li><strong>README.md</strong> : this file</li>
</ul>

<h2>How to use</h2>

In order to run the all environment, one thing to do : 
Go to this folder in your terminal and type : <code>docker-compose up -d</code>
You will see a firefox and sublime window pop-up.

Now you have all thing running, let's see how to reach our server.
Run <code>docker ps</code> to know the port where you server is. For example, if you have <strong>0.0.0.0:32836->80/tcp</strong> in the column port of your <strong>project_apache</strong>, your server is on the port 32836.
To know the ip address, just check the ip address of your host, with <code>ifconfig</code> or <code>ip a</code>.

Now, you just have to type IP:PORT on the search bar of your firefox container to reach your web server (which has to be on /var/www/html/ on your host).

To code, you can do everything in the sublime container. You have to save your file to the folder /home/code/ to be sure that everything will be accessible for apache.

To try the environment and the server, there are already a simple website called bds in your html folder (that you can copy to /var/www/html).

To stop the environment you can use : <code>docker-compose stop</code> or <code>docker-compose kill</code> to kill all the processes.
To start the environment after a stop, you can use: <code>docker-compose start</code>

<h2>Errors</h2>

If you have an error saying : <code>could not find an available, non-overlapping IPv4 address pool among the defaults to assign to the network</code>. Just stop your openvpn service if you have one running.

<h2>Author</h2>

Florian Pont : pontfloria@eisti.eu

Thanks to Juan Angel Lorenzo Del Castillo for his help.