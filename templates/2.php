<html>
<head>
    <link rel="stylesheet" href="templates/2.css" />
<body>
    <div id="header">
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

                ++$ctr;
            }
        ?>
    </div> <!-- /header -->
    <hr/><hr/>
    <div id='education'>
        <h1>Education</h1>
        <?php
            while ($row = $educationResult->fetch_assoc()) {
                echo "<div class='education'>"
                    ."<span class='institution'>".json_decode($row['infoValue'])->{'institution'}."</span>"
                    .json_decode($row['infoValue'])->{'start'}." - ".json_decode($row['infoValue'])->{'end'}."<br/>"
                    .json_decode($row['infoValue'])->{'degree'}." in ".json_decode($row['infoValue'])->{'subject'}."<br/>
                </div>";
            }
        ?>
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
</body>
</html>