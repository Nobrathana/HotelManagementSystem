<?php
    include_once 'header.php';
?>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="container">
                <div class="col-md-12 order-md-1">
                    <div class="row">
                        <h4 class="col-md-9 mb-3">Room Information</h4>
                        <div class="col-md-3 mb-3 align-items-right">
                            <button type="button" class="btn btn-success new_data">
                            <span data-feather="plus-square"></span> NEW ROOM</button>
                        </div>
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Room Number</th>
                                    <th>Room Type</th>
                                    <th>Price/Day</th>
                                    <th>Status</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include_once 'includes/loadroomlist_inc.php';?>
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- New Room -->
                <div class="modal fade" id="new_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    <span data-feather="plus-square"></span> New Room</h5>
                                <button id="btn_close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="padding: 30px;">
                                <form id="form_create_room" name="form_create_room" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="roomNumber">Room Number</label>
                                            <input type="number" class="form-control" name="roomNumber" id="roomNumber" placeholder="" value="" required>
                                            <div class="invalid-feedback">
                                                Valid Room Number is required.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="roomType">Room Type</label>
                                            <input type="number" class="form-control" name="roomType" id="roomType" placeholder="" value="" required>
                                            <div class="invalid-feedback">
                                                Valid Room Type is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="roomPrice">Price</label>
                                            <input type="number" class="form-control" name="roomPrice" id="roomPrice" placeholder="" value="" required>
                                            <div class="invalid-feedback">
                                                Room Price is required.
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                 
                                    <p id="alert_msg">ssss</p>
                                    
                            </div>
                           
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn_new_data" form="form_create_room">Save New Room</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modify Data-->
                <div class="modal fade" id="modify_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modify Room</h5>
                                <button id="btn_modify_close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modify_data_modal" style="padding: 30px;">
                                .......
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-primary btn_modify_data" form="form_modify_room">Modify Room</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Data-->
                <div class="modal fade" id="delete_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    <span data-feather="alert-triangle"></span> Warning Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="delete_data_modal" style="padding: 10px;">
                                <h5 style="text-indent: 30px;">Are you sure to delete this Room?</h5>
                            </div>
                            <div class="modal-footer">
                                <button id="" type="button" class="btn btn-danger btn_delete">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>


    <script src="js/ValidateInput.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>



    <script>
        $(document).ready(function () {
            
            $("#btn_close_modal").click(function(){
                location.reload();
            });

            $("#btn_modify_close_modal").click(function(){
                location.reload();
            });

    
            $(".btn_modify_data").click(function(e){
                e.preventDefault(); 
                $.ajax({
                    method: 'POST',
                    url: 'includes/updateroom_inc.php',
                    data: $('#form_modify_room').serialize(),
                    datatype: "html",
                    success: function(data){
                        $("p").html(data);
                        $("p").show();
                    }
                });
            });

            $(".new_data").click(function () {
                $("#new_data_modal").modal("show");
                $("p").hide();
            });

            $('.btn_new_data').click(function (e) {  
                e.preventDefault();     
                $.ajax({
                    method: 'POST',
                    url: 'includes/newroom_inc.php',
                    data: $('#form_create_room').serialize(),
                    datatype: "html",
                    success: function(data){
                        $("p").html(data);
                        $("p").show();
                    }
                });
             
            });

            $(".edit_data").click(function () {      
                var room_id = $(this).attr("id");
                $.ajax({
                    url: "includes/selectroom_inc.php",
                    method: "POST",
                    data: {
                        room_id: room_id
                    },
                    success: function (data) {
                        $(".modify_data_modal").html(data);
                        $("#modify_data").modal("show");
                          $("p").hide();
                    }
                });
            });

            $(".delete_data").click(function () {
                var room_id = $(this).attr("id");
                $(".btn_delete").attr("id", room_id);
            });

            $(".btn_delete").click(function () {
                var room_id = $(this).attr("id");
                $.ajax({
                    url: "includes/deleteroom_inc.php",
                    method: "POST",
                    data: {
                        room_id: room_id
                    },
                    success: function () {
                        $("#delete_data").modal("hide");
                        location.reload();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#room").addClass("active");
        });
    </script>

    <script>
        feather.replace()
    </script>


    </body>

    </html>