<button type="{{empty($type) ? 'submit' : $type}}" class="btn {{$type == 'submit' ? 'btn-primary' : ''}}">{{$slot}}</button>
