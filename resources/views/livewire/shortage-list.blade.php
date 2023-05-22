<div>
    <ul class="overflow-y-hidden h-40 hover:overflow-y-scroll p-3 py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
        @if($mats!=null)
                @foreach($mats as $o)
                    <li>{{$o['materialCode']}} {{$o['materialqtty']}}</li>
                @endforeach
            @else
                <li>
                    <span href="#" class="no-underline  text-lg">
                        <i class="fa fa-warning"></i> No Pending Orders to see in this week
                    </span>
                </li>
            @endif
    </ul>
</div>
