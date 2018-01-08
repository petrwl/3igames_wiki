<h1>Page {{$page->name}}</h1>
<p>
    {!! $page->text !!}
</p>

@if (!$sub_pages->isEmpty())
<h1>Sub Pages</h1>
<ul>
    @foreach($sub_pages as $page)
        <li>
            <?php echo str_repeat('&nbsp;&nbsp;', $page->level) ?><a href="/{{$page->path}}">{{$page->name}}</a>
        </li>
    @endforeach
</ul>
@endif