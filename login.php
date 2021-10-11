<!-- <?php
		$file_path = "info.txt";
		if(file_exists($file_path)){
			$fp = fopen($file_path, "w");
			$str = $_POST["id"] . PHP_EOL . $_POST["password"];
			echo(id);
			fwrite($fp, $str);
			
		}
		fclose($fp);
	?> -->
	<?php
			$mydbhost = "localhost:3307";
			$mydbuser = "123456";
			$mydbpass = '123456';
			$dbname = "study";
			$conn = mysqli_connect($mydbhost,$mydbuser,$mydbpass,$dbname);
			if(! $conn){
				die("连接失败: " . mysqli_error($conn));
			}
			 else
			{ 
				/*里面可以不写内容*/
			}
			$sql="SELECT  id,password FROM study WHERE id = $_POST[id] AND password = '$_POST[password]'";			
			$result = mysqli_query($conn, $sql);
			
			
			if($row = mysqli_fetch_array($result))
			{
				$url='https://jcs-blog.gitee.io/';
				echo "<script>location.href='$url'</script>";
			}else{
					$url = 'http://study/';
					echo "<script> alert('账户或密码输入有误！'); </script>"; 
					echo "<meta http-equiv='Refresh' content='0;URL=$url'>";  
			}			
			mysqli_close($conn);
		?>
