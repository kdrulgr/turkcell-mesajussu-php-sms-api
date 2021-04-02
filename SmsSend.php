<?php 
$telefon = '905xxxxxxxxx'; // alıcı telefon  numarası
$mesaj = "Test Mesaj İçeriği"; // mesaj içeriği
$sender = "GONDERICIBASLIGI"; // gönderici mesaj başlığı
$campaignName = "TEST KAMPANYA"; // çok önemli değil burası
################################## - Turkcell API - #######################################
// aşağıdaki SQL sorgusu ile login-token.php ile aldığımız geçerli token'ı veritabanından çekiyoruz.
$tokeSQL = $db->query("SELECT * FROM smsToken WHERE id ='1' ")->fetch(PDO::FETCH_ASSOC);
$smsToken = $tokeSQL["token"];
$json ='{
        "messageText": "'.$mesaj.'",
        "sender": "'.$sender.'",
        "campaignName": "'.$campaignName.'",
        "receivers": ['.$telefon.']
        }';

$url = 'https://mesajussu.turkcell.com.tr/api/api/integration/v1/sms/campaign/create/json';
$curl = curl_init($url);
curl_setopt ($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json","token: ".$smsToken.""));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
if(curl_errno($curl)){
    throw new Exception(curl_error($curl));
}
curl_close($curl);
print_r($result);

?>
