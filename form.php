<?php

require 'vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS));

    $emailBody = "From: " . $name . "<br>" . "EMail: " . $email . "<br>" . "Message: " . $message;

    $from = new SendGrid\Email("Cindy Moody Art Website","leenolan@icloud.com");
    $subject = "Cindy, you have a new artwork enquiry!";
    $to = new SendGrid\Email(null, "leenolan79@icloud.com");
    $content = new SendGrid\Content("text/plain", $emailBody);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = getenv('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);

    echo $response->statusCode();
    echo $response->headers();
    echo $response->body();

    header("Location: thanks.html");

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

