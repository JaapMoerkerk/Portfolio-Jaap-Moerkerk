<?php
session_start();

$_SESSION['message'] = ". . . . . .";

if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted']) {
    // Clear the session variable
    $_SESSION['message'] = "Thanks for reaching out. I'll be in touch through " . $_SESSION['email'] . ".";
    $_SESSION['form_submitted'] = false;
    unset($_POST["submit"]);
}

if (isset($_SESSION['form_error']) && $_SESSION['form_error']){
    $_SESSION['message'] = "Something went wrong submitting the form. Try again later or use another form of contact.";
    $_SESSION['form_error'] = false;
    unset($_POST['submit']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <title>Jaap Moerkerk - Creative Developer</title>
</head>
<body>
<header id="home" class="header-bar">
    <div class="row title-image">
        <img src="src/img/profile-picture-jaap.jpg" alt="Profile picture of me">
        <h1>Jaap Moerkerk</h1>
    </div>
    <nav>
        <a href="#home">Home</a>
        <a href="#about-me">About me</a>
        <a href="#experience">Experience & Skills</a>
        <a href="#contact">Contact</a>
    </nav>
    <a href="#contact">
        <button class="hire-me-btn">Hire me</button>
    </a>
</header>

<main>
    <section id="home-titles">
        <h2>This is <span>Jaap Moerkerk</span></h2>
        <h3>Creative Full Stack Web Developer</h3>
        <span><?=$_SESSION['message']?></span>
        <p>Design | Development | Creative Thinking | Commercial Implementation</p>
    </section>

    <section id="home-cards">
        <a href="#experience">
            <div class="home-card">
                <div class="card-icon">
                    <i class='bx bx-briefcase'></i>
                </div>
                <div class="card-text">
                    <h4>Qualification</h4>
                    <p>education & experience</p>
                </div>
                <div class="arrow-icon">
                    <i class="bx bx-chevron-down"></i>
                </div>
            </div>
        </a>

        <a href="#about-me">
            <div class="home-card about-card">
                <div class="card-icon">
                    <i class='bx bxs-user'></i></div>
                <div class="card-text">
                    <h4>About</h4>
                    <p>find out who I am</p>
                </div>
                <div class="arrow-icon">
                    <i class="bx bx-chevron-down"></i>
                </div>
            </div>
        </a>

        <a href="#contact">
            <div class="home-card">
                <div class="card-icon">
                    <i class='bx bxs-megaphone'></i>
                </div>
                <div class="card-text">
                    <h4>Contact</h4>
                    <p>and useful links</p>
                </div>
                <div class="arrow-icon">
                    <i class="bx bx-chevron-down"></i>
                </div>
            </div>
        </a>
    </section>

    <section id="about-me">
        <div class="column about-me-text">
            <h2>About me</h2>
            <p>
                I am a creative fullstack developer that specializes in front end development and website design.
                <br><br>
                With <span class="prim-blue">5+ years</span> of coding experience and a passion for design & tech, I am
                constantly expanding my professional scope with development projects, personal or commercial.
                I've always been interested in the more social sides of the field, which is why I started my own
                freelance web design agency
                <span class="prim-blue"><a href="#">Web Design Jaap</a></span>, providing complete websites, hosting and
                maintenance to small entrepreneurs and private endeavours.
            </p>
        </div>
        <img src="src/img/portrait-picture-jaap.jpg" alt="Portrait picture">
    </section>

    <section id="skills">
        <h2>Programming languages, frameworks & skills</h2>
        <div class="skills-icons">
            <i class='bx bxl-html5'></i>
            <i class='bx bxl-css3'></i>
            <i class='bx bxl-php'></i>
            <i class="bx bxl-javascript"></i>
            <i class="bx bxl-nodejs"></i>
            <i class='bx bxl-react'></i>
            <i class="bx bxl-c-plus-plus"></i>
            <i class="bx bxl-mongodb"></i>
        </div>
    </section>

    <div class="row half-page-cards">
        <section id="experience" class="half-page-card">
            <h2>Work experience</h2>
            <p>
                <span class="bold-p-title">Web Design Jaap</span><br>
                Freelance web design agency - Ouddorp, The Netherlands<br>
                <span class="subtext">My own web design agency, providing complete website packages for small organisations | 2020 - Present</span>
            </p>
            <p>
                <span class="bold-p-title">IT & Software Specialist</span><br>
                De Vogel Financial Office - Middelharnis, The Netherlands<br>
                <span class="subtext">In-house IT & software specialist for employee support & automation implementation | 2022 - Present</span>
            </p>
            <p>
                <span class="bold-p-title">IT Project employee</span><br>
                Government (municipality) of Gemeente Goeree-Overflakkee - Middelharnis, The Netherlands<br>
                <span class="subtext">Involved in design, development and employee implementation of a new intranet for 500 employees | 2020 - 2022</span>
            </p>

        </section>
        <section id="education" class="half-page-card">
            <h2>Education</h2>
            <p>
                <span class="bold-p-title">Creative Media & Game Technologies</span><br>
                Hogeschool Rotterdam (Rotterdam University of Applied Sciences) - Rotterdam, The Netherlands<br>
                <span class="subtext">Bachelor of Applied Sciences | 2022-2026</span>
            </p>
            <p>
                <span class="bold-p-title">Computer Science & Graphic Design</span><br>
                Santa Barbara Community College - Santa Barbara CA, United States<br>
                <span class="subtext">Foundation course (Half Associate Degree) | 2021-2022</span>
            </p>
            <p>
                <span class="bold-p-title">VWO Atheneum N&T (Science and bèta profile) degree</span><br>
                CSG Prins Maurits - Middelharnis, The Netherlands<br>
                <span class="subtext">Highest level of Dutch secondary school | 2013-2020</span>
            </p>
        </section>
    </div>

    <section class="column" id="contact">
        <h2>Contact</h2>
        <div class="row contact-container">
            <div class="column contact-left-column">
                <p>Do you want to work with or get in touch with me? Don't hesitate and send me a message!
                    <br><br>
                    I will do my best to return your message as soon as I can.</p>
                <div class="row contact-icons">
                    <a target="_blank" class="whatsapp" href="https://wa.me/31624852790"><i class="bx bxl-whatsapp"></i></a>
                    <a target="_blank" class="github" href="https://github.com/JaapMoerkerk"><i
                                class="bx bxl-github"></i></a>
                    <a target="_blank" class="instagram" href="https://www.instagram.com/jape_dj/"><i
                                class="bx bxl-instagram"></i></a>
                    <a target="_blank" class="linkedin" href="https://www.linkedin.com/in/jaap-moerkerk-08612611b/"><i
                                class="bx bxl-linkedin"></i></a>
                </div>
            </div>
            <form class="form column" action="form-processing.php" method="post">
                <label for="fullname"></label><input name="fullname" placeholder="Name" type="text" id="fullname"
                                                     required>
                <label for="email"></label><input name="email" placeholder="Email" type="text" id="email" required>
                <label for="tel"></label><input name="tel" placeholder="Phone number (optional)" type="tel" id="tel">
                <label for="message"></label><input name="message" placeholder="Message" type="text" id="message"
                                                    required>
                <label for="submit"></label><input name="submit" value="Send" type="submit" id="submit">
            </form>
        </div>
    </section>
</main>

<footer>
    <p>Copyright <i class='bx bxs-copyright'></i>
        <!--suppress JSCheckFunctionSignatures -->
        <script>document.write(new Date().getFullYear());</script>
        | Jaap Moerkerk
    </p>
</footer>
</body>
</html>