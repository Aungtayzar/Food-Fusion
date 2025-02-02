@props(['url'=>'/','active'=>false,'icon'=>null,'mobile'=>null])

@if($mobile)
<a href="{{$url}}" class="block px-4 py-2 hover:bg-orange-700 {{$active ? 'bg-orange-700 font-bold': ''}}" {{$mobile}}>{{$slot}}</a>
@else
<a href="{{$url}}" class="hover:bg-orange-600 px-3 py-2 rounded {{$active ? 'bg-orange-700 font bold': ''}}">
   @if($icon)
   <i class="fa fa-{{$icon}}"></i>
   @endif
    {{$slot}}
</a>
@endif