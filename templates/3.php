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
  <link href="templates/3.css" rel="stylesheet" />
</head>


<body>
  <div class="container main-container">
    <div class="grid-container">

      <!--- Grid Title Section --->
      <div class="grid-box grid-title">
        <div class="grid-title-item" id="grid-title-item-0">
          <?php
            while($row = $nameResult->fetch_assoc()) {
              echo "<h1>".json_decode($row["infoValue"])->{'given'}." ".json_decode($row['infoValue'])->{'family'}."</h1>";
            }

            while($row = $titleResult->fetch_assoc()) {
              echo "<p>".json_decode($row["infoValue"])->{'title'}."</p>";
            }
          ?>
        </div>

        <div class="grid-title-item" id="grid-title-item-1">
          <?php
            while($row = $phoneResult->fetch_assoc()) {
              echo '<p><b>Phone:</b><a href=tel:"'.json_decode($row["infoValue"])->{'phone'}.'">240-867-5309</a><b>|</b>';
            }

            while($row = $emailResult->fetch_assoc()) {
              echo '<b>Email:</b><a href=mailto:"'
                .json_decode($row["infoValue"])->{'email'}.'">'
                .json_decode($row["infoValue"])->{'email'}.'</a><b>|</b></p>';
            }

            while($row = $addressResult->fetch_assoc()) {
              echo '<p>';
              echo '<b>Address:</b>'.json_decode($row["infoValue"])->{'address1'}.'<b>|</b>';
              echo '<b>Location:</b>'.json_decode($row["infoValue"])->{'address2'}.'<b>|</b>';
              echo '</p>';
            }

            while($row = $socialMediaResult->fetch_assoc()) {
              echo '<p>';
              if(strlen(json_decode($row["infoValue"])->{'facebook'})>0)
              {
                  mysqli_data_seek($socialMediaResult,0);
                  echo '<b>Facebook:</b><a href="">'.json_decode($row["infoValue"])->{'facebook'}.'</a><b>|</b>';
              }

              if(strlen(json_decode($row["infoValue"])->{'twitter'})>0)
              {
                  mysqli_data_seek($socialMediaResult,0);
                  echo '<b>Twitter:</b><a href="">'.json_decode($row["infoValue"])->{'twitter'}.'</a><b>|</b>';
              }

              if(strlen(json_decode($row["infoValue"])->{'youtube'})>0)
              {
                  mysqli_data_seek($socialMediaResult,0);
                  echo '<b>YouTube:</b><a href="">'.json_decode($row["infoValue"])->{'youtube'}.'</a><b>|</b>';
              }
              break;
              echo '</p>';
            }
          ?>
        </div>

        <div class="grid-box grid-sect-a grid-head">
          <div class="grid-head-inner">
            <h2>ABOUT ME</h2>
          </div>
        </div>
        <div class="grid-box grid-sect-a grid-head">
          <?php
            while($row = $aboutResult->fetch_assoc()) {
              echo '<h4 class="about">'.json_decode($row["infoValue"])->{'about'}.'</h4>';
            }
          ?>
        </div>

        <!--- Grid Content Area A --->
        <div class="grid-box grid-sect-a grid-head">
          <div class="grid-head-inner">
            <h2>EXPERIENCE</h2>
          </div>
        </div>
        <div class="grid-box grid-sect-a grid-item">
          <?php
            while($row = $jobsResult->fetch_assoc()) {
              echo '<h3>'.json_decode($row["infoValue"])->{'title'}.'</h3>';
              echo '<h4 style="font-weight: 600">'.json_decode($row["infoValue"])->{'company'}.'</h4>';
              echo '<p>'.json_decode($row["infoValue"])->{'start'}.' - '.json_decode($row["infoValue"])->{'end'}.'</p>';

              echo '<ul>';
              $duties = json_decode($row['infoValue'])->{'duties'};
              for($i=0; $i<count($duties); $i++) {
                echo '<li><h4>'.$duties[$i].'</h4></li>';  //TODO: check that this displays right
              }
              echo "</ul>";
            }
          ?>
        </div>

        <!--- Grid Content Area B --->
        <div class="grid-box grid-sect-b grid-head">
          <div class="grid-head-inner">
          <h2>EDUCATION</h2>
        </div>
        </div>
        <?php
          while($row = $educationResult->fetch_assoc()) {
            echo '<div class="grid-box grid-sect-b grid-item">';
            echo '<h3>'.json_decode($row['infoValue'])->{'degree'}.'</h3>';
            echo '<h4>'.json_decode($row['infoValue'])->{'institution'}.'</h4>';
            echo '<p>'.json_decode($row['infoValue'])->{'start'}.' - '.json_decode($row['infoValue'])->{'end'}.'</p>';
            echo '</div>';
          }
        ?>
      </div>

      <!--- Grid Content Area C --->
      <div class="grid-box grid-sect-c grid-head">
        <div class="grid-head-inner">
          <h2>CERTIFICATIONS</h2>
        </div>
      </div>
      <?php
        while($row = $certificationsResult->fetch_assoc()) {
          echo '<div class="grid-box grid-sect-c grid-item">';
          echo '<h3>'.json_decode($row['infoValue'])->{'certification'}.'</h3>';
          echo '<h4>'.json_decode($row['infoValue'])->{'organization'}.'</h4>';
          echo '<p>'.json_decode($row['infoValue'])->{'description'}.'</p>';
          echo '<p>'.json_decode($row['infoValue'])->{'start'}.' - '.json_decode($row['infoValue'])->{'end'}.'</p>';
          echo '</div>';
        }
      ?>

      <!--- Grid Content Area D --->
      <div class="grid-box grid-sect-c grid-head">
        <div class="grid-head-inner">
          <h2>SKILLS</h2>
        </div>
      </div>
      <div class="grid-box grid-sect-c grid-item">
        <div class="Progress">
          <?php
            while($row = $skillsResult->fetch_assoc()) {
              $json = json_decode($row['infoValue'], true);
              foreach($json as $key => $value) {
                echo '<span class="Progress-label" id="Progress-id">'.$key.': <strong>'.intval($value*20).'%</strong></span>';
                echo '<progress max="100" value="'.intval($value*20).'" class="Progress-main" aria-labelledby="Progress-id">';
                echo '<div class="Progress-bar" role="presentation">';
                echo '<span class="Progress-value" style="width: '.intval($value*20).'%;">&nbsp;</span>';
                echo '</div>';
                echo '</progress><br/>';
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>