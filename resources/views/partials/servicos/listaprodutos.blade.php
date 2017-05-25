{{--@foreach($lists as $lista)
    <li class="list-group-item">{{$lista['produtos'][0][0]}}</li>
@endforeach--}}
{{--{{dump($lists["produtos"]["listagem"][0])}}--}}
@for($i = 0; $i < count($lists['produtos']["listagem"]); $i++)
    <li class="list-group-item">{{$lists["produtos"]["listagem"][$i]}}</li>
@endfor
