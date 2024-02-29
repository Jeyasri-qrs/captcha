<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<form name="form" method="post" action="">
<label><strong>Enter Captcha:</strong></label><br />
<input type="text" name="captcha" />
<p>
<img src="captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'>
<a class="fa-solid fa-arrows-rotate" href='javascript: refreshCaptcha();'></a>
</p>
<?php
session_start();
$status = '';
if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
// Validation: Checking entered captcha code with the generated captcha code
if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
// Note: the captcha code is compared case insensitively.
// if you want case sensitive match, check above with strcmp()
$status = "<p style='color:#000; font-size:14px'>
<span style='background-color: #efefef;padding: 5px'>Entered captcha code does not match! 
Kindly try again.</span></p>";
}else{
$status = "<p style='color:#000; font-size:14px'>
<span style='background-color:#46ab4a;'>Your captcha code is match.</span>
</p>";	
	}
}
echo $status;
?>
<input type="submit" name="submit" value="Submit">
</form>
<script>
//Refresh Captcha
function refreshCaptcha(){
    var img = document.images['captcha_image'];
    img.src = img.src.substring(
		0,img.src.lastIndexOf("?")
		)+"?rand="+Math.random()*1000;
}
</script>
<style>
form label{
    color: #5c5c5c;
    font-family: Nunito Sans, sans-serif;
    font-weight: 400;
    font-style: normal;
    font-size: 15px;
}
form input{
    flex-basis: 100%;
    margin-top: 5px;
    border: 2px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    font-family: Nunito Sans, sans-serif;
    font-size: 16px;
}
p{
    display: flex;
    gap: 20px;
    align-items: center;
}
p a{
    font-size:20px;
    text-decoration: none;
    color: #000;
}
</style>
