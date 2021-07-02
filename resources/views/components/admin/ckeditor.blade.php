@props([
    'title', 
    'model', 
    'ckeditorPath',
    'classes'     => null,
    'hint'        => null,
    'required'    => false,
    'disabled'    => false,
    'placeholder' => null,
    'tabindex'    => 1,
    'rows'        => 3,
    'endpoint'    => false
])

<div class="{{ $classes }}" wire:ignore>

    <div class="form-group">
        <label>{{ $title }}</label>
        <textarea 
            class="form-control" 
            wire:model.lazy='{{ $model }}'
            placeholder="{{ $placeholder }}"
            @if ($required) required @endif
            @if ($disabled) disabled @endif
            tabindex={{ $tabindex }}
            rows={{ $rows }}
            id="ckeditor-{{ $model }}"
        ></textarea>
        <small class="form-text text-muted">{{ $hint }}</small>
        @error($model) <div class="text-danger">{{ $message }}</div> @enderror
    </div>

   
    @section('js')
        <script src="{{ $ckeditorPath }}"></script>
        <script type="text/javascript">
            const options = {
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ],

                removeButtons: 'Save,NewPage,ExportPdf,Preview,Print,Templates,Find,Replace,Source,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Scayt,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Font,About,SelectAll'
            }
            
            var editor = CKEDITOR.replace('ckeditor-{{ $model }}', options);
            editor.editorConfig = ( config ) => {
            config.toolbarGroups = [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'tools', groups: [ 'tools' ] },
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
            ];

            config.removeButtons = 'Save,NewPage,ExportPdf,Preview,Print,Templates,Find,Replace,Source,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Scayt,CreateDiv,BidiLtr,BidiRtl,Language,Anchor,Flash,Font,About,SelectAll';
        };
            editor.on('change', () => @this.set('{{ $model }}', editor.getData()));
        </script>
    @stop
    
</div>