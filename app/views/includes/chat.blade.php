 <div id="chat" class="col-sm-4">
  <table class="table table-responsive table-hover">
    <tbody>
        @foreach($chat as $obj)
        <tr>
          <td>
            <div class="ch-avatar">
              <img src="{{ URL::to('assets/img/users/avatars').$obj->avatar }}" alt="{{ $obj->nickname }}'s avatar">
            </div>
            <div class="ch-nickname">
              {{{ $obj->nickname }}} said:
            </div>
            <div class="ch-message">
              {{{ wordwrap($obj->message, 30, "\n", true) }}}
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  <div class="row">
  {{ Form::open(array('url' => 'chat', 'method' => 'post', 'id' => 'chatform', 'onsubmit' => 'return post(this.id);')) }}
    <div class="input-group">
      {{ Form::textarea("message", Input::old("message"), array("placeholder" => "Type in your message", "class" => "form-control")) }}
      <span class="input-group-addon">
          <button type="submit">Send</button>
      </span>
    </div>
    <ul id="chatform-errors" class="list-unstyled text-danger">
      @foreach($errors->get('message') as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  {{ Form::close() }}
  </div>
</div>