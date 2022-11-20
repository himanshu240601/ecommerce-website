<title>Contact - Stylin</title>
<?php
    include_once('header_footer/header.php');
?>
<style>
    <?php include "css/contact.css"; ?>
</style>

<section class="container contact">
    <h2 class="text-center">CONTACT</h2>
    <div class="row">
        <div class="col-md-6">
            <form>
            <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Name">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control" placeholder="Type your message" rows="7"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-danger">Send</button>
            </form>
        </div>
        <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224345.8392304288!2d77.06889692223507!3d28.52758200688075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x52c2b7494e204dce!2s!5e0!3m2!1sen!2sin!4v1630823237654!5m2!1sen!2sin" width="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <ul style="list-style:none">
                <li>
                    <span><i class="bi bi-geo-alt-fill"></i>12th floor, 222 Fake St, New Delhi, IN</span>
                </li>
                <li>
                    <span><i class="bi bi-telephone-fill"></i>777-666-888</span>
                </li>
                <li>
                    <span><i class="bi bi-envelope-fill"></i>stylein99@gmail.com</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<?php include_once('header_footer/footer.php'); ?>