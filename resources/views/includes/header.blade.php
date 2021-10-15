<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid">
    <div class="menu d-flex">
      <a class="navbar-brand text-white">Comics DC</a>
      <a class="nav-link {{ request()->routeIs('comics.index') ? 'active' : ''}}" aria-current="page" href="{{route('comics.index')}}">Home</a>
      <a class="nav-link {{ request()->routeIs('comics.create') ? 'active' : ''}}" aria-current="page" href="{{route('comics.create')}}">Add Comics</a>
    </div>
    <form method="GET" action="{{route('comics.index')}}"class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" name="search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>