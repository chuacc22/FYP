<!DOCTYPE html>
<html>
<head>
    <style>
        .ui.table tr td { 
            border-top: 0px !important; 
        }

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.adminNavi')
        <div id = "adminViewApplication" class="ui container">
                <div class="ui raised very padded text container segment">
                <h2 class = "ui diving header">Application</h2>
                    <div class = "field">
                    <b> To: </b>
                    {{$employer->name}} ({{$employer->email}}) - {{$employer->companyName}}
                    </div>
                    <div class = "field">
                    <b> From: </b>
                    {{$student->name}} ({{$student->email}})
                    </div>
                    <div class = "ui segment">
                        <h3>Application Description :</h3>
                        <pre class="myPre">{{$application -> applyDesc}}</pre>
                    </div>
                    <div class = "field">
                        @if($application->pdfFile != null)
                            <div class = "field">
                                <a href="/download/downloadFile{{$application->pdfFile}}"><h3><u>Other Attachments</u></h3></a>
                            </div>
                        @else
                            <div class = "field"><b>No Attachment Uploaded</b>
                            </div>
                        @endif
                    </div>
                    <div class = "field">
                        @if($application->resume != null)
                            <div class = "field">
                                <a href="/download/downloadFile{{$application->resume}}"><h3><u>Resume_pdf</u></h3></a>
                            </div>
                        @else
                            <div class = "field"><b>No Resume Uploaded</b>
                            </div>
                        @endif
                    </div>
                    <div>
                        <form method="get" action="/admin/adminReplyStudentInbox/{{$student->id}}">
                            {{ csrf_field() }}
                            <button class="fluid ui orange  button" type="submit">
                                Send Message to Student
                            </button>
                        </form>
                    </div><br>
                    @if($application->showApplication==0)
                        @if($application->applicationStatus != 7)
                            <div>
                                <form method="post" action="/admin/adminUpdateApplicationStatus/{{$application->id}}" >
                                    {{ csrf_field() }}
                                    <button class="fluid ui red button" type="submit">
                                        Reject Application
                                    </button>
                                </form>
                            </div><br>
                            <div>
                                <form method="post" action="/admin/updateShowApplicationStatus/{{$application->id}}" >
                                    {{ csrf_field() }}
                                    <button class="fluid ui green button" type="submit">
                                        Send Application to Employer
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endif
                </div>
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