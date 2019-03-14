
    @foreach($childs as $child)
            {{ $child->title }}
            @if(count($child->childs))
                @include('Backend.HRIS.admin.Company.structure.manageChild',['childs' => $child->childs])
            @endif
    @endforeach
