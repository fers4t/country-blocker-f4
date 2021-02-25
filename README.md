# Amaç ve Çalışma Mantığı

Bu minik eklentiyi yaparken, her WordPress sitesinin kaçınılmaz sorunu olan brute-force saldırılarını engellemeyi amaçladım. Bu eklentide yalnızca 2 tane input var. Birinde panelin açık olmasını istediğiniz ülkenin kodunu (örn. TR), diğerinde ise admin panelinizin slugını (ör. wp-admin) yazıyorsunuz ve admin paneliniz yalnızca belirttiğiniz ülkede erişilebilir oluyor. 
Ülke kısıtlaması getirmemin temel amacı, genelde bu saldırıların yurt dışından ya da (yurt içi kaynaklı olsa bile) VPN aracılığıyla yapılıyor olması. Bu bağlamda, neredeyse hiçbir zaman Türkiye'den brute-force saldırısı almıyorum. Çünkü görünür bir IP adresi olduğunda saldırgan doğrudan avucumuza düşüyor. 

# Neden IP Adresi Değil?
Çünkü IP adresimiz sürekli değişebiliyor ve erişimimizi kaybettiğimizde başımıza ek iş çıkarabiliriz. Kaldı ki, bu tam teşekküllü bir güvenlik eklentisi zaten değil. Tek amacım, amacı ne olursa olsun panele yurt dışından erişimi tamamen kapatmak. 

# ÖNEMLİ NOT
Eklentinin hızlı çalışabilmesi için verileri veritabanında değil json'da tuttum. JSON dosyasına başkalarının ulaşamaması için de root dizine kayıt ettirdim. Yani, public_html'in de içinde olduğu ana dizinden bahsediyorum. public_html'in üst klasörü erişilebilir olmadığı için json dosyasını böylece güvende tutabileceğimi düşündüm. Eğer üst klasöre erişiminiz yoksa eklentide küçük bir değişiklik yaparak json path'ini değiştirmeniz gerekebilir. Temel PHP bilgisi ile bunu rahatça yapabilirsiniz.
