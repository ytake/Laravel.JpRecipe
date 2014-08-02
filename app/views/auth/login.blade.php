@section('scripts')
@stop
@section('content')
<div class="row">
    <div class="center-block">
        <h1 class="text-center login-title">Sign in</h1>
        <img class="profile-img" src="/images/logos/GitHub_Logo.png" alt="github oauth">
    </div>
    <div align="center">
        <a class="btn btn-info" href="{{$login_url}}">ログイン</a>
    </div>
    <div align="center">
        レシピ寄稿希望の方はユーザーグループまでお問い合わせください。
    </div>
</div>
@stop
@section('styles')
<link href="/css/auth.css" rel="stylesheet" />
@stop