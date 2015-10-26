@if(Session::has('error'))

	<div class="error" id='message' style='display:none'>
		{{Session::get('error')}}
	</div>

@endif
@if(Session::has('success'))

	<div class="success" id='message' style='display:none'>
		<p>Selamat, anda sudah berhasil register. Silakan check email untuk mengetahui informasi akun anda.</p>
	</div>

@endif
@if(Session::has('errorrecovery'))

	<div class="error" id='message' style='display:none'>
		<p>Maaf, email anda tidak ditemukan.</p>
	</div>

@endif

<div class="container">

	<!-- Login Section -->
	<section class="login">
		<div class="row standard">
			<header class="span12 prime">
				<h3>Akun</h3>
			</header>
		</div>

		<div class="wrap">
			<div class="row-fluid">
				<div class="span6">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#login"><i class="icon-lock"></i> Pelanggan lama</a></li>
					  	<li><a href="#forgot"><i class="icon-help"></i> Lupa Password</a></li>
					</ul>

					<div class="tab-content">

						<!-- Login -->
					  	<div class="tab-pane active" id="login">
							<form class="form-horizontal" action="{{URL::to('member/login')}}" method="post">
								<div class="control-group">
									<label class="control-label" for="inputEmail"> Email</label>
									<div class="controls">
										<input type="email" name="email" id="inputEmail" placeholder="Email" required>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="inputPassword">Password</label>
									<div class="controls">
										<input type="password" name="password" id="inputPassword" placeholder="Password" required>
									</div>
								</div>

								<div class="control-group">
									<div class="controls">
										<button type="submit" class="btn theme">Login</button>
									</div>
								</div>
							</form>
						</div>

						<!-- Register -->
						<div class="tab-pane" id="forgot">
						  	<form class="form-horizontal" action="{{URL::to('member/forgetpassword')}}" method="post">
								<div class="control-group">
									<label class="control-label" for="inputEmail"> Email</label>
									<div class="controls">
									  <input type="email" id="inputEmail" placeholder="Email" name='recoveryEmail'>
									</div>
								</div>

								<div class="control-group">
									<div class="controls">
										<button type="submit" class="btn theme">Reset Password</button>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div>

				<div class="span6">
					<p>Pelanggan Baru</p>
					<hr>
					<p>Register and save time!

					<ul class="ul">
                        <li>Fast and easy check out</li>
                        <li>Easy access to your order history and status</li>
                    </ul>

                    <a href="{{URL::to('member/create')}}" class="theme">Create an Account →</a></p>
				</div>
			</div>
		</div>
	</section>
</div>