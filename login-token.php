<?php

$xml ='{ "username": "5xxxxxxxxx", "password": "xxxxxxxx" }'; // kullanıcı bilgilerini yazınız

$url = 'https://mesajussu.turkcell.com.tr/api/api/integration/v1/login';
$curl = curl_init($url);
curl_setopt ($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
if(curl_errno($curl)){
    throw new Exception(curl_error($curl));
}
curl_close($curl);
//echo $result;

$sonuc_dizi = explode ('"',$result); // gelen yanıtı diziye çeviriyoruz
$token = $sonuc_dizi[3]; // dizinin 3 numaralı indisi bize lazım olan token. Değişkene atıyoruz.

$tarih = date('Y-m-d H:i:s'); // veritabanına kaydederken son alınan tarih saatide kaydedelim 

$db->exec("UPDATE smsToken SET token='{$token}', tarih='{$tarih}' WHERE id ='1' ");
// NOT: alınan token ve tarih bilgisini veritabanına yeni kayıt olarak eklemeyin. 
// Tabloyu oluşturduğunuzda manuel olarak bir kayıt açın ve hep onu güncelleyin.
?>
<center>smsToken oluşturulup kaydedildi.<br><?=$tarih;?></center>
