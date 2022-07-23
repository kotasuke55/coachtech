<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECHの挑戦状</title>
  <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">
</head>
<body>
  <div class="confirm-form">
    <h2 class="confirm__ttl">内容確認</h2>
    <form action="/confirm" method="post">
    <table class="table">
      @csrf
      
      <tr>
        <th>お名前</th>
        <td>
          {{$fullname}}
          <input type="hidden"  name="fullname" class="fullname" value={{$fullname}}>
        </td> 
      </tr>
      <tr>
        <th>性別</th>
        <td>{{$gender ==1 ? '男性':'女性'}}</td>
        <input type="hidden" name="gender" value="{{$gender}}">
        
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{$email}}</td>
        <input type="hidden" name="email" class="email" value="{{$email}}">
      </tr>
      <tr>
        <th>郵便番号</th>
        <td>{{$postcode}}</td>
        <input type="hidden" name="postcode" class="postcode" value="{{$postcode}}">
      </tr>
      <tr>
        <th>住所</th>
        <td>{{$address}}</td>
        <input type="hidden" name="address" class="address" value="{{$address}}">
      </tr>
      <tr>
        <th>建物名</th>
        <td>{{$building_name}}</td>
        <input type="hidden" name="building_name" class="building_name" value="{{$building_name}}">
      </tr>
      <tr>
        <th>ご意見</th>
        <td>{{$opinion}}</td>
        <input type="hidden" name="opinion" class="opinion" value="{{$opinion}} ">
      </tr>
    </table>
    <div class="button__inner">
      <button name="action" type="submit" class="button" value="submit">送信</button>
      <button name="action" type="submit" class="button2" value="back">修正する</button>
    </div>
    </form>
  </div>
</body>
</html>
<style>
  .confirm__ttl {
  font-size: 30px;
  padding: 20px 0;
  text-align: center;
}

.confirm-form {
  width: 35%;
  margin: 0 auto;
}

.table {
  border-collapse: separate;
  border-spacing: 0px 30px;
}

.table th{
  padding-right: 20px;
}

.fullname {
  width: 100%;
}

.email {
  width: 100%;
}

.postcode {
  width: 100%;
}

.address {
  width: 100%;
}

.building_name {
  width: 100%;
}

.opinion {
  width: 100%;
}

span {
  color: red;
}

.opinion-th {
  vertical-align: top;
}

.button__inner {
  display: flex;
  flex-flow: column;
}

.button {
  color: #fff;
  background-color: black;
  padding: 5px 40px;
  border-radius: 5px;
  margin: 0 auto;
}

.button2 {
  border: none;
  background-color: #fff; 
  margin: 0 auto;
  padding: 5px 30px;
 text-decoration: underline;;
}
</style>
