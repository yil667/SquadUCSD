<html>
<h1>SUCS D</h1>

<p>
This web app allows students to form study groups for the classes they are enrolled in. Groups are formed based on schedule compatibility and individual personalities and preferences. Groups can set a maximum size to allow however many people in. This can be changed any time.
</p>

<h1>Add new issues here as well as the issues tab in github</h1>
<h1>As issues are resolved, close issues on issue tab in github and delete entry here</h1>

<h2>Non-Coding related todo list: </h2>
<ol>
   <li>Rewrite blurb on <a href="http://www.squaducsd.com/pages/">welcome</a> page</li>
   <li>Write some shit for the contact page and give it to some coder to implement</li>
   <li>Go over Use Cases, User Stories, System Requirements and Design Use cases and update to be consistent with final product</li>
   <li>Use Site as reference while doing this. Change Use Cases that do not exactly match up with what appears on the site</li>
   <li>Start testing the site and writing Test Cases based on Revised Use Cases -> ALTER USE CASES FIRST</li>
</ol>

<h2>General todo list: </h2>
Feature Suggestion: Search for individual users/groups by name, add a search bar on top, and go to profile using autocomplete or new page

<h2>Front-end todo list: </h2>
<ol>
   <li>(low priority) in edit profile make the input fields stand out from the hyperlinks(user profile) //don't understand, clarify pls</li> 
   <li>add classes duplicate checks</li>
   <li>add character checking/autocomplete functionality in invite to form new group name/size</li>
   <li>display warning if the group if full already when inviting (backend will resize the group)</li>
</ol>

<h2>Front-end recently finished: </h2>
<ol>
   <li><strike>dynamically display groups in viewprofile page</strike></li>
   <li><strike>member list label hover color darker</strike></li>
   <li><strike>invite to form new group needs group name / group size</strike></li>
   <li><strike>display classes in view user profile</strike></li>
   <li><strike>in edit profile, make sure the group name, class, size cannot be empty</strike></li>
   <li><strike>panels in view/edit user profile and view/edit group profile are different sized. need uniform consistency</strike></li>
   <li><strike>display groups in view user profile</strike></li>
   <li><strike>auto complete for classes in edit profile page</strike></li>
   <li><strike>add a message popup box for request to join group button in view group profile</strike></li> 
   <li><strike>view non-existent page gets rediected to error page</strike></li>
   <li><strike>fix buttons spacing on view profile(match edit group)</strike></li>
   <li><strike>in edit profile page add 2 more buttons, view profile and leave group</strike></li>
   <li><strike>view profile page updated</strike></li>
   <li><strike>connect the writable text fields correctly (correctly not displaying some shits - from Dom)</strike></li>
   <li><strike>dynamically display button in view profile page</strike></li>
   <li><strike>dynamically display groups in edit profile page</strike></li>
   <li><strike>dynamically display groups in manage group page</strike></li>
   <li><strike>maybe don't display the button's in profile page if user not logged in
      and don't display buttons on the user's own profile page</strike></li>
   <li><strike>add password checking for special characters</strike></li>
   <li><strike>handle forgot password redirection checks in resetpassword.php.
       Read the comments in the php script in the beginning of that file.</strike></li>
   <li><strike>in user profile when you are on your own profile make button for edit profile</strike></li>
   <li><strike>check flags for editprofile(fail, success and saved)</strike></li>
</ol>
   
<h2>Back-end todo list:</h2>
<ol>
<li>autocomplete tries to run on viewprofile page for classes when they are static fields</li>
   <li>check if already in group in viewprofile page, cannot invite to a group user is already a part of</li>
   <li><b>implement backend logic for inviting to existing group</b></li>
   <li>implement backend logic for resizing group request when inviting</li>

</ol>

<h2>Back-end recently finished: </h2>
<ol>
   <li><strike><b>implement backend logic for view group request to join form</b></strike></li>
   <li><strike>update accept.php when front end error page is done </strike></li>
   <li><strike>implement backend logic for edit group submit form</strike></li>
   <li><strike>implement backend logic for leave group</strike></li>
   <li><strike>managegroups is sometimes broken..? fix that shit </strike></li>
   <li><strike>forgot password logic</strike></li>
   <li><strike>add safety page redirection</strike></li>
</ol>




</html>
