<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
		<title>COMEDOR INSTITUCIONAL</title>
	</head>
	<body>
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
				<input type="num" id="inputPassword" class="form-control" placeholder="Cedula" required>
				<input type="password" id="inputPassword" class="form-control" placeholder="Nombre" required>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
			
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Registrarse</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
				Olvido la contraseña
            </a><br>
            <a href="index.php" class="forgot-password">
				Login
            </a>
        </div><!-- /card-container -->
	</body>
</html>