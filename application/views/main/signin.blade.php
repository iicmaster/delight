@layout('layout.main')

@section('title')
Sign in
@endsection

@section('content')
	<div>
		<div id="account">
			<div>
				<form action="#">
					<span>SIGN-IN</span>
					<table>
						<tr>
							<td><label for="name">Name</label></td>
							<td><input type="text" id="name" /></td>
						</tr>
						<tr>
							<td><label for="password">Password</label></td>
							<td><input type="text" id="password" /></td>
						</tr>
						<tr>
							<td></td>
							<td class="rememberme"><label for="rememberme"><input type="checkbox" id="rememberme" /> Remember me on this computer</label></td>
						</tr>
					</table>
					<input type="submit" value="Sign-In" class="submitbtn" />
				</form>
			</div>
		</div>
	</div>
@endsection
	