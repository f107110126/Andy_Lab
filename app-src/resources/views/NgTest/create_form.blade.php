<form method="post" action="{{ route('NgProject.store') }}">
    @csrf
    <input type="text" name="title">
    <textarea name="description" id="" cols="30" rows="10"></textarea>
    <button>Submit</button>
</form>
