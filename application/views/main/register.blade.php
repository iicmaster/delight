@layout('layout.main')

@section('title')
Register
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
		<div id="account">
			<div>
				<form action="/users/create" method="post">
					<span>Register</span>
					<table>
						<tr>
							<td><label for="login">Name</label></td>
							<td><input type="text" id="name" name="name" required /></td>
						</tr>
						<tr>
							<td><label for="email">E-mail</label></td>
							<td><input type="email" id="email" name="email" required /></td>
						</tr>
						<tr>
							<td><label for="login">Username</label></td>
							<td><input type="text" id="login" name="username" required /></td>
						</tr>
						<tr>
							<td><label for="password">Password</label></td>
							<td><input type="password" id="password" name="password" required /></td>
						</tr>
					</table>
					<input type="submit" value="Register" class="submitbtn" />
				</form>
			</div>
		</div>
	</div>
@endsection