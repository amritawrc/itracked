<?php include 'templates/header.php' ?>
<div class="container">

    <div class="row" style=" text-align:center">

        <div class="contactus">

            <h3>Enquiry Form</h3>
     <form  id="myform" class="form" action="enq.php" method="post" autocomplete="on">
                <p>
             

                <p>

                    <label for="subject" class="icon-bullhorn">Name
                     <span class="required">*</span></label>
                    <input type="text" name="name" id="name" placeholder=""/>

                </p>
                <p>

                    <label for="subject" class="icon-bullhorn">Email Address
                      <span class="required">*</span></label>
                    <input type="email" name="email" id="email" placeholder=""/>

                </p>

                    <p>
            <label for="message" class="icon-comment"> Message
                <span class="required">*</span>
            </label>
            <textarea placeholder="message" id="message" name="message"></textarea>
        </p>




                <p class="indication">

                    <button type="submit" class="btn btn-primary">Submit</button></p>





            </form>


        </div>

    </div>

</div>


<?php include 'templates/footer.php'; ?>

<script>
    $(document).ready(function () {

       $("#myform").validate({
//                        errorClass: 'customErrorClass',
            rules: {
                name: {
                    required: true
                },
           
                email: {
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
                message: {
                    required: "<font color=\"red\">Please enter message.</font> "
                },
            
            }
        });
       

        $('#org_id').change(function () {
            //alert ($('#event').val());
            var org_id = $(this).val();

            $.ajax({
                url: 'event.php',
                type: 'post',
//                dataType: 'json',

                data: {org_id: org_id},
                success: function (data) {

                    $('#event_id').html(data);





                }

            });

        });



        $('#event_id').change(function () {

            //alert ($('#event').val());

            var event_id = $(this).val();



            $.ajax({
                url: 'group.php',
                type: 'post',
//                dataType: 'json',

                data: {event_id: event_id},
                success: function (data) {

                    $('#grp_id').html(data);





                }

            });

        });



    });

</script>




