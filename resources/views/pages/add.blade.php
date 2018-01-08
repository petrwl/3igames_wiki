<h1>Add new page to {{$path}}</h1>


<form method="post">
    {{ csrf_field() }}
    <div>
        <input name="code" value="" placeholder="code">
    </div>
    <div>
        <input name="name" value="" placeholder="name">
    </div>
    <div>
        <textarea rows="20" cols="100" name="text" placeholder="text"></textarea>
    </div>
    <div>
        <input type="submit">
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif