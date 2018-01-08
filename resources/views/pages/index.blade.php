<h1>Pages</h1>
<ul>
    @foreach($pages as $page)
        <li>
            <?php echo str_repeat('&nbsp;&nbsp;', $page->level) ?><a href="/{{$page->path}}">{{$page->name}}</a>
        </li>
    @endforeach
</ul>

