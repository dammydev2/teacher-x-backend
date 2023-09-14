@component('mail::message')

Dear <strong>{{ $data['username'] }}</strong>,<br><br>

Please click on the below button to activate your account<br>

@component('mail::button', ['url' => $data['url']])
Activate
@endcomponent

<br><br>
This message is being sent to you due to your registration on teacherx.org <br><br>

<strong>If the link does not apppear clickable or does not open a browser window when you click it, please copy and paste the link below to your
browser.</strong><br><br>

{{ $data['url'] }}

This message is being sent to {{$data['email']}}<br><br>

SUPPORT: <br>
For any support with respect to your relationship with us, you can always contact us on info@teacherx.org<br><br>

<font style="color:crimson">If you are not {{ $data['username'] }} and you receive this message by mistake, kindly discard this message.<br><br></font> 

TeacherX Project Team.
@endcomponent