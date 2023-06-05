<h1>her is login page...</h1>
<form action="users" method="POST">
    @csrf
    <input type="text" name="username" placeholder="input user name"><br><br>
    <input type="password" name="userpassword" placeholder="input password"><br><br>
    <button type="submit">Login</button>
</form>