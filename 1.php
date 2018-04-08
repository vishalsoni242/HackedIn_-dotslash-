<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db     = 'healthify';
$link  = mysqli_connect($dbhost,$dbuser,'',$db);
session_start();
$email = $_SESSION['login_user'];
$sql = mysqli_query($link,"SELECT * FROM patients WHERE email='$email'");
$res = mysqli_fetch_array($sql,MYSQLI_ASSOC);
if(!empty($sql) && (mysqli_num_rows($sql))) {
  $name = $res['Name'];
  $dob = $res['DOB'];
  $email = $res['email'];
  $gender = $res['Gender'];
  $bg = $res['Blood_Group'];
  $contact = $res['Contact'];
  /*echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">";
  echo "<link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" integrity=\"sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN\" crossorigin=\"anonymous\">";

  echo "<link href=\"https://fonts.googleapis.com/css?family=Roboto\" rel=\"stylesheet\">";

  echo "<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">";

  echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css\">";

  echo "<div class=\"center\">";
    echo "<div class=\"left\">";
      echo "<div class=\"logo\">";
        echo "<svg viewbox=\"0 0 200 400\" width=\"100\" height=\"100\">";
          echo "<path d=\" M 174.627 77.683 C 173.776 78.815 142.411 133.739 129.968 166.414 C 129.34 168.064 128.78 169.45 128.204 171.119 C 127.727 172.503 127.488 173.714 126.933 175.086 C 126.212 176.871 126.006 177.829 125.667 179.358 C 125.301 181.008 124.477 184.693 124.121 187.63 C 123.856 189.808 123.741 191.662 123.663 193.853 C 123.462 199.472 123.876 204.233 124.636 209.8 C 127.42 230.202 135.691 246.266 147.665 262.895 C 148.73 264.375 149.618 265.639 150.777 267.047 C 152.739 269.432 154.445 271.444 156.857 273.381 C 159.729 275.688 162.496 277.205 165.903 278.596 C 168.996 279.859 171.753 280.586 175.056 281.078 C 178.597 281.605 181.659 281.725 185.216 281.306 C 188.955 280.865 192.024 279.892 195.522 278.517 C 197.728 277.65 199.557 276.802 201.61 275.62 C 204.662 273.863 225.417 262.219 236.258 252.224 C 239.451 249.28 244.212 243.928 244.962 243.452 C 245.712 242.977 264.83 213.834 259.473 198.687 Q 256.513 190.317 211.583 109.026 Q 196.037 82.262 193.522 78.637 C 191.452 75.653 188.937 70.289 183.683 70.278 C 178.429 70.267 175.231 76.89 175.106 76.877 M 236.638 249.594\" fill-rule=\"evenodd\" fill=\"rgb(219,223,255)\"></path>";
          echo "<lineargradient id=\"_lgradient_0\" x1=\"93.56120204019503%\" y1=\"13.017241572786997%\" x2=\"89.84577303569424%\" y2=\"99.2065293458878%\">";
            echo "<stop offset=\"21%\" stop-opacity=\"1\" style=\"stop-color:rgb(185,193,255);\"></stop>";
            echo "<stop offset=\"100%\" stop-opacity=\"1\" style=\"stop-color:rgb(133,158,255);\"></stop>";
            echo "<stop offset=\"100%\" stop-opacity=\"1\" style=\"stop-color:rgb(185,193,255);\"></stop>";
          echo "</lineargradient>";
          echo "<path d=\" M 257.964 96.772 C 256.66 97.325 201.992 129.135 174.849 151.174 C 173.478 152.287 172.299 153.205 170.965 154.361 C 169.858 155.319 169.044 156.248 167.877 157.157 C 166.358 158.34 165.7 159.066 164.64 160.219 C 163.496 161.464 160.937 164.24 159.156 166.603 C 157.836 168.354 156.807 169.901 155.641 171.758 C 152.652 176.52 150.624 180.847 148.491 186.045 C 140.676 205.095 139.782 223.141 141.81 243.533 C 141.99 245.347 142.125 246.886 142.422 248.685 C 142.924 251.732 143.393 254.328 144.509 257.213 C 145.838 260.649 147.472 263.349 149.723 266.26 C 151.767 268.902 153.788 270.914 156.4 272.995 C 159.2 275.226 161.798 276.845 165.078 278.284 C 170.601 280.707 175.792 281.319 181.797 281.467 C 194.524 281.78 204.4 276.078 215.486 270.231 C 227.384 263.956 237.187 257.466 245.557 246.856 C 251.368 239.49 255.506 232.649 258.295 223.53 Q 265.443 200.163 271.169 142.865 Q 274.197 111.464 273.837 107.067 C 273.54 103.447 274.053 97.545 269.512 94.902 C 264.971 92.26 258.884 96.388 258.782 96.315 M 211.637 266.477\" fill-rule=\"evenodd\" fill=\"url(#_lgradient_0)\"></path>";
        echo "</svg>";
      echo "</div>";


  echo "<link rel=\"stylesheet\" href=\"css/style.css\">";
  echo "<div class=\"right\">";
  echo "<div class=\"title\" style = \"text-align:center\">Profile</div>";
  echo "<div class=\"description\" style = \"text-align:center\">Your Health Details</div><hr><br /><br />";
  //echo "<tr><td>Name: </td><td>$name</td></tr><br /><br />";*/

  echo "<hr>";
  echo "<div align=\"center\"> <h2> Patient Details: </h2></div>";
  echo "<hr>";
  echo "<lable type=\"text\" id=\"pname\" class=\"input-box\">Name : </lable> $name <br /><br />";
  //echo "<h3> Name : </h3> $name<br /> <br />";
  echo "<tr><td>Email: </td><td>$email</td></tr><br /><br />";
	echo "<tr><td>Date of Birth: </td><td>$dob</td></tr><br /><br />";
  echo "<tr><td>Gender: </td><td>$gender</td></tr><br /><br />";
  echo "<tr><td>Blood_Group: </td><td>$bg</td></tr><br /><br />";
  echo "<tr><td>Contact: </td><td>$contact</td></tr><br /><br />";
  }

  $sql = mysqli_query($link,"SELECT * FROM patient_data WHERE email_p='$email'");
  //$res = mysqli_fetch_array($sql,MYSQLI_ASSOC);
  $cnt = 0;
  while($row = mysqli_fetch_row($sql)) {
    //$name = $row['Name'];
    //$dob = $row['DOB'];
    //echo "<tr><td>Hello:::</td></tr>";
    $cnt++;
    echo "<hr>";
    echo "<div align=\"center\"> <h2> Previous Disease Details $cnt</h2></div>";
    echo "<hr>";
    $email1 = $row[0];
    $date = $row[2];
    $disease = $row[3];
    $medicines = $row[4];
    $diagnosis = $row[5];
    $sql1 = mysqli_query($link,"SELECT * FROM doctor WHERE email='$email1'");
    $res1 = mysqli_fetch_array($sql1,MYSQLI_ASSOC);
    $name = $res1['name'];
    $hos = $res1['hospital'];
    $specialization = $res1['specialization'];
    echo "<tr><td>Name: </td><td>$name</td></tr><br /><br />";
    echo "<tr><td>Email: </td><td>$email1</td></tr><br /><br />";
    echo "<tr><td>Hospital: </td><td>$hos</td></tr><br /><br />";
    echo "<tr><td>Specialization: </td><td>$specialization</td></tr><br /><br />";
    echo "<tr><td>Date: </td><td>$date</td></tr><br /><br />";
    echo "<tr><td>Disease: </td><td>$disease</td></tr><br /><br />";
    echo "<tr><td>Diagnosis: </td><td>$diagnosis</td></tr><br /><br />";
    echo "<tr><td>Medicines: </td><td>$medicines</td></tr><br /><br />";
    echo "<hr>";
  }
?>
<style>
#p {
   text-align: center;
}
</style>
