<form method="post" action="{{ route('verifyEmail') }}">
    @csrf
    Nhập mã
    <input type="text" name="otp">
    <input type="submit" value="submit">
</form>
<a href="{{ route('sendActivationCode') }}">Gửi lại mã</a>
