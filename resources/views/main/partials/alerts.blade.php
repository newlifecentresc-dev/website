@switch(key($alert))
    @case('success')
        <div class="alert alert-success">
            <strong>Success!</strong> {{ array_values($alert)[0] }}
        </div>
        @break

    @case('warning')
        <div class="alert alert-warning">
            <strong>Warning!</strong> {{ array_values($alert)[0] }}
        </div>
        @break
    
        @case('error')
        <div class="alert alert-danger">
            <strong>Error!</strong> {{ array_values($alert)[0] }}
        </div>
        @break

    @default
        Default case...
@endswitch