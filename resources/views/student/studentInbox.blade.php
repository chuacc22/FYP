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
        <div id = "HomePage">
            <div class="ui container segment" id = "studentInbox">
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th class="three wide">Date</th>
                            <th>Employer/Company</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($inboxs as $data)
                                @if($data->employerID != 0)
                                    @foreach($sendersEmployer as $key => $employer)
                                        @if($employer->id == $data->employerID)
                                            <tr>
                                                <td>{{$data->created_at->format('d/m/Y')}}</td>
                                
                                                <td><a href="/student/studentReplyInbox/{{$employer->id}}">{{$employer->companyName}}</a></td>
                                                <?php 
                                                    $sendersEmployer->forget($key);
                                                ?>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($sendersAdmin as $key => $admin)
                                        @if($admin->id == $data->adminID)
                                            <tr>
                                                <td>{{$data->created_at->format('d/m/Y')}}</td>
                                
                                                <td><a href="/student/studentReplyAdminInbox/{{$admin->id}}">{{$admin->name}}</a></td>
                                                <?php 
                                                    $sendersAdmin->forget($key);
                                                ?>
                                        @endif
                                    @endforeach
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                </table>
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

