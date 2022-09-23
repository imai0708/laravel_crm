@extends('layouts.main')

{{-- @section('title', '郵便番号検索画面')
@section('content')
    <h1>郵便番号検索画面</h1>

<div id ="app">
    <form
        <p>郵便番号検索
            <input id="input" class="zipcode"
            type="text" name="zipcode" value=""
            placeholder="検索したい郵便番号検索画面">
            <button id="search" type="button">検索</button>
        </p>
        <button id="search">
            <a href="/customers/">一覧に戻る</a>
        </button>
    </form> --}}

{{-- @section('script')
    @include('customers/"')


    <script>
        const lat = 
        const lng = ;
        let clicked;
        map.on('click', function(e) {
                    if (clicked !== true) {
                        clicked = true;
                        const marker = L.marker([e.latlng['lat'], e.latlng['lng']], {
                            draggable: true
                        }).addTo(map);
                        lat.value = e.latlng['lat'];
                        lng.value = e.latlng['lng'];
                        marker.on('dragend', function(e) {
                            // 座標は、e.target.getLatLng()で取得
                            lat.value = e.target.getLatLng()['lat'];
                            lng.value = e.target.getLatLng()['lng'];
                        });




 --}}


@section('title', '新規登録画面')

@section('content')

    <h1>新規登録画面</h1>

    {{-- エラーメッセージの表示 --}}
    @if ($errors->any())
        <div class="error">
            <p>{{ count($errors) }}件のエラーがあります。</p>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="post">
        @csrf

        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>
        
        <div>
            <label for="postcode">郵便番号 </label>
            <input type="text" name="postcode" id="postcode" value="{{ $postcode }}">
        </div>

        <div>
            <label for="address">住所 </label>
            <textarea type="text" name="address" id="address">{{ $address }}</textarea>
        </div>

        <div>
            <label for="ter">電話番号</label>
            <input type="ter" id="ter" name="ter" value="{{ old('ter') }}">
        </div>

        <input type="submit" class="submit" value="登録">
    </form>

    <a href="/customers/search">郵便番号検索に戻る</a>





@endsection
