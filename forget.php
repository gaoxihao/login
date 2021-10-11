<?php
		$file_path = "info.txt";
		if(file_exists($file_path)){
			$fp = fopen($file_path, "w");
			$str = $_POST["id"] . PHP_EOL . $_POST["email"] . PHP_EOL . $_POST["phone"];
			fwrite($fp, $str);
			
		}
		fclose($fp);
	?>
	<?php
			$mydbhost = "localhost:3307";
			$mydbuser = "123456";
			$mydbpass = '123456';
			$ip = $_SERVER["REMOTE_ADDR"];
			$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
			if(! $conn){
				die("connect error: " . mysqli_error($conn));
			}
			 else
			{ 
				/*echo ('用户信息注册成功！')."<br/>"; */  /* Close the connection 关闭连接*/
				 	$url='index.html';
					echo "<script>location.href='$url'</script>";
			}
			mysqli_select_db( $conn, 'study');
			$sql="UPDATE study SET password='$_POST[password]' WHERE id='$_POST[id]' AND email='$_POST[email]' AND phone='$_POST[phone]'";
			$retval = mysqli_query($conn, $sql);
			if(! $retval){
				die("create error" . mysqli_error($conn));
			}
			mysqli_close($conn);
		?>
