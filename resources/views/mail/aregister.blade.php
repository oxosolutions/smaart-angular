@extends('mail.layout.email')
@section('content')
<tr>
	<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
					<b>Hello Admin!</b>
				</td>
			</tr>
			<tr>
				<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
					New user registered on SDGINDIA with following details:
					<ul>
						<li>Name: {{$userName}}</li>
						<li>Email: {{$userEmail}}</li>
						<li>Phone: {{$userPhone}}</li>
					</ul>
					<p>This is user not yet activated/approved click that link to approve this user:</p>
					<a href="http://192.168.0.101/smaart-angular/public/approve/email/{{$api_token}}">Click to Approve</a>
					<br/>
					<p>{{$desc}}</p>
				</td>
			</tr>
			<tr>
				<td>
					<!-- <table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<td width="260" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td>
											<img src="{{$message->embed('mail/images/left.gif')}}" alt="" width="100%" height="140" style="display: block;" />
										</td>
									</tr>
									<tr>
										<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.
										</td>
									</tr>
								</table>
							</td>
							<td style="font-size: 0; line-height: 0;" width="20">
								&nbsp;
							</td>
							<td width="260" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td>
											<img src="{{$message->embed('mail/images/right.gif')}}" alt="" width="100%" height="140" style="display: block;" />
										</td>
									</tr>
									<tr>
										<td style="padding: 25px 0 0 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table> -->
				</td>
			</tr>
		</table>
	</td>
</tr>
@endsection