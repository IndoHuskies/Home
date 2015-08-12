<?php
require_once '../database.php';
    //grab username and connect with temp profile
$event_name = "Volunteer for Keraton";

$name = $_GET['email'];

$sql = "SELECT * 
FROM  `event`
WHERE  `name` =  '".$event_name."'
LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_OBJ);

$sql_2 = "SELECT * FROM `Keraton_2015_volunteer` WHERE `email`= '".$name."'";

$stmt_2 = $conn->prepare($sql_2);
$stmt_2->execute();

$result_2 = $stmt_2->fetch(PDO::FETCH_OBJ);

TopHeader("ISAUW | " . $event_name, "../");
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
                        <h3>Hi <em><?= $result_2->Name ?></em></h3>
                        <p>
                            Thank you for your interest in volunteering for <strong>Keraton 2015</strong>, we are sending you this follow up link to ask
                            you for the timeslot that you are open to volunteer for. Although your position is still to be arranged, the timeslot you picked
                            will be the one assigned to you.
                        </p>
                        <p>
                            These are the volunteer position you picked (from more to least priority):
                            <ul>
                                <li><?= $result_2->volunteer_1 ?></li>
                                <li><?= $result_2->volunteer_2 ?></li>
                                <li><?= $result_2->volunteer_3 ?></li>
                                <li><?= $result_2->volunteer_4 ?></li>
                                <li><?= $result_2->volunteer_5 ?></li>
                            </ul>
                        </p>
                        <p>
                            Please have this form finished by <strong>April 12th, 2015</strong>
                        </p>
                    </div>

                    <hr class="featurette-divider vol">

                    <div class="row lead">
                        <form class="col-md-12 form-horizontal" id="volunteer-form" method="POST" action="keraton-2015-volunteer-followup.php">
                        
                            <div class="form-group">
                                <label for="inputHour" class="col-sm-4 control-label">Volunteer Hour</label>
                                <div class="col-sm-8" id="inputHour">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hour1" id="hour1" value="3-5">15:00 - 17:00
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hour2" id="hour2" value="5-7">17:00 - 19:00
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="hour3" id="hour3" value="7-9">19:00 - 21:00
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="text-align:center;">
                                <input id="inputDisclaimer" type="checkbox"> Disclaimer, <a href="#" data-toggle="modal" data-target="#disclaimerModal">here</a>
                                <div class="modal fade" id="disclaimerModal" tabindex="-1" role="dialog" aria-labelledby="disclaimerModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3>Disclaimer</h3>
                                                <p>
                                                    Choice of volunteer is at a "as-needed" basis. We will try assign you to the position you have indicated from the form in that order,
                                                    if your number one pick is filled, we will then choose the second one and so on. All volunteers will have to attend a mandatory orientation,
                                                    details of where and when the orientation takes place will be sent via email.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="bg-success" id="sucess"></p>
                            <div class="form-group" style="text-align:center;">
                                <input id="submit-btn" type="submit" class="btn btn-lg btn-warning">
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
    var id_result = <?= $result_2->id ?>;
    validate();
    $('#inputHour #hour1, #inputHour #hour2, #inputHour #hour3').change(validate);
    $('#inputDisclaimer').change(validate);

    $("#volunteer-form").submit(function(e) {
        var formData =
        {
            id: id_result,
            t_1: $('#inputHour #hour1').prop('checked'),
            t_2: $('#inputHour #hour2').prop('checked'),
            t_3: $('#inputHour #hour3').prop('checked')
            //vol_4: $('#inputWork #work4').val(),
            //vol_5: $('#inputWork #work5').val()
        }

        e.preventDefault(); //STOP default action

        $.ajax({
            url: 'keraton-2015-volunteer-followup.php',
            type: 'POST',
            data: formData
        }).done(function( msg ) {
            $("#volunteer-form").remove();
            alert("Thank you! We will be in contact with you shortly");
        }).fail(function() {
            alert("Sorry. Server unavailable. ");
        });

        $("#volunteer-form")[0].reset();
    });
});
function validate(){
    
        if ( 
            (
                $('#inputHour #hour1').prop('checked') ||
                $('#inputHour #hour2').prop('checked') ||
                $('#inputHour #hour3').prop('checked')
            ) &&
            $('#inputDisclaimer').prop("checked")) {
                $("#submit-btn").prop("disabled", false);
        }
        else {
            $("#submit-btn").prop("disabled", true);
        }
        
}
</script>
</body>
</html>
