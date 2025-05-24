      <?php      
            echo "<tr>";
            echo "<td>" . $row['EOInumber'] . "</td>";
            echo "<td>" . $row['reference_code'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['middle_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['skills1'] . "</td>";
            echo "<td>" . $row['skills2'] . "</td>";
            echo "<td>" . $row['skills3'] . "</td>";
            echo "<td>" . $row['email_address'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['suburb_town'] . "</td>";
            echo "<td>" . $row['postcode'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['willing_to_move'] . "</td>";
            echo "<td>" . $row['other_skills'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td><a href=\"manage.php?deleteId={$row['EOInumber']}\">Delete</a>";
            echo "</tr>";
        ?>