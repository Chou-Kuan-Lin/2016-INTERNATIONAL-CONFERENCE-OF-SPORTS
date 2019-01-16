<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
	$con=strlen($_POST['purpose'])+strlen($_POST['way'])+strlen($_POST['result'])+strlen($_POST['conclusion']);
	if($con>2500)
	{
	?>
		<script>
			alert("不符投稿相關規定(5-2)。");
			window.open('instructions.htm','_self');
		</script>
	<?php
	}
	else
	{
		// 建立一個 ODBC 連結, 傳回至 $cnx
		$mdbFilename="data.mdb";
		$User = "Administrator"; 
		$Pass = "VoIPLab168"; 
		$cnx = odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$mdbFilename", $User, $Pass);
		if( ! $cnx ) {
			echo "在 odbc_connect 有錯誤發生\n";
			$t=odbc_errormsg();
			echo $t;
			odbc_close($cnx);
			exit();
		}
		
		// 從submission.html抓取資料
		$registered_name = iconv("utf-8","big5", $_POST['name']);
		$registered_birthday=$_POST['birthday_year'].'-'.$_POST['birthday_month'].'-'.$_POST['birthday_day'];
		$registered_mail=$_POST['mail_first'].'@'.$_POST['mail_last'];
		$registered_unit=iconv("utf-8","big5", $_POST['unit']);
		$registered_jobtitle=iconv("utf-8","big5", $_POST['jobtitle']);
		$registered_telephone=$_POST['telephone'];
		$registered_address=iconv("utf-8","big5", $_POST['address']);
		$registered_gender=$_POST['gender'];
		$registered_public=$_POST['checkpublic'];
		$contribute_papername=iconv("utf-8","big5", $_POST['papername']);
		$contribute_author_count=$_POST['author'];
		
		$contribute_name1=iconv("utf-8","big5", $_POST['name1']);
		if($_POST['email1_first']==''&&$_POST['email1_last']=='')
			$contribute_email1='';
		else
			$contribute_email1=$_POST['email1_first'].'@'.$_POST['email1_last'];
		$contribute_address1=iconv("utf-8","big5", $_POST['address1']);
		$contribute_phone1=$_POST['phone1'];
		$contribute_unit1=iconv("utf-8","big5", $_POST['unit1']);
		$contribute_jobtitle1=iconv("utf-8","big5", $_POST['jobtitle1']);
		$contribute_notice1=$_POST['notice1'];
		
		$contribute_name2=iconv("utf-8","big5", $_POST['name2']);
		if($_POST['email2_first']==''&&$_POST['email2_last']=='')
			$contribute_email2='';
		else
			$contribute_email2=$_POST['email2_first'].'@'.$_POST['email2_last'];
		$contribute_address2=iconv("utf-8","big5", $_POST['address2']);
		$contribute_phone2=$_POST['phone2'];
		$contribute_unit2=iconv("utf-8","big5", $_POST['unit2']);
		$contribute_jobtitle2=iconv("utf-8","big5", $_POST['jobtitle2']);
		$contribute_notice2=$_POST['notice2'];
		
		$contribute_name3=iconv("utf-8","big5", $_POST['name3']);
		if($_POST['email3_first']==''&&$_POST['email3_last']=='')
			$contribute_email3='';
		else
			$contribute_email3=$_POST['email3_first'].'@'.$_POST['email3_last'];
		$contribute_address3=iconv("utf-8","big5", $_POST['address3']);
		$contribute_phone3=$_POST['phone3'];
		$contribute_unit3=iconv("utf-8","big5", $_POST['unit3']);
		$contribute_jobtitle3=iconv("utf-8","big5", $_POST['jobtitle3']);
		$contribute_notice3=$_POST['notice3'];
		
		$contribute_name4=iconv("utf-8","big5", $_POST['name4']);
		if($_POST['email4_first']==''&&$_POST['email4_last']=='')
			$contribute_email4='';
		else
			$contribute_email4=$_POST['email4_first'].'@'.$_POST['email4_last'];
		$contribute_address4=iconv("utf-8","big5", $_POST['address4']);
		$contribute_phone4=$_POST['phone4'];
		$contribute_unit4=iconv("utf-8","big5", $_POST['unit4']);
		$contribute_jobtitle4=iconv("utf-8","big5", $_POST['jobtitle4']);
		$contribute_notice4=$_POST['notice4'];
		
		$contribute_name5=iconv("utf-8","big5", $_POST['name5']);
		if($_POST['email5_first']==''&&$_POST['email5_last']=='')
			$contribute_email5='';
		else
			$contribute_email5=$_POST['email5_first'].'@'.$_POST['email5_last'];
		$contribute_address5=iconv("utf-8","big5", $_POST['address5']);
		$contribute_phone5=$_POST['phone5'];
		$contribute_unit5=iconv("utf-8","big5", $_POST['unit5']);
		$contribute_jobtitle5=iconv("utf-8","big5", $_POST['jobtitle5']);
		$contribute_notice5=$_POST['notice5'];
		
		$contribute_name6=iconv("utf-8","big5", $_POST['name6']);
		if($_POST['email6_first']==''&&$_POST['email6_last']=='')
			$contribute_email6='';
		else
			$contribute_email6=$_POST['email6_first'].'@'.$_POST['email6_last'];
		$contribute_address6=iconv("utf-8","big5", $_POST['address6']);
		$contribute_phone6=$_POST['phone6'];
		$contribute_unit6=iconv("utf-8","big5", $_POST['unit6']);
		$contribute_jobtitle6=iconv("utf-8","big5", $_POST['jobtitle6']);
		$contribute_notice6=$_POST['notice6'];
		
		$contribute_name7=iconv("utf-8","big5", $_POST['name7']);
		if($_POST['email7_first']==''&&$_POST['email7_last']=='')
			$contribute_email7='';
		else
			$contribute_email7=$_POST['email7_first'].'@'.$_POST['email7_last'];
		$contribute_address7=iconv("utf-8","big5", $_POST['address7']);
		$contribute_phone7=$_POST['phone7'];
		$contribute_unit7=iconv("utf-8","big5", $_POST['unit7']);
		$contribute_jobtitle7=iconv("utf-8","big5", $_POST['jobtitle7']);
		$contribute_notice7=$_POST['notice7'];
		
		$contribute_name8=iconv("utf-8","big5", $_POST['name8']);
		if($_POST['email8_first']==''&&$_POST['email8_last']=='')
			$contribute_email8='';
		else
			$contribute_email8=$_POST['email8_first'].'@'.$_POST['email8_last'];
		$contribute_address8=iconv("utf-8","big5", $_POST['address8']);
		$contribute_phone8=$_POST['phone8'];
		$contribute_unit8=iconv("utf-8","big5", $_POST['unit8']);
		$contribute_jobtitle8=iconv("utf-8","big5", $_POST['jobtitle8']);
		$contribute_notice8=$_POST['notice8'];
		
		$contribute_name9=iconv("utf-8","big5", $_POST['name9']);
		if($_POST['email9_first']==''&&$_POST['email9_last']=='')
			$contribute_email9='';
		else
			$contribute_email9=$_POST['email9_first'].'@'.$_POST['email9_last'];
		$contribute_address9=iconv("utf-8","big5", $_POST['address9']);
		$contribute_phone9=$_POST['phone9'];
		$contribute_unit9=iconv("utf-8","big5", $_POST['unit9']);
		$contribute_jobtitle9=iconv("utf-8","big5", $_POST['jobtitle9']);
		$contribute_notice9=$_POST['notice9'];
		
		$contribute_name10=iconv("utf-8","big5", $_POST['name10']);
		if($_POST['email10_first']==''&&$_POST['email10_last']=='')
			$contribute_email10='';
		else
			$contribute_email10=$_POST['email10_first'].'@'.$_POST['email10_last'];
		$contribute_address10=iconv("utf-8","big5", $_POST['address10']);
		$contribute_phone10=$_POST['phone10'];
		$contribute_unit10=iconv("utf-8","big5", $_POST['unit10']);
		$contribute_jobtitle10=iconv("utf-8","big5", $_POST['jobtitle10']);
		$contribute_notice10=$_POST['notice10'];
		
		$contribute_sign=$_POST['sign'];
		$contribute_purpose=iconv("utf-8","big5", $_POST['purpose']);
		$contribute_way=iconv("utf-8","big5", $_POST['way']);
		$contribute_result=iconv("utf-8","big5", $_POST['result']);
		$contribute_conclusion=iconv("utf-8","big5", $_POST['conclusion']);
		$contribute_keyword=iconv("utf-8","big5", $_POST['keyword']);
		$contribute_published=$_POST['published'];

		// 將資料輸入DB
		//全部欄位給予填寫的資料
		$result ="INSERT INTO data (registered_name, registered_birthday, registered_mail, registered_unit, registered_jobtitle, registered_telephone, registered_address, registered_gender, registered_public, contribute_papername, contribute_author_count, 
									contribute_name1, contribute_email1, contribute_address1, contribute_phone1, contribute_unit1, contribute_jobtitle1, contribute_notice1, 
									contribute_name2, contribute_email2, contribute_address2, contribute_phone2, contribute_unit2, contribute_jobtitle2, contribute_notice2, 
									contribute_name3, contribute_email3, contribute_address3, contribute_phone3, contribute_unit3, contribute_jobtitle3, contribute_notice3,
									contribute_name4, contribute_email4, contribute_address4, contribute_phone4, contribute_unit4, contribute_jobtitle4, contribute_notice4,
									contribute_name5, contribute_email5, contribute_address5, contribute_phone5, contribute_unit5, contribute_jobtitle5, contribute_notice5,
									contribute_name6, contribute_email6, contribute_address6, contribute_phone6, contribute_unit6, contribute_jobtitle6, contribute_notice6,
									contribute_name7, contribute_email7, contribute_address7, contribute_phone7, contribute_unit7, contribute_jobtitle7, contribute_notice7,
									contribute_name8, contribute_email8, contribute_address8, contribute_phone8, contribute_unit8, contribute_jobtitle8, contribute_notice8,
									contribute_name9, contribute_email9, contribute_address9, contribute_phone9, contribute_unit9, contribute_jobtitle9, contribute_notice9,
									contribute_name10, contribute_email10, contribute_address10, contribute_phone10, contribute_unit10, contribute_jobtitle10, contribute_notice10,
									contribute_sign, contribute_purpose, contribute_way, contribute_result, contribute_conclusion, contribute_keyword, contribute_published) 
							VALUES ('$registered_name', '$registered_birthday', '$registered_mail', '$registered_unit', '$registered_jobtitle', '$registered_telephone', '$registered_address', '$registered_gender', '$registered_public', '$contribute_papername', '$contribute_author_count', 
									'$contribute_name1', '$contribute_email1', '$contribute_address1', '$contribute_phone1', '$contribute_unit1', '$contribute_jobtitle1', '$contribute_notice1',
									'$contribute_name2', '$contribute_email2', '$contribute_address2', '$contribute_phone2', '$contribute_unit2', '$contribute_jobtitle2', '$contribute_notice2',
									'$contribute_name3', '$contribute_email3', '$contribute_address3', '$contribute_phone3', '$contribute_unit3', '$contribute_jobtitle3', '$contribute_notice3',
									'$contribute_name4', '$contribute_email4', '$contribute_address4', '$contribute_phone4', '$contribute_unit4', '$contribute_jobtitle4', '$contribute_notice4',
									'$contribute_name5', '$contribute_email5', '$contribute_address5', '$contribute_phone5', '$contribute_unit5', '$contribute_jobtitle5', '$contribute_notice5',
									'$contribute_name6', '$contribute_email6', '$contribute_address6', '$contribute_phone6', '$contribute_unit6', '$contribute_jobtitle6', '$contribute_notice6',
									'$contribute_name7', '$contribute_email7', '$contribute_address7', '$contribute_phone7', '$contribute_unit7', '$contribute_jobtitle7', '$contribute_notice7',
									'$contribute_name8', '$contribute_email8', '$contribute_address8', '$contribute_phone8', '$contribute_unit8', '$contribute_jobtitle8', '$contribute_notice8',
									'$contribute_name9', '$contribute_email9', '$contribute_address9', '$contribute_phone9', '$contribute_unit9', '$contribute_jobtitle9', '$contribute_notice9',
									'$contribute_name10', '$contribute_email10', '$contribute_address10', '$contribute_phone10', '$contribute_unit10', '$contribute_jobtitle10', '$contribute_notice10',
									'$contribute_sign', '$contribute_purpose', '$contribute_way', '$contribute_result', '$contribute_conclusion', '$contribute_keyword', '$contribute_published');";

		odbc_exec( $cnx, $result ) or die("Error:".odbc_error());
		
		odbc_close($cnx);		
		
		$registered_name= iconv("big5","utf-8", $registered_name);
?>
	<script> 
		alert(" <?php echo $registered_name;?> 先生/小姐，您已經註冊/投稿成功，即將返回首頁。");
		window.open('home.htm','_self'); 
	</script> 
<?php
	}
?>

</body>
</html>