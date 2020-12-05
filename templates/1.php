<html>
<head>
    <link rel="stylesheet" href="templates/1.css" />
<body>
    <div id="header">
        <h1>Personal Info</h1>
        <?php
            while ($row = $nameResult->fetch_assoc()) {
                echo "<div class='name'>"
                    .json_decode($row["infoValue"])->{'given'}." ".json_decode($row['infoValue'])->{'family'}
                    ."</div>";
            }
        
            echo "<div>";
            while ($row = $emailResult->fetch_assoc()) {
                echo "<span class='email'>".json_decode($row["infoValue"])->{'email'}."</span>";
            }

            echo " | ";

            while ($row = $phoneResult->fetch_assoc()) {
                echo "<span class='phone'>".json_decode($row["infoValue"])->{'phone'}."</span>";
            }
        
            echo "</div>";

            $ctr = 0;
            while ($row = $addressResult->fetch_assoc()) {
                echo "<div class='address'>";

                /*
                TODO: test this
                $keyArray = ['address1','address2','address3','address4','address5'];
                
                for($i=0; $i<count($keyArray; $i++) {
                {
                    //will this work? or do I have to check for existence?
                    if(strlen(json_decode($row["infoValue"])->{key})>0)
                    {
                        mysqli_data_seek($addressResult,$ctr);
                        echo json_decode($row["infoValue"])->{key};
                    }

                    if($i<=count($keyArray-2))
                    {
                        echo " | ";
                    }
                }
                */

                if(strlen(json_decode($row["infoValue"])->{'address1'})>0)
                {
                    mysqli_data_seek($addressResult,$ctr);
                    echo json_decode($row["infoValue"])->{'address1'}." | ";
                }

                if(strlen(json_decode($row["infoValue"])->{'address2'})>0)
                {
                    mysqli_data_seek($addressResult,$ctr);
                    echo json_decode($row["infoValue"])->{'address2'}." | ";
                }

                if(strlen(json_decode($row["infoValue"])->{'address3'})>0)
                {
                    mysqli_data_seek($addressResult,$ctr);
                    echo json_decode($row["infoValue"])->{'address3'}." | ";
                }

                if(strlen(json_decode($row["infoValue"])->{'address4'})>0)
                {
                    mysqli_data_seek($addressResult,$ctr);
                    echo json_decode($row["infoValue"])->{'address4'}." | ";
                }

                if(strlen(json_decode($row["infoValue"])->{'address5'})>0)
                {
                    mysqli_data_seek($addressResult,$ctr);
                    echo json_decode($row["infoValue"])->{'address5'};
                }

                echo "</div>";

                break; //required for some reason; will loop twice otherwise.
                //it always loops twice, regardless of the number of address keys present. 
                //if I leave $ctr++ out, it loops forever.
                //using ++$ctr instead makes no difference
            }
        ?>
    </div>
    <div id='about'>
        <h1>About Me</h1>
        <?php
            while ($row = $aboutResult->fetch_assoc()) {
                echo "<div class='about'>".json_decode($row['infoValue'])->{'about'}."</div>";
            }
        ?>
    </div>
    <div id='education'>
        <h1>Education</h1>
        <ul class="education">
            <?php
                while ($row = $educationResult->fetch_assoc()) {
                    echo "<li>"
                        ."<span style='display:inline-block; width:250px; font-weight:bold'>".json_decode($row['infoValue'])->{'institution'}."</span>"
                        .json_decode($row['infoValue'])->{'start'}." - ".json_decode($row['infoValue'])->{'end'}."<br/>"
                        .json_decode($row['infoValue'])->{'degree'}." in ".json_decode($row['infoValue'])->{'subject'}."<br/>
                    </li>";
                }
            ?>
        </ul>
    </div>
    
    <div id="jobs">
        <h1>Jobs</h1>
        <?php
            while ($row = $jobsResult->fetch_assoc()) {
                echo "<div class='jobs'>"
                    .json_decode($row['infoValue'])->{'title'}."<br/>"
                    .json_decode($row['infoValue'])->{'company'}."<br/>"
                    .json_decode($row['infoValue'])->{'start'}." - ".json_decode($row['infoValue'])->{'end'}."<br/>";

                    echo "<ul>";
                    $duties = json_decode($row['infoValue'])->{'duties'};
                    for($i=0; $i<count($duties); $i++)
                    {
                        echo "<li>".$duties[$i]."</li>";
                    }
                    echo "</ul>";
                echo "</div>";
            }
        ?>
    </div>

    <div id="certifications">
        <h1>Certifications</h1>
        <?php
            while ($row = $certificationsResult->fetch_assoc()) {
                echo "<div class='certification'>"
                .json_decode($row['infoValue'])->{'certification'}."<br/>"
                .json_decode($row['infoValue'])->{'start'}." - ".json_decode($row['infoValue'])->{'end'}."<br/>"
                .json_decode($row['infoValue'])->{'organization'}."</div>";
            }
        ?>
    </div>
    <div id="skills">
        <h1>Skills</h1>
        <?php
            while($row = $skillsResult->fetch_assoc()) {
                $json = json_decode($row['infoValue'], true);

                echo "<ul>";
                foreach($json as $key => $value) {
                    echo "<li>";
                    echo "<span style='display:inline-block; width:100px'>".$key."</span>: ";
                    echo "<span style='display:inline-block; background-color:#650095; height:10px; width:calc(50px * ".$value.")'></span>";
                    echo "<span style='display:inline-block; background-color:lightgrey; height:10px; width:calc(250px - (50px * ".$value.") )'></span>";
                }
                echo "</ul>";
            }
        ?>
    </div>
    <div id="smedia"><!-- using social_media as an ID triggers adblockers -->
        <h1>Social Media</h1>
        <div class="smedia">
            <?php
                while($row = $socialMediaResult->fetch_assoc()) {
                    if(strlen(json_decode($row["infoValue"])->{'facebook'})>0)
                    {
                        mysqli_data_seek($socialMediaResult,0);
                        echo "Facebook: ".json_decode($row["infoValue"])->{'facebook'}."<br/>";
                    }

                    if(strlen(json_decode($row["infoValue"])->{'twitter'})>0)
                    {
                        mysqli_data_seek($socialMediaResult,0);
                        echo "Twitter: @".json_decode($row["infoValue"])->{'twitter'}."<br/>";
                    }

                    if(strlen(json_decode($row["infoValue"])->{'youtube'})>0)
                    {
                        mysqli_data_seek($socialMediaResult,0);
                        echo "Youtube: ".json_decode($row["infoValue"])->{'youtube'}."<br/>";
                    }
                    break;
                }
            ?>
        </div>
    </div>
</body>
</html>