@if($errors->has())

    Please fix the following errors:

    <ul>
        @foreach($errors->all() as $message)

        <li>{{ $message }}</li>

        @endforeach
    </ul>

  @endif
{{ Form:: open(array('url' => 'contact_request')) }} 
            <div class="row">
              <div class="large-12 columns">
                {{  Form::label('name', 'Name'); }}
                {{  Form::text('name'); }}
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                {{  Form::label('email', 'Email'); }}
                {{  Form::text('email'); }}
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                {{  Form::label('phone', 'Phone Number'); }}
                {{  Form::text('phone'); }}
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                {{  Form::label('message', 'How can I help?'); }}
                {{  Form::textarea('message'); }}
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                {{ Form::submit('Submit', array('class' => 'button small')) }}
              </div>
            </div>
{{ Form:: close() }}