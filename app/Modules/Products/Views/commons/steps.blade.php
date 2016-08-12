<div id="wizard" class="form_wizard wizard_horizontal">
    <ul class="wizard_steps anchor">
      @foreach ($steps as $step)
        <li>
            <a href="#" class="{{ $step['class'] }}" isdone="1" rel="1">
                <span class="step_no">{{ $step['num'] }}</span>
                <span class="step_descr">
                    {{ $step['title'] }}<br/>
                    <small>{{ $step['subtitle'] }}</small>
                </span>
            </a>
        </li>
      @endforeach
    </ul>
</div>
