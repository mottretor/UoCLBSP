<div class="container">
  <div class="col-md-8 offset-md2">
    <h2>View User : </h2>
    <hr>

    <div class="form-group">
      <h4>Name :- {{ $post->name }}</h4>
    </div>
    <div class="form-group">
      <h4>Email :- {{ $post->email }}</h4>
    </div>
    <!-- <div class="form-group">
      <h4>Nic :- {{ $post->nic }}</h4>
    </div>
    <div class="form-group">
      <h4>Job Title :- {{ $post->job_title }}</h4>
    </div>
    <div class="form-group">
      <h4>Password :- {{ $post->Password }}</h4>
    </div> -->
    <div class="form-group">
      <h4>Is Admin :- {{ $post->admin }}</h4>
    </div>
    <div class="form-group">
      <h4>Approve :- {{ $post->approve }}</h4>
    </div>
    <div class="form-group">
      <h4>Description :- {{ $post->description }}</h4>
    </div>

    <a class="btn btn-xs btn-danger" href="javascript:ajaxLoad('{{ url('users') }}')">Back</a>
  </div>
</div>
