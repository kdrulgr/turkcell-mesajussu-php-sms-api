# turkcell-mesajussu-php-sms-api

Türkcell Mesaj Üssü Sms Api dökümanında php yada diğer diller için örnek kod olmadığından entegrasyonu yaparken biraz uğraştırmıştı. 
İhtiyacı olan arkadaşlar zaman kaybetmeyin diye örnek php kodlarını paylaşıyorum.

İŞLEYİŞ
1. SMS gönderebilmek için login olup 10 dakika geçerli olan bir token almak gerekiyor. Alınan token'ı veritabanına kaydedin, lazım olduğunda kullanacağız.
 login-token.php her çalıştığında yeni bir token üretir ve her sms gönderiminde son alınan token kullanılmalıdır. login-token kodlarını on dakika dolmadan (5 yada 9 dakikada bir) çalıştırıp son alınan token'ı eskisinin yerine kaydedin. Bunun için Cron (zamanlanmış görevler) kullanın. 
2. Aldığımız token'ı SmsSend.php de kullanacağız.
