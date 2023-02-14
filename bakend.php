<?php
	
	include'connection.php';
	session_start();
		// Coding For Registration Page.

		if (isset($_POST['submit'])) {
			
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
			$files = $_FILES["file"];

			$passwordHashing = password_hash($password, PASSWORD_BCRYPT);
			$cpasswordHashing = password_hash($cpassword, PASSWORD_BCRYPT);

			$selectQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");

			if (mysqli_num_rows($selectQuery) > 0) {
				$messege = "Email already exist, Try using another email !";
				header('location:./register.php?msg='.$messege);
			}else{
				if ($password === $cpassword) {
					$filename = $files['name'];
					print_r($filename);
					$fileerror = $files['error'];
					$filetmp = $files['tmp_name'];

					$fileext = explode('.',$filename);
					$filecheck = strtolower(end($fileext));

					$fileextstored = array('png','jpg','jpeg');

					if (in_array($filecheck, $fileextstored)) {
						$destinationfile = 'upload/'.$filename;
						move_uploaded_file($filetmp, $destinationfile);

						$insertQuery = mysqli_query($conn, "INSERT INTO `users`(`name`, `email`, `password`, `cpassword`, `image`) VALUES ('$name','$email','$passwordHashing','$cpasswordHashing','$destinationfile')");

						if ($insertQuery) {
							$messege = "Registration Successfull, Now you can Login yourself";
							header('location:./register.php?msg='.$messege);
						}
						else{
							$messege = "Registration Error, Please try again !";
							header('location:./register.php?msg='.$messege);
						}
					}else{
						$messege = "Oops, image not uploaded properly!";
						header('location:./register.php?msg='.$messege);
					}
				}
				else{
					$messege = "Password doesn't match, Please try again !";
					header('location:./register.php?msg='.$messege);
				}
			}
		}

	// Coding For Login Page.

		if (isset($_POST['login'])) {
			
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);

			$selectQuery = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'");
			if (mysqli_num_rows($selectQuery)) {
				$dataFetchQuery = mysqli_fetch_assoc($selectQuery);
				$passwordFetch = $dataFetchQuery['password'];
				$roleFetch = $dataFetchQuery['role'];

				$_SESSION['email'] = $dataFetchQuery['email'];
				$matchPassword = password_verify($password, $passwordFetch);

				if ($matchPassword) {
					if ($roleFetch == 'admin') {
						$_SESSION['msg'] = "Successfully Logged In as Admin";
						header('location:./admin/index.php');
					}else{
						$_SESSION['msg'] = "Successfully Logged In";
						header("location:./users/index.php");
					}
				}else{
					$messege = "Password Incorrect !, Please try again !";
					header('location:./login.php?msg='.$messege);
				}
			}else{
				$messege = "Email id doesn't exist !, Please try again !";
				header('location:./login.php?msg='.$messege);
			}
		}

?>