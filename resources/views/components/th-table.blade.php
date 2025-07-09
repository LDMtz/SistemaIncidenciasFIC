@props(['centered' => false]) 
<th class="font-normal px-3 py-1 {{$centered ? 'text-center' : ''}}">{{$slot}}</th>