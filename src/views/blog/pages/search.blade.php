@extends("voger::blog.layouts.master")
@section("title", request()->get('search'))

@section("content")
  <!-- Page Content -->
  <div class="container full-container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-9">

        <h1 class="heading-list">{{request()->input('search')}}</h1>

        @foreach($posts as $post)
        @include('voger::blog.partials.big-card')
        @endforeach

        {{$postsPaginator->links('vendor.pagination.bootstrap-5')}}
      </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-3">
            @include("voger::blog.includes.sidebar")
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection
