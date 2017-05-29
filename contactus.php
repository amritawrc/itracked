<?php 
session_start();
include 'templates/header.php' ?>

<div class="main_containarea">

    <div class="container">
        <div class="row" style=" text-align:center">
            <div class="contactus">
                <h3 id="message"> <?php echo $_SESSION['message']; ?></h3>
                <h3>Contact Us</h3>
                <form  id="myform" class="form" action="contact.php" method="post" autocomplete="on">
                    <p>
                        <label for="username" class="icon-user"> Name
                            <span class="required">*</span>
                        </label>
                        <input type="text" name="name" id="name" placeholder="" />
                    </p>

                    <p>
                        <label for="usermail" class="icon-envelope"> E-mail address
                            <span class="required">*</span>
                        </label>
                        <input type="email" name="email" id="email" placeholder=""  />
                    </p>

                    <p>
                        <label for="usersite" class="icon-link"> Website</label>
                        <input type="url" name="website" id="website" placeholder="" />
                    </p>

                    <p>
                        <label for="subject" class="icon-bullhorn"> Subject</label>
                        <input type="text" name="subject" id="subject" placeholder="" />
                    </p>

                    <p>
                        <label for="message" class="icon-comment"> Message
                            <span class="required">*</span>
                        </label>
                        <textarea placeholder="message" id="message" name="message" ></textarea>
                    </p>
                    <p class="indication">
                        <button type="submit" class="btn btn-primary">Submit</button></p>


                </form>
            </div>
        </div>
    </div>

</div>


<?php include 'templates/footer.php'; ?>
<script>
    $(document).ready(function () {
        
        $('#message').fadeOut(8000);

        $("#myform").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true
                },
                subject: {
                    required: true
                },
                website: {
                    required: true
                },
                message: {
                    required: true
                }


            },
            messages: {
                name: {
                    required: "<font color=\"red\">Please enter name.</font> "
                },
                email: {
                    required: "<font color=\"red\">Please enter email.</font> "
                },
                website: {
                    required: "<font color=\"red\">Please enter website.</font> "
                },
                subject: {
                    required: "<font color=\"red\">Please enter subject.</font> "
                },
                message: {
                    required: "<font color=\"red\">Please enter message.</font> "
                },
            }
        });

    });

</script>