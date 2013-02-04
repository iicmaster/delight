@layout('layout.main')

@section('title')
Sign Up
@endsection

@section('content')
	<div>
		<div id="account">
			<div>
				<form action="#">
					<span>SIGN-UP</span>
					<table>
						<tr>
							<td><label for="email">E-mail</label></td>
							<td><input type="text" id="email" /></td>
						</tr>
						<tr>
							<td><label for="login">Login</label></td>
							<td><input type="text" id="login" /></td>
						</tr>
						<tr>
							<td><label for="password">Password</label></td>
							<td><input type="text" id="password" /></td>
						</tr>
						<tr>
							<td><label for="confirmpass">Confirm<br />Password</label></td>
							<td><input type="text" id="confirmpass" /></td>
						</tr>
						<tr>
							<td></td>
							<td class="rememberme"><label for="rememberme"><input type="checkbox" id="rememberme" /> Remember me on this computer</label></td>
						</tr>
					</table>
					<input type="submit" value="Sign-up" class="submitbtn" />
				</form>
			</div>
		</div>
	</div>
@endsection