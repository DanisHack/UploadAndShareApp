UploadAndShareApp
=================

UploadAndShareApp is a a hobby project to securely upload document in PHP. Using this technique will let you secure your documents online. Use this feature on you website to upload your content securely. 

Prerequisite:
=================

-> PHP5(WAMP Or XAMPP)
-> SWFTOOLS(included in zip)---Download and install it manually on windows(in C:/) 
   or download appropriate for linux distro from:
   http://www.swftools.org/download.html and install.

   SWFTools is used to convert a pdf into .swf format. because we'r using
   a flash document viewer(flexpaper).
   
   Flexpaper is a web based document viewer(http://flexpaper.devaldi.com/).

How to Run:(only for PDF)
============================
->First, you need to ensure PHP is configured to allow uploads. 
   Check your php.ini file and verify the file_uploads directive is set On.
              file_uploads = On
->unzip the UploadAndShareApp.zip at appropriate location in your webserver(in www folder inWAMP or in htdocs folder inXAMPP ).
->Run localhost/UploadAndShareApp/index.html.


How It Works:
=================
-> You upload a pdf document.
-> format of document and other security related issues are checked at backend.
-> Pdf is converted into .swf format.
-> using flexpaper document viewer .swf is displayed in doc viewer.

Technicalities To Know
=========================
->In php, information about file uploaded is made available in multidimensional array $_FILES.
     $_FILES["uploadFile"]["name"] stores the original filename from the client
     $_FILES["uploadFile"]["type"] stores the file’s mime-type
     $_FILES["uplaodFile"]["size"] stores the file’s size (in bytes)
     $_FILES["uploadFile"]["tmp_name"] stores the name of the temporary file
     $_FILES["uploadFile"]["error"] stores any error code resulting from the transfer     

-> $command="C:\SWFTools\pdf2swf.exe ".$file_name." -o C:\wamp\www\UploadAndShareApp\Paper.swf -f -T 9 -t -s storeallcharacters";
   exec($command);
   
  this is to convert .pdf to .swf using SWFTools.

->chmod(DIR_TO_UPLOAD . $file_name, 0644); //to set read, write privileges.


