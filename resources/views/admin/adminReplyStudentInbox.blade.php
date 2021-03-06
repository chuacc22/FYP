<!DOCTYPE html>
<html>
<head>
    <style>
        .ui.table tr td { 
            border-top: 0px !important; 
        }

        .msgText{
            word-wrap:break-word; white-space: pre-line;
        }

        .text-content{
            max-width:350px; 
            height:auto;
            border-radius: 30px;
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
        <div id = "adminReplyStudentInbox" class="ui container">
            <form class = "ui form" method="post" action="/admin/adminReplyStudentInbox/{{$student->id}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="ui very padded text container segment">
                    <div>
                        <h3 class = "ui diving header">To :  {{$student->name}}</h3>
                        <textarea name = "letterDesc" required></textarea>
                        <div class = "field">
                            <label><b> Attachment </b></label>
                            <input type="file" name="pdfFile" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput">
                        </div>
                        <button class="ui right floated blue large button" type="submit">
                            <i class="reply icon"></i>Send
                        </button>
                    </div>
                </div>
            </form>
            @if($inboxContents != null)
                @if ($inboxContents->isEmpty())
                     <h3>No Msg Found</h3>
                @else
                    @include('/admin/adminReplyStudentInboxTable')
                @endif
            @endif        
        </div>
    </div>
</body>
