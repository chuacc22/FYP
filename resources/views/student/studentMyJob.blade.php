<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.navigation')
        <div id = "studentMyJob">
            <div class="ui container segment" id = "MyJob">
                <table class="ui celled striped table">
                    <b>Application Status Guideline : </b>
                    <b style="color:orange">Pending</b><i class = "long arrow alternate right icon"></i>
                    <b style="color:blue">Interview Invitation</b><i class = "long arrow alternate right icon"></i>
                    <b style="color:orange">Reviewing</b><i class = "long arrow alternate right icon"></i>
                    <b style="color:green">Offer Letter Sent ( Successful )</b>
                    <thead>
                        <tr>
                            <th class="three wide">Date</th>
                            <th>Employer/Company</th>
                            <th class="three wide" ><p style="text-align: center">Status</p></th>
                        </tr>
                        </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach($applications as $value)
                        <tr>
                            <td>{{$value->updated_at->format('d/m/Y')}}</td>
                            <td>{{$employers[$i]->name}} - {{$employers[$i]->companyName}}</td>
                            <td>{{getApplicationStatus($value->applicationStatus)}}</td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
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