<?php

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (empty($firstname) or empty($lastname)) {
        $errors[] = 'Name is empty';
    }
    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }
    if (empty($tel)) {
        $errors[] = 'Mobile Number is empty';
    }
    if (empty($subject)) {
        $errors[] = 'Subject is empty';
    }
    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (empty($errors)) {
        $toEmail = 'reservation@tigrisvalley.com';
        $emailSubject = 'New email from your contact form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$firstname} {$lastname}", "Email: {$email}", "Mobile Number: {$tel}", "Subject: {$subject}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header("Location: contact-us.php?msg=success");
            $_POST = array();
        } else {
            header("Location: contact-us.php?msg=error");
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Tigris Valley</title>

    <link rel="icon" type="image/svg+xml" href="assets/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Poppins:wght@600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="styles/colors.css">
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/contact-us.css">
    <link rel="stylesheet" href="styles/responsive.css">

    <script defer src="scripts/general.js"></script>

</head>

<body>
    <header>
        <a href="index.html">
            <img src="assets/Logo.svg" style="width: 215px" />
        </a>
        <nav class="desktop">
            <ul class="header-items">
                <li><a href="about-us.html">About us</a></li>

                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Wellness</a>
                    <div class="dropdown-content">
                        <a class="droplink" href="care-units.html">Care units</a>
                        <a class="droplink" href="treatments.html">Treatments</a>
                        <a class="droplink" href="packages.html">Programmes</a>
                    </div>
                </li>
                <!--    <li><a href="care-units.html">Care units</a></li>
                <li><a href="treatments.html">Treatments</a></li>  -->
                <li><a href="facilities.html">Facilities</a></li>
                <li><a href="experience.html">Experience</a></li>
                <!--                <li><a href="packages.html">Programmes</a></li>
                <li><a href="events.html">Events</a></li>-->
                <li><a class="active" href="contact-us.php">Contact Us</a></li>
            </ul>
        </nav>
        <nav class="mobile">
            <a href="javascript:void(0)" class="btn-open" onclick="openNav()">
                <img src="assets/icons/Hamburger.svg" alt="">
            </a>
            <ul id="mobile-nav">
                <li><a href="javascript:void(0)" class="btn-close" onclick="closeNav()">&times;</a></li>
                <li><a href="about-us.html">About us</a></li>
                <li><a href="care-units.html">Care units</a></li>
                <li><a href="treatments.html">Treatments</a></li>
                <li><a href="facilities.html">Facilities</a></li>
                <li><a href="experience.html">Experience</a></li>
                <li><a href="packages.html">Programmes</a></li>
                <!--    <li><a href="events.html">Events</a></li>  -->
                <li><a class="active" href="contact-us.php">Contact Us</a></li>
            </ul>
        </nav>
        <a class="btn btn-secondary" href="whatsapp://send?phone=+919107040040">
            <div class="btn-text">Book Now</div>
            <div class="btn-icon">
                <img src="assets/icons/book-now.svg" alt="">
            </div>
        </a>
    </header>

    <dialog <?php echo isset($_REQUEST['msg']) ? 'open' : 'close'; ?> id="msg-dialog" >
        <div class="box">
            <p><?php if($_REQUEST['msg']=="success"){
                echo "Message sent successfully!";
            } elseif($_REQUEST['msg']=="error"){
                echo "Oops, something went wrong. Please try again later";
            }?></p>
            <button onclick="document.getElementById('msg-dialog').close()">&times;</button>
        </div>
    </dialog>

    <section class="page-hero">
        <h2 class="title">Want to be Healed by Tigris?</h2>
        <p class="text">
            If you've been wanting to take a break from the mundanity of everyday life, then look no
            further! Set to perfectly capture the best of Wayanad's rolling foothills, Tigris Valley is a
            choice destination for both the traveller, and the seeker. We strive to give you a taste of
            rejuvenation that is imbued in nature and its appreciation.
            You are welcome to experience the seamless healing process and the invigorating stay
            we offer at Tigris Valley!
        </p>
        <div class="image">
            <img src="assets/images/contact-us_hero.png" alt="">
        </div>
    </section>

    <section class="card-contact-container">
        <a class="card-contact"
            href="https://www.google.com/maps/place/TIGRIS+VALLEY+-+Holistic+Wellness+Resort/@11.4706641,76.0089039,15z/data=!4m2!3m1!1s0x0:0x5fdd1c9309a447c0?sa=X&ved=2ahUKEwjgjIrgpID4AhVFat4KHXrDCQcQ_BJ6BAg6EAU">
            <div class="contact-icon">
                <svg width="26" height="32" viewBox="0 0 26 32" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.8889 0C9.47178 0.00393197 6.19579 1.32968 3.77953 3.68643C1.36327 6.04318 0.00404497 9.23849 1.37125e-05 12.5714C-0.00407896 15.2951 0.908071 17.9449 2.59654 20.1143C2.59654 20.1143 2.94805 20.5657 3.00547 20.6309L12.8889 32L22.777 20.6251C22.8286 20.5646 23.1812 20.1143 23.1812 20.1143L23.1824 20.1109C24.87 17.9424 25.7818 15.2939 25.7778 12.5714C25.7737 9.23849 24.4145 6.04318 21.9982 3.68643C19.582 1.32968 16.306 0.00393197 12.8889 0V0ZM12.8889 17.1429C11.9619 17.1429 11.0558 16.8747 10.285 16.3724C9.51426 15.8701 8.91353 15.1562 8.55879 14.3208C8.20405 13.4855 8.11124 12.5664 8.29208 11.6796C8.47293 10.7928 8.91931 9.97827 9.57478 9.33894C10.2302 8.69961 11.0654 8.26423 11.9745 8.08784C12.8837 7.91145 13.8261 8.00198 14.6825 8.34798C15.5389 8.69398 16.2709 9.27991 16.7859 10.0317C17.3009 10.7834 17.5758 11.6673 17.5758 12.5714C17.5742 13.7834 17.0799 14.9453 16.2013 15.8022C15.3227 16.6592 14.1314 17.1413 12.8889 17.1429V17.1429Z" />
                </svg>
            </div>
            <div class="contact-text">
                Tigris Valley, Thamarassery,
                Kannoth P.O, Calicut - 673580
            </div>
        </a>
        <a class="card-contact" href="tel:+919107040040">
            <div class="contact-icon">
                <svg width="30" height="29" viewBox="0 0 30 29" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.0013 20.6101L22.5846 18.1119C22.9325 17.7796 23.3727 17.5521 23.8518 17.4571C24.3308 17.3621 24.8281 17.4036 25.2832 17.5766L28.4316 18.7922C28.8915 18.9728 29.2859 19.2809 29.565 19.6779C29.8441 20.0748 29.9955 20.5428 30 21.0228V26.5991C29.9973 26.9256 29.9263 27.2482 29.7913 27.5475C29.6563 27.8468 29.4601 28.1166 29.2144 28.3406C28.9688 28.5646 28.6788 28.7383 28.3619 28.8511C28.045 28.9638 27.7078 29.0134 27.3706 28.9969C5.3088 27.6697 0.857235 9.60246 0.0153584 2.68783C-0.023722 2.34827 0.0119848 2.00456 0.12013 1.67931C0.228275 1.35405 0.406406 1.05463 0.642807 0.800733C0.879207 0.546836 1.16852 0.344221 1.49171 0.206217C1.8149 0.0682136 2.16464 -0.00205115 2.51792 4.55797e-05H8.08815C8.58521 0.00146842 9.07047 0.146666 9.4815 0.416964C9.89254 0.687261 10.2106 1.0703 10.3947 1.5168L11.6517 4.56147C11.8365 4.99985 11.8837 5.48116 11.7873 5.9453C11.6909 6.40944 11.4552 6.83582 11.1097 7.17119L8.52638 9.66938C8.52638 9.66938 10.0141 19.4056 20.0013 20.6101Z" />
                </svg>
            </div>
            <div class="contact-text">
                +91 91070 40040 </br>
                +91 0495 236 36 00
            </div>
        </a>
        <a class="card-contact" href="mailto:reservation@tigrisvalley.com">
            <div class="contact-icon">
                <svg width="30" height="25" viewBox="0 0 30 25" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M30 6.32438V19.6875C30 20.9307 29.5061 22.123 28.6271 23.0021C27.748 23.8811 26.5557 24.375 25.3125 24.375H4.6875C3.4443 24.375 2.25201 23.8811 1.37294 23.0021C0.49386 22.123 0 20.9307 0 19.6875V6.32438L14.5238 14.8706C14.668 14.9557 14.8325 15.0006 15 15.0006C15.1675 15.0006 15.332 14.9557 15.4762 14.8706L30 6.32438ZM25.3125 5.80363e-08C26.4659 -0.000181342 27.5789 0.424887 28.4385 1.19389C29.2981 1.96289 29.8441 3.02183 29.9719 4.16813L15 12.975L0.0281252 4.16813C0.155922 3.02183 0.701857 1.96289 1.56149 1.19389C2.42112 0.424887 3.5341 -0.000181342 4.6875 5.80363e-08H25.3125Z" />
                </svg>
            </div>
            <div class="contact-text">
                reservation@tigrisvalley.com
            </div>
        </a>
    </section>

    <section class="boxed" id="contact-form">
        <div class="contact-form">
            <div class="image-container">
                <div class="social-container">
                    <a href="#" class="btn-social">
                        <img src="assets/icons/facebook.svg" alt="">
                    </a>
                    <a href="#" class="btn-social">
                        <img src="assets/icons/instagram.svg" alt="">
                    </a>
                    <a href="#" class="btn-social">
                        <img src="assets/icons/twitter.svg" alt="">
                    </a>
                </div>
            </div>
            <form method="post" action="contact-us.php" class="contact-form-container" id="contact-form">
                <h3 class="title">We like to hear from you...</h3>
                <div class="input-row">
                    <input type="text" placeholder="First Name" name="firstname" id="firstname" value="<?php echo isset($_POST["firstname"]) ? htmlentities($_POST["firstname"]) : ''; ?>" >
                    <input type="text" placeholder="Last Name" name="lastname" id="lastname" value="<?php echo isset($_POST["lastname"]) ? htmlentities($_POST["lastname"]) : ''; ?>" >
                </div>
                <div class="input-row">
                    <input type="email" placeholder="Email" name="email" id="email" value="<?php echo isset($_POST["email"]) ? htmlentities($_POST["email"]) : ''; ?>" >
                    <input type="tel" placeholder="Mobile Number" name="tel" id="tel" value="<?php echo isset($_POST["tel"]) ? htmlentities($_POST["tel"]) : ''; ?>" >
                </div>
                <div class="input-row">
                    <input type="text" placeholder="Subject" name="subject" id="subject" value="<?php echo isset($_POST["subject"]) ? htmlentities($_POST["subject"]) : ''; ?>" >
                </div>
                <div class="input-row">
                    <textarea placeholder="Your Message" name="message" id="message" rows="8"><?php echo isset($_POST["message"]) ? htmlentities($_POST["message"]) : ''; ?></textarea>
                </div>
                <p><?php echo((!empty($errorMessage)) ? $errorMessage : '') ?></p>
                <input class="btn" type="submit" value="Send Message">
            </form>
        </div>
    </section>

    <!--
    <section class="doctor">
        <div class="doctor-container">
            <h2 class="title">Let Us Help You</h2>
            <p class="text">
                If care is what you need, and peace is what you seek, then we can surely help.
                Whatever brings you to Tigris Valley, our team of wellness specialists will decide the
                best course of action to get you where you want to go.
                If you are in search of answers that you cannot find elsewhere, then tell us what ails you
                - and we'll tell you how we can help rejuvenate your life!
            </p>
            <a href="contact-us.php#contact-form" class="btn">Make an appointment</a>
        </div>

    </section>
-->
    <section class="newsletter">
        <div class="content">
            <h3 class="heading">Newsletter</h3>
            <p class="text">
                Subscribe To Get Notifications For The Latest News And Updates
            </p>
        </div>
        <form action="" class="form input-row">
            <input type="email" placeholder="Enter your email" name="newsletter-email" id="newsletter-email">
            <a href="#" class="btn">
                <img src="assets/icons/arrow-white.svg" alt="">
            </a>
        </form>
    </section>

    <footer class="general">
        <div class="footer-top">
            <div class="details-basic">
                <div class="image">
                    <img src="assets/Logo.svg" alt="" width="280px">
                </div>
                <p class="text">
                    At Tigris we offer treatment programmes that are tailored to meet the needs of each
                    individual - in terms of nutrition, therapies, and workouts. Each programme is a mix of
                    the AYUSH medicinal philosophies of Ayurveda, Yoga, Unani, Siddha, and Homeopathy
                    - giving you well-rounded holistic care that caters to both mind & body.
                </p>
            </div>
            <div class="details-contact">
                <a href="tel:+919107040040" class="btn-contact">
                    <div class="btn-image">
                        <img src="assets/icons/whatsapp.svg" alt="">
                    </div>
                    <div class="btn-text">
                        +91 91070 400 40
                    </div>
                </a>
                <a href="tel:+914952363600" class="btn-contact">
                    <div class="btn-image">
                        <img src="assets/icons/whatsapp.svg" alt="">
                    </div>
                    <div class="btn-text">
                        +91 495 236 36 00
                    </div>
                </a>
                <a href="mailto:reservation@tigrisvalley.com" class="btn-contact">
                    <div class="btn-image">
                        <img src="assets/icons/mail.svg" alt="">
                    </div>
                    <div class="btn-text">
                        reservation@tigrisvalley.com
                    </div>
                </a>
                <div class="social-container">
                    <a href="https://www.facebook.com/tigrisvalley/" class="btn-social">
                        <img src="assets/icons/facebook.svg" alt="">
                    </a>
                    <a href="https://www.instagram.com/tigrisvalley/" class="btn-social">
                        <img src="assets/icons/instagram.svg" alt="">
                    </a>
                    <a href="#" class="btn-social">
                        <img src="assets/icons/twitter.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="footer-links">
                <a href="about-us.html">About us</a>
                <a href="experience.html">Experience</a>
                <a href="treatments.html">Treatments</a>
                <a href="contact-us.php">Contact Us</a>
                <a href="care-units.html">Care units</a>
                <a href="packages.html">Programmes</a>
                <a href="events.html">Events</a>
                <a href="facilities.html">Facilities</a>
                </ul>
            </div>
            <div class="footer-location">
                <p>
                    <strong>TIGRIS VALLEY</strong>
                    <br>Tigris Valley, Thamarassery
                    <br>Kannoth P.O, Calicut - 673580
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            ?? tigrisvalley.com
        </div>
    </footer>
    <a href="whatsapp://send?phone=+919107040040"><svg viewBox="0 0 32 32" class="whatsapp-ico">
            <path
                d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z"
                fill-rule="evenodd"></path>
        </svg></a>


    <!--    <a href="#" id="enquire-now">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 512 512">
            <path
                d="M191.1 224c0-17.72-14.34-32.04-32-32.04L144 192c-35.34 0-64 28.66-64 64.08v47.79C80 339.3 108.7 368 144 368H160c17.66 0 32-14.36 32-32.06L191.1 224zM256 0C112.9 0 4.583 119.1 .0208 256L0 296C0 309.3 10.75 320 23.1 320S48 309.3 48 296V256c0-114.7 93.34-207.8 208-207.8C370.7 48.2 464 141.3 464 256v144c0 22.09-17.91 40-40 40h-110.7C305 425.7 289.7 416 272 416H241.8c-23.21 0-44.5 15.69-48.87 38.49C187 485.2 210.4 512 239.1 512H272c17.72 0 33.03-9.711 41.34-24H424c48.6 0 88-39.4 88-88V256C507.4 119.1 399.1 0 256 0zM368 368c35.34 0 64-28.7 64-64.13V256.1C432 220.7 403.3 192 368 192l-16 0c-17.66 0-32 14.34-32 32.04L320 335.9C320 353.7 334.3 368 352 368H368z" />
        </svg>
        <div class="enquire-text">
            Enquire Now
        </div>
    </a>-->
</body>

</html>