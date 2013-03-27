@layout('layout.main')

@section('title')
Login
@endsection

@section('css')
	@parent
	<style type="text/css" media="screen">
		#content div div#account {
			margin: 32px auto;
		}

		#content div div#account form {
			padding-left: 6px;
		}

		#content div div#account div form span {
			font-size: 18px;
			margin-bottom: 8px;
		}

		#content div div#account div form table tr td  {
			padding: 8px 0;
		}

		#content div div#account div form input.submitbtn {
			margin-top: 16px;
		}
	</style>
@endsection

@section('content')
	<div>
					<!-- Report Message -->
					@if ($report['message'])
						<div class="alert alert-{{ $report['status'] }}">
							<button class="close" data-dismiss="alert" type="button">×</button>
							{{ $report['message'] }}
						</div>
					@endif
		<div id="account">
			<div>
				<form action="/users/validate" method="post">
					<span>Login</span>
					<table>
						<tr>
							<td><label for="name">Username</label></td>
							<td><input type="text" id="name" name="username" required /></td>
						</tr>
						<tr>
							<td><label for="password">Password</label></td>
							<td><input type="password" id="password" name="password" required /></td>
						</tr>
					</table>
					<input type="submit" value="Login" class="submitbtn" />
				</form>
			</div>
		</div>
	</div>
@endsection
	