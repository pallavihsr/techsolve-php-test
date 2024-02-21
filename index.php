<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
    <!-- Form -->
    <div class="container">
    <form id="contact_form" action="submit.php" method="POST" target="result_area">
        <div>
            <label>Full Name</label>
            <input type="text" name="full_name" id="full_name" />
        </div>
        <div>
            <label>Phone Number</label>
            <input type="tel" name="phone_number" id="phone_number" />
        </div>
        <div>
            <label>Email Address</label>
            <input type="email" name="email_address" id="email_address" />
        </div>
        <div>
            <label>Subject</label>
            <input type="text" name="subject" id="subject" />
        </div>
        <div>
            <label>Message</label>
            <textarea name="message" id="message"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
    </div>

    <div class="result">
    <iframe name="result_area" >
    </iframe>
    </div>
        
    </body>
</html>