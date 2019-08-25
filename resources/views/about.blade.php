@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>About ギブテック</h2>
      <br>
      <div class="row">
        <div class="col-md-10">
          <p><font size="5">『ギブテック』</font><font size="4">というサービスは、あなたが磨いている技術（スキル）を提供し、またあなたがつけたいと思う技術を磨くことができるサービスです。</font></p>
          <p><font size="4">例えば、「英語を話せるようになりたい」と思うけど、コストがかかるし続けられるか不安になり、結局やらないという選択をしてしまう経験あるんじゃないでしょうか？</font></p>
          <p><font size="4">ギブテックではあなたがつけたいと考えているスキルを持った人を探すことができます。</font></p>
          <p><font size="4">また、あなたが発信者となってスキルを人々に提供することもできます。</font></p>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>How to ギブテック</h2>
      <br>
      <div class="row">
        <div class="col-md-10">
          <ul>
            <li class="p-3"><h4><i class="far fa-id-card"></i> チャンネル別タイムライン</h4>
              <font size="4">「いいね」数が増えている話題のチャンネルを閲覧することができます。</font>
            </li>
            <li class="p-3"><h4><i class="fas fa-id-card"></i> 記事別タイムライン</h4>
              <font size="4">「いいね」数が増えている話題の記事を閲覧することができます。</font>
            </li>
            <li class="p-3"><h4><i class="fa fa-sort-amount-up"></i> フォロー記事</h4>
              <font size="4">フォローしているチャンネルの記事を読むことができます。</font>
            </li>
            <li class="p-3"><h4><i class="fa fa-chart-bar"></i> 記事投稿</h4>
              <font size="4">あなたのチャンネルから記事を作成し投稿することができます。あなたのスキルを発信しましょう。</font>
            </li>
            <li class="p-3"><h4><i class="fa fa-btn fa-user-friends"></i> 記事投稿一覧</h4>
              <font size="4">あなたが過去に投稿した記事を閲覧することができます。</font>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
