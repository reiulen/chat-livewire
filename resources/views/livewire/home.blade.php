<div class="container">
   <div class="row">
        <div class="col-md-8 my-5 mx-auto">
            <div class="card">
                <div class="card-header">Mau chat sama siapa?</div>
                <div class="card-body">
                    <div class="form-group mb-4">
                        <select wire:model="nama" class="form-control  @error('nama') is-invalid @enderror" name="nama" id="nama">
                            <option selected disabled>- Pilih user -</option>
                            @foreach ($user as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <button wire:click="mulai" class="btn btn-primary">Chat sekarang</button>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
