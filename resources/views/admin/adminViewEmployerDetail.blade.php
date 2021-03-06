<!DOCTYPE html>
<html>
<head>
    <style>

        /* .ui.table tr td { 
            border-top: 0px !important; 
        } */

        .myPre {
            font-family: "Helvetica";
            display: flex;
            white-space: pre-line;
            word-break: break-word;
            font-size: 16px;
            /* overflow: hidden;
            margin: 0 auto; */
        }

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<body>
    <div id = "adminViewStudentDetail" class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.adminNavi')
            <div class="ui container segment">
                <table class = "ui very basic table">
                    <h3>User Status:
                        @if($employer->status == 1)
                            <b style="color:green;">Active</b>
                        @else
                            <b style="color:red;">Suspend</b>
                        @endif
                    </h3>
                <tbody>
                    <tr>
                        <td>
                        <img style="height: 110px; border:2px solid grey; width:120px" src = "{{$employer->profilePic}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Employer Name</h3>
                            <div class="myPre">{{$employer->name}}</div>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <h3>Email Address</h3>
                            <div class="myPre">{{$employer->email}}</div>
                        </td>
                        <td >
                            <h3>Contact No.</h3>
                            <div class="myPre">{{$employer->mobileNo}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>Company Name</h3>
                            <div class="myPre">{{$employer->companyName}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>MOU Status : 
                                @if($employer->mouStatus == 1)
                                    <b style="color:green;">Yes</b>
                                @else
                                    <b style="color:red;">No</b>
                                @endif
                            </h3>
                        </td>
                    </tr>
                    <tr> 
                        <td colspan = "2">                   
                            <div>
                                <form method="get" action="/admin/adminReplyEmployerInbox/{{$employer->id}}">
                                    {{ csrf_field() }}
                                    <button class="fluid ui grey button" type="submit">
                                        Send Message to Employer
                                    </button>
                                </form>
                            </div><br>
                        </td>
                    </tr>
                </tbody>
            </table>
         </div>
         <div class="ui container segment">
            <table class="ui celled stripped table">
                <h3 class = "ui diving header">Student Job Application List</h3>
                <b>Application Status Guideline : </b>
                    <b style="color:orange">Pending</b><i class = "long arrow alternate right icon"></i>
                    <b style="color:blue">Interview Invitation</b><i class = "long arrow alternate right icon"></i>
                    <b style="color:orange">Reviewing</b><i class = "long arrow alternate right icon"></i>
                    <b style="color:green">Offer Letter Sent ( Successful )</b>
                <tbody>
                    <?php $i=0 ?>
                    @foreach($appliedStudents as $values)
                        <tr>
                            <td class="three wide">{{$values->id}}</td>
                            <td>{{$values->name}}</td>
                            <td class="three wide">{{$values->course}}</td>
                            <td class="three wide">{{getApplicationStatus($applications[$i]->applicationStatus)}}</td>
                        </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</body>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>
<?php
    function getApplicationStatus($status){

        if ($status == 1){
            echo '<p style="color: orange; text-align: center">Pending</p>';
        }else if ($status == 2){
            echo '<p style="color: blue; text-align: center">Interview Invitation</p>';
        }else if ($status == 3){
            echo '<p style="color: orange; text-align: center">Reviewing</p>';
        }else if ($status == 4){
            echo '<p style="color: green; text-align: center">Offer Letter Sent</p>';
        }else if ($status == 5){
            echo '<p style="color: red; text-align: center">Rejected by Student</p>';
        }else if ($status == 6){
            echo '<p style="color: red; text-align: center">Rejected by Employer</p>';
        }else if ($status == 7){
            echo '<p style="color: red; text-align: center">Rejected by Admin</p>';
        }else{
            return "Null";
        }
    }
?>