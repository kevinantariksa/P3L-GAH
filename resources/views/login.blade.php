<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="{{route('login.user')}}" method="post">
      <input type="text" name="username" required="" placeholder="Username">
      <input type="password" name="password" required="" placeholder="Password">
      <button type="submit">Login</button>
    </form>
  </body>
</html>
