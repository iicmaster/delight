@layout('layout.main')

@section('title')
Edit Profile
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
			vertical-align: top;
			padding: 8px 0;
		}

		#content div div#account div form input.submitbtn {
			margin-top: 16px;
		}

		#content div form textarea#user-address {
			width: 290px;
			height: auto;
			border: 1px solid #E0E0E0;
		}

		#content div form input#tel {    
			border: 1px solid #E0E0E0;
		    height: 25px;
		    width: 290px;
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
				<form action="/users/update" method="post">
					<span>Edit Profile</span>
					<table>
						<tr>
							<td><label for="login">Name</label></td>
							<td><input type="text" id="name" name="name" value="{{ $user->name }}" required /></td>
						</tr>
						<tr>
							<td><label for="email">E-mail</label></td>
							<td><input type="email" id="email" name="email" value="{{ $user->email }}" required /></td>
						</tr>
						<tr>
							<td><label for="user-address">Address</label></td>
							<td><textarea id="user-address" name="address">{{ $user->address }}</textarea></td>
						</tr>
						<tr>
							<td><label for="tel">Tel</label></td>
							<td><input type="text" id="tel" name="tel" value="{{ $user->tel }}" /></td>
						</tr>
					</table>
					<input type="submit" value="Save" class="submitbtn" />
				</form>
			</div>
		</div>
	</div>
@endsection