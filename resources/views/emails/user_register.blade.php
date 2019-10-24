<h1>SignUp Form Register (Test)</h1>
<p>Merhaba {{ $kullanici->namesurname }} Kaydınız Başarılı Şekilde Oluşturuldu.</p>
<p>Kaydınızı Aktifleştirmek İiçin <a href="{{ config('app.url') }}/user/activate/{{$kullanici->activate_key}}">Tıklayınız</a> Veya Aşağıdaki
Bağlantıyı Tarayıcınızda Açınız.</p>
<p>{{config('app.url')}}/user/activate/{{$kullanici->activate_key}}</p>


