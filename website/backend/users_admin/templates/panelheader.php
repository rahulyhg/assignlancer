<style>
.agentState-green { color:#02af09; }
.agentState-red { color:#e40e07; }
table th,td { font-size:12px;text-align:center; }
table { overflow-x:scroll; }
.dataTables_filter,.dataTables_paginate { float:right!important; }
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover { background-color:#eee; }
.navbar-brand-span { font-family:logoTitle;font-size:32px;color:#000; }
@font-face { font-family:logoTitle;src:url('fonts/LitchisIsland.ttf'); }
hr { margin-bottom:5px;margin-top:5px; }
.pad0 { padding:0px; }
.pad3 { padding:3px; }
.pad5 { padding:5px; }
.pad10 { padding:10px; }
.mbot0 { margin-bottom:0px; }
.list-group>.list-group-item { border-radius:0px; }
.curpoint { cursor:pointer; }
.divRightMargin { border-right:1px solid #ccc; }
.divLeftMargin { border-left:1px solid #ccc; }
.mtop15p { margin-top:15px; }
.mbot15p { margin-bottom:15px; }
.agentState-green { color: #02af09; }
.agentState-red { color: #e40e07; }
.font-red { color:red; }
.font-grey { color:#777; }
.hide-block { display:none; }
.livesupportlist-item:hover { background-color:#fff4d4;cursor:pointer; }
.scrollview { max-height:450px;overflow-y:scroll; }
.scrollview::-webkit-scrollbar-track { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);background-color: #F5F5F5; }         
.scrollview::-webkit-scrollbar { width: 4px;background-color: #F5F5F5; }         
.scrollview::-webkit-scrollbar-thumb { background-color: #000; }
</style>
<script type="text/javascript">

/* COLLECTIONS */
var CHATOFFSET=0;
var chatFormDivisions=[];
var chatFormOffsets=[];
var chatData=[];
function chatBoxInitializer(div_Id,ipaddress,sessionId){ 
var setDivisionOffset=true; 
var showOffset=0;
for(var index=0;index<chatFormDivisions.length;index++){
  if(chatFormDivisions[index]==div_Id){ setDivisionOffset=false; showOffset=chatFormOffsets[index];break; }
}
if(setDivisionOffset){
  chatFormDivisions[chatFormDivisions.length]=div_Id;
  chatFormOffsets[chatFormOffsets.length]=CHATOFFSET;
  showOffset=CHATOFFSET;
  CHATOFFSET+=350;
}
// Only 3 Chats are allowed
if(chatFormDivisions.length<=3){
  var box = null;
  if(box) {  box.chatbox("option", "boxManager").toggleBox();  }
  else {  box = $("#"+div_Id).chatbox({id:"You", user:{key : "value"},
             title : '<i class="fa fa-comments" aria-hidden="true"></i> '+ipaddress+'@'+sessionId.substring(0,10)+'...',
		     offset: showOffset,
		     messageSent : function(id, user, msg) {
             $("#"+div_Id).chatbox("option", "boxManager").addMsg(id, msg);
		     chatData.push({"title":id,"msg":msg});
		     setCookie("LiveSupportChat", JSON.stringify(chatData), 1);
		     console.log("chatData: "+JSON.stringify(chatData));
        }});     
    }
 }
 else {
    alert("Only 3 Chats are allowed Currently..");
 }
}
</script>
<div id="chat_div0"></div>
<div id="chat_div1"></div>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">
	 <span class="navbar-brand-span">Assignlancer</span>&nbsp;&nbsp;<span style="font-size:12px;"><b>ADMINISTRATOR</b></span>
	</a>
   </div>
   <!-- /.navbar-header -->
   <ul class="nav navbar-top-links navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-messages">
          <li>
            <a href="#">
              <div>
			    <strong>John Smith</strong>
                <span class="pull-right text-muted"><em>Yesterday</em></span>
              </div>
              <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a>
          </li>
          <li class="divider"></li>
             <li>
                <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/admin/userprofile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/dashboard">
							  <i class="fa fa-dashboard fa-fw"></i> <b>Dashboard</b>
							</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> <b>Live Support</b><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/livesupport-accounts">
									  <b>Manage Accounts</b>
									</a>
                                </li>
                                <li>
                                    <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/livesupport-timings">
									  <b>Shift Timings</b>
									</a>
                                </li>
								<li>
                                    <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/livesupport-chat">
									  <b>Customers Chat</b>
									</a>
                                </li>
								<li>
                                    <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/livesupport-work-reports">
									  <b>Work Reports</b>
									</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
                        <li>
                            <a href="tables.html">
							   <i class="fa fa-table fa-fw"></i> <b>Customers</b><span class="fa arrow"></span></a>
							   <ul class="nav nav-second-level">
                                 <li>
                                    <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/customer-manageAccounts">
									  <b>Manage Accounts</b>
									</a>
                                 </li>
								 <li>
                                    <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/customer-createNewOrder">
									  <b>Create New Orders</b>
									</a>
                                 </li>
								 <li>
                                    <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/customer-updateOrders">
									  <b>Update Orders</b>
									</a>
                                 </li>
								 <li>
                                    <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/customer-manageOrders">
									  <b>Manage Orders</b>
									</a>
                                 </li>
								 <li>
                                    <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/customer-worksheet">
									  <b>Work Sheet</b>
									</a>
                                 </li>
								</ul>
							</a>
                        </li>
						<li>
                            <a href="tables.html">
							   <i class="fa fa-table fa-fw"></i> <b>Business Overview</b><span class="fa arrow"></span></a>
							   <ul class="nav nav-second-level">
                                <li>
								  <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/view-statistics">
									<i class="fa fa-bar-chart-o fa-fw"></i> <b>View Statistics</b>
								  </a>
								</li>
								<li>
								  <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/view-ourearnings">
									<i class="fa fa-bar-chart-o fa-fw"></i> <b>Our Earnings</b>
								  </a>
								</li>
							   </ul>
							</a>
                        </li>
					    <li>
                            <a href="<?php echo $_SESSION["PROJECT_URL"];?>app/admin/test">
							  <i class="fa fa-dashboard fa-fw"></i> <b>Test</b>
							</a>
                        </li>
					 </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
