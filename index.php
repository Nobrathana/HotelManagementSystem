<?php
session_start();

if (isset($_SESSION['uid'])) {
  if ($_SESSION['uid'] != "admin") {
      header("Location: login.php");
      exit();
  }
}
else {
  header("Location: login.php");
  exit();
}
 ?>

  <?php include 'header.php'; ?>

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    
    <div class="container">
      <br>
      <h4>Main Table</h4>
      <div class="row">
        <div class="col-3" style="padding: 0px;">
          <div>
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect">Sort</label>
              </div>
              <select class="custom-select" id="sortselect">
                <option value="">All</option>
                <option value="1">Today</option>
                <option value="2">This Week</option>
                <option value="3">This Month</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-5">
          <div class="input-group">
            <div class="input-group-prepend">
              <label class="input-group-text">Search</label>
            </div>
            <input type="text" class="form-control" placeholder="Name/Room/Date" name="firstname" id="search">
          </div>

        </div>
      </div>
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Guest Name</th>
              <th>Gender</th>
              <th>Contact</th>
              <th>Room Number</th>
              <th>Booking Date</th>
              <th>Check Out</th>
            </tr>
          </thead>
          <tbody id="guest_list">

            <?php include 'includes/loadguestlist_inc.php'; ?>
          </tbody>
        </table>
      </div>
  </main>
  </div>
  </div>
  </div>
  

      <!-- Check Out Modal -->
        <div class="modal fade" id="check_out_modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                 Check Out Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="check_out_modal_body" style="padding: 30px;">

              
            </div>
          </div>
        </div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/sweetalert.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <!-- <script src="js/myscript.js"></script> -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/ValidateInput.js"></script>
  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script src="js/script.js"></script>
  <script>
    feather.replace()
  </script>

  <script>
  $(".btn_check_out_modal").click(function(){
    alert("script run");
  });
  </script>
  <script>
    $(document).ready(function () {
      $(".dropdown-toggle").dropdown();
    });
  </script>

  </body>

  </html>
