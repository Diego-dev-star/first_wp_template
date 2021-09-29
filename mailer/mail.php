<?php
$from = get_theme_mod('true_display_email');
$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$message = $_POST['message'];

if (mail($from, "С сайта были отправлены данные",
    "Name:".$name.". E-mail: ".$email.".Company:".$company. ".message:" .$message   ,"From: example2@mail.ru \r\n"))
{     echo _e('сообщение успешно отправлено');
} else {
    echo _e("при отправке сообщения возникли ошибки");
}?>
<div class="testform">
<?php echo var_dump($from);?>
</div>