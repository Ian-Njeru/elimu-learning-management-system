    <div id="header">
      LMS
	  <p><?php
	  echo 'You are signed in as '.$_SESSION['firstName']. ' '.$_SESSION['middleName'].' '.$_SESSION['lastName'];?></p>
      <ul>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>

    <div id="sideNavWrap">
      <ul>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="#">Notifications</a></li>
        <li>Units
          <ul>
            <li><a href="registerClass.php">Register Classes</a></li>
            <li><a href="submissions.php">Submitted Assignments</a></li>
            <li><a href="myClasses.php">My Classes</a></li>
          </ul>
        </li>
        <li><a href="#">Calendar</a></li>
        <li><a href="#">Chatrooms</a></li>
      </ul>
    </div>