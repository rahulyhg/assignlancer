<?php 
ini_set('display_errors', TRUE);
?>
<div><img id="al-loader" src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif"/></div>
<style>
@font-face { font-family: telugu;src: url('fonts/telugu_style01.ttf'); }
.lang_telugu { font-family: telugu;font-size:18px; }
body::-webkit-scrollbar-track { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);background-color: #F5F5F5; }         
body::-webkit-scrollbar { width: 6px;background-color: #F5F5F5; }        
body::-webkit-scrollbar-thumb { background-color: #000000; }
body { overflow-x:hidden; }
.hlLetterString { background-color:yellow;color:#000;}
.preview-relative { position:relative;border:6px solid #cf3427; }
.preview-absolute { position:absolute;top:25%;left:35%;z-index:10; }
@media screen and (min-width: 1280px) { 
 #al-loader { position:fixed;width:100px;height:100px;display:none;z-index:2000; }
 #al-loader { margin-left:42%;margin-top:12%; }
}
@media (min-width: 1025px) and (max-width: 1280px) { 
 #al-loader { position:fixed;width:100px;height:100px;display:none;z-index:2000; }
 #al-loader { margin-left:42%;margin-top:12%; }
}
@media (min-width: 768px) and (max-width: 1024px) { 
 #al-loader { position:fixed;width:100px;height:100px;display:none;z-index:2000; }
 #al-loader { margin-left:42%;margin-top:20%; }
}
@media (min-width: 481px) and (max-width: 767px) { 
 #al-loader { position:fixed;width:100px;height:100px;display:none;z-index:2000; }
 #al-loader { margin-left:38%;margin-top:25%; }
}
@media (min-width: 325px) and (max-width: 480px) {
 #al-loader { position:fixed;width:150px;height:150px;display:none;z-index:2000; }
 #al-loader {  margin-left:25%;margin-top:30%; }
}
@media (min-width: 290px) and (max-width: 324px) {
 #al-loader { position:fixed;width:100px;height:100px;display:none;z-index:2000; }
 #al-loader { margin-left:24%;margin-top:30%; }
}
</style>
<script type="text/javascript">
function show_toggleMLHLoader(element){
  document.getElementById("al-loader").style.display='block';
  $(element).css("opacity","0.6");
}
function hide_toggleMLHLoader(element){
  document.getElementById("al-loader").style.display='none';
  $(element).css("opacity","1");
}
/* Core Functionality ::: Start */
function sel_optcountries(id,selval){ 
 var countries=["India","Australia"]; 
 var content='<option value="">Select your Country</option>';
 for(var index=0;index<countries.length;index++){
  content+='<option value="'+countries[index]+'">'+countries[index]+'</option>';
 }
 document.getElementById(id).innerHTML=content;
 if(selval.length>0){ document.getElementById(id).value=selval; }
}
function sel_optcurrencies(id,selval){ 
 var currency=["Indian Rupee","Australian Dollar"]; 
 var content='<option value="">Select your Currency</option>';
 for(var index=0;index<currency.length;index++){
  content+='<option value="'+currency[index]+'">'+currency[index]+'</option>';
 }
 document.getElementById(id).innerHTML=content;
 if(selval.length>0){ document.getElementById(id).value=selval; }
}
function sel_optTimezone(id,selval){ 
 var timezone=["Asia/Kolkata","Australia/Adelaide","Australia/Brisbane","Australia/Broken_Hill","Australia/Currie",
 "Australia/Darwin","Australia/Eucla","Australia/Hobart","Australia/Lindeman","Australia/Lord_Howe","Australia/Melbourne",
 "Australia/Perth","Australia/Sydney"]; 
 var content='<option value="">Select your Timezone</option>';
 for(var index=0;index<timezone.length;index++){
  content+='<option value="'+timezone[index]+'">'+timezone[index]+'</option>';
 }
 document.getElementById(id).innerHTML=content;
 if(selval.length>0){ document.getElementById(id).value=selval; }
}		
function selopt_shiftTimingsByUsrTz(id,timezone,selval){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.livesupport.timings.php',
 { action:'GETAGENT_TIMINGS_BYTIMEZONE', req_timezone:timezone }, function(response){
  console.log(response);
  response=JSON.parse(response);
  var content='<option value="">Select ShiftTimings</option>';
  for(var index=0;index<response.length;index++){
    var time_Id = response[index].time_Id;
	var shift = response[index].shift;
	var startTime = response[index].startTime;
	var endTime = response[index].endTime;
	content+='<option value="'+time_Id+'">'+shift+' ('+startTime+'-'+endTime+')</option>';
  }
  document.getElementById(id).innerHTML=content;
  if(selval.length>0){ document.getElementById(id).value=selval; }
 });
}
/* Core Functionality ::: End */
function validate_emailAddress(email) {  
 var status = 'VALID'; 
 var atposition=email.indexOf("@");  
 var dotposition=email.lastIndexOf(".");  
 if(atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){ status = 'INVALID'; }
 return status;
}  
function blinkAdiv(div_Id){
 var display = true;
 setInterval(function(){ 
   if(display){
     document.getElementById(div_Id).style.display='none';
     display=false; 
   } 
   else {
     document.getElementById(div_Id).style.display='block';
	 display=true; 
   }
 }, 5);
}
function sendOTPCode_toUserPhoneNumber(sentOTPtoPhoneNumber){
 var otpcode='12345';
 if(PROJECT_MODE!=='DEBUG'){ 
   var otpcode='';
   for(var index=0;index<5;index++){ otpcode+=Math.floor(Math.random() * 9) + 1; }
   js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
   { action:'VALIDATE_MOBILE_OTP', projectURL:PROJECT_URL, OTPCode:otpcode, msisdn:sentOTPtoPhoneNumber },
   function(response){ console.log(response); });
 }
 return otpcode;
}
function display_preview_content(video_Id){
 var content='<div class="container-fluid mtop15p preview-relative">';
     content+='<div class="preview-absolute">';
     content+='<img src="'+PROJECT_URL+'images/other/youtube.png" style="width:100px;height:100px;"/>';
	 content+='</div>';
	 content+='<div class="row">';
	 content+='<div class="col-xs-9 pad0">';
	 content+= '<img src="https://img.youtube.com/vi/'+video_Id+'/0.jpg" style="width:100%;height:auto;"/>';
     content+='</div>';
	 content+='<div class="col-xs-3 pad0">';
	 content+= '<img src="https://img.youtube.com/vi/'+video_Id+'/1.jpg" style="width:100%;height:auto;"/>';
	 content+= '<img src="https://img.youtube.com/vi/'+video_Id+'/2.jpg" style="width:100%;height:auto;"/>';
	 content+= '<img src="https://img.youtube.com/vi/'+video_Id+'/3.jpg" style="width:100%;height:auto;"/>';
     content+='</div>';
	 content+='</div>';
	 content+='</div>';
 return content;
}
function get_youtube_videoId(url){
 var video_Id = "INVALID";
 var calculate = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
 if(calculate != null) { video_Id = calculate[1]; } 
 return video_Id;
}
function allowOnlyNumeric(evt) {
 evt = (evt) ? evt : window.event;
 var charCode = (evt.which) ? evt.which : evt.keyCode;
 if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
 }
 return true;
}
function sentenceCase(str) {
 var response='';
  for(var index=0;index<str.length;index++){
    if(index==0){ response+=str.charAt(index).toUpperCase(); }
	else { response+=str.charAt(index).toLowerCase();  }
  }
 return response;
}
/* Highlight Letter on Search */
function htmlElementVisiblility(id,status){
 if(status==='show'){
   if($('#'+id).hasClass('hide-block')){ $('#'+id).removeClass('hide-block'); }
 } else {
   if(!$('#'+id).hasClass('hide-block')){ $('#'+id).addClass('hide-block'); }
 }
}
function getCurentTimestamp(){
 var dateObj = new Date();
 var date = dateObj.getDate().toString();
 if(date.length==1){ date='0'+date; }
 var month = (dateObj.getMonth()+1).toString();
 if(month.length==1){ month='0'+month; }
 var year = dateObj.getFullYear();
 var hour = dateObj.getHours().toString();
 if(hour.length==1){ hour='0'+hour; }
 var min = dateObj.getMinutes().toString();
 if(min.length==1){ min='0'+min; }
 var sec = dateObj.getSeconds().toString();
 if(sec.length==1){ sec='0'+sec; }
 var timestamp = year+"-"+month+"-"+date+" "+hour+":"+min+":"+sec;
 return timestamp;
}
function highlightLetterInAString(innerHTML,text) {
 var content='';
 if(text.length>0){
  var index = innerHTML.toLowerCase().indexOf(text.toLowerCase());
  if (index >= 0) { 
   content = innerHTML.substring(0,index) + "<span class='hlLetterString'>" + innerHTML.substring(index,index+text.length) + "</span>" + innerHTML.substring(index + text.length);
  }
 } else {
    content= innerHTML;
 }
 return content;
}
/* Anchor Scrolling */
function core_anchorScrolling(){
  $("a").on('click', function(event) {
    if (this.hash !== "") { event.preventDefault(); var hash = this.hash;
	  $('html, body').animate({ scrollTop: $(hash).offset().top}, 100, function(){ window.location.hash = hash; });
    } 
  });
}
/* Select Option - Get Value By Text (Using ForLoop) */
function selectOpt_getValueByText(select_id,text){
var returnValue='';
 var selOpt=document.getElementById(select_id).options;
 for(var index=0;index<selOpt.length;index++){
   if(selOpt[index].text===text) {
     returnValue=selOpt[index].value;
   }
 }
 return returnValue;
}
/* TimeZones */
function get_stdDateTimeFormat01(ts_date){ 
/* Input : YYYY-MM-DD HH:ii:ss
 * OutputStandardFormat01 : Thursday, 26 February 2018 02:00 PM 
 */
var days=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var months=["January","February","March","April","May","June","July","August","September","October","November","December"];
 var d = new Date(ts_date);
 var day=days[d.getDay()];
 var date=d.getDate();
 var month=months[d.getMonth()];
 var year=d.getFullYear();
 var hours = d.getHours() > 12 ? d.getHours() - 12 : d.getHours();
 var am_pm = d.getHours() >= 12 ? "PM" : "AM";
 hours = hours < 10 ? "0" + hours : hours;
 var minutes = d.getMinutes() < 10 ? "0" + d.getMinutes() : d.getMinutes();
 var seconds = d.getSeconds() < 10 ? "0" + d.getSeconds() : d.getSeconds();
 return day+", "+date+" "+month+" "+year+" "+hours + ":"+minutes+" "+am_pm;
}
/* COLLECTIONS */
var arry_hm_key=[];
var arry_hm_value=[];
function js_setHashMap(key, value){
  /* Check Key and Value exists in Array */
  /* IF Exists */
  var already_exist_status=false;
  for(var index=0;index<arry_hm_key.length;index++){
    if(arry_hm_key[index]===key) { already_exist_status=true;arry_hm_value[index]=value;break; }
  }
  /* ELSE */
  if(!already_exist_status){ arry_hm_key[arry_hm_key.length]=key;arry_hm_value[arry_hm_value.length]=value; }
}
function js_getHashMap(key){
  var value='';
  for(var index=0;index<arry_hm_key.length;index++){
    if(arry_hm_key[index]===key) { value=arry_hm_value[index];break; }
  }
  return value;
}
function urlTransfer(url){
 window.location.href=url;
}
/* AJAX */
function js_ajax(method,url,data,fn_output){
 $.ajax({type: method, url: url,data:data, success: function(response) { fn_output(response); } }); 
}
/* SESSION MANAGEMENT */
/*
  { "session_set" : [ { "key" : "key-01" , "value" : "value-01" },
                      { "key" : "key-02" , "value" : "value-02" } ],
	"session_get" : [ "key-01", "key-02", "key-03" ]
  }
 */
function js_session(sessionJSON,fn_output) {
 var sessionData={action:'Session',SESSION_JSON: sessionJSON};
 js_ajax("POST",PROJECT_URL+'backend/php/api/app.session.php',sessionData,fn_output);
}
function div_display_warning(div_Id,warning_Id){
js_ajax("GET",PROJECT_URL+'backend/config/warning_messages.json',{},function(response){
var content='<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    content+='<strong>Warning!</strong> '+response[warning_Id][USR_LANG];
    content+='</div>';
 document.getElementById(div_Id).innerHTML=content;
});
}
function alert_display_warningByContent(data){
var content='<div class="modal-dialog">';
	content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
    content+='<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>';
    content+=data;
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
var modalDivision = document.createElement("div"); 
    modalDivision.setAttribute("id", "alertWarningModal");
	modalDivision.setAttribute("class", "modal fade");
	modalDivision.setAttribute("role", "dialog");
 document.body.appendChild(modalDivision);  
 document.getElementById("alertWarningModal").innerHTML=content;
 $('#alertWarningModal').modal();
}
function alert_display_warning(warning_Id){
js_ajax("GET",PROJECT_URL+'backend/config/warning_messages.json',{},function(response){
var content='<div class="modal-dialog">';
	content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
    content+='<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>';
    content+='<strong>Warning!</strong> '+response[warning_Id][USR_LANG];
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
var modalDivision = document.createElement("div"); 
    modalDivision.setAttribute("id", "alertWarningModal");
	modalDivision.setAttribute("class", "modal fade");
	modalDivision.setAttribute("role", "dialog");
 document.body.appendChild(modalDivision);  
 document.getElementById("alertWarningModal").innerHTML=content;
 $('#alertWarningModal').modal();
});
}
function div_display_success(div_Id,success_Id){
js_ajax("GET",PROJECT_URL+'backend/config/success_messages.json',{},function(response){
console.log(response);
var content='<div class="alert alert-success alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    content+='<strong>Success!</strong> '+response[success_Id][USR_LANG];
    content+='</div>';
 document.getElementById(div_Id).innerHTML=content;
});
}
function alert_display_success(success_Id,success_url){
js_ajax("GET",PROJECT_URL+'backend/config/success_messages.json',{},function(response){
var content='<div class="modal-dialog">';
	content+='<div class="modal-content">';
    content+='<div class="modal-body" style="padding:0px;">';
    content+='<div class="alert alert-success alert-dismissible" style="margin-bottom:0px;">';
    content+='<a href="#" onclick="javascript:urlTransfer(\''+success_url+'\');" class="close" data-dismiss="modal" ';
	content+='aria-label="close">&times;</a>';
    content+='<strong>Success!</strong> '+response[success_Id][USR_LANG];
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
var modalDivision = document.createElement("div"); 
    modalDivision.setAttribute("id", "alertSuccessModal");
	modalDivision.setAttribute("class", "modal fade");
	modalDivision.setAttribute("role", "dialog");
 document.body.appendChild(modalDivision);  
 document.getElementById("alertSuccessModal").innerHTML=content;
 $('#alertSuccessModal').modal({backdrop: "static"});
});
}
</script>