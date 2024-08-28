<!DOCTYPE html>
<html lang="en">
<head>

     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/landing.css">
    <style>
        /* Modal container */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4); /* Black background with opacity */
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* Center modal on screen */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Set the width of the modal */
            max-width: 400px; /* Maximum width */
            border-radius: 5px;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form label */
        label {
            font-weight: bold;
        }

        /* Input fields */
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Save button */
        .profilebutton {
            background-color: #888;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            width: 200px;
        }

        .profilebutton:hover {
            background-color: darkgray;
        }

        .tipro {
            text-align: center;
        }

    </style>
</head>
<body>
    <header>
        <div class="nav">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </div>
    </header>

    <section class="banner-area" id="home">
        <div class="banner-img"><img src="assets/img/bgbg2.png" alt=""></div>
    </section>

    <section class="about-area" id="about">
        <h3 class="section-title"> About <span>Us</span></h3>
        <ul class="about-content">
            <li class="about-left"></li>
            <li class="about-right">
                <h2>Iglesia Evangélica Metodista en las Islas Filipinas</h2>
                <p>The Evangelical Methodist Church in the Philippine Islands (Iglesia Evangelica Metodista en las Islas Filipinas) is a Methodist Christian denomination. It was founded on 28 February 1909 by Bishop Nicolás Zamora, making it the first indigenous Evangelical Protestant denomination in the Philippines.</p>
                <p>Bishop Noel M. Abiog leads IEMELIF.</p>
                <p>The Church actively participates in civic affairs, including disaster relief and civic awareness.</p>
                <p>IEMELIF's original cathedral built in 1928, rebuilt after fire in 1941, completed in 1959.</p>
            </li>
        </ul>
        <button class="about-button"><a href="aboutlanding.php">See more</a></button>
    </section>

    <section class="msg-area">
        <div class="msg-content">
            <h2>Motivation Quote</h2>
            <p>Let your life reflect the faith you have in God. Fear nothing and pray about everything. Be strong, trust God's word, and trust the process. The only way you're going to reach places you've never gone is if you trust God's direction to do things you've never done.</p>
        </div>
    </section>

    <section class="services-area" id="services">
        <h3 class="section-title">Our <span>Services</span></h3>
        <ul class="services-content">
            <li>
                <img src="img/mm.jpg" alt="wedding pic" class="img-service" style="height: 300px; width:300px;">
                <h4>Wedding Appointment</h4>
                <p>A marriage appointment is a scheduled meeting where a couple formalizes their union through a marriage ceremony with an officiant.</p>
            </li>
            <li>
                <img src="img/ba.jpg" alt="wedding pic" class="img-service" style="height: 300px; width:300px;">
                <h4>Baptism Appointment</h4>
                <p>A baptism appointment is a scheduled ceremony for initiating individuals into the Christian faith through the sacrament of baptism.</p>
            </li>
            <li>
                <img src="img/mc.jpg" alt="wedding pic" class="img-service" style="height: 300px; width:300px;">
                <h4>Marriage Certificate</h4>
                <p>A marriage certificate is a legal document that confirms the union of two individuals in marriage.</p>
            </li>
            <li>
                <img src="img/baba.png" alt="wedding pic" class="img-service" style="height: 300px; width:300px;">
                <h4>Baptism Certificate</h4>
                <p>A baptism certificate is a record of the religious ceremony symbolizing initiation into the Christian faith.</p>
            </li>
            <li>
                <img src="img/membepic.png" alt="wedding pic" class="img-service" style="height: 300px; width:300px;">
                <h4>Membership</h4>
                <p>Church membership in the IEMELIF signifies formal affiliation with this Protestant denomination, emphasizing active participation in its activities and support of its beliefs.</p>
            </li>
        </ul>
    </section>

    <section class="contact-area" id="contact">
        <h3 class="section-title">Our Contact</h3>
        <ul class="contact-content">
            <li>
                <i class="bi bi-geo-alt"></i>
                <p>Purko 3, San Ricardo Talavera, Nueva Ecija</p>
            </li>
            <li>
                <i class="bi bi-telephone-plus"></i>
                <p>09678339936</p>
            </li>
            <li>
                <i class="bi bi-envelope"></i>
                <p>sanricardoiemelifchurch@gmail.com</p>
            </li>
        </ul>
    </section>

    <footer>
        <p>All Right Reserved by 2024</p>
    </footer>
    
    <!-- Back to Top button -->
    <button class="top-button" onclick="scrollToTop()">&uarr;</button>
    <button class="end-button" onclick="scrollToEnd()">&darr;</button>


    <script>
        // Function to scroll to the top of the page
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Function to scroll to the end of the page
        function scrollToEnd() {
            window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
        }

        // Function to handle scroll event and show/hide buttons
        window.onscroll = function() { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.querySelector('.top-button').style.display = 'block';
            } else {
                document.querySelector('.top-button').style.display = 'none';
            }

            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                document.querySelector('.end-button').style.display = 'none';
            } else {
                document.querySelector('.end-button').style.display = 'block';
            }
        }

        // Profile function
        // JavaScript function to show the modal when the profile button is clicked
        function showProfileModal() {
            var modal = document.getElementById("profileModal");
            modal.style.display = "block";
        }

        // JavaScript function to close the modal when the close button is clicked
        function closeModal() {
            var modal = document.getElementById("profileModal");
            modal.style.display = "none";
        }

        // JavaScript function to submit profile changes
        function submitProfileChanges() {
            var fullName = document.getElementById('fullName').value;
            var birthday = document.getElementById('birthday').value;
            var gender = document.getElementById('gender').value;

            // Here, you would typically send these values to a server-side script (PHP) via AJAX for processing and updating the database
            // For demonstration purposes, let's log the values to the console
            console.log("Full Name: " + fullName);
            console.log("Birthday: " + birthday);
            console.log("Gender: " + gender);

            // Close the modal after saving changes
            closeModal();
        }
    </script>
</body>
</html>
