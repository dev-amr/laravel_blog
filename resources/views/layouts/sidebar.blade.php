<!-- Sidebar Widgets Column -->
<div class="col-md-4">

  <!-- Search Widget -->
  <div class="card my-4">
    <h5 class="card-header">Search Posts</h5>
    <div class="card-body">
    <form action="/search" method="POST">
    {{csrf_field()}}
      <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search by title...">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="submit">Go!</button>
        </span>
      </div>
      </form>
    </div>
  </div>

  <!-- Archives Widget -->
  @if(count($archives))
  <div class="card my-4">
    <h5 class="card-header">Archives</h5>
      <div class="card-body">
          <div class="row">
              <ul class="list-unstyled mx-auto">
              @foreach ($archives as $stats)

              <li>
                <a href="/?month={{$stats['month']}}&year={{$stats['year']}}">{{$stats['month'] . ' ' . $stats['year']}}</a>
              </li>

              @endforeach
              </ul>
          </div>
      </div>
  </div>
@endif
  

</div>


