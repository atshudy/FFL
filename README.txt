INSTALL INSTRUCTIONS
	1] Extract the contents of the zip file into the web sites default folder.
	2] By default the web server uses localhost as the server name. Edit the following files to point to a different server.
		.\FFL\application\config\database.php
			Change the database [hostname], [username] and [password]
		.\FFL\application\config\config.php
			Change the database [base_url]
	3] Run the following SQL file to create the FFL database
		.\database scripts\create_ffl_tables.sql