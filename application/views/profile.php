<?php $social_id = $this->session->userdata['social_id']; ?>
<script>
function timeConverter(UNIX_timestamp){
  var a = new Date(UNIX_timestamp * 1000);
  var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time = date + ' ' + month + ' ' + year;
  return time;
}
var page_name ='profile';
var social_id = "<?php echo $this->session->userdata['social_id']?>";
$.ajax({
           type: "GET",
           url: "<?php echo $base_url; ?>"+"rest/getProfile",
           data: {"social_id":social_id},
           success: function (response) {
               if (response.status === 'true') {
                   var user = response.data[0];
                   var full_name = user.full_name;
                   var email = user.email;
                   var phone = user.phone;
                   var last_login = timeConverter(user.last_login);
                   var created_on = timeConverter(user.created_on);
                   $('#full_name').val(full_name);
                   $('#email').val(email);
                   $('#phone').val(phone);
                   $('.member-since').html(created_on);
               } else {

               }
           }
       });
</script>
<section class="features" id="features">
<div class="container">
    <div class="container">
    <h1>Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="<?php echo 'https://graph.facebook.com/'.$social_id.'/picture?type=large'?>" width="100px" height="100px" class="avatar img-circle" alt="avatar"><br/><br/>
        <button type="button" class="btn btn-danger btn-sm logout">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </button><br/><br/>
        <h4 class="text-center">Member Since</h4>
        <div class="member-since"></div>
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">    
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Full name:</label>
            <div class="col-lg-8">
              <input class="form-control" id="full_name" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" id="email" type="text" value="janesemail@gmail.com">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone:</label>
            <div class="col-lg-8">
              <input class="form-control" id="phone" type="number" value="">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
</section>

