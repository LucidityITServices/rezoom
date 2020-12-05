<?php
    session_start();
?>
<html>
<meta charset="UTF-8">
<head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js"></script>
    <script src="js/slick/slick.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="js/slick/slick.css">
    <link rel="stylesheet" href="js/slick/slick-theme.css">

    <script>
        $(document).ready(function() {
            $('.slick').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                dots:true,
                arrows:true,
                centerMode:true,
            });
        });
    </script>

    <style>
        body { padding: 0 10px; }
        header { display:block; height:75px; }
        nav a { display:inline-block; text-align:center; color:red; float:right; }
        nav a:hover { text-decoration:none; color:darkred; }
        nav a span { display:block; }
        .slick { margin: 0 50px; }
        .slick-prev:before, .slick-next:before { color:red; }
    </style>
</head>
<body>
    <?php include header.php ?>
    <hr/>
    <section id="about">
        <h1>What's this all about?</h1>
        <p>Most job hunting advice suggests formatting your resume according to the type of position that you're applying to.
        Having multiple versions of your resume for different types of jobs is a pain.</p>
        <p>Rezoom eliminates that, quickly and easily, by storing all the information you'd want to have on your resume, and 
        letting you swap formatting templates on the fly.</p>
        <a href="builder.php">Get started</a>
    </section>
    <section id="previews">
        <h1>Previews</h1>
        <div class="slick">
            <img src="ph.gif">
            <img src="ph.gif">
            <img src="ph.gif">
            <img src="ph.gif">
            <img src="ph.gif">
            <img src="ph.gif">
            <img src="ph.gif">
            <img src="ph.gif">
            <img src="ph.gif">
        </div>
    </section>
    <footer style="display:block">Built and managed by <a href="dcwebdev.net">dcwebdev.net</a></footer>
</body>