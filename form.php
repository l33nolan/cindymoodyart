<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS));


    $mail = new PHPMailer(true);



        $email_body = "";
        $email_body .= "Name " . $name . "\n";
        $email_body .= "Email " . $email . "\n";
        $email_body .= "Details " . $message . "\n";

        $mail->setFrom($email, $name);
        $mail->addAddress('leenolan79@icloud.com', 'Lee Nolan');     // Add a recipient

        $mail->isHTML(false);                                  // Set email format to HTML

        $mail->Subject = 'New Website Enquiry From ' . $name;
        $mail->Body = $email_body;


        if ($mail->send()) {
            header("Location:thanks.php");
        }

}
?>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Contact Me</h2>
                    <p>I would love to hear from anybody regarding my artwork. If you have any feedback, questions, or
                        might be interested in buying a painting, please get in touch!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <form name="sendMessage" id="contactForm" action="form.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Your Name *" id="name"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="Your Email *"
                                       id="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Your Message *" id="message"
                                          required></textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button id="send_email" type="submit" class="btn" value="Send">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

