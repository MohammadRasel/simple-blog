  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" href="/">Home</a>
      <a class="p-2 text-muted" href="#">New features</a>
      <a class="p-2 text-muted" href="#">FAQ</a>
      @if(Auth::check())
        <a class="p-2 text-muted" href="/posts/create">Create Post</a>

        <a class="p-2 text-muted" href="#">{{Auth::user()->name}}</a>

        <a class="p-2 text-muted" href="/logout">Logout</a>

      @else
        <a class="p-2 text-muted" href="/register">Register</a>

        <a class="p-2 text-muted" href="/login">Login</a>

      @endif
    </nav>
  </div>



