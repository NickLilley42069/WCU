Hey all, here is the proper assignment for code development. Sorry it took til now, there were a lot of kinks to work out. The 7-3 split is going to work like this:





RMS:



# 1. Me (Adam) - MySQL Server Database

* I am going to create a database backend for this project that we'll plug the system into before the live demo. I'm going to build all of the DB laid out in section 4.4 and copy across all the data I can from the client supplied documentation





# 2. Benny - Login functionality with the frontend



* We already have a layout for the login system. What I need you to do is create the functions that will allow a user to both register and login an account; registration should only be a perk available to those with administrator access through a staff account. A student account should only have access to the login. 



* I cannot stress this enough; you must interact with Jonathan to get the class object's for the student and staff, as we will be taking the login as these object types, and an additional string parameter of the password. Until the database functionality is in, you must create an array comprised of a student/staff object and hashed password string to use. Please also look at the class tables in section 4.2.4, as I believe they will help you. 





# 3. Chidera - Staff chat page



* The staff chat system is going to work by taking records from the chatlog table in the database. What I need you to do is make the contents of the frontend for this page, using the chatlog object type as the information centre to create a widget on screen. These objects should be sequential based on the timing of the chatlog objects. You'll need to make some instances of the chatlog object for testing purposes; when db functionality is connected, I'll be able to swap them out. 





# 4. Fuad - Enrolment, Grading



* I need you to sort the enrolment process from the admin's POV as well as grade approval; you'll need to use the student class type and approve it by creating a record status object, if the application is accepted. Both of these object templates are in 4.2.4, and you'll need to speak to Jonathan about getting those class templates created. For grading, you'll need to check an object of type student\_assignment against an assignment object.
* This form will also need the upload of a docx file that I'll be saving as a blob; that docx file will be the offer letter of the student; you just need a means of storing it as a variable.





# 5. Divine 

\- The controller and database object type,  (bring across from PHP module, modify to fit)



* What I need from you are the frontend functions that will request data from and send data to the database. You should be able to bring across the database object type from the PHP module. This will be serving as a general purpose database access function for accessing all the tables. I also need you to carry across the function to create and connect to the database from the PHP module; I should be able to pass in the same parameters as before and have the website connect.



* You'll need you to carry across the loadTemplate function so the controller can render the pages, as well as copying across and modifying the controller object to match up with the classes Jonathan is making.
* Everyone will be in contact with you at some point to work on the controller to render their page, so I need you to work with them in loading the templates and page content in the correct order. In essence, for this part, I need you to make sure that when features are done and branches are being merged with the controller, that other people are aware and code is not being overwritten.
* For table names; use 2.2.1.2 and all of section 4.4 as a guideline. It's really important they match Jonathan's classes so keep in close contact with him.





# 6. Jonathan - Making each table class from 4.2.4 a class type



* What I need from you is not highly difficult but also really important and fairly lengthly, as the rest of the frontend development is going to pull from these classes. If you remember how we did the PHP module, making each class object of each record type, that is what I need you to do for all the tables in section 4.2.4. You'll need to pick appropriate datatypes that match (so for example, varchar is a string). 
* Everyone will contact you to make sure their classes are correct; triple check if you have to against 4.4.2 that attribute types are appropriately matched.





# 7. Teodor - PAT Record process (admin side only):



* Communicate with Fuad on this one as your interfaces will use the same wireframe/skeleton, but I'll need you to instead of approving the student object with a matching record status object, you'll need to approve a personal\_tutorial object, instead marking the attribute complete\_bool as true. This form will also need the upload of a docx file that I'll be saving as a blob. Keep in close contact with Fuad for development of this; it's going to make things easier on you and him. 



Everyone who needs a class object, please contact Jonathan and help out if you can; you both need to know how it works so you can then use the object for rendering widgets in the interface.





Commercial:



# 1. Marcus - Home / About Us Page and getting the controller setup for the commercial site.



* Your work, while still important, is going to rely on the work of the RMS team. I've decided to give you the home page to work on. I believe there's a design for it in the mockups already; the main things that may be additions is a way to get into course searching, whether that be a search bar in the navbar at the top or a dedicated search bar underneath the university about us information. Make something up for that info for now, as we don't have that info from WUC yet.
* The controller setup will be identical to the RMS, however you'll only be accessing the course, course-module and module tables. Keep in close contact with Divine, as the closer it can match, the better. You'll also need to copy over the same functions like loadTemplate. Contact Jonathan about the class objects, and if you can, help him develop those. 





# 2. Nick - Course Search Page



* I'm fairly sure we had a mockup for this, but if for whatever reason we didn't, please could you use the course browsing mockup I did for mobile and expand it to fit the sizing of a web browser. Like Marcus, you'll need the course, course-module, and module object types. Speak to Jonathan about this, and help him out with it if there's not someone already. We basically need viewers of the commercial site to see what's on offer without them seeing assignments. 









# 3. Reece - FAQs / Ticket Page



* The ticketing system and FAQs will be how students reaching out to the uni get their help. If you could make it so submission creates an object of the ticket type, that'd be good. 



Everyone, at some point, will be working on a controller. Your page is contained within a function, that will load the template for your page and work out the logic. Therefore, your working areas are within those functions, appropriately named to match the webpage, and on the template of the page that you are working on. The mockups are the base template that you will need to copy over and modify so that you can load the contents into that template. 



Marcus is going to act as an impromptu controller manager for the commercial controller, making sure code is not overwritten. Divine will be doing the same for the RMS. 



This whole process is only going to work if everyone does their part. You must communicate via a channel or the main chat; that's happened a total of about twice so far, which has kept things from other group members. The only way this works is if all group members know what everyone else is doing at all times; communication is mandatory, and at the risk of sounding blunt, we'll fail if that doesn't happen. Please have a read, even if it's a glance over, at what other people are doing so that you can work together effectively.



I'm going to be available for the rest of today to answer questions about what you need to do; please ask them IN THE MAIN CHAT so everyone can see. I won't be able to contact over the weekend, which is why it's so important you understand today. I'm going to tweak the worklog to match this briefing.







