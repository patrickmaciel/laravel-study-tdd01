@forelse ($posts as $p)
    {{ $p->title }} - {{ str_limit($p->body) }} - {{ $p->created_at }}<br>
@empty
    No registers found
@endforelse
