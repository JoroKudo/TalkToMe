<main class="form-signin">
  <form action="/user/doLogin" method="post">

      <div class="form-floating">
          <input name="username" type="text" id="inputuname" class="form-control" placeholder="UserName" autofocus>
          <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
          <input name="password" type="text" id="inputPassword" class="form-control" placeholder="Password">
          <label for="floatingPassword">Password</label>
      </div>


    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</main>