<?php
    include_once 'header.php';
    include 'includes/phpfunction_inc.php';
?>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container">

                <div class="row justify-content-md-center">
                    <!-- Guest Registration -->
                    <div class="col-md-12 order-md-1">
                        <h4 class="mb-3">Guest Information</h4>
                        <form id="form_register" class="register" method="POST">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" name="firstname" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" name="lastname" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="state">Gender</label>
                                    <select class="custom-select d-block w-100" name="gender" required>
                                        <option value="">Choose...</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a Gender.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="nationality">Nationality</label>
                                    <select class="custom-select d-block w-100" name="nationality" required>
                                        <option value="">Choose...</option>
                                        <option value="Khmer">Khmer</option>
                                        <option value="Foreigner">Foreigner</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a Nationality.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="contact">Contact</label>
                                    <input type="number" class="form-control" name="contact" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Please Enter a Phone Number
                                    </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="idcard">ID Card Number</label>
                                    <input type="number" class="form-control" name="idcard" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Valid ID Card is required.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Please enter Guest address.
                                    </div>
                                </div>
                            </div>



                            <!-- check in information -->
                            <h4 class="mb-3">Check In Information</h4>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="state">Room Type</label>
                                    <select class="custom-select d-block w-100" name="roomtype" id="room_type_select" required>
                                        <option value="">Choose...</option>
                                        <?php echo loadroom("room_type"); ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a Room Type.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="state">Room Number</label>
                                    <select class="custom-select d-block w-100" name="roomnumber" id="room_number_select" required>
                                        <option value="">Choose...</option>
                                        <?php echo loadroom("room_number"); ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a Room Type.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="checkin">Check In</label>
                                    <input type="date" data-date-format="DD MM YYYY" class="form-control" name="checkin" placeholder="Y/M/D" >
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="checkout">Check Out</label>
                                    <input type="date" data-date-format="DD MM YYYY" class="form-control" name="checkout" placeholder="Y/M/D" >
                                </div>
                                <hr class="mb-4">

                                <button id="btn_register" class="btn btn-primary btn-lg" name="submit" type="submit">Register</button>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
    </main>

    <!-- Success Modal -->
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/sweetalert.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ValidateInput.js"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
        $('.datepicker').datepicker();
    </script>
    <script>
        $(document).ready(function () {

            $("#guest").addClass("active");


            $("#room_type_select").change(function () {
                var room_type = $(this).val();
                $.ajax({
                    url: "includes/dependentselectbox_inc.php",
                    method: "POST",
                    data: {
                        room_type: room_type
                    },
                    datatype: "text",
                    success: function (data) {
                        $("#room_number_select").html(data);
                    }
                });
            });
        });
    </script>

    <!-- Register Script -->
    <script>
        $(document).ready(function () {

            $("#btn_register").click(function (e) {
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: 'includes/register_inc.php',
                    data: $('#form_register').serialize(),
                    datatype: "html",
                    success: function (respone) {
                        if (respone == "1") {
                            swal({
                                    title: "",
                                    text: "Register Successfully.",
                                    type: "success"
                                },
                                function () {
                                    location.reload();
                                });
                        } 
                        else {
                            alert(respone);
                            // swal("", "Please Provide Information to empty field!",
                            //     "warning");
                        }
                    }
                });
                return false;
            });

        });
    </script>


    </body>

    </html>
