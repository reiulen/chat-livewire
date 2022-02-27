<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h4>Chat</h4>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        @foreach ($group as $row)
                            <div wire:click="selectGroup({{ $row->id }})" role="button" class="list-group-item">{{ $row->nama }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
         @if ($groups != NULL)
             <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $groups->nama }}</div>
                    <div class="card-body">
                        <div wire:poll.1ms class="list-group list-group-flush mb-4" style="max-height: 300px; overflow:auto; display:flex; flex-direction: column-reverse;">
                            @foreach ($chat as $row)
                            <div class="list-group-item {{ $row->user->id == $user->id ? 'text-end' : '' }}">
                                <div class="text-muted text-small" style="font-size: 14px">[{{ $row->created_at }}] {{ $row->User->name }}</div>
                                <div>{{ $row->pesan }}</div>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group d-flex">
                            <input wire:model="pesan" name="pesan" type="text" class="form-control @error('pesan') is-invalid @enderror" placeholder="Kirim pesan...." />
                            <button wire:click="kirim" class="btn btn-primary mx-2">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @endif
    </div>
</div>
