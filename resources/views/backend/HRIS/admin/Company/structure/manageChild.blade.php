<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->title }}
            @if(count($child->childs))
                @include('Backend.HRIS.admin.Company.structure.manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>