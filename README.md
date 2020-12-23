# Introduction

The docker will instantiate 3 containers-
1. Apache Web Server running php files
2. MySQL Database [backend]
3. Adminer [frontend for MySQL Database]
4. DNS Name Server

# How to start the docker

1. Make sure you are in the project root directory "enpm631_project_salvi"

2. Run the following command to start the docker process 
	docker-compose up -d

# Web Application

1. The Web application is running on localhost:80 and the Adminer (MySQL DB Frontend) is hosted on localhost:8080
2. There is a signup and a login page.
3. Make sure you signup so that the user is added in the database.
4. Then you can login successfully with the user.
5. Once logged in, you will be greeted with a "Welcome <user>" message.

# DNS Name Server

1. Run the following command to shut down systemd-resolved:
	systemctl disable systemd-resolved
	systemctl stop systemd-resolved

2. Compose the docker file by runnning following command:
	```docker-compose up -d```

3. Note the IMAGE_ID of the dns container by running the following command:
	docker ps

4. Check the IP Address for the dns container by running the following command:
	docker inspect <IMAGE_ID>

5. I have setup two domains for name resolution
	enpm.fake-umd.edu <----> 172.20.0.3 
	ents.fake-umd.edu <----> 172.20.0.4

6. Run the following command to resolve the domains:
	nslookup enpm.fake-umd.edu <ip-addr-of-dns-container>
	nslookup ents.fake-umd.edu <ip-addr-of-dns-container>
