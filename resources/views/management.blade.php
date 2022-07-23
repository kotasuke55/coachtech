<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECHの挑戦状</title>
  <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">
</head>
<body>
  <h2 class="management__ttl">管理システム</h2>
  <form action="/management" method="get">
   @csrf
    <div class="management-wrapper">
      <div class="name">
        <table class="table">
          <tr>
            <th>お名前</th>
            <td>
              <input type="text" name="fullname" value="{{$fullname}}">
            </td>
            <th>性別</th>
            <td>
              <input type="radio" name="gender" value=""  checked>全て
              <input type="radio" name="gender" value="1" >男性
              <input type="radio" name="gender" value="2" >女性
            </td>
          </tr>
          <tr>
            <th>登録日</th>
            <td>
              <input type="date" name="from" class="date">
            </td>
            <td>~</td>
            <td>
              <input type="date" name="until" class="date">
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td><input type="email" name=email value="{{$email}}"></td>
          </tr>
        </table>
        <div class="button-inner">
          <button class="button">検索</button>
          <a class="reset" href="/management">リセット</a>
        </div>
              
    </div>
</div>
  </form>
  <div class="pagination-link">
    {{ $items->total() }}件中
    {{ $items->firstItem() }}〜{{ $items->lastItem() }} 件を表示
    {{$items->links()}}
  </div>
  <table class="itemtable">
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
      <th></th>
    </tr>
    @foreach($items as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->fullname}}</td>
      <td>{{$item->gender ==1 ? '男性':'女性'}}</td>
      <td>{{$item->email}}</td>
      <td class="opinion">
        {{Str::limit($item->opinion,50)}}
        <span class="hidden-opinion">{{$item->opinion}}</span>
      </td>
      <td>
        <form action="/management/delete" method="post">
          @csrf
          <input type="hidden" value="{{$item->id}}" name="id" value="{{$item->id}}">
        <button>削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</body>
<script>


</script>

<style>
.management__ttl {
  text-align: center;
  font-size: 30px;
  padding: 20px 0;
}

.management-wrapper {
  width: 80%;
  margin: 0 auto;
  border: 1px solid black;
}

.table {
  border-collapse: separate;
  border-spacing: 0px 10px;
  text-align: center;
}

.table th{
  padding:0 30px;
}

.date{
  width: 140px;
}

.button-inner {
  display: flex;
  flex-flow: column;
}

.button {
  text-align: center;
  color: #fff;
  background-color: black;
  padding: 5px 40px;
  border-radius: 5px;
  margin: 10px auto;
}

.reset{
  text-align: center;
  margin-bottom: 30px;
}

.pagination {
  display: flex;
}

.pagination-link {
  width: 80%;
  margin: 30px auto;
  display: flex;
  justify-content: space-between;
}

.itemtable{
  width: 80%;
  margin: 0 auto;
  border-collapse: separate;
  border-spacing: 0px 10px;
  text-align: center;
}

.itemtable th{
  padding-bottom: 10px;
  border-bottom: 1px solid black;
}

.page-item {
  border: 1px solid #333;
  padding: 5px;
  background:black;
  color:#fff;
}

.pagination li.page-item  a {
    background-color: #fff;
    color:black;
}

.pagination li:not([class*="page-item "]) {
    background-color: #fff;
}

.page-item a{
  text-decoration: none;
}

.opinion {
  position: relative;
}

.opinion:hover .hidden-opinion {
  display: inline;
}

.hidden-opinion {
  position: absolute;
  display: none;
  padding: 2px;
  background-color: black;
  color: #fff;
  width: 400px;
  left: -1%;
  font-size: 80%;
  animation: fadeIn 1.5s;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }

  
}
</style>