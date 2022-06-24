@extends("voger::blog.layouts.master")
@section("title", $currentCategory->name)
@section("meta_description", $currentCategory->name)

@section("content")
  <!-- Page Content -->
  <div class="container full-container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-9">

        <h1 class="heading-list">{{$currentCategory->name}}</h1>

        @foreach($blogPosts as $post)
        @include('voger::blog.partials.big-card')
        @endforeach

        {{$blogPostsPaginator->links('vendor.pagination.bootstrap-5')}}

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
