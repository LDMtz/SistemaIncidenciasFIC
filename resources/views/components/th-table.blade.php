@props(['centered' => false,'extraClasses' => '']) 
<th class="font-normal px-3 py-1 {{$centered ? 'text-center' : ''}} {{ $extraClasses }}">{{$slot}}</th>