<?php
require_once 'database.php';
    //grab username and connect with temp profile
$event_name = "Volunteer for Keraton";

$sql = "SELECT * 
FROM  `event`
WHERE  `name` =  '".$event_name."'
LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_OBJ);

TopHeader("ISAUW | " . $event_name, "");
        EventJumbotron();

?>

    <!-- Separator End -->
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">


        <!-- START THE FEATURETTES -->

        <!-- Content -->
        <div id="event-info" class="row">
            <div class="row featurette">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h2 class="row"><?= $result->name ?></h2>

                    <div class="text-center">
                        <img class="img-responsive img-thumbnail" src="../img/volunteer-keraton-2015.jpg">
                    </div>
                    <!-- <div id="event-img">
                        <img class="featurette-image img-responsive img-circle" src="../<?= $result->media ?>" alt="Generic placeholder image">
                    </div>

                    <p class="lead" id="event-detail">
                        <strong>Date: </strong><span id="date"></span>
                        <br>
                        <strong>Time: </strong><?= $result->time ?>
                        <br>
                        <strong>Location: </strong><?= $result->location ?>
                    </p> -->

                    <hr class="featurette-divider vol">

                    <div class="row lead"  id="job-desc">
                        <h2 style="text-align:center;">Volunteer Job Description</h2>
                        <p class="fine-print">*Certificates will be awarded to all volunteers in appreciation of their time and effort</p>
                        <ul>
                            <li class="volunteer-desc">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Usher
                                    </div>
                                    <div class="panel-body">
                                        <ul style="list-style:disc;">
                                            <li>Greet visitors upon entrance to the venue in a friendly manner</li>

                                            <li>Distribute events schedule</li>

                                            <li>Provide guidance to booths layout</li>

                                            <li>Ensure orderly queue to food/game booths</li>

                                            <li>Show visitors where to find bathrooms and exit to parking</li>

                                            <li>Act upon all comments/ complaints in a friendly manner</li>
                                        </ul>
                                        <h4 style="text-decoration:underline;">Requirement</h4>

                                        <ul>
                                            <li>Friendly and hospitable</li>

                                            <li>Comfortable with conversing in English OR Indonesian</li>
                                        </ul>                                  
                                    </div>
                                </div>
                            </li>
                            <li class="volunteer-desc">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Event Photographer
                                    </div>
                                    <div class="panel-body">
                                        <ul style="list-style:disc;">
                                            <li>Document various activities at Keraton at assigned areas and during assigned shift</li>

                                            <li>Seeking out appropriate photographic subjects and opportunities</li>

                                            <li>Capture commercial-quality photographs</li>

                                            <li>Edit and process images in terms of lighting and exposure</li>
                                        </ul>
                                        <h4 style="text-decoration:underline;">Requirement</h4>

                                        <ul>

                                            <li>Previous photography experience</li>

                                            <li>Familiar with using SLR cameras</li>

                                            <span class="fine-print">*Images taken and produced will be properties of ISAUW</span>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="volunteer-desc">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Foor Vendor Assistant
                                    </div>
                                    <div class="panel-body">
                                        <ul style="list-style:disc;">
                                            <li>Help with setup at assigned food booth</li>

                                            <li>Help with food/drink preparation</li>

                                            <li>Assist in serving food/drink</li>

                                            <li>Collect payments from patrons</li>
                                        </ul>
                                        <h4 style="text-decoration:underline;">Requirement</h4>

                                        <ul>

                                            <li>Pass the Food Worker Permit (online on <a href="www.foodworkercard.wa.gov">www.foodworkercard.wa.gov</a>)</li>

                                            <li>Attend two days of training</li>

                                            <li>Friendly and hospitable</li>

                                            <li>Comfortable with conversing in English OR Indonesian</li>
                                        </ul>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>

                    <hr class="featurette-divider vol">

                    <div class="row lead">
                        <!-- <h1 class="text-center">Form has been closed! Thank you all for the support</h1> -->
                        <form class="col-md-12 form-horizontal" id="volunteer-form">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" id="inputName">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" id="inputEmail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone" class="col-sm-4 control-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" name="phone" class="form-control" id="inputPhone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputWork" class="col-sm-4 control-label">Choice of Volunteer Work<br><small>Please pick from most to least wanted</small></label>
                                <div class="col-sm-8" id="inputWork">
                                    <select id="work1" name="v_1" class="form-control">
                                        <option disabled selected> -- select an option -- </option>
                                        <option value="usher">Usher</option>
                                        <option value="event-photo">Event Photographer</option>
                                        <option value="vendor">Food Vendor Asistant</option>
                                    </select>
                                    <select id="work2" name="v_2" class="form-control">
                                        <option disabled selected> -- select an option -- </option>
                                        <option value="usher">Usher</option>
                                        <option value="event-photo">Event Photographer</option>
                                        <option value="vendor">Food Vendor Asistant</option>
                                    </select>
                                    <select id="work3" name="v_3" class="form-control">
                                        <option disabled selected> -- select an option -- </option>
                                        <option value="usher">Usher</option>
                                        <option value="event-photo">Event Photographer</option>
                                        <option value="vendor">Food Vendor Asistant</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputHour" class="col-sm-4 control-label">Volunteer Hour</label>
                                <div class="col-sm-8" id="inputHour">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hour1" id="hour1" value="3">15:00 - 17:00
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hour2" id="hour2" value="5">17:00 - 19:00
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hour3" id="hour3" value="7">19:00 - 21:00
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="text-align:center;">
                                <input id="inputDisclaimer" type="checkbox"> I have read and agreed to the <a href="#" data-toggle="modal" data-target="#disclaimerModal">Disclaimer</a>
                                <div class="modal fade" id="disclaimerModal" tabindex="-1" role="dialog" aria-labelledby="disclaimerModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3>Disclaimer</h3>
                                                <p>
                                                    Choice of volunteer is at a "as-needed" basis. We will try assigning you to the position you have indicated from the form in that order,
                                                    if your number one pick is filled, we will then choose the second one and so on. In the case where all your choices of work in your 
                                                    choice of time are not available, we will then try assigning you with your choices of work on the next available time. Your position will be informed via email,
                                                    and we expect you to reconfirm with us of your availibity. 
                                                    All volunteers will have to attend a mandatory orientation, details of where and when the orientation takes place will be sent via email.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="bg-success" id="sucess"></p>
                            <div class="form-group" style="text-align:center;">
                                <input type="submit" class="btn btn-lg btn-warning" disabled>
                            </div>

                        </form>
                    </div>

                    <hr class="featurette-divider vol">

                    <div id="event-thumbnails" class="row">
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>

        </div><!-- /.row -->

        <div id="event-sponsor" class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
           <h2 class="row">Sponsor</h2>
       </div>
       <div class="col-md-1"></div>
   </div>

   <!-- Content End -->


   <!-- /END THE FEATURETTES -->

</div><!-- /.container -->


<?php footer($conn); ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#date').append(timeConverter(<?php echo $result->countdown ?>))
    });

    function timeConverter(UNIX_timestamp){
      var a = new Date(UNIX_timestamp*1);
      var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      var year = a.getFullYear();
      var month = months[a.getMonth()];
      var date = a.getDate();
      var time = date + ' ' + month + ' ' + year;
      return time;
  }
  </script>

  <script type="text/javascript">

  $(document).ready(function (){
    validate();
    $('#inputName, #inputPhone, #inputEmail, #inputHour').keyup(validate);
    $('#inputWork #work1, #inputWork #work2, #inputWork #work3').change(validate);
    $('#inputHour #hour1, #inputHour #hour2, #inputHour #hour3').change(validate);
    $('#inputDisclaimer').change(validate);

    $("#volunteer-form").submit(function(e) {
        var tdate = new Date();
        var dd = tdate.getDate(); //yields day
        var mm = tdate.getMonth()+1; //yields month
        var yyyy = tdate.getFullYear(); //yields year
        var xxx = yyyy + "-" + mm + "-" + dd;

        if($('#inputHour #hour1').prop('checked')){
                var h_1 = $('#inputHour #hour1').val();
            } else {
                var h_1 = 0;
            }
            if($('#inputHour #hour2').prop('checked')){
                var h_2 = $('#inputHour #hour2').val();
            } else {
                var h_2 = 0;
            }
            if($('#inputHour #hour3').prop('checked')){
                var h_3 = $('#inputHour #hour3').val();
            } else {
                var h_3 = 0;
            }
    
        var formData =
        {
            name: $('#inputName').val(),
            email: $('#inputEmail').val(),
            phone: $('#inputPhone').val(),
            //hour: $('#inputHour').val(),
            v_1: $('#inputWork #work1').val(),
            v_2: $('#inputWork #work2').val(),
            v_3: $('#inputWork #work3').val(),
            t_1: h_1,
            t_2: h_2,
            t_3: h_3,
            action: "submit_volunteer",
            signup_date: xxx
            //vol_4: $('#inputWork #work4').val(),
            //vol_5: $('#inputWork #work5').val()
        }

        e.preventDefault(); //STOP default action

        $.ajax({
            url: 'new_volunteer2016.php',
            type: 'POST',
            data: formData
        }).success(function( msg ) {
            if (msg == 'Success') {
                alert("Thank you! We will be in contact with you shortly");
                $('#volunteer-form')[0].reset();
                validate();           
            } else {
                alert(msg + " Oops! Something went wrong. Please try again!");
            }
            
        }).fail(function() {
            alert("Error: Server not available");

        });
    });
});

function validate(){
    if ($('#inputName').val().length   >   0   &&
        $('#inputEmail').val().length  >   0   &&
        $('#inputPhone').val().length    >   0 && 
        (
            $('#inputHour #hour1').prop('checked') ||
            $('#inputHour #hour2').prop('checked') ||
            $('#inputHour #hour3').prop('checked')
        ) &&
        //$('#inputHour').val().length > 0 &&
        $('#inputWork #work1').prop('selectedIndex') != 0 && 
        $('#inputWork #work2').prop('selectedIndex') &&
        $('#inputWork #work3').prop('selectedIndex') &&
        //$('#inputWork #work4').prop('selectedIndex') &&
        //$('#inputWork #work5').prop('selectedIndex') &&
        $('#inputDisclaimer').prop("checked")) {
        $("input[type=submit]").prop("disabled", false);
}
else {
    $("input[type=submit]").prop("disabled", true);
}
}
</script>
</body>
</html>
