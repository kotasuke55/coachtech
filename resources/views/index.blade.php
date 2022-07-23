<?php

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECHの挑戦状</title>
  <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
  <div class="contact-form">
    <h2 class="contact__ttl">お問い合わせ</h2>
      @if (count($errors) > 0)
      <p> <span>入力に問題があります</span> </p>
      @endif
    <form action="/" method="post" id="form">
      <table class="table">
      @csrf
        <tr class="form-name">
          <th>お名前 <span>※</span></th>
          <td>
            <input type="text" name="fullname" id="fullname" class="fullname validate[required]" value="{{ old('fullname') }}">
          </td>
        </tr>
        @error('fullname')
        <tr>
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <th></th>
          <td>例）山田太郎</td>
        </tr>
        <tr class="form-gender">
          <th>性別<span>※</span></th>
          <td>
            <input type="radio" name="gender" value="1" checked>男性
            <input type="radio" name="gender" value="2">女性
          </td>  
        </tr>
        <tr class="form-email">
          <th>メールアドレス<span>※</span></th>
          <td>
            <input type="email" name="email" class="email validate[required,custom[email]]" value="{{ old('email') }}">
          </td>
        </tr>
        @error('email')
        <tr>
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <th></th>
          <td>例）test@example.com</td>
        </tr>
        <tr class="form-postcode">
          <th>郵便番号<span>※</span></th>
          <td>
            <input type="text" name="postcode" class="postcode validate[required,minSize[8],maxSize[8]]" value="{{ old('postcode')}}" onKeyUp="AjaxZip3.zip2addr(this, '', 'address', 'address');" oninput="value = value.replace(/[０-９]/g,s => String.fromCharCode(s.charCodeAt(0) - 65248)).replace(/[ー−]/g, '-').replace(/[^\-\d]/g, '');" >
          </td>
        </tr>
        @error('postcode')
        <tr>
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <th></th>
          <td>例）123-4567</td>
        </tr>
        <tr class="form-address">
          <th>住所<span>※</span></th>
          <td>
            <input type="text" name="address" class="address validate[required]" value="{{ old('address')}}">
          </td>
        </tr>
        @error('address')
        <tr>
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <th></th>
          <td>例）東京都渋谷区千駄ヶ谷1-2-3</td>
        </tr>
        <tr class="form-building">
          <th>建物名</th>
          <td>
            <input type="text" name="building_name" class="building_name" value="{{ old('building_name')}}">
          </td>
        </tr>
        <tr>
          <th></th>
          <td>例）千駄ヶ谷マンション101</td>
        </tr>
        <tr class="form-opinion">
          <th class="opinion-th">ご意見<span>※</span></th>
          <td>
            <textarea name="opinion" class="opinion validate[required,maxSize[120]]" cols="40" rows="5">{{old('opinion')}}</textarea>
          </td>
        </tr>
        @error('opinion')
        <tr>
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
      </table>
      <div class="button-inner">
       <button class="button">確認</button>
      </div>
    </form>
  </div>

<script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
</body>
</html>
<script>
  jQuery(document).ready(function(){
   jQuery("#form").validationEngine();
});
</script>
<style>
.contact__ttl {
  font-size: 30px;
  padding:20px 0;
  text-align: center;
}

.contact-form {
  width: 35%;
  margin: 0 auto;
}

.table{
  border-collapse: separate;
  border-spacing: 0px 10px;
}

.fullname{
  width: 100%;
}

.email{
  width: 100%;
}

.postcode{
  width: 100%;
}

.address{
  width: 100%;
}

.building_name{
  width: 100%;
}

.opinion{
  width: 100%;
}

span{
  color:red;
}

.opinion-th{
  vertical-align:top;
}

.button-inner{
  width: 100%;
  text-align:center;
}
.button{
  text-align:center;
  color:#fff;
  background-color:black;
  padding:5px 40px;
  border-radius:5px;
  margin:0 auto;
}


</style>