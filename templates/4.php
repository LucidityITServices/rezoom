<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://kit.fontawesome.com/dc459b05e7.js"></script>

  <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet'
    type='text/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="templates/4.css" rel="stylesheet" />
  <title>Jane Doe</title>

</head>

<body>
  <div class="wrapper">
    <div class="intro">
      <div class="profile">
      <!--
        <div class="photo">
          <img src="https://lh3.googleusercontent.com/proxy/k6R7PVSpqVZh21vezqmUY4erTnDohmU71ZxvGeRlJ8tpjgPf10xsGoniwAbDYZ2T3CItOG6ahCcw7P42_NEnOzm_33leF8PzSJhT680H5-0gi-pIrC8Xa0GA2dfH2EDUanlfHUEhesLpLP5fWQ">
        </div>-->
        <div class="bio">
          <?php
            while($row = $nameResult->fetch_assoc()) {
              echo '<h1 class="name">'.json_decode($row["infoValue"])->{'given'}." ".json_decode($row['infoValue'])->{'family'}.'</h1>';
            }

            while($row = $titleResult->fetch_assoc()) {
              echo '<p class="profession">'.json_decode($row["infoValue"])->{'title'}.'</p>';
            }
          ?>
        </div>
      </div>
      <div class="intro-section about">
        <h1 class="title">about me</h1>
        <p class="paragraph">
          <?php
            while($row = $aboutResult->fetch_assoc()) {
              echo json_decode($row["infoValue"])->{'about'};
            }
          ?>
        </p>
      </div>
      <div class="intro-section contact">
        <h1 class="title">Contact</h1>
        <div class="info-section">
          <i class="fas fa-phone"></i>
          <?php
            while($row = $phoneResult->fetch_assoc()) {
              echo '<span>'.json_decode($row["infoValue"])->{'phone'}.'</span>';
            }
          ?>
        </div>
        <div class="info-section">
          <i class="fas fa-map-marker-alt"></i>
          <?php
            while($row = $addressResult->fetch_assoc()) {
              echo '<span>'.json_decode($row["infoValue"])->{'address2'}.'</span>';
            }
          ?>
        </div>
        <div class="info-section">
          <i class="fas fa-paper-plane"></i>
          <?php
            while($row = $emailResult->fetch_assoc()) {
              echo '<span>'.json_decode($row["infoValue"])->{'email'}.'</span>';
            }
          ?>
        </div>
      </div>
      <div class="intro-section follow">
        <h1 class="title">Follow</h1>
        <?php
          while($row = $socialMediaResult->fetch_assoc()) {
            if(strlen(json_decode($row["infoValue"])->{'facebook'})>0)
            {
              mysqli_data_seek($socialMediaResult,0);
              echo '<div class="info-section link">';
              echo '<i class="fab fa-facebook"></i>';
              echo '<a target="_blank" rel="author" href="https://www.facebook/com/profile.php?id='.json_decode($row["infoValue"])->{'facebook'}.'">';
              echo '<span>'.json_decode($row["infoValue"])->{'facebook'}.'</span>';
              echo '</a>';
              echo '</div>';
            }

            if(strlen(json_decode($row["infoValue"])->{'twitter'})>0)
            {
              mysqli_data_seek($socialMediaResult,0);
              echo '<div class="info-section link">';
              echo '<i class="fab fa-twitter"></i>';
              echo '<a target="_blank" rel="author" href="https://www.twitter.com/'.json_decode($row["infoValue"])->{'twitter'}.'">';
              echo '<span>@'.json_decode($row["infoValue"])->{'twitter'}.'</span>';
              echo '</a>';
              echo '</div>';
            }

            if(strlen(json_decode($row["infoValue"])->{'reddit'})>0)
            {
                mysqli_data_seek($socialMediaResult,0);
                echo '<div class="info-section link">';
                echo '<i class="fab fa-reddit"></i>';
                echo '<a target="_blank" rel="author" href="https://www.reddit.com/u/'.json_decode($row["infoValue"])->{'reddit'}.'">';
                echo '<span>'.json_decode($row["infoValue"])->{'reddit'}.'</span>';
                echo '</a>';
                echo '</div>';
            }
            break;
          }
        ?>
      </div>
    </div>
    <div class="detail">
      <div class="detail-section edu">
        <div class="detail-title">
          <div class="title-icon">
            <i class="fa fa-building-o"></i>
          </div>
          <span>Experience</span>
        </div>
        <div class="detail-content">
          <?php
            while ($row = $jobsResult->fetch_assoc()) {
              echo "<div class='timeline-block'>";
              echo '<h1>'.json_decode($row['infoValue'])->{'title'}.'</h1>';
              echo '<p>'.json_decode($row['infoValue'])->{'company'}.'</p>';
              echo '<time>'.json_decode($row['infoValue'])->{'start'}.' - '.json_decode($row['infoValue'])->{'end'}.'</time>';
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
        <div class="detail-section edu">
          <div class="detail-title">
            <div class="title-icon">
              <i class="fas fa-user-graduate"></i>
            </div>
            <span>Education</span>
          </div>
          <div class="detail-content">
            <?php
              while ($row = $educationResult->fetch_assoc()) {
                echo '<div class="timeline-block">';
                echo '<h1>'.json_decode($row['infoValue'])->{'degree'}.' in '.json_decode($row['infoValue'])->{'subject'}.'</h1>';
                echo '<p>'.json_decode($row['infoValue'])->{'institution'}.'</p>';
                echo '<time>'.json_decode($row['infoValue'])->{'start'}.' - '.json_decode($row['infoValue'])->{'end'}.'</time>';
                echo '</div>';
              }
            ?>
          </div>
        </div>
      </div>
      <div class="detail-section tool-skill">
        <div class="detail-title">
          <div class="title-icon">
            <i class="fas fa-tools"></i>
          </div>
          <span>Development Tools</span>
        </div>
        <div class="detail-content">
          <ul class="tool-list">
            <?php
              while($row = $skillsResult->fetch_assoc()) {
                $json = json_decode($row['infoValue'], true);
                foreach($json as $key => $value) {
                  echo "<li>";
                  echo '<svg viewbox="0 0 100 100">';
                  echo '<circle cx="50" cy="50" r="45"></circle>';
                  echo '<circle class="cbar" cx="50" cy="50" r="45" style="--percent:'.($value/5).'"></circle>';
                  echo '</svg>';

                  echo '<span class="tl-name">'.$key.'</span>';
                  echo '<span clas="tl-exp">'.($value*20).'%</span>';
                  echo '</li>';
                }
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>
</html>