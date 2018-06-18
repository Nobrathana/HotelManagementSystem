$(function(){
    var hotel = {
        init: function(){
            this.btn_check_out();
            this.sortselect();
            this.search();
            this.test();
        },

        btn_check_out: function(){
            $( document ).delegate('.btn_check_out','click',function(e){
                     e.preventDefault();
                     var booking_id = $(this).attr("id");     
                        $.ajax({
                        url: "includes/checkout_inc.php",
                        method: "POST",
                        data: {
                        booking_id:booking_id
                        },
                        datatype: "text",
                        success: function (data) {
                        $(".check_out_modal_body").html(data);
                        $("#check_out_modal").modal('show');
                        }
                    });
            });
        },
        
        sortselect: function(){
            $("#sortselect").change(function (e) {
                e.preventDefault();
                var sort_type = $(this).val();
                $.ajax({
                  
                  url: "includes/sorttype_inc.php",
                  method: "POST",
                  data: {
                    sort_type: sort_type
                  },
                  datatype: "text",
                  cache: false,
                  success: function (data) {
                    $("#guest_list").html(data);
                  }
                });
              });
        },
        search: function(){
            $("#search").keyup(function (e) {
                e.preventDefault();
                var search_data = $(this).val();
                
                $.ajax({
                  url: "includes/livesearch_inc.php",
                  method: "POST",
                  data: {
                    search_data: search_data
                  },
                  datatype: "text",
                  success: function (data) {
                    $("#guest_list").html(data);
                  }
                });
              });
        
        },

        test: function () {
          $(document).delegate('.btn_check_out_modal', 'click', function (e) {
            e.preventDefault();
            var booking_id = $(this).attr("id");
            $.ajax({
              url: "includes/changestatus_inc.php",
              method: "POST",
              data: {
                booking_id: booking_id
              },
              datatype: "text",
              success: function (data) {
                 $("#check_out_modal").modal('hide');
                if (data == "1") {
                  swal({
                      title: "",
                      text: "Check Out Successfully.",
                      type: "success"
                    },
                    function () {
                      location.reload();
                    });
                } else {
                  swal("", "There was an Error in Check out!!!", "warning");
                }
              }
            });
          });
        }
    };
    
	$( document ).ready( function() {
		
		hotel.init();
		
	});
});